<?php

// functions.php
function limit_characters($text, $char_limit) {
    if (strlen($text) > $char_limit) {
        $text = substr($text, 0, $char_limit) . '...';
    }
    return $text;
}


function enqueue_bootstrap() {
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap');

add_theme_support( 'title-tag' );



add_theme_support( 'post-thumbnails' );





register_nav_menus(

	array(

		'menu-1' => __( 'Primary', 'mytheme' ),

        'quick_links' => __( 'Quick Links', 'mytheme' ),

		'fservice' => __( 'Footer Service', 'mytheme' ),

		'suburbs' => __( 'Suburbs', 'mytheme' ),

		'service' => __( 'Service Menu', 'mytheme' ),

	)

);

  
function register_my_menus() {
    register_nav_menus(
        array(
            'quick_links' => __( 'Quick Links' )
        )
    );
}
add_action( 'init', 'register_my_menus' );



function mytheme_widgets_init() {

	register_sidebar(

		array(

			'name'          => __( 'Footer', 'mytheme' ),

			'id'            => 'sidebar-1',

			'description'   => __( 'Add widgets here to appear in your footer.', 'mytheme' ),

			'before_widget' => '<section id="%1$s" class="widget %2$s">',

			'after_widget'  => '</section>',

			'before_title'  => '<h2 class="widget-title">',

			'after_title'   => '</h2>',

		)

	);

}

add_action( 'widgets_init', 'mytheme_widgets_init' );





function services_post_type() {

    $args = array(

        'public'    => true,

        'label'     => __( 'Services', 'textdomain' ),

        'menu_icon' => 'dashicons-format-aside',

        'supports' => array( 'title', 'editor', 'excerpt','thumbnail','page-attributes') 

    );

    register_post_type( 'service', $args );

}

add_action( 'init', 'services_post_type' );





function projects_post_type() {

    $args = array(

        'public'    => true,

        'label'     => __( 'Project', 'textdomain' ),

        'menu_icon' => 'dashicons-admin-site-alt3',

        'supports' => array( 'title', 'editor', 'excerpt','thumbnail','page-attributes') 

    );

    register_post_type( 'project', $args );

}

add_action( 'init', 'projects_post_type' );



/* 

 * Enables the HTTP Strict Transport Security (HSTS) header in WordPress.

 * Includes preloading with subdomain support. 

 */

function tg_enable_strict_transport_security_hsts_header_wordpress() {

    header( 'Strict-Transport-Security: max-age=31536000; includeSubDomains; preload' );

}

add_action( 'send_headers', 'tg_enable_strict_transport_security_hsts_header_wordpress' );






function pp_pagination_nav() {
    if (is_singular()) {
        return;  // Don't display pagination on single posts or pages.
    }

    global $wp_query;

    if ($wp_query->max_num_pages <= 1) {
        return;  // Don't display pagination if there's only one page.
    }

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    $links = array();

    // Display at least 8 links
    for ($i = max(1, $paged - 12); $i <= min($max, $paged + 12); $i++) {
        $links[] = $i;
    }

    echo '<div class=""><ul class="pagination">' . "\n";

    if (get_previous_posts_link()) {
        printf('<li>%s</li>' . "\n", get_previous_posts_link(__('&laquo;')));
    }

    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf('<li%s><a href="%s" rel="prev">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links)) {
            echo '<li>…</li>';
        }
    }

    sort($links);

    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s" rel="prev">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links)) {
            echo '<li>…</li>' . "\n";
        }

        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s" rel="prev">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    if (get_next_posts_link()) {
        printf('<li>%s</li>' . "\n", get_next_posts_link(__('&raquo;')));
    }

    echo '</ul></div>' . "\n";
}


function custom_enqueue_scripts() {
    wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/js/ajax-filter.js', array('jquery'), null, true);
    wp_localize_script('ajax-filter', 'afp_vars', array(
        'afp_nonce' => wp_create_nonce('afp_nonce'), // Create nonce which we later will use to verify AJAX request
        'afp_ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');







add_action('wpcf7_init', 'register_custom_form_tag');

// Function to track post views
function track_post_views($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    $views = get_post_meta($post_id, 'post_views', true);
    if ($views == '') {
        update_post_meta($post_id, 'post_views', '1');
    } else {
        $views_no = intval($views);
        update_post_meta($post_id, 'post_views', ++$views_no);
    }
}
add_action('wp_head', 'track_post_views');



// Function to get popular posts
function get_popular_posts($num_posts = 5) {
    $args = array(
        'posts_per_page' => $num_posts,
        'meta_key' => 'post_views',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'ignore_sticky_posts' => true
    );
    $popular_posts = new WP_Query($args);
    return $popular_posts;
}

// Function to display popular posts
function display_popular_posts($num_posts = 5) {
    $popular_posts = get_popular_posts($num_posts);
    if ($popular_posts->have_posts()) {
        echo '<ul>';
        while ($popular_posts->have_posts()) {
            $popular_posts->the_post();
            echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a> (' . get_post_views(get_the_ID()) . ')</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No popular posts found.</p>';
    }
    wp_reset_postdata();
}

// Function to get post views
function get_post_views($post_id) {
    $views = get_post_meta($post_id, 'post_views', true);
    if ($views == '') {
        return '0 views';
    }
    return $views . ' views';
}


// Start Related Posts
// Register Recent Posts Widget
function recent_posts_widget() {
    register_widget('Recent_Posts_Widget');
}
add_action('widgets_init', 'recent_posts_widget');

// Define the Widget Class
class Recent_Posts_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'recent_posts_widget', // Base ID
            esc_html__('Recent Posts', 'text_domain'), // Name
            array('description' => esc_html__('A Widget to display recent posts', 'text_domain'),) // Args
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        // Output the recent posts
        $recent_posts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => !empty($instance['number']) ? $instance['number'] : 5,
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if ($recent_posts->have_posts()) :
            echo '<ul>';
            while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('thumbnail');
                        } ?>
                        <?php the_title(); ?>
                        <span><?php echo get_the_date(); ?></span>
                    </a>
                </li>
            <?php endwhile;
            wp_reset_postdata();
            echo '</ul>';
        else :
            echo '<p>No recent posts available.</p>';
        endif;

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Recent Posts', 'text_domain');
        $number = !empty($instance['number']) ? $instance['number'] : 5;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_attr_e('Number of posts to show:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" value="<?php echo esc_attr($number); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? sanitize_text_field($new_instance['number']) : '';
        return $instance;
    }
}

// End Related Posts


class Walker_Category_Custom extends Walker_Category {
    function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0) {
        $cat_name = esc_attr($category->name);
        $cat_name = apply_filters('list_cats', $cat_name, $category);
        $link = '<a href="' . esc_url(get_term_link($category)) . '">';
        $link .= '<i class="fa fa-angle-double-right" aria-hidden="true"></i>' . $cat_name . '</a>';
        
        if (!empty($args['show_count'])) {
            $link .= ' (' . number_format_i18n($category->count) . ')';
        }
        if (!empty($args['feed_image']) || !empty($args['feed'])) {
            $link .= ' ';
            if (empty($args['feed_image'])) {
                $link .= '(';
            }
            $link .= '<a href="' . get_term_feed_link($category->term_id, $category->taxonomy, $args['feed_type']) . '"';
            if (empty($args['feed'])) {
                $link .= '>';
                if (empty($args['feed_image'])) {
                    $link .= 'Feed';
                } else {
                    $link .= '<img src="' . $args['feed_image'] . '" alt="Feed" />';
                }
            } else {
                $link .= ' title="' . $args['feed'] . '">';
                $link .= $args['feed'];
            }
            $link .= '</a>';
            if (empty($args['feed_image'])) {
                $link .= ')';
            }
        }

        if ('list' == $args['style']) {
            $output .= "\t<li";
            $css_classes = array('cat-item', 'cat-item-' . $category->term_id);
            if (!empty($args['current_category'])) {
                $_current_category = get_term($args['current_category'], $category->taxonomy);
                if ($category->term_id == $args['current_category']) {
                    $css_classes[] = 'current-cat';
                } elseif ($category->term_id == $_current_category->parent) {
                    $css_classes[] = 'current-cat-parent';
                }
            }
            $output .= ' class="' . implode(' ', apply_filters('category_css_class', $css_classes, $category, $args, $depth)) . '"';
            $output .= ">$link\n";
        } else {
            $output .= "\t$link<br />\n";
        }
    }
}


// Register the Web Media Pop Bottom Widget


function custom_widget_area() {
    register_sidebar(array(
        'name'          => __('Custom Widget Area', 'text_domain'),
        'id'            => 'custom-widget-area',
        'before_widget' => '<div class="widget-area">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'custom_widget_area');
