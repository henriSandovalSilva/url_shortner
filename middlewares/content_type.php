<?php

Flight::route('GET|POST|PUT|DELETE /*', function($route){
    /**
     * If request for /stats or /users or /urls
     */
    if (preg_match('/(stats|users|urls)/i', $route->splat) === 1) {
        /**
         * Verify if Content-Type is application/json
         */
        if (strtolower(Flight::request()->type) !== "application/json") {
            Flight::halt(400, json_encode(array(
                "error" => "Content-Type: application/json is required"
            )));
        }
    }

    /**
     * Else next (Because has a route / than accepts all)
     */
    return true;
}, true);
