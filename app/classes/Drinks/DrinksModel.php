<?php


namespace App\Drinks;


use App\App;
use App\Pixels\Pixel;

class DrinksModel
{
    const TABLE = 'drinks';

    public static function insert(Drinks $drinks)
    {
        App::$db->insertRow(self::TABLE, $drinks->_getData());
    }

    public static function getWhere($conditions)
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $drink = [];

        foreach ($rows as $row) {
            $drink[] = new Drinks($row);
        }

        return $drink;
    }

    public static function update(Drinks $drink)
    {
        App::$db->updateRow(self::TABLE, $drink->getId(), $drink->_getData());
    }

    public static function delete(Drinks $drink)
    {
        App::$db->deleteRow(self::TABLE, $drink->getId());
    }

    public static function get(int $id): ?Drinks
    {
        if ($row = App::$db->getRowById(self::TABLE, $id)) {
            return new Drinks($row);
        } else {
            return null;
        }
    }
}