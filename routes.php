<?php


/**
 * Verify if Content-Type is application/json
 */
require './middlewares/content_type.php';

/**
 * Urls routes
 */

Flight::route('GET /stats', ['UrlsController', 'showStats']);

Flight::route('GET /stats/@url_id', ['UrlsController', 'showUrlStats']);

Flight::route('GET /users/@user_id/stats', ['UrlsController', 'showStats']);

Flight::route('POST /users/@user_id/urls', ['UrlsController', 'storeUrl']);

Flight::route('DELETE /urls/@url_id', ['UrlsController', 'deleteUrl']);

/**
 * Users routes
 */
Flight::route('POST /users', ['UsersController', 'storeUser']);

Flight::route('DELETE /users/@user_id', ['UsersController', 'deleteUser']);

Flight::route('GET /@short_url', ['UrlsController', 'showUrl']);
