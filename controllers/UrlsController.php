<?php

use Flight;

class UrlsController {

    public static function showUrl($short_url) 
    {
        $url_id = ShortURL::encode($short_url);

        if ($url_id > 0) {
            $model = new UrlsModel();
            $data = $model->getUrl($url_id);

            if (empty($data['url'])) {
                return Flight::halt(404);
            }
    
            if (preg_match('/http(s)?:\/\//i', $data['url']) !== 1) {
                $data['url'] = '//' . $data['url'];
            }
    
            $model->hitUrl($url_id);
    
            Flight::redirect($data['url']);
            die();
        }

        return Flight::halt(400);
    }

    public static function storeUrl($user_id) 
    {
        $request = json_decode(Flight::request()->getBody(), true);

        $model = new UrlsModel();
        $url_id = $model->createUrl($user_id, $request['url']);

        $short_url = ShortURL::encode($url_id);

        $result = $model->setShortUrl($url_id, $short_url);

        Flight::json(array(
            "hits" => 0,
            "id" => $url_id,
            "shortUrl" => $short_url,
            "url" => $request['url']
        ));
        die();
    }

    public static function deleteUrl($url_id) 
    {
        $model = new UrlsModel();

        $url = $model->getUrl($url_id);

        if (isset($url['id']) && $url['id'] > 0) {
            $return = $model->deleteUrl($url_id);

            if ($return) {
                Flight::halt(204);
            }

            Flight::halt(500);
        }

        Flight::halt(400);
    }

    public static function showUrlStats($url_id) 
    {
        $model = new UrlsModel();
        $url = $model->getUrl($url_id);

        Flight::json($url);
        die();
    }

    public static function showStats($user_id = 0) 
    {
        $model = new UrlsModel();

        $total_hits = $model->getTotalHitsUrls($user_id);
        $total_urls = $model->getTotalUrls($user_id);
        $urls = $model->getAllUrls($user_id);

        $return = array(
            "hits" => $total_hits['total'],
            "urlCount" => $total_urls['total'],
            "topUrls" => $urls
        );

        Flight::json($return);
        die();
    }
}