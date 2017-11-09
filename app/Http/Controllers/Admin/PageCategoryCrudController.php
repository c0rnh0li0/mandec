<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PageCategoryRequest as StoreRequest;
use App\Http\Requests\PageCategoryRequest as UpdateRequest;

class PageCategoryCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel('App\Models\PageCategory');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/page-category');
        $this->crud->setEntityNameStrings('page-category', 'page_categories');

        $this->crud->addColumns([
            [
                'name' => 'name',
                'label' => "Category name"
            ],
            [
                'name' => 'slug',
                'label' => "Slug"
            ],
            [
                'label' => 'Parent',
                'type' => 'select',
                'name' => 'parent_id',
                'entity' => 'parent',
                'attribute' => 'name',
                'model' => "App\Models\PageCategory",
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
                'label' => "Category name"
            ],
            [
                'name' => 'slug',
                'label' => "Slug"
            ],
            [
                'label' => 'Parent',
                'type' => 'select',
                'name' => 'parent_id',
                'entity' => 'parent',
                'attribute' => 'name',
                'model' => "App\Models\PageCategory",
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
