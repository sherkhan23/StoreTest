<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use PhpParser\Builder;


class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'post_id';

    protected $fillable= [
        'post_id',
        'postName',
        'description',
        'slug',
        'category_level_id',
        'price'
    ];

    public function postParameters()
    {
        return $this->belongs_to('PostParameter');
    }

//
//    public function scopeFilter(Builder $query){
//        $query->when(request('posts.category_level_id'), function (Builder $q){
//            return $q->where('category_level_id', '=', request('posts.category_level_id'));
//        });
//    }

}
