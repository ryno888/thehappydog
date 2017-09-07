<?php 

?>
<div class="container margin-top-150">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2><?php echo $title; ?> </h2>
        </div>
    </div>
	<div class="row padding-bottom-20">
        
        <?php
        foreach ($service_arr->obj_arr as $service) {
            
            $service_file = Lib_db::load_db("service_file", "sef_ref_service = $service->id");
            $sef_ref_file_thumb_tiny = Http_helper::build_url("index/xstream/fil_id/{$service_file->get("sef_ref_file_thumb_tiny")}");
            $sef_ref_file_thumb_lg = Http_helper::build_url("index/xstream/fil_id/{$service_file->get("sef_ref_file_thumb_lg")}");
            $service_title = Lib_string::limit_string_by_length($service->ser_title, 20);
            $ser_location = Lib_string::limit_string_by_length($service->ser_location, 30);
            $ser_details = Lib_string::limit_string_by_length($service->ser_details, 120);
            $ser_website = Http_helper::format_link("https://jqueryui.com/tooltip/");
        
            echo "
                <div class='col-xs-12 col-sm-6 col-md-3'>
                    <div class='col-item'>
                        <div class='post-img-content'>
                            <img src='$sef_ref_file_thumb_lg' class='img-responsive' />
                        </div>
                        <div class='info'>
                            <div class='row'>
                                <div class='price col-md-12'>
                                    <h5 data-toggle='tooltip' title='$service->ser_title'>$service_title</h5>
                                    <span class='price-text-color' title='$service->ser_location'>$ser_location</span>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='rating hidden-sm col-md-12'>
                                    <i class='price-text-color fa fa-star'></i><i class='price-text-color fa fa-star'>
                                    </i><i class='price-text-color fa fa-star'></i><i class='price-text-color fa fa-star'>
                                    </i><i class='fa fa-star'></i>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12 card-description'>
                                    <p>$ser_details</p>
                                </div>
                            </div>
                            <div class='separator clear-left'>
                                <p class='btn-add'>
                                    <i class='fa fa-link'></i><a target='_blank' href='$ser_website' class='hidden-sm'>Go to Website</a></p>
                                <p class='btn-details'>
                                    <i class='fa fa-list'></i><a href='".Http_helper::build_url("service/vservice_details/$service->id")."' class='hidden-sm'>More details</a></p>
                            </div>
                            <div class='clearfix'>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        ?>
	</div>
</div>

<script>
    $(document).ready(function(){
        $('.sectionAbout').removeClass('page-scroll').attr('href', '<?php echo Http_helper::build_url("home/vhome#about"); ?>')
        $('.sectionServices').removeClass('page-scroll').attr('href', '<?php echo Http_helper::build_url("home/vhome#services"); ?>')
        $('.sectionGallery').removeClass('page-scroll').attr('href', '<?php echo Http_helper::build_url("home/vhome#gallery"); ?>')
        $('.sectionContact').removeClass('page-scroll').attr('href', '<?php echo Http_helper::build_url("home/vhome#contact"); ?>')
    })
</script>