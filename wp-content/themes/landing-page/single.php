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
    
<!-- Start Must Read Sections -->
<section class="blogs col-4-items pt pb">
    <div class="container">
        <div class="heading-section d-flex justify-content-between align-items-center">
            <div class="category-name">
                <h3>Related Posts</h3>
            </div>
            <div class="view-all">
                <a href="<?php echo get_category_link(get_cat_ID('software')); ?>"><i class="fas fa-long-arrow-alt-right"></i> View All</a>
            </div>
        </div>
        <div class="blog-posts">
            <div class="blog-main">
                <div class="row">
                    <?php 
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'orderby' => 'ID',
                        'order' => 'ASC'
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="col-md-3">
                                <div class="blog-col">
                                    <div class="blog-media">
                                        <a href="<?php the_permalink(); ?>" title="">
                                            <div class="blog-image-container">
                                                <div class="image">
                                                     <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
                                                </div>
                                                <div class="blog-overlay">
                                                    <div class="blog-text">
                                                        <h3><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h3>
                                                        <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                                                        <a href="<?php the_permalink(); ?>">Continue reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; 
                        wp_reset_postdata();
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Must Read Sections -->

<?php get_footer();?>