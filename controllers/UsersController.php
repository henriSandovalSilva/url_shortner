<?php

use Flight;

class UsersController {

    public static function storeUser() 
    {
        $request = json_decode(Flight::request()->getBody(), true);

        $model = new UsersModel();
        $user = $model->getUser($request['id']);

        if (isset($user['id']) && $user['id'] > 0) {
            Flight::halt(409, '{ "error": "User alredy exists" }');
        }

        $result = $model->createUser($request['id']);

        if ($result > 0) {
            Flight::halt(201, json_encode(array(
                "id" => $result
            )));
        }

        Flight::halt(500);
    }

    public static function deleteUser($user_id) 
    {
        $model = new UsersModel();

        $user = $model->getUserById($user_id);

        if (isset($user['id']) && $user['id'] > 0) {
            $return = $model->deleteUser($user_id);

            if ($return) {
                Flight::halt(204);
            }

            Flight::halt(500);
        }
        
        Flight::halt(400, '{ "error": "User not found" }');
    }
}