<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $accommodation_arr = db_accommodation::get_accommodation_list();
?>
    <!DOCTYPE html>
  <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll colorGreen" href="<?php echo $base_url."index.php" ?>">
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
                    <li><a class="page-scroll" href="<?php echo $base_url."index.php#about" ?>">About Us</a></li>
                    <li><a class="page-scroll" href="<?php echo $base_url."index.php#services" ?>">Services</a></li>
                    <li><a class="page-scroll" href="<?php echo $base_url."index.php#gallery" ?>">Gallery</a></li>
                    <li><a class="page-scroll" href="<?php echo $base_url."index.php#contact" ?>">Contact</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
  
  <div class="container-fluid marginTop50 paddingTop15">
        <div class="row">
            <div class="col-md-4">
                <div class="page-header">
                    <h1>Accommodation</h1>
                </div>
            </div>
            <div class="col-md-4 marginTop50">
                <div class="input-group">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    <input type="text" class="form-control" placeholder="Search for...">
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>

<!--    <div class="container-fluid paddingTop75">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">

                    <h1>Accommodation</h1>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div> /input-group 
                    </div>
                </div>
            </div>
        </div>
    </div>-->

                <!--<div class="row">-->
                    <?php
                        if($accommodation_arr){
                            $count = 1;
                            foreach ($accommodation_arr as $key => $accommodation) {
                                $img = rand(1, 3);
                                $acc_description = model_string::limit_string_by_length($accommodation->acc_description, 160);
                                $html = "
                                    <div class='col-md-4'>
                                        <div class='thumbnail'>
                                            <img alt='Bootstrap Thumbnail First' src='$url_cms/accommodation/$img.jpg'>
                                            <div class='caption'>
                                                <h3>$accommodation->acc_name</h3>
                                                <p>$acc_description</p>
                                                <p>
                                                    <a class='btn btn-default modalPopup' href='#jqmDetails' itemid='$accommodation->acc_id' role='button' data-toggle='modal'>More Details</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                ";
                                $html_row = "";
                                $html_row_end = "";
                            if($count%3 == 0){
                                    $html_row = "<div class='row'>";
                                    $html_row_end = "</div>";
                                }
                                echo "$html_row $html $html_row_end";
                            }
                        }
                    ?>
            
        
  </body>
</html>
    
    