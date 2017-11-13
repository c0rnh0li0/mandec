<?php

namespace App\Http\Controllers\Widgets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class Features extends Controller
{
    private $slug;
    private $view;
    public $wcontent;

    public function __construct($widget)
    {
        $this->slug = $widget->classname;
        $this->view = "widgets." . $widget->classname;
    }

    public function index()
    {
        $category = Category::findBySlug($this->slug);
        $this->data['category'] = $category;
        $this->data['articles'] = $category->articles();

        return view($this->view, $this->data)->render();
    }
}
