<?php


namespace App\Users;


use App\App;
use App\Users\User;

class Model
{
    const TABLE = 'users';

    public static function insert(User $users)
    {
        App::$db->insertRow(self::TABLE, $users->_getData());
    }

    public static function getWhere($conditions)
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $user = [];

        foreach ($rows as $row) {
            $user[] = new User($row);
        }

        return $user;
    }

    public static function update(User $user)
    {
        App::$db->updateRow(self::TABLE, $user->getId(), $user->_getData());
    }

    public static function delete(User $user)
    {
        App::$db->deleteRow(self::TABLE, $user->getId());
    }

    public static function deletebyId($id)
    {
        App::$db->deleteRow(self::TABLE, $id);
    }

    public static function get(int $id): ?User
    {
        if ($row = App::$db->getRowById(self::TABLE, $id)) {
            return new User($row);
        } else {
            return null;
        }
    }
}