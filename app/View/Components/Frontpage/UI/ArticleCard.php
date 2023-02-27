<?php

namespace App\View\Components\Frontpage\UI;

use Illuminate\View\Component;

class ArticleCard extends Component
{
    public $article;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($article)
    {
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontpage.ui.article-card');
    }
}
