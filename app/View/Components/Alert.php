<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\HtmlString;

class Alert extends Component
{
    public $type;

    public $dismissible;

    protected $types = [
        "success",
        "danger",
        "warning",
        "info"
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = "info", $dismissible = false)
    {
        $this->type = $type;
        $this->dismissible = $dismissible;
    }

    public function validType()
    {
        return in_array($this->type, $this->types) ? $this->type : 'info';
    }

    public function link($text, $target = '#')
    {
        return new HtmlString("<a href=\"{$target}\" class=\"alert-link\">{$text}</a>");
    }

    public function icon($url = null)
    {
        $icon = $url ?? asset("icons/icon-{$this->type}.svg");
        return new HtmlString("<img class='me-2' src='{$icon}' />");
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
