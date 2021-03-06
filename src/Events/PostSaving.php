<?php

namespace Christhompsontldr\Laraboard\Events;

use Christhompsontldr\Laraboard\Models\Post;
use Illuminate\Queue\SerializesModels;

class PostSaving
{
    use SerializesModels;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}