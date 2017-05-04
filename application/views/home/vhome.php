<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll colorGreen" href="#page-top">
                    <i class="fa fa-paw"></i>
                    <span class="light">Home</span>
                </a>
                <div class="clearfix"></div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    
                    <li class="hidden"><a href="#page-top"></a> </li>
                    <li><a class="page-scroll" href="#about">About Us</a></li>
                    <li><a class="page-scroll" href="#services">Services</a></li>
                    <li><a class="page-scroll" href="#gallery">Gallery</a></li>
                    <li><a class="page-scroll" href="#contact">Contact</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="background-image">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <img src="<?php echo CI_BASE_URL."assets/img/web/logo.png" ?>" class="main-logo"/>
                            <!--<h1 class="brand-heading">The Happy Dog</h1>-->
                            <p class="intro-text">Lorem ipsum dolor sit amet, vel mi, <br>sollicitudin vulputate leo.</p>
                            <a href="#about" class="btn btn-circle page-scroll">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About</h2>
                <p>Lorem ipsum dolor sit amet, vel mi, sollicitudin vulputate leo. Nec ac convallis, quis ultricies vestibulum urna non nec purus, at volutpat, adipiscing magna. Arcu est. Nam tellus volutpat penatibus praesent, proin at augue tincidunt vestibulum tempus. Et nec orci, ante purus massa suspendisse vitae sapien ornare. Bibendum metus, erat dui pede quis fusce ac. Ornare interdum condimentum malesuada sem, a iaculis massa, duis quam erat sed, sit ultrices commodo. Faucibus nunc, libero rutrum a pede quisque integer est, placerat nulla nec vestibulum vivamus quam, cras facilisi mauris.</p>
                <p>Lorem ipsum dolor sit amet, vel mi, sollicitudin vulputate leo. Nec ac convallis, quis ultricies vestibulum urna non nec purus, at volutpat, adipiscing magna. Arcu est. Nam tellus volutpat penatibus praesent, proin at augue tincidunt vestibulum tempus. Et nec orci, ante purus massa suspendisse vitae sapien ornare. Bibendum metus, erat dui pede quis fusce ac. Ornare interdum condimentum malesuada sem, a iaculis massa, duis quam erat sed, sit ultrices commodo. Faucibus nunc, libero rutrum a pede quisque integer est, placerat nulla nec vestibulum vivamus quam, cras facilisi mauris.</p>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section id="services" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Services</h2>
                    <div class="row">
                        <div class="col-xs-6 col-sm-4">
                            <div class="hovereffect">
                                <h2>Accommodation</h2>
                                <i class="fa fa-heart font100"></i>
                                <div class="overlay">
                                    <a class="info" href="<?php echo "index.php/accommodation" ?>">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="hovereffect">
                                <h2>Shelters and Rescues</h2>
                                <i class="fa fa-home font100"></i>
                                <div class="overlay">
                                    
                                    <a class="info" href="#">link here</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="hovereffect">
                                <h2>Restaurants</h2>
                                <i class="fa fa-cutlery font100"></i>
                                <div class="overlay">
                                    
                                    <a class="info" href="#">link here</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="hovereffect">
                                <h2>Pet Travel</h2>
                                <i class="fa fa-car font100"></i>
                                <div class="overlay">
                                    
                                    <a class="info" href="#">link here</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="hovereffect">
                                <h2>Puppy Day Care</h2>
                                <i class="fa fa-heartbeat font100"></i>
                                <div class="overlay">
                                    
                                    <a class="info" href="#">link here</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="hovereffect">
                                <h2>Pet and Home Sitters</h2>
                                <i class="fa fa-user font100"></i>
                                <div class="overlay">
                                    
                                    <a class="info" href="#">link here</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="hovereffect">
                                <h2>Vets</h2>
                                <i class="fa fa-medkit font100"></i>
                                <div class="overlay">
                                    
                                    <a class="info" href="#">link here</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="hovereffect">
                                <h2>Pet Shops</h2>
                                <i class="fa fa-shopping-basket font100"></i>
                                <div class="overlay">
                                    
                                    <a class="info" href="#">link here</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="hovereffect">
                                <h2>Trainers and Behaviourists</h2>
                                <i class="fa fa-futbol-o font100"></i>
                                <div class="overlay">
                                    
                                    <a class="info" href="#">link here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- Download Section -->
    <section id="gallery" class="content-section text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="carousel slide" id="carousel-610744">
                        <ol class="carousel-indicators">
                            <li class="active" data-slide-to="0" data-target="#carousel-610744">
                            </li>
                            <li data-slide-to="1" data-target="#carousel-610744">
                            </li>
                            <li data-slide-to="2" data-target="#carousel-610744">
                            </li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img alt="Carousel Bootstrap First" src="<?php echo CI_BASE_URL."assets/img/web/1.jpg" ?>" />
                                <div class="carousel-caption">
                                    <h4>
                                        First Thumbnail label
                                    </h4>
                                    <p>
                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img alt="Carousel Bootstrap Second" src="<?php echo CI_BASE_URL."assets/img/web/2.jpg" ?>" />
                                <div class="carousel-caption">
                                    <h4>
                                        Second Thumbnail label
                                    </h4>
                                    <p>
                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img alt="Carousel Bootstrap Third" src="<?php echo CI_BASE_URL."assets/img/web/3.jpg" ?>" />
                                <div class="carousel-caption">
                                    <h4>
                                        Third Thumbnail label
                                    </h4>
                                    <p>
                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    </p>
                                </div>
                            </div>
                        </div> <a class="left carousel-control" href="#carousel-610744" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-610744" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact Start Bootstrap</h2>
                <p>Feel free to email us to provide some feedback on our templates, give us suggestions for new templates and themes, or to just say hello!</p>
                <p><a href="mailto:feedback@startbootstrap.com">feedback@startbootstrap.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <div id="map"></div>
    
    