@if ($settings)
    {!! Form::open(array('url' => "frontend/pagesectionwidget", 'method' => 'post', 'role' => 'form', 'id' => 'widget_form')) !!}
<!-- <form  role="form"> -->
    <input type="hidden" name="page_id" value="{{ $page_id }}" />
    <input type="hidden" name="widget_id" value="{{ $widget_id }}" />
    <input type="hidden" name="template_section_id" value="{{ $template_section_id }}" />
    <div class="form-group">
        <label for="widget_title">Title</label>
        <input type="text" class="form-control" id="widget_title" name="widget_title" placeholder="Title" />
    </div>
    <div class="form-group">
        <label for="widget_subtitle">Subtitle</label>
        <input type="text" class="form-control" id="widget_subtitle" name="widget_subtitle" placeholder="Subtitle" />
    </div>
    <div class="form-group">
        <label for="widget_background">Background image</label>
        <input type="text" class="form-control" readonly="readonly" id="widget_background" name="widget_background" />
        <a href="" class="popup_selector" data-inputid="widget_background">Select Image</a>
    </div>

    <button type="submit" class="btn btn-success btn-block">Save</button>
<!-- </form> -->
{!! Form::close() !!}
@else
    <section id="banner" class="draggable-widgets">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        Initial template data [inserted]:  - One column
                    </div>
                </div>
            </div>
        </div>
        <div class="scrolldown">
            <a id="scroll" href="#features" class="scroll"></a>
        </div>
    </section>
@endif