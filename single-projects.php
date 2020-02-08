<?php get_header();

if (have_posts()) :

  while (have_posts()) : the_post(); ?>

    <div class="content section-inner">

      <div id="post-<?php the_ID(); ?>" <?php post_class('single single-post'); ?>>

        <div class="post-container">

          <div class="featured-media">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="https://images.unsplash.com/photo-1558980664-1db506751c6c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1650&q=80=First slide" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="https://images.unsplash.com/photo-1581105511979-a8840168a1fe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1650&q=80=Second slide" alt="Second slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span id="carousel-prev" class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span id="carousel-next" class="sr-only">Next</span>
              </a>
            </div>

            <?php

            if (!post_password_required()) :

              $post_format = get_post_format();

              if ($post_format == 'gallery') : ?>

                <div class="featured-media">

                  <?php hitchcock_flexslider('post-image'); ?>

                  <div class="clear"></div>

                </div><!-- .featured-media -->

              <?php elseif (has_post_thumbnail()) : ?>

                <div class="featured-media">

                  <?php the_post_thumbnail('post-image'); ?>

                </div><!-- .featured-media -->

              <?php endif; ?>

            <?php endif; ?>

            <div class="post-header">

              <?php if (is_single()) : ?>

                <p class="post-date"><?php the_time(get_option('date_format')); ?></p>

              <?php endif; ?>

              <?php the_title('<h1 class="post-title">', '</h1>'); ?>

            </div>

            <div class="post-inner">

              <div class="post-content">

                <?php the_content(); ?>

              </div><!-- .post-content -->

              <div class="clear"></div>

              <?php
              $args = array(
                'before'           => '<div class="page-links"><span class="title">' . __('Pages:', 'hitchcock') . '</span>',
                'after'            => '<div class="clear"></div></div>',
                'link_before'      => '<span>',
                'link_after'       => '</span>',
                'separator'        => '',
                'pagelink'         => '%',
                'echo'             => 1
              );

              wp_link_pages($args);

              ?>

              <?php if (is_single()) : ?>

                <div class="post-meta">

                  <?php if (has_category()) : ?>
                    <p class="categories">
                      <?php _e('In', 'hitchcock'); ?> <?php the_category(', '); ?>
                    </p>
                  <?php endif; ?>

                  <?php if (has_tag()) : ?>
                    <p class="tags">
                      <?php the_tags('', ' '); ?>
                    </p>
                  <?php endif; ?>

                  <?php edit_post_link(__('Edit Post', 'hitchcock'), '<p class="post-edit">', '</p>'); ?>

                </div><!-- .post-meta -->

                <div class="post-navigation">

                  <?php

                  $prev_post = get_previous_post();
                  $next_post = get_next_post();

                  if (!empty($prev_post)) : ?>

                    <a class="post-nav-prev" title="<?php echo esc_attr(get_the_title($prev_post->ID)); ?>" href="<?php echo get_permalink($prev_post->ID); ?>">
                      <p><?php _e('Next', 'hitchcock'); ?><span class="hide"> <?php _e('Post', 'hitchcock'); ?></span></p>
                      <span class="fa fw fa-angle-right"></span>
                    </a>

                  <?php
                  endif;

                  if (!empty($next_post)) : ?>

                    <a class="post-nav-next" title="<?php echo esc_attr(get_the_title($next_post->ID)); ?>" href="<?php echo get_permalink($next_post->ID); ?>">
                      <span class="fa fw fa-angle-left"></span>
                      <p><?php _e('Previous', 'hitchcock'); ?><span class="hide"> <?php _e('Post', 'hitchcock'); ?></span></p>
                    </a>
                  <?php endif; ?>

                  <div class="clear"></div>

                </div><!-- .post-navigation -->

              <?php
              else :

                edit_post_link(__('Edit', 'hitchcock'), '<div class="post-meta"><p class="post-edit">', '</p></div>');

              endif; ?>

            </div><!-- .post-inner -->

            <?php comments_template('', true); ?>

          </div><!-- .post-container -->

        </div><!-- .post -->

      </div><!-- .content -->

  <?php

    if (is_single()) {
      hitchcock_related_posts(3);
    }

  endwhile;

endif;

  ?>

  <?php get_footer(); ?>