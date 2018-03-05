<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageTemplateSection;
use App\Models\TemplateSection;
use App\Models\Template;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TemplateRequest as StoreRequest;
use App\Http\Requests\TemplateRequest as UpdateRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;

class TemplateCrudController extends CrudController
{
    public $TemplatesPath;
    public $TemplatesExtension;

    public function __construct()
    {
        parent::__construct();

        $this->TemplatesPath = Config::get('view.templates')[0];
        $this->TemplatesExtension = '.blade.php';
    }

    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Template');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/template');
        $this->crud->setEntityNameStrings('template', 'templates');

        $this->crud->addColumns([
            [
                'name' => 'name',
                'label' => "Template name"
            ],
            [
                'name' => 'file',
                'label' => "Template file"
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
                'label' => 'Template name'
            ],
            [
                'name' => 'file',
                'label' => 'Template file'
            ],
            [
                'name' => 'sections',
                'label' => 'Sections',

                'type' => 'table',
                'fake' => true,
                //'store_in' => 'sections_table',
                'entity' => 'sections',
                'attribute' => 'name',
                'model' => 'App\Models\TemplateSection',
                'entity_singular' => 'section', // used on the "Add X" button
                'columns' => [
                    'name' => 'Name',
                    'css_classes' => 'CSS Classes'
                ],
                'max' => 5, // maximum rows allowed in the table
                'min' => 0 // minimum rows allowed in the table
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
        $sections = json_decode($request->sections);
        unset($request->sections);

        $redirect_location = parent::storeCrud($request);

        file_put_contents($this->buildTemplateName($this->data['entry']->file), "Initial template data [inserted]: " . $request->file . " - " . $request->name);

        $this->saveSections($sections, $this->crud->entry->id);

        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $sections = json_decode($request->sections);
        unset($request->sections);

        $template = Template::find($request->id);
        if ($request->file != $template->file)
            $request->file = $template->file;

        $redirect_location = parent::updateCrud($request);

        if (!File::exists($this->TemplatesPath . DIRECTORY_SEPARATOR . $this->data['entry']->file . $this->TemplatesExtension))
            file_put_contents($this->buildTemplateName($this->data['entry']->file), "Initial template data [updated]: " . $request->file . " - " . $request->name);

        $this->saveSections($sections, $this->crud->entry->id);

        return $redirect_location;
    }

    private function saveSections($sections, $template_id) {
        $template = Template::find($template_id);
        $associated_sections = $template->sections;

        if (count($associated_sections) != count($sections))
            $this->deleteSections($associated_sections, $sections);

        foreach ($sections as $section) {
            if (isset($section->id)) {
                $existing_template = TemplateSection::find($section->id);
                if ($existing_template) {
                    $existing_template->name = $section->name;
                    $existing_template->css_classes = $section->css_classes;
                    $existing_template->template_id = $template_id;
                    $existing_template->created_by = auth()->user()->id;
                    $existing_template->updated_by = auth()->user()->id;
                    $existing_template->save();

                    $this->associateSectionsToPages($template->pages, $existing_template);
                }
            }
            else {
                if (isset($section->name)) {
                    $ts = new TemplateSection();
                    $ts->name = $section->name;
                    $existing_template->css_classes = $section->css_classes;
                    $ts->template_id = $template_id;
                    $ts->created_by = auth()->user()->id;
                    $ts->updated_by = auth()->user()->id;
                    $ts->save();

                    $this->associateSectionsToPages($template->pages, $ts);
                }
            }
        }
    }

    private function deleteSections($associated_sections, $saved_sections) {
        $saved = collect($saved_sections);
        foreach ($associated_sections as $current_section) {
            $exists = $saved->where('id', '=', $current_section->id);
            if (count($exists) == 0)
                $current_section->delete();
        }
    }

    private function associateSectionsToPages($pages, $section) {
        foreach ($pages as $page) {
            $exists = PageTemplateSection::all()->where('page_id', '=', $page->id)->where('template_section_id', '=', $section->id);
            if (count($exists) > 0)
                continue;

            $pts = new PageTemplateSection();
            $pts->page_id = $page->id;
            $pts->template_section_id = $section->id;
            $pts->save();
        }
    }

    private function buildTemplateName($filename) {
        return $this->TemplatesPath . DIRECTORY_SEPARATOR . $filename . $this->TemplatesExtension;
    }
}
