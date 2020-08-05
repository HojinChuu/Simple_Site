<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $this->isAdmin();

        $posts = (new Post($this->getDB()))->all();

        return $this->view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $this->isAdmin();

        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.post.create', compact('tags'));
    }

    public function createPost()
    {
        $this->isAdmin();

        $post = new Post($this->getDB());

        $tags = array_pop($_POST); 

        $result = $post->create($_POST, $tags);

        if($result) {
            return header('Location: ' . URLROOT . '/admin/posts');
        }
    }

    public function edit(int $id)
    {
        $this->isAdmin();

        $post = (new Post($this->getDB()))->findById($id);
        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.post.edit', compact('post', 'tags'));
    }

    public function update(int $id)
    {
        $this->isAdmin();

        $post = new Post($this->getDB());

        $tags = array_pop($_POST); // 배열 마지막 값 tags pop

        $result = $post->update($id, $_POST, $tags);

        if($result) {
            return header('Location: ' . URLROOT . '/admin/posts');
        }
    }

    public function destroy(int $id)
    {
        $this->isAdmin();

        $post = new Post($this->getDB());
        $result = $post->destroy($id);

        if($result) {
            return header('Location: ' . URLROOT . '/admin/posts');
        }
    }

}