<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Story;

class StoryCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $story;

    public function __construct(Story $story)
    {
        $this->story = $story;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.story-card');
    }
}
