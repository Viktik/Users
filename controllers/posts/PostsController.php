<?php

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

    public function getAllPosts()
    {
        $this->base->getAllPosts();
        $this->allPosts = $this->base->allPosts;
        return $this->allPosts;
    }
}
