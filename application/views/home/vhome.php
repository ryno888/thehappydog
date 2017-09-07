<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Intro Header -->
    <header class="intro">
        <div class="background-image">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <img src="<?php echo CI_BASE_URL."assets/img/web/logo.png" ?>" class="main-logo"/>
                            <!--<h1 class="brand-heading">The Happy Dog</h1>-->
                            <p class="intro-text"><?php echo $config->get("con_intro") ?></p>
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
                <p><?php echo nl2br($config->get("con_about")) ?></p>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section id="services" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Services</h2>
                    <div class="row">
                        <?php
                            $service_type_multi = Lib_db::load_db("service_type", "srv_is_active = 1", ["multiple" => true]);
                            if($service_type_multi){
                                foreach ($service_type_multi->obj_arr as $service_type) {
                                    $url = Http_helper::build_url("service/vservice/$service_type->id");
                                    echo "
                                        <div class='col-xs-6 col-sm-4'>
                                            <div class='hovereffect'>
                                                <h2>{$service_type->srv_name}</h2>
                                                <i class='fa {$service_type->srv_icon} font100'></i>
                                                <div class='overlay'>
                                                    <a class='info' href='$url'>View</a>
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                }
                            }
                        ?>
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
                            <li class="active" data-slide-to="0" data-target="#carousel-610744"></li>
                            <li data-slide-to="1" data-target="#carousel-610744"></li>
                            <li data-slide-to="2" data-target="#carousel-610744"></li>
                            <li data-slide-to="3" data-target="#carousel-610744"></li>
                            <li data-slide-to="4" data-target="#carousel-610744"></li>
                            <li data-slide-to="5" data-target="#carousel-610744"></li>
                            <li data-slide-to="6" data-target="#carousel-610744"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img alt="Carousel Bootstrap First" class="sliderImage" src="<?php echo CI_BASE_URL."assets/img/slider/1.jpg" ?>" />
                                <div class="carousel-caption">
                                    <h4>Tip 1: Decide on the "house rules."</h4>
                                    <p>
                                        Before he comes home, decide what he can and can't do. Is he allowed on the bed or the furniture? Are parts of the house off limits? Will he have his own chair at your dining table? If the rules are settled on early, you can avoid confusion for both of you.
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img alt="Carousel Bootstrap Second" class="sliderImage" src="<?php echo CI_BASE_URL."assets/img/slider/2.jpg" ?>" />
                                <div class="carousel-caption">
                                    <h4>Tip 2: Set up his private den.</h4>
                                    <p>
                                        He needs "a room of his own." From the earliest possible moment give your pup or dog his own, private sleeping place that's not used by anyone else in the family, or another pet. He'll benefit from short periods left alone in the comfort and safety of his den. Reward him if he remains relaxed and quiet. His den, which is often a crate, will also be a valuable tool for house training.
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img alt="Carousel Bootstrap Third" class="sliderImage" src="<?php echo CI_BASE_URL."assets/img/slider/3.jpg" ?>" />
                                <div class="carousel-caption">
                                    <h4>Tip 3: Teach him to come when called.</h4>
                                    <p>
                                        Come Jasper! Good boy! Teaching him to come is the command to be mastered first and foremost. And since he'll be coming to you, your alpha status will be reinforced. Get on his level and tell him to come using his name. When he does, make a big deal using positive reinforcement. Then try it when he's busy with something interesting. You'll really see the benefits of perfecting this command early as he gets older.
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img alt="Carousel Bootstrap Third" class="sliderImage" src="<?php echo CI_BASE_URL."assets/img/slider/4.jpg" ?>" />
                                <div class="carousel-caption">
                                    <h4>Tip 4: Reward his good behavior.</h4>
                                    <p>
                                        Reward your puppy or dog's good behavior with positive reinforcement. Use treats, toys, love, or heaps of praise. Let him know when's he's getting it right. Likewise, never reward bad behaviour; it'll only confuse him.
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img alt="Carousel Bootstrap Third" class="sliderImage" src="<?php echo CI_BASE_URL."assets/img/slider/5.jpg" ?>" />
                                <div class="carousel-caption">
                                    <h4>Tip 5: Take care of the jump up.</h4>
                                    <p>
                                        Puppies love to jump up in greeting. Don't reprimand him, just ignore his behavior and wait 'til he settles down before giving positive reinforcement. Never encourage jumping behavior by patting or praising your dog when he's in a "jumping up" position. Turn your back on him and pay him no attention.
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img alt="Carousel Bootstrap Third" class="sliderImage" src="<?php echo CI_BASE_URL."assets/img/slider/6.jpg" ?>" />
                                <div class="carousel-caption">
                                    <h4>Tip 6: Teach him on "dog time."</h4>
                                    <p>
                                        Puppies and dogs live in the moment. Two minutes after they've done something, it's forgotten about. When he's doing something bad, try your chosen training technique right away so he has a chance to make the association between the behavior and the correction. Consistent repetition will reinforce what's he's learned.
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img alt="Carousel Bootstrap Third" class="sliderImage" src="<?php echo CI_BASE_URL."assets/img/slider/7.jpg" ?>" />
                                <div class="carousel-caption">
                                    <h4>Tip 7: Discourage him from biting or nipping.</h4>
                                    <p>
                                        Instead of scolding him, a great way to put off your mouthy canine is to pretend that you're in great pain when he's biting or nipping you. He'll be so surprised he's likely to stop immediately. If this doesn't work, try trading a chew toy for your hand or pant leg. The swap trick also works when he's into your favorite shoes. He'll prefer a toy or bone anyway. If all else fails, break up the biting behavior, and then just ignore him.
                                    </p>
                                </div>
                            </div>
                        </div> 
                            <a class="left carousel-control" href="#carousel-610744" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> 
                            <a class="right carousel-control" href="#carousel-610744" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
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
                <h2>Contact Us</h2>
                <p>Feel free to contact us for more information.</p>
                <p><a href="mailto:<?php echo $config->obj->con_email; ?>"><?php echo $config->obj->con_email; ?></a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <?php
                        if(!$config->is_empty("con_facebook")){
                            echo "<li><a href='{$config->obj->con_facebook}' target='_blank' class='btn btn-default btn-lg'><i class='fa fa-facebook fa-fw'></i> <span class='network-name'>Facebook</span></a></li>";
                        }
                        if(!$config->is_empty("con_twitter")){
                            echo "<li><a href='{$config->obj->con_twitter}' target='_blank' class='btn btn-default btn-lg'><i class='fa fa-twitter fa-fw'></i> <span class='network-name'>Twitter</span></a></li>";
                        }
                        if(!$config->is_empty("con_google")){
                            echo "<li><a href='{$config->obj->con_google}' target='_blank' class='btn btn-default btn-lg'><i class='fa fa-google-plus fa-fw'></i> <span class='network-name'>Google+</span></a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <!--<div id="map"></div>-->
    
    