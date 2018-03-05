<?php

namespace App\Http\Controllers;

use App\Models\ExtendedPage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Widgets;
use App\Models\TemplateSection;
use App\Models\Widget;
use Backpack\MenuCRUD\app\Models\MenuItem;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = ExtendedPage::findBySlug($slug);

        if (!$page)
        {
            abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
        }

        $this->data['sections'] = [];
        $index = 0;
        foreach ($page->sections as $template_section) {
            $section = TemplateSection::find($template_section->template_section_id);
            $this->data['sections'][$index] = [
                'name' => $section->html_name,
                'section_id' => $section->id,
                'section_css_classes' => $section->css_classes,
                'page_id' => $page->id,
                'widgets' => []
            ];

            foreach ($template_section->sectionwidgets as $pageSectionWidget) {
                $widget = Widget::find($pageSectionWidget->widget_id);
                if ($widget) {
                    $widgetInstance = $this->getWidgetClassInstance($widget);
                    $widgetInstance->setData($pageSectionWidget->settings);
                    $widgetInstance->data['id'] = $pageSectionWidget->id;
                    $this->data['sections'][$index]['widgets'][] = $widgetInstance->display($widget->type->settings_view);
                }
            }

            $index++;
        }

        //$this->data['sections'] = $page->sections;
        $this->data['menu_items'] = MenuItem::getTree();
        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();
        //$this->data['sections'] = $page->template->sections;

        return view('templates.' . $page->template->file, $this->data);
    }

    private function getWidgetClassInstance(Widget $widget) {
        $controllerName = str_replace("-", " ", $widget->classname);
        $controllerName = ucwords($controllerName);
        $controllerName = '\App\Http\Controllers\Widgets\\' . str_replace(" ", "", $controllerName);
        return new $controllerName();
    }
}