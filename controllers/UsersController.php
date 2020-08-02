<?php

use Flight;

class UsersController {

    public static function storeUser() 
    {
        $request = json_decode(Flight::request()->getBody(), true);

        $model = new UsersModel();
        $user = $model->getUser($request['id']);

        if (isset($user['id']) && $user['id'] > 0) {
            Flight::halt(409);
        }

        $result = $model->createUser($request['id']);

        if ($result > 0) {
            Flight::halt(201, json_encode(array(
                "id" => $result
            )));
        }

        Flight::halt(500);
    }

    public static function showUserStats($user_id) 
    {
        $model = new UrlsModel();
        $user_stats = $model->getUrlsByUser($user_id);

        Flight::json($user_stats);
        die();
    }

    public static function deleteUser($user_id) 
    {
        $model = new UsersModel();
        $return = $model->deleteUser($user_id);

        Flight::json($return);
        die();
    }
}