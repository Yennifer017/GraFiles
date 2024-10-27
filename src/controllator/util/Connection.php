<?php

class Connection {
    private static $instance = null;
    private $client;
    private $db;

    private function __construct() {
        $this->client = new MongoDB\Client('mongodb://mongodb:27017/grafiles');
        $this->db = $this->client->grafiles;
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    public function getDB() {
        return $this->db;
    }
}

