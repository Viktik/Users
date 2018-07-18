<?php

namespace models\posts\Posts;

class Posts
{
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


    public function getPostById(int $id): array
    {
        $link = $this->connect();
        $sql = "SELECT id, title, description
                FROM posts 
                WHERE id = '$id'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            throw new \Exception("Failed query");
        }
        $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (empty($post)) {
            throw new \Exception("Post was not found");
        }
        foreach ($post as $item) {
            foreach ($item as $key => $value) {
                $postInfo[$key] = $value;
            }
        }
        return $postInfo;
        /*$this->id = $postInfo['id'];
        $this->title = $postInfo['title'];
        $this->description = $postInfo['description'];
        return true;*/
    }

    public function updatePost(int $id, string $title, string $description): bool
    {
        $link = $this->connect();
        $sql = "UPDATE posts
                SET title = '$title', description = '$description'
                WHERE id = '$id'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            return false;
        }
        return true;
    }
}
