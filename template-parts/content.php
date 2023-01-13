<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
* @package Bloglog
 * @since 1.0.0
 */
$bloglog_default = bloglog_get_default_theme_options(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('twp-archive-items'); ?>>
    <div class="entry-wrapper">

        
        <?php if( has_post_thumbnail() ){
        $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'medium_large' );
        $featured_image = isset( $featured_image[0] ) ? $featured_image[0] : ''; ?>

            <div class="entry-thumbnail">

                <a href="<?php the_permalink(); ?>">


                <img class="entry-responsive-thumbnail" src="<?php echo esc_url( $featured_image ); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>">
                </a>

                <?php
                $format = get_post_format(get_the_ID()) ?: 'standard';
                $icon = minimal_grid_post_format_icon($format);
                if (!empty($icon)) { ?>
                    <div class="post-format-icon"><?php echo minimal_grid_svg_escape($icon); ?></div>
                <?php } ?>

            </div>

        <?php } ?>

        <div class="post-content">

            <div class="entry-meta theme-meta-categories">

                <?php bloglog_entry_footer($cats = true, $tags = false, $edits = false); ?>

            </div>

            <header class="entry-header">

                <h2 class="entry-title entry-title-small">

                    <a href="<?php the_permalink(); ?>">

                        <?php the_title(); ?>

                    </a>
                </h2>

            </header>

            <div class="entry-meta">

                <?php
                bloglog_posted_by();
                ?>

            </div>

            <?php bloglog_excerpt_content(); ?>
            
            <?php bloglog_read_more_render(); ?>

        </div>

    </div>
</article>