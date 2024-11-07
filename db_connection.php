<?php
// db_connection.php

class Database {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('database.sqlite', SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE, "");

        // Create the products table if it doesn't exist
        $this->db->exec("CREATE TABLE IF NOT EXISTS products (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            description TEXT,
            price REAL NOT NULL
        )");
    }

    public function getConnection() {
        return $this->db;
    }

    public function closeConnection() {
        $this->db->close();
    }
}
