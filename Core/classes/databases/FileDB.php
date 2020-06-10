<?php

namespace Core\Databases;

class FileDB
{
    private $filename;
    private $data;

    /**
     * konstruktorius kuris priskiria
     * @param $filename
     */
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    private function setData(array $data_array)
    {
        $this->data = $data_array;
    }

    public function save()
    {
        $string = json_encode($this->data);

        $bytes_written = file_put_contents($this->filename, $string);
        if ($bytes_written !== false) {
            return true;
        }

        return false;
    }

    public function load()
    {
        if (file_exists($this->filename)) {
            $data = file_get_contents($this->filename);
            if ($data !== false) {
                $this->data = json_decode($data, true);
            }
        } else {
            $this->data = [];
        }
    }

    private function getData()
    {
        return $this->data;
    }


    /**
     * If $table_name exists as index in data array returns false,
     * else creates new array with $table_name index
     * @param string $table_name
     * @return bool
     */
    public function createTable(string $table_name): bool
    {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        } else {
            return false;
        }
    }


    /**
     * Checks if table name exists
     * @param string $table_name
     * @return bool
     */
    public function tableExists(string $table_name): bool
    {
        if (isset($this->data[$table_name])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Deletes table
     * @param string $table_name
     * @return bool
     */
    public function dropTable(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            unset($this->data[$table_name]);
            var_dump('deleted');

            return true;
        } else {

            return false;
        }
    }

    /**
     * Keeps array index, but deletes what is inside
     * @param string $table_name
     * @return bool
     */
    public function truncateTable(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            var_dump('Empty array');

            return true;
        } else {

            return false;
        }
    }

    /**
     * creates rows with automatic indexes
     * or with given indexes
     * @param string $table_name
     * @param array $row
     * @param null $row_id
     * @return bool
     */
    public function insertRow(string $table_name, array $row, $row_id = null): bool
    {
        if ($row_id == null) {
            $this->data[$table_name][] = $row;

            return array_key_last($this->data[$table_name]);
        } elseif (!$this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;

            return $row_id;
        } else {

            return false;
        }

    }

    /**
     * checks if row exists
     * @param string $table_name
     * @param $row_id
     * @return bool
     */
    public function rowExists(string $table_name, $row_id): bool
    {
        if (isset($this->data[$table_name][$row_id])) {

            return true;
        } else {

            return false;
        }
    }

    /**
     * updates row if row exists with given index
     * @param string $table_name
     * @param $row_id
     * @param array $row
     * @return bool
     */
    public function updateRow(string $table_name, $row_id, array $row): bool
    {
        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;

            return true;
        }

        return false;
    }

    /**
     * deletes row if given row id exists
     * @param string $table_name
     * @param $row_id
     * @return bool
     */
    public function deleteRow(string $table_name, $row_id): bool
    {
        if ($this->rowExists($table_name, $row_id)) {
            unset($this->data[$table_name][$row_id]);

            return true;
        }

        return false;
    }

    /**
     * gets row if this row id exists
     * @param string $table_name
     * @param $row_id
     * @return bool
     */
    public function getRowById(string $table_name, $row_id)
    {
        if ($this->rowExists($table_name, $row_id)) {
            return ['id' => $row_id] + $this->data[$table_name][$row_id];
        }

        return false;
    }

    /**
     *returns results array of given conditions
     * if it was found
     * @param string $table_name
     * @param array $conditions
     * @return array
     */
    public
    function getRowsWhere(string $table_name, array $conditions): array
    {
        $results = [];

        foreach ($this->data[$table_name] as $row_id => $row) {
            $success = true;
            foreach ($conditions as $condition_index => $condition_value) {
                if (!isset($row[$condition_index]) || $row[$condition_index] != $condition_value) {
                    $success = false;
                }
            }
            if ($success) {
                $row['id'] = $row_id;
                $results[$row_id] = $row;
            }
        }

        return $results;
    }

    public
    function getRowWhere(string $table_name, array $conditions)
    {

        $rows = $this->getRowsWhere($table_name, $conditions);

        return reset($rows) ?: null;
    }
}