<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PageSectionWidgetRequest as FrontendRequest;

class PageSectionWidgetCrudController extends CrudController
{
    public function __construct()
    {
        $this->middleware('adminAjax');

        parent::__construct();

    }

    public function setup()
    {
        $this->crud->setModel('App\Models\PageSectionWidget');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/pagesectionwidget');
        $this->crud->setEntityNameStrings('pagesectionwidget', 'page_section_widgets');
    }

    public function create()
    {
        $this->data['page_id'] = 1;
        $this->data['template_section_id'] = 1;
        $this->data['widget_id'] = 1;

        return view('widget_types.banner', $this->data)->render();
        //return parent::create();
    }

    // Overwrites the CrudController edit() method to add template usage.
    public function edit($id)
    {
        return parent::edit($id);
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
