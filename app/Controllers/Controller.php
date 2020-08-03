<?php

namespace App\Controllers;

use Database\DBConnection;

class Controller
{
    protected $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }
    
    public function view(string $path, array $params = null)
    {
        ob_start(); // 출력 버퍼 on
        $path = str_replace('.', '/', $path);   
        require VIEWS . $path . '.php';

        if($params) {
            $params = extract($params);
        }

        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }
}