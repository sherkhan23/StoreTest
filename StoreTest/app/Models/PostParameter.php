<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostParameter extends Model
{
    use HasFactory;

    protected $primaryKey = 'post_parameters_id';
    public function posts()
    {
        return $this->has_many('Post');
    }

}
