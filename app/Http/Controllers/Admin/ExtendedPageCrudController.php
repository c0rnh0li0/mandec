<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ExtendedPageRequest as StoreRequest;
use App\Http\Requests\ExtendedPageRequest as UpdateRequest;
use Backpack\PageManager\app\Http\Controllers\Admin\PageCrudController;
use Backpack\CRUD\CrudTrait;

class ExtendedPageCrudController extends \Backpack\CRUD\app\Http\Controllers\CrudController
{
    use CrudTrait;

    public function setup()
    {
        $this->crud->setModel('App\Models\ExtendedPage');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/page');
        $this->crud->setEntityNameStrings('page', 'pages');
        //$this->crud->enableAjaxTable();

        $this->crud->removeColumns([
            'name',
            'template',
            'slug',
        ]);
        $this->crud->addColumns([
            [
                'name' => 'title',
                'label' => "Title",
            ],
            [
                'label' => 'Template',
                'type' => 'select',
                'name' => 'template_id',
                'entity' => 'template',
                'attribute' => 'name',
                'model' => "App\Models\Template",
            ],
            [
                'name' => 'slug',
                'label' => trans('backpack::pagemanager.slug'),
            ],
            [
                'label' => 'Category',
                'type' => 'select',
                'name' => 'category_id',
                'entity' => 'category',
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
                'name' => 'title',
                'label' => trans('backpack::pagemanager.page_title'),
                'type' => 'text',
                // 'disabled' => 'disabled'
            ],
            [
                'name' => 'slug',
                'label' => trans('backpack::pagemanager.page_slug'),
                'type' => 'text',
                'hint' => trans('backpack::pagemanager.page_slug_hint'),
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
                // 'disabled' => 'disabled'
            ],
            [
                'name' => 'name',
                'label' => trans('backpack::pagemanager.page_name'),
                'type' => 'text',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
            [
                'label' => 'Category',
                'type' => 'select',
                'name' => 'category_id',
                'entity' => 'category',
                'attribute' => 'name',
                'model' => "App\Models\PageCategory",
            ],
            [
                'label' => 'Template',
                'type' => 'select',
                'name' => 'template_id',
                'entity' => 'template',
                'attribute' => 'name',
                'model' => "App\Models\Template",
            ],
        ], 'update/create/both');

        $this->createMetaFields();

        $this->createAuditFields();

        $this->crud->addButtonFromModelFunction('line', 'open', 'getOpenButton', 'beginning');
    }

    private function createMetaFields() {
        $this->crud->addFields([
            [   // CustomHTML
                'name' => 'content_separator',
                'type' => 'custom_html',
                'value' => '<br><h2>'.trans('backpack::pagemanager.content').'</h2><hr>',
            ],
            [
                'name' => 'content',
                'label' => trans('backpack::pagemanager.content'),
                'type' => 'wysiwyg',
                'placeholder' => trans('backpack::pagemanager.content_placeholder'),
            ],
            [   // CustomHTML
                'name' => 'metas_separator',
                'type' => 'custom_html',
                'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
            ],
            [
                'name' => 'meta_title',
                'label' => trans('backpack::pagemanager.meta_title'),
                'fake' => true,
                'store_in' => 'extras',
            ],
            [
                'name' => 'meta_description',
                'label' => trans('backpack::pagemanager.meta_description'),
                'fake' => true,
                'store_in' => 'extras',
            ],
            [
                'name' => 'meta_keywords',
                'type' => 'textarea',
                'label' => trans('backpack::pagemanager.meta_keywords'),
                'fake' => true,
                'store_in' => 'extras',
            ],
        ]);
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

    // -----------------------------------------------
    // Overwrites of CrudController
    // -----------------------------------------------


    // Overwrites the CrudController create() method to add template usage.
    public function create($template = false)
    {
        return parent::create();
    }

    // Overwrites the CrudController edit() method to add template usage.
    public function edit($id)
    {
        return parent::edit($id);
    }

    // Overwrites the CrudController store() method to add template usage.
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
