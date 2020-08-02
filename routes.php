<?php

/**
 * Urls routes
 */
Flight::route('GET /@short_url', ['UrlsController', 'showUrl']);

Flight::route('GET /stats(/@user_id)', ['UrlsController', 'showStats']);

Flight::route('GET /stats/@url_id', ['UrlsController', 'showUrlStats']);

Flight::route('POST /users/@user_id/urls', ['UrlsController', 'storeUrl']);

Flight::route('DELETE /urls/@url_id', ['UrlsController', 'deleteUrl']);

/**
 * Users routes
 */
Flight::route('POST /users', ['UsersController', 'storeUser']);

Flight::route('DELETE /users/@user_id', ['UsersController', 'deleteUser']);
