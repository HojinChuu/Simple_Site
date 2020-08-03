<?php

namespace App\Controllers;

use Database\DBConnection;

abstract class Controller // 인스턴스화 no 
{
    protected $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }
    
    protected function view(string $path, array $params = null)
    {
        ob_start(); // 출력 버퍼 on

        $path = str_replace('.', '/', $path);   
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }

    protected function getDB()
    {
        return $this->db;
    }
}