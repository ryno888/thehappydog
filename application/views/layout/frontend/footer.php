<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    echo Error_helper::check_errors();
    $base_url = CI_BASE_URL;
    
?>
        </div>
        <footer></footer>
    </body>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/bootstrap/js/tooltip.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/js/grayscale.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/js/jquery1.3.easing.min.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/js/system.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/js/frontend.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/js/components.js"></script>
</html>
<script>
$(document).ready(function () {
    hideLoader();
});
</script>