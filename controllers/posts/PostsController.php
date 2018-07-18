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
}
