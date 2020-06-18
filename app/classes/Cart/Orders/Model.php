<?php

namespace App\Cart\Orders;

use App\App;
use App\Cart\Orders\Order;

class Model
{
    const TABLE = 'order';

    public static function insert(Order $order)
    {
        return App::$db->insertRow(self::TABLE, $order->_getData());
    }

    public static function getWhere($conditions)
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $order = [];

        foreach ($rows as $row) {
            $order[] = new Order($row);
        }

        return $order;
    }

    public static function update(Order $order)
    {
        App::$db->updateRow(self::TABLE, $order->getId(), $order->_getData());
    }

    public static function delete(Order $order)
    {
        App::$db->deleteRow(self::TABLE, $order->getId());
    }

    public static function deletebyId($id)
    {
        App::$db->deleteRow(self::TABLE, $id);
    }

    public static function get(int $id): ?Order
    {
        if ($row = App::$db->getRowById(self::TABLE, $id)) {
            return new Order($row);
        } else {
            return null;
        }
    }
}