<?php get_header(); ?>

    <div class="section-inner page" id="page-portfolio">
            
        <h3 class="page-title">Portfólio <a href="<?= get_post_type_archive_link( get_post_type( get_the_ID() ) ) ?>" class="page-subtitle"><?php echo get_post_type( get_the_ID() ) ?></a></h3>

        <div class="single-container" id="stylist">

            <p class="page-subtitle"><?php the_field('titulo'); ?></p>
            <?php the_field('midia_opcional'); ?>
            
            <div class="gallery-bigbox">
                <?php echo do_shortcode(get_field('galeria')); ?>
            </div>

        </div>

    </div>

<?php get_footer(); ?>