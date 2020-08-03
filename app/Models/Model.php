<?php

namespace App\Models;

use Database\DBConnection;
use stdClass;

abstract class Model
{
    protected $db;
    protected $table;

    public function __construct(DBConnection $db) {
        $this->db = $db;
    }

    public function all() : array
    {
        $stmt = $this->db->getPDO()->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        
        return $stmt->fetchAll();
    }

    public function findById(int $id) : stdClass
    {
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }
}