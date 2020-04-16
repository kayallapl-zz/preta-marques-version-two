<?php get_header(); ?>

    <div class="section-inner page" id="page-portfolio">
            
        <h3 class="page-title">Portfólio <span class="page-subtitle"><?php echo get_post_type( get_the_ID() ) ?></span></h3>

        <div class="single-container" id="stylist">

            <p class="page-subtitle"><?php the_field('titulo'); ?></p>
            
            <div class="gallery-bigbox">
                <?php echo do_shortcode(get_field('galeria')); ?>
            </div>

        </div>

    </div>

<?php get_footer(); ?>