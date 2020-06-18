<?php

namespace App\Cart\Items;

use App\App;
use App\Cart\Items\Item;

class Model
{
    const TABLE = 'cart';

    public static function insert(Item $items)
    {
        App::$db->insertRow(self::TABLE, $items->_getData());
    }

    public static function getWhere($conditions)
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $items = [];

        foreach ($rows as $row) {
            $items[] = new Item($row);
        }

        return $items;
    }

    public static function update(Item $item)
    {
        App::$db->updateRow(self::TABLE, $item->getId(), $item->_getData());
    }

    public static function delete(Item $item)
    {
        App::$db->deleteRow(self::TABLE, $item->getId());
    }

    public static function deletebyId(int $id)
    {
        App::$db->deleteRow(self::TABLE, $id);
    }

    public static function get(int $id): ?Item
    {
        if ($row = App::$db->getRowById(self::TABLE, $id)) {
            return new Item($row);
        } else {
            return null;
        }
    }
}