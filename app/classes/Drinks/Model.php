<?php


namespace App\Drinks;


use App\App;
use App\Pixels\Pixel;

class Model
{
    const TABLE = 'drinks';

    public static function insert(Drink $drinks)
    {
        App::$db->insertRow(self::TABLE, $drinks->_getData());
    }

    public static function getWhere($conditions)
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $drink = [];

        foreach ($rows as $row) {
            $drink[] = new Drink($row);
        }

        return $drink;
    }

    public static function update(Drink $drink)
    {
        App::$db->updateRow(self::TABLE, $drink->getId(), $drink->_getData());
    }

    public static function delete(Drink $drink)
    {
        App::$db->deleteRow(self::TABLE, $drink->getId());
    }

    public static function deletebyId($id)
    {
        App::$db->deleteRow(self::TABLE, $id);
    }

    public static function get(int $id): ?Drink
    {
        if ($row = App::$db->getRowById(self::TABLE, $id)) {
            return new Drink($row);
        } else {
            return null;
        }
    }
}