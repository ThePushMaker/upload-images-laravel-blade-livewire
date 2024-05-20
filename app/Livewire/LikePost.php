<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    
    public function like()
    {
        return "desde la funcion de like";
    }
    
    public function render()
    {
        return view('livewire.like-post');
    }
}
