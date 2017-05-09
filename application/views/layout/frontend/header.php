<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = CI_BASE_URL;
?>
<html lang="en">
<head>
	<?php echo isset($meta) ? Lib_html_tags::load_meta_data($meta) : false; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/bootstrap/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/grayscale.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/frontend.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/style.css">
    
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/js/jquery.min.js"></script>
    <script>
        var ci_base_url = "<?php echo CI_BASE_URL; ?>";
    </script>
</head>

<body>
    <div class="__overlay" style="width: 100%;">
        <div class="__overlay-content">
            <div class="__loader"></div>
            <div class='__loader-message'></div>
        </div>
    </div>
    <div class="margin-bottom-50">
        
        <!-- Navigation -->
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand colorGreen" href="<?php echo Http_helper::build_url("home/vhome") ?>">
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
                        <li><a class="page-scroll sectionAbout" href="#about">About Us</a></li>
                        <li><a class="page-scroll sectionServices" href="#services">Services</a></li>
                        <li><a class="page-scroll sectionGallery" href="#gallery">Gallery</a></li>
                        <li><a class="page-scroll sectionContact" href="#contact">Contact</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>