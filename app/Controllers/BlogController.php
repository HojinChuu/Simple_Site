<?php

namespace App\Controllers;

class BlogController extends Controller
{
    public function index()
    {
        return $this->view('blog.index');
    }

    public function show(int $id)
    {
        $req = $this->db->getPDO()->query('SELECT * FROM posts');
        $posts = $req->fetchAll();

        var_dump($posts);

        return $this->view('blog.show', compact('id'));
    }
}