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
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }

    public function findById(int $id) : Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [ $id ], true);
    }

    // 세번째 파라미터 nullable
    public function update(int $id, array $data, ?array $relations = null) : bool
    {
        $sqlRequest = "";
        $i = 1;

        foreach($data as $key => $value) {
            $comma = $i === count($data) ? ' ' : ', ';
            $sqlRequest .= "{$key} = :{$key}{$comma}";
            $i++;
        }

        $data['id'] = $id;

        return $this->query("UPDATE {$this->table} SET {$sqlRequest} WHERE id = :id", $data);
    }

    public function destroy(int $id) : bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [ $id ]);
    }

    public function query(string $sql, array $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';
        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        // create, update, delete 일 경우 true, false return
        if(strpos($sql, 'DELETE') === 0 || strpos($sql, 'UPDATE') === 0 || strpos($sql, 'INSERT') === 0) {
            
            $stmt = $this->db->getPDO()->$method($sql);
            $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), array($this->db));
            
            return $stmt->execute($param);
        }

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), array($this->db));

        if($method === 'query') {
            return $stmt->$fetch();
        } else if($method === 'prepare') {
            $stmt->execute($param);
            return $stmt->$fetch();
        }
    }
}