<?php get_header();?>

    <!-- Start Slider -->
   <header>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="http://localhost/blogs/wp-content/uploads/2024/08/depositphotos_215132512-stock-photo-chef-cook-preparing-vegetables-his.webp" alt="images not found">
                    <div class="cover">
                        <div class="container">
                            <div class="header-content">
                                <div class="line"></div>
                                <h2>Teimagine Digital Experience with</h2>
                                <h1>Start-ups and solutions</h1>
                                <h4>We help entrepreneurs, start-ups and enterprises shape their ideas into products</h4>
                            </div>
                        </div>
                     </div>
                </div>                    
                <div class="item">
                    <img src="http://localhost/blogs/wp-content/uploads/2024/08/tech-news-post-featured-img-28.jpg" alt="images not found">
                    <div class="cover">
                        <div class="container">
                            <div class="header-content">
                                <div class="line animated bounceInLeft"></div>
                                <h2>Reimagine Digital Experience with</h2>
                                <h1>Intelligent solutions</h1>
                                <h4>We help entrepreneurs, start-ups and enterprises shape their ideas into products</h4>
                            </div>
                        </div>
                     </div>
                </div>                
                <div class="item">
                    <img src="http://localhost/blogs/wp-content/uploads/2024/08/computer-2982270_640.jpg" alt="images not found">
                    <div class="cover">
                        <div class="container">
                            <div class="header-content">
                                <div class="line animated bounceInLeft"></div>
                                <h2>Peimagine Digital Experience with</h2>
                                <h1>Intelligent Solutions</h1>
                                <h4>We help entrepreneurs, start-ups and enterprises shape their ideas into products</h4>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </header>
    <!-- End Slider -->
    <!-- Blog -->
    <section class="blogs pt pb">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-main">
                        <?php 
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 1,
                            'orderby' => 'ID',
                            'order' => 'ASC'
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="blog-col-main">
                                    <div class="blog-media">
                                        <a href="<?php the_permalink(); ?>" title="">
                                            <div class="blog-image-container">
                                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
                                                <div class="blog-overlay">
                                                    <div class="blog-text">
                                                        <h3><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h3>
                                                        <p><?php the_excerpt(); ?></p>
                                                        <b><span class="date"><?php echo get_the_date('M d, Y'); ?> | <?php echo get_the_author(); ?></span></b>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; 
                            wp_reset_postdata();
                        } ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="blog-sidebar bg-sec">
                        <div class="blog-list">
                            <div class="heading-section d-flex justify-content-between align-items-center">
                                <div class="category-name">
                                    <h3>Popular Posts</h3>
                                </div>
                                <div class="view-all">
                                    <a href="http://localhost/blogs/popular-posts/"><i class="fas fa-long-arrow-alt-right"></i> View All</a>
                                </div>
                            </div>
                            <ul class="blog-posts">
                                <?php 
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 2,
                                    'orderby' => 'ID',
                                    'order' => 'ASC'
                                );
                                $query = new WP_Query($args);
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) : $query->the_post(); ?>
                                        <li class="blog-post-item">
                                            <a href="<?php the_permalink(); ?>" class="post-link">
                                                <div class="post-thumbnail-container">
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <div class="post-thumbnail">
                                                            <?php the_post_thumbnail('full', array('class' => 'width-100')); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="post-text">
                                                    <h5><?php the_title(); ?></h5>
                                                    <b><span class="date"><?php echo get_the_date('M d, Y'); ?> | <?php echo get_the_author(); ?></span></b>
                                                    <span class="post-views"><?php echo get_post_views(get_the_ID()); ?></span> <!-- View count here -->
                                                </div>
                                            </a>
                                        </li>
                                    <?php endwhile; 
                                    wp_reset_postdata();
                                } ?>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Start Technology Sections -->

<section class="blogs bg-sec">
    <div class="container">
        <div class="heading-section d-flex justify-content-between align-items-center">
            <div class="category-name">
                <h3>Technology</h3>
            </div>
            <div class="view-all">
                <a href="<?php echo get_category_link(get_cat_ID('technology')); ?>"><i class="fas fa-long-arrow-alt-right"></i> More in Technology</a>
            </div>
        </div>
        <div class="blog-posts">
            <?php
                global $query_string;
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'paged' => $paged,
                    'category_name' => 'technology' // Add category filter
                );
                query_posts($args);
                if (have_posts()) :
                    while (have_posts()) : the_post(); ?>
                        <div class="post">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full', array('class' => 'width-100')); ?>
                            </a>
                            <div class="post-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p>
                                    <?php echo wp_trim_words(get_the_content(), 20); ?>
                                </p>
                                <b><span class="date"><?php echo get_the_date('M d, Y'); ?> | <?php echo get_the_author(); ?></span></b>
                            </div>
                        </div>
                    <?php endwhile;
                endif;
                wp_reset_query();
            ?>
        </div>
    </div>
</section>
<!-- End Technology Sections -->

<!-- Start Must Read Sections -->
<section class="blogs pt pb">
    <div class="container">
        <div class="heading-section d-flex justify-content-between align-items-center">
            <div class="category-name">
                <h3>Must Read</h3>
            </div>
            <div class="view-all">
                <a href="<?php echo get_category_link(get_cat_ID('apps')); ?>"><i class="fas fa-long-arrow-alt-right"></i> View More</a>
            </div>
        </div>
        <div class="blog-posts">
            <div class="blog-main">
                <div class="row">
                    <?php 
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 2,
                        'orderby' => 'ID',
                        'order' => 'ASC'
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="col-md-6">
                                <div class="blog-col">
                                    <div class="blog-media">
                                        <a href="<?php the_permalink(); ?>" title="">
                                            <div class="blog-image-container">
                                                <div class="image must-read"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>"></div>
                                                <div class="blog-overlay">
                                                    <div class="blog-text">
                                                        <h3><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h3>
                                                        <p><?php the_excerpt(); ?></p>
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

<!-- Start App Sections -->
<section class="blogs bg-sec">
    <div class="container">
        <div class="heading-section d-flex justify-content-between align-items-center">
            <div class="category-name">
                <h3>Gadgets</h3>
            </div>
            <div class="view-all">
                <a href="<?php echo get_category_link(get_cat_ID('gadgets')); ?>"><i class="fas fa-long-arrow-alt-right"></i> More in Gadgets</a>
            </div>
        </div>
        <div class="blog-posts">
            <?php
                global $query_string;
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'paged' => $paged,
                    'category_name' => 'gadgets' // Add category filter
                );
                query_posts($args);
                if (have_posts()) :
                    while (have_posts()) : the_post(); ?>
                        <div class="post">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full', array('class' => 'width-100')); ?>
                            </a>
                            <div class="post-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p>
                                    <?php echo wp_trim_words(get_the_content(), 20); ?>
                                </p>
                                <b><span class="date"><?php echo get_the_date('M d, Y'); ?> | <?php echo get_the_author(); ?></span></b>
                            </div>
                        </div>
                    <?php endwhile;
                endif;
                wp_reset_query();
            ?>
        </div>
    </div>
</section>
<!-- End App Sections -->


<section id="blog" class="blogs pt pb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="heading-section d-flex justify-content-between align-items-center">
                    <div class="category-name">
                        <h3>Apps</h3>
                    </div>
                    <div class="view-all">
                        <a href="<?php echo get_category_link(get_cat_ID('apps')); ?>"><i class="fas fa-long-arrow-alt-right"></i> More in Apps</a>
                    </div>
                </div>
              <?php
              // Custom query for 'blog_post' post type
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3, // Display all posts
                'orderby' => 'date',
                'order' => 'DESC'
              );

              $query = new WP_Query($args);

              if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>

                  <div class="blog-box">
                    <a href="<?php the_permalink(); ?>">
                        <div class="blog-image">
                          <?php if (has_post_thumbnail()) : ?>
                            <a href="#"><?php the_post_thumbnail('large'); ?></a>
                          <?php else : ?>
                            <img src="default-image-url" alt="Blog">
                          <?php endif; ?>
                        </div>
                    </a>
                    <div class="blog-details">
                      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <p><?php echo limit_characters(get_the_excerpt(), 150); ?></p>
                      <b><span class="date"><?php echo get_the_date('M d, Y'); ?> | <?php echo get_the_author(); ?></span></b></br>
                    </div>
                  </div>

                <?php endwhile;
                wp_reset_postdata();
              else : ?>
                <p><?php _e('No blog posts found.'); ?></p>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
                <div class="blog-sidebar-wrap home">
                    <div class="heading-section d-flex justify-content-between align-items-center">
                        <div class="category-name">
                            <h3>Recent Posts</h3>
                        </div>
                        <div class="view-all">
                            <a href="http://localhost/blogs/recent-post/">
                                <i class="fas fa-long-arrow-alt-right"></i> View All
                            </a>
                        </div>
                    </div>
                    <ul>
                        <?php 
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 8,
                            'ignore_sticky_posts' => 1 // Ignore sticky posts for a true recent list
                        );
                        $recent_posts = new WP_Query($args);
                        if ($recent_posts->have_posts()) {
                            while ($recent_posts->have_posts()) {
                                $recent_posts->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <div class="recent-post-img">
                                                <?php the_post_thumbnail(array(54, 54)); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="recent-post-info">
                                            <h5><span><?php the_title(); ?></span></h5>
                                            <b><span class="date"><?php echo get_the_date('M d, Y'); ?> | <?php the_author(); ?></span></b>
                                        </div>
                                    </a>
                                </li>
                            <?php } 
                            wp_reset_postdata();
                        } ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Start Games Sections -->
<section class="blogs bg-sec">
    <div class="container">
        <div class="heading-section d-flex justify-content-between align-items-center">
            <div class="category-name">
                <h3>Games</h3>
            </div>
            <div class="view-all">
                <a href="<?php echo get_category_link(get_cat_ID('games')); ?>"><i class="fas fa-long-arrow-alt-right"></i> More in Games</a>
            </div>
        </div>
        <div class="blog-posts">
            <?php
                global $query_string;
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'paged' => $paged,
                    'category_name' => 'games' // Add category filter
                );
                query_posts($args);
                if (have_posts()) :
                    while (have_posts()) : the_post(); ?>
                        <div class="post">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full', array('class' => 'width-100')); ?>
                            </a>
                            <div class="post-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p>
                                    <?php echo wp_trim_words(get_the_content(), 20); ?>
                                </p>
                                <b><span class="date"><?php echo get_the_date('M d, Y'); ?> | <?php echo get_the_author(); ?></span></b>
                            </div>
                        </div>
                    <?php endwhile;
                endif;
                wp_reset_query();
            ?>
        </div>
    </div>
</section>
<!-- End App Sections -->
<!-- Start Must Read Sections -->
<section class="blogs col-4-items pt pb">
    <div class="container">
        <div class="heading-section d-flex justify-content-between align-items-center">
            <div class="category-name">
                <h3>Software</h3>
            </div>
            <div class="view-all">
                <a href="<?php echo get_category_link(get_cat_ID('software')); ?>"><i class="fas fa-long-arrow-alt-right"></i> More in Software</a>
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
                                                        <b><span class="date"><?php echo get_the_date('M d, Y'); ?> | <?php echo get_the_author(); ?></span></b>
                                                        <h3><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h3>
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
<?php get_footer(); ?>

