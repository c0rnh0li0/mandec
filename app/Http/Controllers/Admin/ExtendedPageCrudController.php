<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ExtendedPageRequest as ExtendedStoreRequest;
use App\Http\Requests\ExtendedPageRequest as ExtendedUpdateRequest;
use Backpack\PageManager\app\Http\Controllers\Admin\PageCrudController;
use Backpack\CRUD\CrudTrait;

class ExtendedPageCrudController extends PageCrudController
{
    use CrudTrait;
    public function setup()
    {
        $this->crud->setModel('App\Models\ExtendedPage');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/page');
        $this->crud->setEntityNameStrings('page', 'pages');

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
                'name' => 'template',
                'label' => trans('backpack::pagemanager.template'),
                'type' => 'model_function',
                'function_name' => 'getTemplateName',
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
                'label' => 'Category',
                'type' => 'select',
                'name' => 'category_id',
                'entity' => 'category',
                'attribute' => 'name',
                'model' => "App\Models\PageCategory",
            ],
        ], 'update/create/both');

        $this->createAuditFields();
    }

    private function createAuditFields() {
        $this->crud->addFields([
            [
                'name' => 'created_by_user',
                'label' => 'Created by',
                'attributes' => ['readonly' => 'readonly'],
                'value' => auth()->user()->name
            ],
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
                'name' => 'created_by_user',
                'label' => 'Created by',
                'attributes' => ['readonly' => 'readonly'],
                'value' => auth()->user()->name
            ],
            [
                'name' => 'updated_by_user',
                'label' => 'Updated by',
                'attributes' => ['readonly' => 'readonly'],
                'value' => auth()->user()->name,
            ],
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
        //$this->addDefaultPageFields($template);
        //$this->useTemplate($template);

        return parent::create($template);
    }

    // Overwrites the CrudController store() method to add template usage.
    /*public function store(ExtendedStoreRequest $request)
    {
        //$this->addDefaultPageFields($request->input('template'));
        //$this->useTemplate($request->input('template'));

        return parent::store($request);
    }*/

    // Overwrites the CrudController edit() method to add template usage.
    public function edit($id, $template = false)
    {
        // if the template in the GET parameter is missing, figure it out from the db
        /*if ($template == false) {
            $model = $this->crud->model;
            $this->data['entry'] = $model::findOrFail($id);
            $template = $this->data['entry']->template;
        }

        $this->addDefaultPageFields($template);
        $this->useTemplate($template);*/

        return parent::edit($id, $template);
    }

    // Overwrites the CrudController update() method to add template usage.
    /*public function update(ExtendedUpdateRequest $request)
    {
        //$this->addDefaultPageFields($request->input('template'));
        //$this->useTemplate($request->input('template'));

        return parent::update($request);
    }*/

    /**
     * Add the fields defined for a specific template.
     *
     * @param  string $template_name The name of the template that should be used in the current form.
     */

    /*public function useTemplate($template_name = false)
    {
        $templates = $this->getTemplates();

        // set the default template
        if ($template_name == false) {
            $template_name = $templates[0]->name;
        }

        // actually use the template
        if ($template_name) {
            $this->{$template_name}();
        }
    }*/

    /**
     * Get all defined templates.
     */
    /*public function getTemplates($template_name = false)
    {
        $templates_array = [];

        $templates_trait = new \ReflectionClass('App\PageTemplates');
        $templates = $templates_trait->getMethods(\ReflectionMethod::IS_PRIVATE);

        if (! count($templates)) {
            abort(503, trans('backpack::pagemanager.template_not_found'));
        }

        return $templates;
    }*/

    /**
     * Get all defined template as an array.
     *
     * Used to populate the template dropdown in the create/update forms.
     */
    /*public function getTemplatesArray()
    {
        $templates = $this->getTemplates();

        foreach ($templates as $template) {
            $templates_array[$template->name] = $this->crud->makeLabel($template->name);
        }

        return $templates_array;
    }*/
}
