<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageSectionWidgetRequest as FrontendRequest;
use App\Models\PageSectionWidget;
use App\Models\Widget;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class PageSectionWidgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAjax');
    }

    public function show($widget) {
        $widget = Widget::findOrFail($widget);
        $this->data['data'] = json_decode('{"title":"Your title here","subtitle":"Your subtitle here","image":"../img/banner.jpg"}');
        $this->data['id'] = $widget->id;
        $this->data['settings'] = false;
        $this->data['update'] = false;

        if (Input::get('id') != null && Input::get('id') != "") {
            $this->data['id'] = Input::get('id');
            $record = PageSectionWidget::findOrFail(Input::get('id'));
            $widget = Widget::findOrFail($record->widget_id);
            $this->data['data'] = json_decode($record->settings);
        }

        $widgetInstance = $this->getWidgetClassInstance($widget);
        $widgetInstance->data['data'] = $this->data;

        return view('widget_types.' . $widget->type->settings_view, $this->data)->render();
    }

    public function create(FrontendRequest $request)
    {
        $this->data['page_id'] = $request['page_id'];
        $this->data['template_section_id'] = $request['template_section_id'];
        $this->data['widget_id'] = $request['widget_id'];
        $this->data['settings'] = isset($request['settings']) ? $request['settings'] : false;
        $this->data['form_url'] = "frontend/pagesectionwidget/";
        $this->data['form_method'] = "POST";

        $widget = Widget::findOrFail($this->data['widget_id']);

        $widgetInstance = $this->getWidgetClassInstance($widget);
        $widgetInstance->setExtraData($this->data);

        $this->data['widget_data'] = json_decode("{\"title\":\"\",\"subtitle\":\"\",\"image\":\"\"}");

        dd($widgetInstance->create());
        return view('widget_types.' . $widget->type->settings_view, $this->data)->render();
    }

    public function edit(FrontendRequest $request)
    {
        $this->data['id'] = $request['id'];
        $this->data['settings'] = true;
        $this->data['update'] = true;
        $this->data['form_url'] = "frontend/pagesectionwidget/" . $request['id'];
        $this->data['form_method'] = "PUT";

        $record = PageSectionWidget::findOrFail($request['id']);
        $widget = Widget::findOrFail($record->widget_id);
        $this->data['widget_id'] = $record->widget_id;

        $this->data['widget_data'] = json_decode($record->settings);

        $widgetInstance = $this->getWidgetClassInstance($widget);
        $widgetInstance->data = $this->data;

        return view('widget_types.' . $widget->type->settings_view, $this->data)->render();
    }

    public function store(FrontendRequest $request)
    {
        $requestData = $request->all();

        $widget = Widget::findOrFail($request->input('widget_id'));
        $widgetInstance = $this->getWidgetClassInstance($widget);
        $requestData['settings'] = $widgetInstance->createSettings($request);

        $record = new PageSectionWidget();
        $record->page_id = $request->input('page_id');
        $record->template_section_id = $request->input('template_section_id');
        $record->widget_id = $request->input('widget_id');
        $record->settings = $widgetInstance->createSettings($request);
        $record->order = 0;

        $record->save();

        return json_encode([
            'success' => true,
            'id' => $record->id,
            'isupdate' => false
        ]);
    }

    public function update(FrontendRequest $request)
    {
        $record = PageSectionWidget::findOrFail($request['id']);
        $widget = Widget::findOrFail($record->widget_id);
        $widgetInstance = $this->getWidgetClassInstance($widget);

        $record->settings = $widgetInstance->createSettings($request);
        $record->save();

        return json_encode([
            'success' => true,
            'id' => $request['id'],
            'isupdate' => true
        ]);
    }

    public function delete($id) {
        PageSectionWidget::findOrFail($id)->delete();

        return json_encode([
            'success' => true,
            'id' => $id
        ]);
    }

    public function sort(FrontendRequest $request) {
        for ($i = 0; $i < (int)$request->input('count'); $i++)
            DB::update("UPDATE `page_section_widgets` SET `order` = $i, `template_section_id` = {$request->input('section')} WHERE `id` = {$request->input('sort.' . $i)} AND `page_id` = {$request->input('page')}");

        return json_encode([ "success" => true ]);
    }

    private function getWidgetClassInstance(Widget $widget) {
        $controllerName = str_replace("-", " ", $widget->classname);
        $controllerName = ucwords($controllerName);
        $controllerName = '\App\Http\Controllers\Widgets\\' . str_replace(" ", "", $controllerName);
        return new $controllerName();
    }
}
