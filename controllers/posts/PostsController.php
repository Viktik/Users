<?php

namespace controllers\posts\PostsController;

class PostsController
{
    public $allPosts = [];

    /**
     * PostsController constructor.
     * @param \models\posts\Posts\Posts $post
     */
    function __construct(\models\posts\Posts\Posts $post)
    {
        $this->base = $post;
    }

    public function getAllPosts(): array
    {
        $this->base->getAllPosts();
        $this->allPosts = $this->base->allPosts;
        return $this->allPosts;
    }

    public function deletePost(int $id): bool
    {
        return $this->base->deletePost($id);
    }

    public function getPostByID(int $id)
    {
        return $this->base->getPostById($id);
    }

    public function clearStr(string $string): string
    {
        return $str = trim(strip_tags($string));
    }

    public function updatePost(int $id, string $title, string $description): bool
    {
        return $this->base->updatePost($id, $title, $description);
    }
}
