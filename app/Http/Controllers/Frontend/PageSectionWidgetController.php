<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageSectionWidgetRequest as FrontendRequest;
use App\Models\PageSectionWidget;
use App\Models\Widget;
use App\Http\Controllers\Widgets;
use Backpack\CRUD\app\Http\Controllers\CrudController;

//class PageSectionWidgetController extends CrudController
class PageSectionWidgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAjax');
    }

    public function create(FrontendRequest $request)
    {
        $this->data['page_id'] = $request['page_id'];
        $this->data['template_section_id'] = $request['template_section_id'];
        $this->data['widget_id'] = $request['widget_id'];
        //$this->data['crud'] = $this->crud;

        $widget = Widget::findOrFail($this->data['widget_id']);

        $widgetInstance = $this->getWidgetClassInstance($widget);
        $widgetInstance->setExtraData($this->data);

        //dd($widgetInstance);
        //return parent::create();
        //dd($widget->type->settings_view);
        //return $widgetInstance->create()->render();
        //return view($widgetInstance->create(), $this->data)->render();
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
        $widgetInstance = new $widget->classname();

        return view('widget_types' . $widget->type->settings_view, $this->data)->render();
    }

    public function store(FrontendRequest $request)
    {
        $requestData = $request->all();

        $widget = Widget::findOrFail($requestData->data['widget_id']);
        $widgetInstance = new $widget->classname();
        $requestData->data['settings'] = $widgetInstance->createSettings($requestData);
        dd($requestData);
        //PageSectionWidget::create($requestData);

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

    private function getWidgetClassInstance(Widget $widget) {
        $controllerName = str_replace("-", " ", $widget->classname);
        $controllerName = ucwords($controllerName);
        $controllerName = '\App\Http\Controllers\Widgets\\' . str_replace(" ", "", $controllerName);
        return new $controllerName();
    }
}
