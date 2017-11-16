<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\WidgetTypeRequest as StoreRequest;
use App\Http\Requests\WidgetTypeRequest as UpdateRequest;
use App\Models\WidgetType;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;

class WidgetTypeCrudController extends CrudController
{
    public $WidgetTypeViewPath;
    public $WidgetTypeViewExtension;

    public function __construct()
    {
        parent::__construct();

        $this->WidgetTypeViewPath = Config::get('view.widget_types')[0];
        $this->WidgetTypeViewExtension = '.blade.php';
    }

    public function setup()
    {
        $this->crud->setModel('App\Models\WidgetType');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/widget_type');
        $this->crud->setEntityNameStrings('widget_type', 'widget_types');

        $this->crud->addColumns([
            [
                'name' => 'name',
                'label' => "Widget type name"
            ],
            [
                'name' => 'settings_view',
                'label' => "Settings view file"
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
                'label' => 'Widget type name'
            ],
            [
                'name' => 'settings_view',
                'label' => 'Settings view file'
            ],
            // TODO: add widget settings under page association, probably on drag n drop
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
        $redirect_location = parent::storeCrud($request);
        $this->createWidgetTypeFiles($this->data['entry']);
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $redirect_location = parent::updateCrud($request);
        $this->createWidgetTypeFiles($this->data['entry']);
        return $redirect_location;
    }

    public function destroy($id)
    {
        $widget = WidgetType::findOrFail($id);
        $destroyResult = parent::destroy($id);

        dd($destroyResult);

        if ($destroyResult)
            $this->deleteWidgetTypeFiles($widget);

        return $destroyResult;
    }

    // TODO: deal with widget file removal upon delete
    private function deleteWidgetTypeFiles($widget) {
        $widgetViewName = $this->WidgetTypeViewPath . DIRECTORY_SEPARATOR . $widget->settings_view . $this->WidgetTypeViewExtension;

        if(File::exists($widgetViewName)) {
            File::delete($widgetViewName);
        }
    }

    private function createWidgetTypeFiles($data) {
        $widgetTypeViewName = $this->WidgetTypeViewPath . DIRECTORY_SEPARATOR . $data->settings_view . $this->WidgetTypeViewExtension;

        if(!File::exists($this->WidgetTypeViewPath))
            File::makeDirectory($this->WidgetTypeViewPath);

        if(!View::exists($widgetTypeViewName)) {
            file_put_contents($widgetTypeViewName, "Widget settings view");
        }
    }
}
