<?php
/* Template Name: Popular Posts */
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

                Contact Us
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
