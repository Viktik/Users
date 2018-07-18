<?php

namespace models\posts\Posts;

class Posts
{
    public $id;
    public $user_id;
    public $title;
    public $description;
    public $allPosts = [];

    /**
     * @return \mysqli
     */
    private function connect(): \mysqli
    {
        $link = mysqli_connect('localhost', 'root', '', 'users');
        if (!$link) {
            echo "Connection failed";
            exit;
        }
        return $link;
    }

    /**
     * @return bool
     */
    public function getAllPosts(): bool
    {
        $link = $this->connect();
        $sql = "SELECT id, title, description
                FROM posts";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        $allPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (empty($allPosts)) {
            return false;
        }
        $this->allPosts = $allPosts;
        return true;
    }

    public function deletePost(int $id): bool
    {
        $link = $this->connect();
        $sql = "DELETE FROM posts
                WHERE id = '$id'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        return true;
    }
}

