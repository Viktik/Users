<?php
require_once "vendor/autoload.php";

use models\posts\Posts\Posts;
use controllers\posts\PostsController\PostsController;

$controller = new PostsController(new Posts());
