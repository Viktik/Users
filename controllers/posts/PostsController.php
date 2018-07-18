<?php

class PostsController
{
    public $allPosts = [];

    function __construct(\models\posts\Posts\Posts $post)
    {
        $this->base = $post;
    }

    public function getAllPosts()
    {
        $this->base->getAllPosts();
        return $this->allPosts = $this->base->allPosts;
    }
}