<?php
/**
 * The template for displaying featured portfolio on Front Page 
 *
 * @package Tress
 * @since Tress 1.0
 */
?>

<?php
// Start a new query for displaying featured posts on Front Page

if (get_theme_mod('tress_front_featured_portfolio_check')) {
    $featured_count = intval(get_theme_mod('tress_front_featured_portfolio_count'));
    $var = get_theme_mod('tress_front_featured_portfolio_cat');

    // if no category is selected then return 0 
    $featured_cat_id = max((int) $var, 0);

    $featured_portfolio_args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => $featured_count,
        'cat' => $featured_cat_id,
        'post__not_in' => get_option('sticky_posts'),
    );
    $featuredportfolio = new WP_Query($featured_portfolio_args);
    ?>

    <div class="home-portfolio-title-area" id="portfolio-title">
            <div class="home-portfolio-title section-title">
                 <?php if ( get_theme_mod('tress_portfolio_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('tress_portfolio_title')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Recent Portfolio', 'tress') ?></h3>
                           <?php } ?>
            </div>
    </div>
   

            <div id="featured-portfolio">
                <div class="portfolio-wrap">
                
                <?php if ($featuredportfolio->have_posts()) : $i = 1; ?>

                    <?php while ($featuredportfolio->have_posts()) : $featuredportfolio->the_post(); ?>
                    
                        <div class="home-featured-portfolio grid_4_of_12 col">

                            <div class="featured-portfolio-content">

                                <a href="<?php the_permalink(); ?>">

                                    <?php the_post_thumbnail('post_feature_thumb'); ?>
                                    <span><i class="fa fa-link"></i></span>
                                </a>
                               
                            </div> <!--end .featured-post-content -->

                            <a href="<?php the_permalink(); ?>">

                                <h4 class="home-featured-portfolio-title"><?php the_title(); ?></h4>

                            </a>
                           
                        </div><!--end .home-featured-portfolio-->
                   
                        <?php $i+=1; ?>

                    <?php endwhile; ?>

                <?php else : ?>

                    <h2 class="center"><?php esc_html_e('Not Found', 'tress'); ?></h2>
                    <p class="center"><?php esc_html_e('Sorry, but you are looking for something that is not here', 'tress'); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>
           </div>         
        </div> <!-- /#featured-portfolio -->

      
<?php
} if (!get_theme_mod('tress_front_featured_portfolio_check') && !get_theme_mod('tress_hide_sample_portfolio'))
    { // end Featured portfolio query ?>
        <div class="home-portfolio-title-area" id="portfolio-title">
            <div class="home-portfolio-title section-title">
                <h3><?php esc_html_e('Recent Portfolio', 'tress') ?></h3>
                         
            </div>
    </div>
   

            <div id="featured-portfolio">
                <div class="portfolio-wrap">
                    
                        <div class="home-featured-portfolio grid_4_of_12 col">

                            <div class="featured-portfolio-content">

                                <a href="#">
                                <img alt='' width="310" height="205" src='<?php echo get_template_directory_uri(); ?>/assets/images/img4.jpg' />
                                    <span><i class="fa fa-link"></i></span>
                                </a>
                               
                            </div> <!--end .featured-post-content -->

                            <a href="#">

                                <h4 class="home-featured-portfolio-title">Portfolio #1</h4>

                            </a>
                           
                        </div><!--end .home-featured-portfolio-->
                        
                        <div class="home-featured-portfolio grid_4_of_12 col">

                            <div class="featured-portfolio-content">

                                <a href="#">
                                <img alt='' width="310" height="205" src='<?php echo get_template_directory_uri(); ?>/assets/images/img5.jpg' />
                                    <span><i class="fa fa-link"></i></span>
                                </a>
                               
                            </div> <!--end .featured-post-content -->

                            <a href="#">

                                <h4 class="home-featured-portfolio-title">Portfolio #2</h4>

                            </a>
                           
                        </div><!--end .home-featured-portfolio-->
                        
                        <div class="home-featured-portfolio grid_4_of_12 col">

                            <div class="featured-portfolio-content">

                                <a href="#">
                                <img alt='' width="310" height="205" src='<?php echo get_template_directory_uri(); ?>/assets/images/img6.jpg' />
                                    <span><i class="fa fa-link"></i></span>
                                </a>
                               
                            </div> <!--end .featured-post-content -->

                            <a href="#">

                                <h4 class="home-featured-portfolio-title">Portfolio #3</h4>

                            </a>
                           
                        </div><!--end .home-featured-portfolio-->
                   
           </div>         
        </div> <!-- /#featured-portfolio -->
<?php } ?>
