 <div class="blog-sidebar">
    <div class="search-bar">
      <form action="<?php echo home_url();?>" method="get">
        <input type="text" name="s" placeholder="Search..." class="form-control">
        <button type="submit" class="btn btn-danger"><i class="fas fa-search" aria-hidden="true"></i></button>
      </form>
    </div>
    <div class="blog-sidebar-wrap">
      <div class="heading-section d-flex justify-content-between align-items-center">
        <div class="category-name">
            <h3>Recent Posts</h3>
        </div>
        <div class="view-all">
            <a href="<?php echo get_category_link(get_cat_ID('apps')); ?>"><i class="fas fa-long-arrow-alt-right"></i> View All</a>
        </div>
    </div>
      <ul>
         <?php $args=array('post_type'=>'post','posts_per_page'=>5);
            $query=new WP_Query($args);
            if($query->have_posts()){
            while($query->have_posts()):$query->the_post();?>
        <li>
            <a href="<?php the_permalink();?>">
                <?php if(has_post_thumbnail()){?>
                <div class="recent-post-img">
                <?php the_post_thumbnail(array(54,54));?>
                </div>
            <?php } ?>
                <div class="recent-post-info">
                <h5><span><?php the_title();?></span><h5>
                <b><span class="date"><?php echo get_the_date('M d, Y'); ?> | <?php echo get_the_author(); ?></span></b>
                </div>
            </a>
        </li>
          <?php  endwhile; wp_reset_query(); } ?>
      </ul>
    </div>
    <div class="blog-sidebar bg-sec">
        <div class="blog-list">
            <div class="heading-section d-flex justify-content-between align-items-center">
                <div class="category-name">
                    <h3>Popular Posts</h3>
                </div>
                <div class="view-all">
                    <a href="<?php echo get_category_link(get_cat_ID('apps')); ?>"><i class="fas fa-long-arrow-alt-right"></i> View All</a>
                </div>
            </div>
            <ul class="blog-posts">
                <?php 
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                    'meta_key' => 'post_views', // Assuming 'post_views' is the custom field for view count
                    'orderby' => 'meta_value_num', // Order by custom field value
                    'order' => 'DESC' // Order by highest views
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