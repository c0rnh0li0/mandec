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

        foreach ($page->sections as $template_section) {
            $section = TemplateSection::find($template_section->template_section_id);

            foreach ($template_section->sectionwidgets as $pageSectionWidget) {
                $widget = Widget::find($pageSectionWidget->widget_id);
                if ($widget) {
                    $widgetClass = 'App\\Http\\Controllers\\Widgets\\' . $widget->name;
                    $this->data['section_widgets'][$section->html_name][] = new $widgetClass($widget);
                }
            }
        }

        $this->data['sections'] = $page->sections;
        $this->data['menu_items'] = MenuItem::getTree();
        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();
        $this->data['sections'] = $page->template->sections;

        return view('templates.' . $page->template->file, $this->data);
    }
}