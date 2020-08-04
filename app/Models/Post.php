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

    public function getTags($id) : array
    {
        $stmt = $this->query(
            'SELECT tags.* FROM tags
            INNER JOIN post_tag
            ON post_tag.tag_id = tags.id
            WHERE post_tag.post_id = ?', $id);
        var_dump($stmt);
        return $stmt;
    }

}