<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContentRenderer extends Component
{
    public $type;
    public $resource;

    public function __construct($type, $resource)
    {
        $this->type = $type;
        $this->resource = $resource;
    }

    public function render(): View|Closure|string
    {
        return view('components.content-renderer');
    }
}
