<?php

namespace App\Http\Livewire;

use App\Models\CategoryLevel;
use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    public $categoryLevel = null;
    public $search;


    public function updateFilters(){
        request()->merge(['filters' => $this->filters]);
    }

    public function render()
    {
        $posts = Post::query()
            ->with('category_level')
            ->filters()
            ->paginate();

        return view('livewire.posts', [
            'posts' => $posts,
        ]);
    }




}
