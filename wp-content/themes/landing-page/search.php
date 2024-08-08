<?php get_header(); ?>
    <!-- Slider -->
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
    <!-- Slider End -->

<div class="container">
<br></br>
    <div class="search-bar">
        <form action="<?php echo home_url();?>" method="get">
            <input type="text" name="s" placeholder="Search..." class="form-control">
            <button type="submit" class="btn btn-danger"><i class="fas fa-search" aria-hidden="true"></i></button>
        </form>
    </div><br>
<?php
$s=get_search_query();
$args = array(
                's' =>$s
            );
    // The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
        _e("<h5 style='font-weight:bold;color:#000'>Search Results for: ".get_query_var('s')."</h5>");
        while ( $the_query->have_posts() ) {
           $the_query->the_post();
                 ?><br>
                    <div class="blog-main">
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
                    </div>
                 <?php
        }
    }else{
?>
        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
        <div class="alert alert-info">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
        </div>
<?php } ?>
</div>
<?php get_footer();?>