<?php /*Template Name: Main Blog
*/ get_header(); ?>

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


    <!-- Blog -->
	<section class="blog pt pb">
		<div class="container">
		    <?php while(have_posts()): the_post();
		        the_content();
		       endwhile; ?>
			<div class="row">
				<div class="col-md-8">
					<div class="blog-main">
                        <?php 
                        $args = array('post_type'=>'post');
                        $query = new WP_Query($args);
                        if($query->have_posts()){
                            while($query->have_posts()):$query->the_post();
                        ?>
						<div class="blog-col">
							<div class="blog-media">
								<a href="<?php the_permalink();?>" title=""><img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>"></a>
							</div>
							<div class="blog-content">
								<h3><a href="<?php the_permalink();?>" title=""><?php the_title();?></a></h3>
								<p>
									<?php the_excerpt();?>
								</p>
								<a href="<?php the_permalink();?>" title="" class="blog-btn">Read More..</a>
							</div>
						</div>
                        <?php  endwhile; wp_reset_query(); } ?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="blog-sidebar">
					    <div class="blog-list">
							<h3>Popular Posts</h3>
							<ul class="blog-posts">
								<?php 
								$args = array('post_type' => 'post','posts_per_page' => 5, 'orderby' => 'ID', 'order' => 'ASC');
								$query = new WP_Query($args);
								if($query->have_posts()){
                                    while($query->have_posts()):$query->the_post();?>
                                <li>
									<a href="<?php the_permalink();?>"><?php the_title();?></a>
									<span><?php the_date();?></span>
								</li>
                                <?php  endwhile; wp_reset_query(); } ?>
							</ul>
						</div>
						<div class="blog-list">
							<h3>Our Projects</h3>
							<ul class="blog-categories">
								<?php 
								$args=array('post_type'=>'project','posts_per_page'=>5);
								$query=new WP_Query($args);
								if($query->have_posts()){
									while($query->have_posts()):$query->the_post();?>
                                <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                                <?php  endwhile; wp_reset_query(); } ?>
                            </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>

    
<?php get_footer();?>