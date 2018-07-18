<?php

namespace controllers\posts\PostsController;

class PostsController
{
    public $model;
    public $allPosts = [];

    /**
     * PostsController constructor.
     * @param \models\posts\Posts\Posts $post
     */
    function __construct(\models\posts\Posts\Posts $post)
    {
        $this->model = $post;
    }

    public function getAllPosts(): array
    {
        $this->model->getAllPosts();
        return $this->model->allPosts;
    }

    public function deletePost(int $id): bool
    {
        return $this->model->deletePost($id);
    }

    public function getPostByID(int $id)
    {
        return $this->model->getPostById($id);
    }

    public function clearStr(string $string): string
    {
        return trim(strip_tags($string));
    }

    public function updatePost(int $id, string $title, string $description): bool
    {
        return $this->model->updatePost($id, $title, $description);
    }
}
