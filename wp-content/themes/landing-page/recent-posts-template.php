<?php
/* Template Name: Recent Posts */
 get_header(); ?>
<!-- Banner -->
<section class="banner inner-page">
    <div class="container">
        <div class="banner-wrap">
            <h1><?php single_cat_title(); ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
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
                <div class="blog-posts">

                    <?php 
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 100,
                            'ignore_sticky_posts' => 1 // Ignore sticky posts for a true recent list
                        );
                        $recent_posts = new WP_Query($args);
                        if ($recent_posts->have_posts()) {
                            while ($recent_posts->have_posts()) {
                                $recent_posts->the_post(); ?>
                                <div class="post">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail('full', array('class' => 'width-100')); ?>
                                        <?php endif; ?>
                                    </a>
                                    <div class="post-content">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                                        <b><span class="date"><?php echo get_the_date('M d, Y'); ?> | <?php echo get_the_author(); ?></span></b>
                                    </div>
                                </div>
                            <?php } 
                            wp_reset_postdata();
                        } ?>

                </div>
            </div>
        </div>
    </div>
</section>


<style>
    .pagination {
        text-align: center;
        margin: 20px 0;
    }

    .pagination ul {
        list-style: none;
        padding: 0;
        display: inline-flex;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination a, .pagination span {
        display: inline-block;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        color: #333;
        text-decoration: none;
    }

    .pagination a:hover {
        background-color: #f0f0f0;
    }

    .pagination .current {
        background-color: #333;
        color: #fff;
        border: 1px solid #333;
    }

</style>
<?php get_footer(); ?>

