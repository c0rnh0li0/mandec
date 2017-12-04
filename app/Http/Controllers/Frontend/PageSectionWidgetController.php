<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageSectionWidgetRequest as FrontendRequest;
use App\Models\PageSectionWidget;
use App\Models\Widget;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class PageSectionWidgetController extends CrudController
{
    public function __construct()
    {
        $this->middleware('adminAjax');

        parent::__construct();
    }


    public function setup()
    {
        //dd(config('backpack.base.frontend_route_prefix'));
        $this->crud->setModel('App\Models\PageSectionWidget');
        //$this->crud->setRoute(config('backpack.base.frontend_route_prefix') . '/pagesectionwidget');
        $this->crud->setEntityNameStrings('pagesectionwidget', 'pagesectionwidgets');

        $this->crud->addFields([
            [
                'name' => 'settings',
                'label' => "Settings"
            ],
            [
                'name' => 'page_id',
                'label' => "Page"
            ],
        ], 'update/create/both');
    }

    public function create()
    {
        //use CrudController;

        $this->data['page_id'] = 1;
        $this->data['template_section_id'] = 1;
        $this->data['widget_id'] = 1;
        $this->data['crud'] = $this->crud;

        $widget = Widget::findOrFail($this->data['widget_id']);

        //$this->crud->setCreateView('widget_types.' . $widget->type->settings_view);


        //return parent::create();
        //dd($widget->type->settings_view);
        //return view($this->crud->getCreateView(), $this->data)->render();
        return view('widget_types.' . $widget->type->settings_view, $this->data)->render();
        //return parent::create();
    }

    // Overwrites the CrudController edit() method to add template usage.
    public function edit($id)
    {
        $this->data['page_id'] = 1;
        $this->data['template_section_id'] = 1;
        $this->data['widget_id'] = 1;

        $widget = Widget::findOrFail($this->data['widget_id']);

        return view('widget_types' . $widget->type->settings_view, $this->data)->render();
    }

    public function store(FrontendRequest $request)
    {
        $requestData = $request->all();

        PageSectionWidget::create($requestData);

        //return redirect('article');
        return true;
        // your additional operations before save here
        //$redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        //return $redirect_location;
    }

    public function update(FrontendRequest $request)
    {
        $requestData = $request->all();
        dd($requestData);
        //$article = Article::findOrFail($id);
        //$article->update($requestData);

        //Session::flash('flash_message', 'Article updated!');

        //return redirect('article');

        // your additional operations before save here
        //$redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        //return $redirect_location;
    }
}
