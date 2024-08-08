<?php  
/*
Template Name: Thank You Page
*/
get_header();
?>
    <!-- Slider -->
    <section class="banner slider-alt pt pb" style="background-image: url('<?php bloginfo('template_url'); ?>/images/top-banner.jpg'); background-position: bottom; background-size: cover;">
        <div class="container">
            <div class="banner-wrap slider-wrap-alt">
                <div class="banner2-right">
                    <div class="banner2-form">
                        <h1 style="text-align:center;"><?php the_title();?></h1> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider End -->
	<div class="thank-you">
		<div class="container">
			<div class="thank-you-wrap">
				<img src="https://a1expresscarremoval.com.au/wp-content/uploads/2020/01/thank-you.png" alt="images">
				<h2>Thank You For Contacting Us</h2>
				<p>We’ve received your inquiry and one of our representatives will contact you within next 1 HOUR. Or for any urgent inquiry you can call or text us on 0488847247 or chat with us through our live chat box below.</p>
				<a href="<?php echo home_url(); ?>">Go To Home</a>
			</div>
		</div>
	</div>


 <?php get_footer();?>