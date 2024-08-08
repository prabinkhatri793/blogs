<?php get_header();?>
    <!-- Banner -->
	<section class="banner inner-page">
		<div class="container">
			<div class="banner-wrap">
				<h1><?php the_title();?></span></h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php the_title();?></li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
    <!-- Banner End -->
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <?php while (have_posts()) : the_post(); ?>

                               <?php the_content(); ?>
    
                           <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php get_footer();?>