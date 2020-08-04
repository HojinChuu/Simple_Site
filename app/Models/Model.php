<?php

namespace App\Models;

use Database\DBConnection;

abstract class Model
{
    protected $db;
    protected $table;

    public function __construct(DBConnection $db) {
        $this->db = $db;
    }

    public function all() : array
    {
        $stmt = $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        return $stmt;
    }

    public function findById(int $id) : Model
    {
        $stmt = $this->query("SELECT * FROM {$this->table} WHERE id = ?", $id, true);
        return $stmt;
    }

    public function query(string $sql, int $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';
        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), array($this->db));

        if($method === 'query') {
            return $stmt->$fetch();
        } else if($method === 'prepare') {
            $stmt->execute([$param]);
            return $stmt->$fetch();
        }
    }
}