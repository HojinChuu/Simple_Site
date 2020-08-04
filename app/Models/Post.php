<?php

namespace App\Models;

use DateTime;

class Post extends Model
{
    protected $table = 'posts';

    public function getCreatedAt() : string
    {
        $date = (new DateTime($this->created_at))->format('Y/m/d a h:i');
        return $date;
    }

    public function getContent() : string
    {
        $content = substr($this->content, 0, 200) . '....';
        return $content;
    }

    public function getTags($id)
    {
        $stmt = $this->query(
            'SELECT * FROM tags
            INNER JOIN post_tag
            ON post_tag.tag_id = tags.id
            INNER JOIN posts
            ON post_tag.post_id = posts.id
            WHERE posts.id = ?', $id);

        return $stmt;
    }

}