<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';

    public function getByUsername(string $username) : User
    {
        $sql = "SELECT * FROM {$this->table} WHERE username = ?";
        
        return $this->query($sql, [ $username ], true);
    }
}