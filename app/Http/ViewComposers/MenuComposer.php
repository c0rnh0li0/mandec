<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Backpack\MenuCRUD\app\Models\MenuItem;
use App\Models\Widget;

class MenuComposer
{
    public $data = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data['menu_items'] = MenuItem::getTree();
        $this->data['widgets'] = Widget::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(['menu_items' => $this->data['menu_items'], 'widgets' => $this->data['widgets']]);
    }
}
?>