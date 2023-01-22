<?php

namespace App\Filters;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\PostParameter;

class PostFilter extends QueryFilter{

    public function categoryLevelFilter($post_id){
        return $this->builder->where('posts.category_level_id', $post_id);
    }


}
