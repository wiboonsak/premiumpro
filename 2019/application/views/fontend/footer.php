<!--START FOOTER-->
	<?php include("header.php"); ?>
	<footer class="prague-footer default">

        <img src="#" data-lazy-src="<?php echo base_url('HTML/img/footer.jpg')?>" class="s-img-switch" alt="footer banner" />
        <div class="footer-content-outer">
            <div class="footer-top-content">
                <div class="prague-footer-main-block">
                    <div class="prague-logo">
                        <a href="index.php">
                            <img src="#" data-lazy-src="<?php echo base_url('HTML/img/LOGO_HATYAI_PREMIUM_PROPERTY_WHITE.png')?>" class="attachment-full size-full" alt="logo"/> </a>
                    </div>

                    <div class="footer-main-content">
                        <p><?php echo $this->lang->line('With_over');?></p>
                    </div>

                </div>
                <div class="prague-footer-info-block">

                    <h4 class="footer-info-block-title"><?php echo $this->lang->line('ContactUs'); ?></h4>

                    <div class="footer-info-block-content">
                        <p><a href="tel:+7(885)5896985">+66 (0)74 335733 , (0)81 891 9249 , (0)91 549 2695</a></p>
                        <p><a href="mailto:hatyaipremiumproperty@gmail.com">hatyaipremiumproperty@gmail.com</a></p>
                        <p><?php echo $this->lang->line('Tambon'); ?></p>
                    </div>

                </div>
            </div>
            <div class="footer-bottom-content">

                <!-- Footer copyright -->
                <div class="footer-copyright">
                    <p>PREMIUM PROPERTY (C) 2019 ALL RIGHTS RESERVED. <br>Developed by <a href="http://www.me-fi.com" target="_blank" style="font-size: 9pt">ME-FI.com</a></p>
                </div>
                <!-- End footer copyright -->

                <div class="prague-social-nav">


                    <ul class="social-content">                        
                        
                        <li>
                            <a target="_blank" href="https://www.facebook.com/HatyaiPremiumProperty/">
                                <i aria-hidden="true" class="fab fa-facebook-f"></i>
                            </a>
                        </li>
						<li>
                            <a target="_blank" href="https://twitter.com">
                                <i aria-hidden="true" class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.youtube.com">
                                <i aria-hidden="true" class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>

    </footer>
	<!--/END FOOTER-->

<!--------- code slide to top -------->
         
<div style="z-index: 1111;"><a href="#" class="back-to-top"><img src="<?php echo base_url('HTML/img/chevron-upwards-arrow.png')?>" alt="" ></a></div>
       

<script>            
			jQuery(document).ready(function() {
				var offset = 220;
				var duration = 500;
				jQuery(window).scroll(function() {
					if (jQuery(this).scrollTop() > offset) {
						jQuery('.back-to-top').fadeIn(duration);
					} else {
						jQuery('.back-to-top').fadeOut(duration);
					}
				});
				
				jQuery('.back-to-top').click(function(event) {
					event.preventDefault();
					jQuery('html, body').animate({scrollTop: 0}, duration);
					return false;
				})
			});
</script>
 <!--------- code slide to top -------->