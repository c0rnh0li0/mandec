<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\WidgetRequest as StoreRequest;
use App\Http\Requests\WidgetRequest as UpdateRequest;

class WidgetCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel('App\Models\Widget');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/widget');
        $this->crud->setEntityNameStrings('widget', 'widgets');

        $this->crud->addColumns([
            [
                'name' => 'name',
                'label' => "Widget name"
            ],
            [
                'name' => 'class',
                'label' => "Widget class"
            ],
            [
                'label' => 'Created by',
                'type' => 'select',
                'name' => 'created_by',
                'entity' => 'added',
                'attribute' => 'name',
                'model' => "App\User",
            ],
            [
                'label' => 'Updated by',
                'type' => "select",
                'name' => 'updated_by',
                'entity' => 'edited',
                'attribute' => 'name',
                'model' => "App\User",
            ]
        ]);

        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Widget name'
            ],
            [
                'name' => 'class',
                'label' => 'Class name'
            ],
        ], 'update/create/both');

        $this->createAuditFields();
    }

    private function createAuditFields() {
        $this->crud->addFields([
            [
                'name' => 'updated_by',
                'type' => 'hidden',
                'attributes' => ['readonly' => 'readonly'],
                'value' => auth()->user()->id
            ],
            [
                'name' => 'created_by',
                'type' => 'hidden',
                'attributes' => ['readonly' => 'readonly'],
                'value' => auth()->user()->id
            ],
        ], 'create');

        $this->crud->addFields([
            [
                'name' => 'updated_by',
                'type' => 'hidden',
                'attributes' => ['readonly' => 'readonly'],
                'value' => auth()->user()->id
            ],
        ], 'update');
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
