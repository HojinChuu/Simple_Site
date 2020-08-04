<?php

namespace App\Models;

class Tag extends Model
{
    protected $table = 'tags';

    public function getPosts($id)
    {
        $stmt = $this->query(
            'SELECT posts.* FROM posts
            INNER JOIN post_tag
            ON post_tag.post_id = posts.id
            WHERE post_tag.tag_id = ?', [ $id ]);
        return $stmt;
    }
}