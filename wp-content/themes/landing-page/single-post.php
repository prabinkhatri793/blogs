<?php get_header();?>


    <!-- Banner -->
	<section class="banner inner-page">
		<div class="container">
			<div class="banner-wrap">
				<h1><?php the_title();?></span></h1>
				<nav aria-label="breadcrumb">
				    <ol class="breadcrumb">
				        <li class="breadcrumb-item"><a href="<?php echo home_url();?>">Home</a></li>
				        <?php 
				        $category = get_the_category(); 
				        if ($category) {
				            $first_category = $category[0];
				            echo '<li class="breadcrumb-item"><a href="' . get_category_link($first_category->term_id ) . '">' . $first_category->name . '</a></li>';
				        }
				        ?>
				        <li class="breadcrumb-item active" aria-current="page"><?php the_title();?></li>
				    </ol>
				</nav>

			</div>
		</div>
	</section>
	
	<?php while(have_posts()):the_post();?>
	<div class="pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="blog-details-main">
						<?php if(has_post_thumbnail()){?>
						<div class="blog-details-img">
							<img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true);?>">
						</div>
						<?php } ?>
						<div class="blog-details-content">
						    <h3><?php the_title();?></h3>
							<ul class="blog-icons">
								<li><i class="far fa-user" aria-hidden="true"></i> <?php echo get_the_author(); ?></li>
								<li><i class="far fa-calendar-check" aria-hidden="true"></i> <?php echo get_the_date('M d, Y');?></li>
								<li><span class="post-views"><?php echo get_post_views(get_the_ID()); ?></span> </li><!-- View count here -->
							</ul>
							<?php the_content();?>
						</div>
					</div>
					<!-- Start Must Read Sections -->
					<section class="blogs col-4-items pt pb">
					    <div class="">
					        <div class="heading-section d-flex justify-content-between align-items-center">
					            <div class="category-name">
					                <h3>Recent Posts</h3>
					            </div>
					            <div class="view-all">
					                <a href="http://localhost/blogs/recent-post/"><i class="fas fa-long-arrow-alt-right"></i> View All</a>
					            </div>
					        </div>
					        <div class="blog-posts">
					            <div class="blog-main">
					                <div class="row">
					                    <?php 
					                    $args = array(
					                        'post_type' => 'post',
					                        'posts_per_page' => 6,
					                        'orderby' => 'ID',
					                        'order' => 'ASC'
					                    );
					                    $query = new WP_Query($args);
					                    if ($query->have_posts()) {
					                        while ($query->have_posts()) : $query->the_post(); ?>
					                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
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
					                                                        <b><span class="date"><?php echo get_the_date('M d, Y'); ?> | <?php echo get_the_author(); ?></span></b>
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
				</div>
				<div class="col-md-4">
					<?php get_sidebar();?>
				</div>
			</div>
		</div>
	</div>
	<?php endwhile;?> 

	
    <!-- Location -->

    <style>
        div#exampleModalCenter {
            z-index: 99999 !important;
        }
        .modal-body {
            padding: 0px;
        }
    </style>
<?php get_footer();?>