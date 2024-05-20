<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked; //si el usuario ya le dio me gusta a este post
    
    public function mount($post){
        // comprobar si el usuario ya le dio me gusta a este post
        $this->isLiked = $post->checkLike(auth()->user());    
    }
    
    public function like()
    {
        if( $this->post->checkLike(auth()->user() )) {
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
        }
    }
    
    public function render()
    {
        return view('livewire.like-post');
    }
}
