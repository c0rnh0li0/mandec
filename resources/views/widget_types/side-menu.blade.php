@if (isset($settings) && $settings == true)
    @if (isset($update) && $update == true)
        {!! Form::open(array('url' => $form_url, 'method' => 'put', 'role' => 'form', 'id' => 'widget_form')) !!}
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="id" value="{{ $id }}" />
        <input type="hidden" name="widget_id" value="{{ $widget_id }}" />
    @else
        {!! Form::open(array('url' => $form_url, 'method' => 'post', 'role' => 'form', 'id' => 'widget_form')) !!}
        <input type="hidden" name="_method" value="POST" />
        <input type="hidden" name="page_id" value="{{ $page_id }}" />
        <input type="hidden" name="widget_id" value="{{ $widget_id }}" />
        <input type="hidden" name="template_section_id" value="{{ $template_section_id }}" />
    @endif
    <div class="form-group">
        <label for="widget_title">Title</label>
        <input type="text" class="form-control" id="widget_title" name="widget_title" placeholder="Title" value="{{ $widget_data->title }}" />
    </div>
    <div class="form-group">
        <label for="widget_subtitle">Subtitle</label>
        <input type="text" class="form-control" id="widget_subtitle" name="widget_subtitle" placeholder="Subtitle" value="{{ $widget_data->subtitle }}" />
    </div>
    <div class="form-group">
        <label for="widget_background">Background image</label>
        <input type="text" class="form-control" readonly="readonly" id="widget_background" name="widget_background" value="{{ $widget_data->image }}" />
        <a href="" class="popup_selector" data-inputid="widget_background">Select Image</a>
    </div>

    <button type="submit" class="btn btn-success btn-block">Save</button>
    <!-- </form> -->
    {!! Form::close() !!}
@else
    <section id="sectionwidget_{{ $id }}" class="sidemenu widget-content">
        @hasrole('Admin')
        <div class="widget-menu">
            <div class="widget-menu-buttons">
                <ul>
                    <li>
                        <a href="/frontend/pagesectionwidget/{{ $id }}/edit" data-id="{{ $id }}" class="widget-edit">
                            <span class="admin-icon-box">
                                <i class="ion-edit"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <span class="admin-icon-box widget-sort">
                            <i class="ion-arrow-expand"></i>
                        </span>
                    </li>
                    <li>
                        <a href="/frontend/pagesectionwidget/{{ $id }}" data-id="{{ $id }}" class="widget-delete">
                            <span class="admin-icon-box">
                                <i class="ion-close"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @endhasrole
        <div class="widget">
            <span>Categories</span>
            <div class="widget-body">
                <ul class="category-list">
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Featured Blog</a></li>
                    <li><a href="#">Photography Idea</a></li>
                    <li><a href="#">Design Tutorials</a></li>
                    <li><a href="#">News and Events</a></li>
                    <li><a href="#">Arts and Entertainment</a></li>
                </ul>
            </div>
        </div>
    </section>
@endif