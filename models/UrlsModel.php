<?php

use Flight;

class UrlsModel extends Model 
{
    public function getUrl($url_id)
    {
        $stmt = $this->conn->prepare("SELECT id, hits, url, short_url, user_id FROM urls WHERE id = :id");

        $stmt->execute(array(
            ':id' => $url_id,
        ));

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function hitUrl($url_id)
    {
        $stmt = $this->conn->prepare("UPDATE urls SET hits = hits + 1 WHERE id = :id");

        $stmt->execute(array(
            ':id' => $url_id,
        ));

        return $stmt->rowCount();
    }

    public function createUrl($user_id, $url) 
    {
        $stmt = $this->conn->prepare("INSERT INTO urls (url, user_id) VALUES (:url, :user_id)");

        $stmt->execute(array(
          ':url' => $url,
          ':user_id' => $user_id
        ));

        return $this->conn->lastInsertId();
    }

    public function setShortUrl($url_id, $short_url) 
    {
        $stmt = $this->conn->prepare("UPDATE urls SET short_url = :short_url WHERE id = :id");

        $stmt->execute(array(
          ':id' => $url_id,
          ':short_url' => $short_url
        ));

        return $stmt->rowCount();
    }

    public function getUrlsByUser($user_id)
    {
        $stmt = $this->conn->prepare("SELECT id, hits, url, short_url, user_id FROM urls WHERE user_id = :user_id;");

        $stmt->execute(array(
            ':user_id' => $user_id,
        ));

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteUrl($url_id)
    {
        $stmt = $this->conn->prepare('DELETE FROM urls WHERE id = :id');

        $stmt->bindParam(':id', $url_id);

        $stmt->execute();
      
        return $stmt->rowCount();
    }

    public function getTotalHitsUrls($user_id)
    {
        if ($user_id > 0) {
            $stmt = $this->conn->prepare("SELECT SUM(hits) AS total FROM urls WHERE user_id = :user_id;");

            $stmt->execute(array(
                ':user_id' => $user_id,
            ));
    
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        $query = $this->conn->query("SELECT SUM(hits) AS total FROM urls;");
        
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getTotalUrls($user_id = 0)
    {
        if ($user_id > 0) {
            $stmt = $this->conn->prepare("SELECT COUNT(id) AS total FROM urls WHERE user_id = :user_id;");

            $stmt->execute(array(
                ':user_id' => $user_id,
            ));
    
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        $query = $this->conn->query("SELECT COUNT(id) AS total FROM urls;");
        
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUrls($user_id = 0, $limit = 10)
    {
        if ($user_id > 0) {
            $stmt = $this->conn->prepare("SELECT id, hits, url, short_url, user_id FROM urls WHERE user_id = :user_id ORDER BY hits DESC LIMIT {$limit};");

            $stmt->execute(array(
                ':id' => $user_id,
            ));
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        $query = $this->conn->query("SELECT id, hits, url, short_url, user_id FROM urls ORDER BY hits DESC LIMIT {$limit};");
        
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}