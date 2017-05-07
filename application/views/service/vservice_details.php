<div class="container margin-top-150 margin-bottom-20">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group" role="group">
                <button onclick="requestUpdate('service/vservice_accommodation')" class="btn btn-default" type="button"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to Accommodation</button>
                <button class="btn btn-default" type="button">Go to Website</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row product">
        <div class="col-md-5 col-md-offset-0">
            <div class="row">
                <div class="col-md-12"><img src="assets/img/suit_jacket.jpg" width="100%" height="250px"></div>
            </div>
            <div class="row">
                <div class="col-md-12"><img src="assets/img/suit_jacket.jpg" width="70" height="70"><img src="assets/img/suit_jacket.jpg" width="70" height="70"><img src="assets/img/suit_jacket.jpg" width="70" height="70"><img src="assets/img/suit_jacket.jpg" width="70"
                    height="70"><img src="assets/img/suit_jacket.jpg" width="70" height="70"><img src="assets/img/suit_jacket.jpg" width="70" height="70"></div>
            </div>
        </div>
        <div class="col-md-7">
            <h2>THE MARINE HERMANUS </h2>
            <p class="product-details">Marine Drive, 7200 Hermanus, South Africa&nbsp;– <strong>Excellent location - show map</strong> </p>
            <div class="row">
                <div class="col-sm-12 social-icons">
                    <a href="#"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-google-plus-square fa-3x" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-header">
        <h3>Product Details</h3></div>
    <p>Perched on top of the cliffs overlooking Hermanus’s Walker Bay, The Marine offers first-class splendour and elegance and a spectacular seascape, with imposing views extending across Western Capes Walker Bay and beyond.The rooms and suites are
        individually and stylishly decorated and have magnificent views of the sea, the mountains or The Marine's beautiful internal courtyard and finely manicured gardens.Stroll along the cliff path overlooking Hermanus Bay or have a dip in the tidal
        pool right in front of the hotel. Enjoy exquisite dining or sip a glass of local wine in the lounge, where there is nothing but 3,0 km of ocean between you and the South Pole.During whale season, from June until November, Hermanus offers some
        of the best land-based whale watching in the world and at The Marine you don't even have to get out of bed to experience it.&nbsp;This is our guests' favourite part of Hermanus, according to independent reviews.This property also has one of
        the best-rated locations in Hermanus! Guests are happier about it compared to other properties in the area.Couples particularly like the location — they rated it 10 for a two-person trip.We speak your language!The Marine Hermanus has been
        welcoming Booking.com guests since 15 Jan 2010. </p>
    <div class="page-header">
        <h3>Reviews<button class="btn btn-primary write-review" type="button">Write a review</button></h3></div>
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading">Love this!</h4>
            <div><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-half"></span></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus nisl ac diam feugiat, non vestibulum libero posuere. Vivamus pharetra leo non nulla egestas, nec malesuada orci finibus. </p>
            <p><span class="reviewer-name"><strong>John Doe</strong></span><span class="review-date">7 Oct 2015</span></p>
        </div>
    </div>
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading">Fantastic product</h4>
            <div><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus nisl ac diam feugiat, non vestibulum libero posuere. Vivamus pharetra leo non nulla egestas, nec malesuada orci finibus. </p>
            <p><span class="reviewer-name"><strong>Jane Doe</strong></span><span class="review-date">7 Oct 2015</span></p>
        </div>
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