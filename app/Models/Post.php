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
            WHERE post_tag.post_id = ?', [ $id ]);
        return $stmt;
    }

    // @override
    public function create(array $data, ?array $relations = null) : bool
    {
        parent::create($data);

        $id = $this->db->getPDO()->lastInsertId();

        foreach($relations as $tagId) {
            $stmt = $this->db->getPDO()->prepare("INSERT INTO post_tag (post_id, tag_id) VALUES (?, ?)");
            $stmt->execute([ $id, $tagId ]);
        }

        return true;
    }

    // @override
    public function update(int $id, array $data, ?array $relations = null) : bool 
    {
        parent::update($id, $data);

        // delete
        $stmt = $this->db->getPDO()->prepare("DELETE FROM post_tag WHERE post_id = ?");
        $result = $stmt->execute([ $id ]);

        // insert
        foreach($relations as $tagId) {
            $stmt = $this->db->getPDO()->prepare("INSERT INTO post_tag (post_id, tag_id) VALUES (?, ?)");
            $stmt->execute([ $id, $tagId ]);
        }

        return $result ? true : false;
    }
}