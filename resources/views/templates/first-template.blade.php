@extends("master.index")

@section("content")
<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h1>Clean and Flexible Business Template</h1>
                    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                    <div class="buttons">
                        <a href="#" class="btn btn-learn">Purchase Now</a>
                        <a href="#" class="btn btn-learn">View Featurese</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="scrolldown">
        <a id="scroll" href="#features" class="scroll"></a>
    </div>
</section>
<section id="features">
    <div class="container">
        <div class="row">
            <div id="left-section">
                @foreach ($section_widgets['left-section'] as $widget)
                    <?php echo $widget->index(); ?>
                @endforeach
            </div>
            <div class="col-md-12">
                <div class="title">
                    <h2>OUR BEST SERVICES</h2>
                    <p>Dantes remained confused and silent by this explanation of the <br> thoughts which had unconsciously</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-6 col-sm-6">
                <div class="feature-block text-center">
                    <div class="icon-box">
                        <i class="ion-easel"></i>
                    </div>
                    <h4 class="wow fadeInUp" data-wow-delay=".3s">Responsive Design</h4>
                    <p class="wow fadeInUp" data-wow-delay=".5s">Lorem ipsum dolor sit amet, consectetur adipisic-<br>ing elit, sed do eiusmod tempor incididunt ut <br> labore et dolore magna aliqua. Ut enim ad minim</p>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 col-sm-6">
                <div class="feature-block text-center">
                    <div class="icon-box">
                        <i class="ion-paintbucket"></i>
                    </div>
                    <h4 class="wow fadeInUp" data-wow-delay=".3s">Outstanding Animation</h4>
                    <p class="wow fadeInUp" data-wow-delay=".5s">Lorem ipsum dolor sit amet, consectetur adipisic-<br>ing elit, sed do eiusmod tempor incididunt ut <br> labore et dolore magna aliqua. Ut enim ad minim</p>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 col-sm-6">
                <div class="feature-block text-center">
                    <div class="icon-box">
                        <i class="ion-paintbrush"></i>
                    </div>
                    <h4 class="wow fadeInUp" data-wow-delay=".3s">Unlimited Colors</h4>
                    <p class="wow fadeInUp" data-wow-delay=".5s">Lorem ipsum dolor sit amet, consectetur adipisic-<br>ing elit, sed do eiusmod tempor incididunt ut <br> labore et dolore magna aliqua. Ut enim ad minim</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="counter">
    <div class="container">
        <div class="row">
            <div class="title">
                <h2>FUN FACTS</h2>
                <p>Dantes remained confused and silent by this explanation of the <br> thoughts which had unconsciously</p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="block wow fadeInRight" data-wow-delay=".3s">
                    <i class="ion-code"></i>
                    <p class="count-text">
                        <span class="counter-digit">136800 </span> k
                    </p>
                    <p>Lines Coded</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="block wow fadeInRight" data-wow-delay=".5s">
                    <i class="ion-compass"></i>
                    <p class="count-text">
                        <span class="counter-digit">7800 </span> +
                    </p>
                    <p>Lines Coded</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="block wow fadeInRight" data-wow-delay=".7s">
                    <i class="ion-compose"></i>
                    <p class="count-text">
                        <span class="counter-digit">399</span>
                    </p>
                    <p>Lines Coded</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="block wow fadeInRight" data-wow-delay=".9s">
                    <i class="ion-image"></i>
                    <p class="count-text">
                        <span class="counter-digit">9995</span>
                    </p>
                    <p>Lines Coded</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h2>LATEST WORKS</h2>
                    <p>Dantes remained confused and silent by this explanation of the <br> thoughts which had unconsciously</p>
                </div>
                <div class="block">
                    <div class="recent-work-mixMenu">
                        <ul>
                            <li><button class="filter" data-filter="all">All</button></li>
                            <li><button class="filter" data-filter=".category-2">Printing</button></li>
                            <li><button class="filter" data-filter=".category-1">Web</button></li>
                            <li><button class="filter" data-filter=".category-2">Illustration</button></li>
                            <li><button class="filter" data-filter=".category-1">Media</button></li>
                        </ul>
                    </div>
                    <div class="recent-work-pic">
                        <ul id="mixed-items">
                            <li class="mix category-1 col-md-4 col-xs-6" data-my-order="1">
                                <a class="example-image-link" href="img/work1.jpg" data-lightbox="example-set">
                                    <img class="img-responsive" src="img/work1.jpg" alt="">
                                    <div class="overlay">
                                        <h3>Web design</h3>
                                        <i class="ion-ios-plus-empty"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="mix category-2 col-md-4 col-xs-6" data-my-order="2">
                                <a class="example-image-link" href="img/work2.jpg" data-lightbox="example-set">
                                    <img class="img-responsive" src="img/work2.jpg" alt="">
                                    <div class="overlay">
                                        <h3>Web design</h3>
                                        <i class="ion-ios-plus-empty"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="mix category-1 col-md-4 col-xs-6" data-my-order="3">
                                <a class="example-image-link" href="img/work3.jpg" data-lightbox="example-set">
                                    <img class="img-responsive" src="img/work3.jpg" alt="">
                                    <div class="overlay">
                                        <h3>Web design</h3>
                                        <i class="ion-ios-plus-empty"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="mix category-2 col-md-4 col-xs-6" data-my-order="4">
                                <a class="example-image-link" href="img/work4.jpg" data-lightbox="example-set">
                                    <img class="img-responsive" src="img/work4.jpg" alt="">
                                    <div class="overlay">
                                        <h3>Web design</h3>
                                        <i class="ion-ios-plus-empty"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="mix category-1 col-md-4 col-xs-6" data-my-order="5">
                                <a class="example-image-link" href="img/work5.jpg" data-lightbox="example-set">
                                    <img class="img-responsive" src="img/work5.jpg" alt="">
                                    <div class="overlay">
                                        <h3>Web design</h3>
                                        <i class="ion-ios-plus-empty"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="mix category-2 col-md-4 col-xs-6" data-my-order="6">
                                <a class="example-image-link" href="img/work6.jpg" data-lightbox="example-set">
                                    <img class="img-responsive" src="img/work6.jpg" alt="">
                                    <div class="overlay">
                                        <h3>Web design</h3>
                                        <i class="ion-ios-plus-empty"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="play-video">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">GET THE TEMPLATE</h2>
                    <p class="wow fadeInUp" data-wow-delay=".5s">Dantes remained confused and silent by this explanation of the </p>
                    <a href="https://vimeo.com/channels/staffpicks/145743834" class="html5lightbox" data-width=800 data-height=400>
                        <div class="button ion-ios-play-outline wow zoomIn" data-wow-delay=".3s"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="team">
    <div class="container">
        <div class="row">
            <div class="title">
                <h2>CREATIVE TEAM</h2>
                <p>Dantes remained confused and silent by this explanation of the <br> thoughts which had unconsciously</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="block wow fadeInLeft" data-wow-delay=".3s">
                    <img src="img/team-img1.jpg" alt="">
                    <div class="team-overlay">
                        <h3>ROBERT SMITH <span>Product Designer</span></h3>
                        <span class="icon"><i class="ion-quote"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4  col-sm-4 col-xs-6">
                <div class="block wow fadeInLeft" data-wow-delay=".6s">
                    <img src="img/team-img2.jpg" alt="">
                    <div class="team-overlay">
                        <h3>ROBERT SMITH <span>Product Designer</span></h3>
                        <span class="icon"><i class="ion-quote"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4  col-sm-4 col-xs-6">
                <div class="block wow fadeInLeft" data-wow-delay=".9s">
                    <img src="img/team-img3.jpg" alt="">
                    <div class="team-overlay">
                        <h3>ROBERT SMITH <span>Product Designer</span></h3>
                        <span class="icon"><i class="ion-quote"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="pricing-table">
    <div class="container">
        <div class="row">
            <div class="title">
                <h2>PRICING TABLE</h2>
                <p>Dantes remained confused and silent by this explanation of the <br> thoughts which had unconsciously</p>
            </div>
            <div class="col-md-4 col">
                <div class="block text-center wow fadeInLeft" data-wow-delay=".3s">
                    <ul>
                        <li>
                            <h4>STARTER PACK</h4>
                            <p>&#36; 40 <span>/Month</span></p>
                        </li>
                        <li><p>Unlimited Downloads</p></li>
                        <li><p>Unlimited Uploads</p></li>
                        <li><p>Unlimited Email Accounts</p></li>
                        <li><p> Email Forwards </p></li>
                        <li><p>Cloud Storage</p></li>
                        <li><p>Screen Share</p></li>
                        <li>
                            <a href="#" class="btn btn-buy">BUY NOW</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col">
                <div class="block text-center wow zoomIn" data-wow-delay=".3s">
                    <ul>
                        <li>
                            <h4>STARTER PACK</h4>
                            <p>&#36; 40 <span>/Month</span></p>
                        </li>
                        <li><p>Unlimited Downloads</p></li>
                        <li><p>Unlimited Uploads</p></li>
                        <li><p>Unlimited Email Accounts</p></li>
                        <li><p> Email Forwards </p></li>
                        <li><p>Cloud Storage</p></li>
                        <li><p>Screen Share</p></li>
                        <li>
                            <a href="#" class="btn btn-buy">BUY NOW</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col">
                <div class="block text-center wow fadeInRight" data-wow-delay=".3s">
                    <ul>
                        <li>
                            <h4>STARTER PACK</h4>
                            <p>&#36; 40 <span>/Month</span></p>
                        </li>
                        <li><p>Unlimited Downloads</p></li>
                        <li><p>Unlimited Uploads</p></li>
                        <li><p>Unlimited Email Accounts</p></li>
                        <li><p> Email Forwards </p></li>
                        <li><p>Cloud Storage</p></li>
                        <li><p>Screen Share</p></li>
                        <li>
                            <a href="#" class="btn btn-buy">BUY NOW</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h2>Blog</h2>
                    <p>Dantes remained confused and silent by this explanation of the <br> thoughts which had unconsciously</p>
                </div>
                <div id="blog-post" class="owl-carousel">
                    <div>
                        <div class="block">
                            <img src="img/blog/blog-1.jpg" alt="" class="img-responsive">
                            <div class="content">
                                <h4><a href="blog.html">Hey,This is a blog title</a></h4>
                                <small>By admin / Sept 18, 2014</small>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ex itaque repudiandae nihil qui debitis atque necessitatibus aliquam, consequuntur autem!
                                </p>
                                <a href="blog.html" class="btn btn-read">Read More</a>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="block">
                            <img src="img/blog/blog-2.jpg" alt="" class="img-responsive">
                            <div class="content">
                                <h4><a href="blog.html">Hey,This is a blog title</a></h4>
                                <small>By admin / Sept 18, 2014</small>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ex itaque repudiandae nihil qui debitis atque necessitatibus aliquam, consequuntur autem!
                                </p>
                                <a href="blog.html" class="btn btn-read">Read More</a>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="block">
                            <img src="img/blog/blog-3.jpg" alt="" class="img-responsive">
                            <div class="content">
                                <h4><a href="blog.html">Hey,This is a blog title</a></h4>
                                <small>By admin / Sept 18, 2014</small>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ex itaque repudiandae nihil qui debitis atque necessitatibus aliquam, consequuntur autem!
                                </p>
                                <a href="blog.html" class="btn btn-read">Read More</a>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="block">
                            <img src="img/blog/blog-4.jpg" alt="" class="img-responsive">
                            <div class="content">
                                <h4><a href="blog.html">Hey,This is a blog title</a></h4>
                                <small>By admin / Sept 18, 2014</small>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ex itaque repudiandae nihil qui debitis atque necessitatibus aliquam, consequuntur autem!
                                </p>
                                <a href="blog.html" class="btn btn-read">Read More</a>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="block">
                            <img src="img/blog/blog-1.jpg" alt="" class="img-responsive">
                            <div class="content">
                                <h4><a href="blog.html">Hey,This is a blog title</a></h4>
                                <small>By admin / Sept 18, 2014</small>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ex itaque repudiandae nihil qui debitis atque necessitatibus aliquam, consequuntur autem!
                                </p>
                                <a href="blog.html" class="btn btn-read">Read More</a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>




<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="title">
                <h2>TESTIMONIAL</h2>
                <p>Dantes remained confused and silent by this explanation of the <br> thoughts which had unconsciously</p>
            </div>
            <div class="col col-md-6">
                <div class="media wow fadeInLeft" data-wow-delay=".3s">
                    <div class="media-left">
                        <a href="#">
                            <img src="img/service-img.png" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="#"><h4 class="media-heading">Jonathon Andrew</h4></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo</p>
                    </div>
                </div>
            </div>
            <div class="col col-md-6">
                <div class="media wow fadeInRight" data-wow-delay=".3s">
                    <div class="media-left">
                        <a href="#">
                            <img src="img/service-img.png" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="#"><h4 class="media-heading">Jonathon Andrew</h4></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo</p>
                    </div>
                </div>
            </div>
            <div class="col col-md-6">
                <div class="media wow fadeInLeft" data-wow-delay=".3s">
                    <div class="media-left">
                        <a href="#">
                            <img src="img/service-img.png" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="#"><h4 class="media-heading">Jonathon Andrew</h4></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo</p>
                    </div>
                </div>
            </div>
            <div class="col col-md-6">
                <div class="media wow fadeInRight" data-wow-delay=".3s">
                    <div class="media-left">
                        <a href="#">
                            <img src="img/service-img.png" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="#"><h4 class="media-heading">Jonathon Andrew</h4></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="client-logo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div id="Client_Logo" class="owl-carousel">
                        <div>
                            <a href="#"><img class="img-responsive" src="img/clientLogo/client-logo1.jpg" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img class="img-responsive" src="img/clientLogo/client-logo2.jpg" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img class="img-responsive" src="img/clientLogo/client-logo3.jpg" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img class="img-responsive" src="img/clientLogo/client-logo4.jpg" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img class="img-responsive" src="img/clientLogo/client-logo5.jpg" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img class="img-responsive" src="img/clientLogo/client-logo6.jpg" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img class="img-responsive" src="img/clientLogo/client-logo1.jpg" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img class="img-responsive" src="img/clientLogo/client-logo2.jpg" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img class="img-responsive" src="img/clientLogo/client-logo3.jpg" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img class="img-responsive" src="img/clientLogo/client-logo4.jpg" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img class="img-responsive" src="img/clientLogo/client-logo5.jpg" alt=""></a>
                        </div>
                        <div>
                            <a href="#"><img class="img-responsive" src="img/clientLogo/client-logo6.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contact-form">
    <div class="container">
        <div class="row">
            <div class="title">
                <h2>CONTACT US</h2>
                <p>Dantes remained confused and silent by this explanation of the <br> thoughts which had unconsciously</p>
            </div>
            <div class="col-md-6 col">
                <!-- map -->
                <div class="map">
                    <div id="googleMap"></div>
                </div><!--/map-->

            </div>
            <div class="col-md-6">
                <form>
                    <input type="text" class="form-control" placeholder="Name">
                    <input type="text" class="form-control" placeholder="Email">
                    <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                    <button class="btn btn-default" type="submit">SEND</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection