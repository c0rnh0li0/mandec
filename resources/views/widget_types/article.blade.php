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
    <section id="sectionwidget_{{ $id }}" class="article widget-content">
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
        <div class="blog-img row">
            <div class="col-md-12">
                <img class="img-responsive" src="img/blog-details-img2.jpg" alt="">
            </div>
            <div class="col-md-6 col-sm-6">
                <img class="img-responsive" src="img/blog-details-img3.jpg" alt="">
            </div>
            <div class="col-md-6 col-sm-6">
                <img class="img-responsive" src="img/blog-details-img4.jpg" alt="">
            </div>
        </div>
        <div class="block">
            <span class="first-child-span">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
            <p class="first-child">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text.</p>
            <blockquote>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text. Lorem Ipsum is simply dummy text.</p>
                <div class="footer">
                    Jason Santa Maria
                </div>
            </blockquote>
            <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</span>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p><br>
            <div class="tags">
                <h5>Tags</h5>
                <a href="#">Advertisement</a>,
                <a href="#">Smart Quotes</a>,
                <a href="#">Unique</a>,
                <a href="#">Design</a>
            </div>
            <div class="blog-comment">
                <a class="comment-img" href="#"><img class="img-responsive" src="img/avtar6.jpg" alt=""></a>
                <div class="comment-text">
                    <h5><a href="#">About The Author</a></h5>
                    <span>Paul Scrivens - Creative Head</span>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
            </div>
            <!-- social media icon -->
            <div class="media-link">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
    </section>
@endif