<?php
    $this->load->library("addons/Lib_fancy_box");
    $fancy_box = new Lib_fancy_box();
    echo $fancy_box->get_output();
    
    $first_file = false;
    if(count($service_file_arr->obj_arr) > 0){
        $first_file = reset($service_file_arr->obj_arr);
    }
?>

<div class="container margin-top-150 margin-bottom-20">
    <div class="row">
        <div class="col-md-12">
            <div class="" role="group">
                <button onclick="<?php echo "requestUpdate('service/vservice/{$service->obj->ser_ref_service_type}')"; ?>" class="btn btn-default" type="button"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to Accommodation</button>
                <button class="btn btn-default" onclick="window.open('<?php echo $service->obj->ser_website; ?>', '_blank');" type="button">Go to Website</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row product">
        <div class="col-md-5 col-md-offset-0">
            <div class="row">
                <?php
                    if($first_file){
                        $sef_ref_file_thumb_lg = Http_helper::build_url("index/xstream/fil_id/{$first_file->sef_ref_file_thumb_lg}");
                        echo "<div class='col-md-12'>
                            <a href='$sef_ref_file_thumb_lg' class='fancy-box-image' data-fancybox='images' data-width='900' data-height='500'>
                                <img class='fancy-box-thumb' src='$sef_ref_file_thumb_lg' width='100%' height='250px'>
                            </a>
                        </div>";
                    }
                ?>
                
            </div>
            <div class="row">
                <div class="col-md-12 padding-top-10">
                    <?php
                        foreach ($service_file_arr->obj_arr as $tiny_service_file) {
                            if($first_file->id != $tiny_service_file->id){
                                $tiny_ref_file_thumb_lg = Http_helper::build_url("index/xstream/fil_id/{$tiny_service_file->sef_ref_file_thumb_lg}");
                                $tiny_ref_file_thumb_tiny = Http_helper::build_url("index/xstream/fil_id/{$tiny_service_file->sef_ref_file_thumb_tiny}");
                                echo "<a href='$tiny_ref_file_thumb_lg' class='fancy-box-image' data-fancybox='images' data-width='900' data-height='500'>
                                    <img class='fancy-box-thumb' src='$tiny_ref_file_thumb_tiny' />
                                </a>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <h2><?php echo $service->obj->ser_title; ?></h2>
            <p class="product-details"><?php echo $service->obj->ser_location; ?> </p>
            <div class="row">
                <div class="col-sm-12 social-icons">
                    <?php 
                    
                        if(!$service->is_empty("ser_facebook_link")){
                            echo "<a href='{$service->obj->ser_facebook_link}'><i class='fa fa-facebook-square fa-3x' aria-hidden='true'></i></a>";
                        }
                        if(!$service->is_empty("ser_twitter_link")){
                            echo "<a href='{$service->obj->ser_twitter_link}'><i class='fa fa-twitter-square fa-3x' aria-hidden='true'></i></a>";
                        }
                        if(!$service->is_empty("ser_google_link")){
                            echo "<a href='{$service->obj->ser_google_link}'><i class='fa fa-google-plus-square fa-3x' aria-hidden='true'></i></a>";
                        }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="page-header">
        <h3>Service Details</h3></div>
    <p><?php echo $service->obj->ser_details; ?></p>
    <div class="page-header">
    <?php
        if($service_review_arr && property_exists($service_review_arr, "obj_arr")){
            echo "<h3>Reviews</h3></div>";
            foreach ($service_review_arr->obj_arr as $service_review) {
                $rating = Lib_html_tags::get_static_rating_html($service_review->srr_rating);
                $date_created = Lib_date::strtodate($service_review->srr_date_created, Lib_date::$DATE_FORMAT_11);
                echo "
                    <div class='media'>
                        <div class='media-body'>
                            <h4 class='media-heading'>$service_review->srr_title<p>$date_created</p></h4>
                            <div>$rating</div>
                            <p style='margin: 0;'>$service_review->srr_body</p>
                        </div>
                    </div>
                ";
            }
        }
        
    ?>
</div>

<script>
    $(document).ready(function(){
        $('.sectionAbout').removeClass('page-scroll').attr('href', '<?php echo Http_helper::build_url("home/vhome#about"); ?>')
        $('.sectionServices').removeClass('page-scroll').attr('href', '<?php echo Http_helper::build_url("home/vhome#services"); ?>')
        $('.sectionGallery').removeClass('page-scroll').attr('href', '<?php echo Http_helper::build_url("home/vhome#gallery"); ?>')
        $('.sectionContact').removeClass('page-scroll').attr('href', '<?php echo Http_helper::build_url("home/vhome#contact"); ?>')
    })
</script>