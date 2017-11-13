<?php

namespace App\Http\Controllers\Admin;

use App\Models\Widget;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\WidgetRequest as StoreRequest;
use App\Http\Requests\WidgetRequest as UpdateRequest;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;

class WidgetCrudController extends CrudController
{
    public $WidgetsClassPath;
    public $WidgetsViewPath;
    public $WidgetsViewExtension;

    public function __construct()
    {
        parent::__construct();

        $this->WidgetsClassPath = app_path() . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . 'Widgets';
        $this->WidgetsViewPath = Config::get('view.widgets')[0];
        $this->WidgetsViewExtension = '.blade.php';
    }

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
                'name' => 'classname',
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
                'name' => 'classname',
                'label' => 'Class name'
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
        $this->createWidgetFiles($this->data['entry']);
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $redirect_location = parent::updateCrud($request);
        $this->createWidgetFiles($this->data['entry']);
        return $redirect_location;
    }

    /**
     * After delete remove also the language folder.
     *
     * @param int $id
     *
     * @return string
     */
    public function destroy($id)
    {
        $widget = Widget::findOrFail($id);
        $destroyResult = parent::destroy($id);

        dd($destroyResult);

        if ($destroyResult)
            $this->deleteWidgetFiles($widget);

        return $destroyResult;
    }

    // TODO: deal with widget file removal upon delete
    private function deleteWidgetFiles($widget) {
        $controllerName = ucwords($widget->name);
        $controllerName = str_replace(" ", "", $controllerName);

        $widgetControllerName = $this->WidgetsClassPath . DIRECTORY_SEPARATOR . $controllerName . 'Controller';
        $widgetViewName = $this->WidgetsViewPath . DIRECTORY_SEPARATOR . $widget->classname . $this->WidgetsViewExtension;

        if(File::exists($widgetControllerName))
            File::delete($widgetControllerName);

        if(File::exists($widgetViewName)) {
            File::delete($widgetViewName);
        }
    }

    private function createWidgetFiles($data) {
        $controllerName = ucwords($data->name);
        $controllerName = str_replace(" ", "", $controllerName);
        $widgetControllerName = $this->WidgetsClassPath . DIRECTORY_SEPARATOR . $controllerName . 'Controller';
        $widgetViewName = $this->WidgetsViewPath . DIRECTORY_SEPARATOR . $data->classname . $this->WidgetsViewExtension;

        if(!File::exists($widgetControllerName)) {
            if(!File::exists($this->WidgetsClassPath))
                File::makeDirectory($this->WidgetsClassPath);

            Artisan::call('make:controller', [
                'name' => 'Widgets/' . $controllerName
            ]);
        }

        if(!File::exists($this->WidgetsViewPath))
            File::makeDirectory($this->WidgetsViewPath);

        if(!View::exists($widgetViewName)) {
            file_put_contents($widgetViewName, "Widget view");
        }
    }
}
