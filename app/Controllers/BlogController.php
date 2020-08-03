<?php

namespace App\Controllers;

class BlogController
{
    public function index()
    {
        echo "homepage";
    }

    public function show(int $id)
    {
        echo "this post id: $id";
    }
}