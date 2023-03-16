<?php

namespace App\View\Components;

use Closure;
use App\Models\Comment;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class StoryComment extends Component
{
    /**
     * Create a new component instance.
     */
    public $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.story-comment');
    }
}
