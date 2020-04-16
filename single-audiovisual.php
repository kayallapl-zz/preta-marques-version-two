<?php get_header(); ?>

    <div class="section-inner page" id="page-portfolio">
            
        <h3 class="page-title">Portfólio <span class="page-subtitle"><?php echo get_post_type( get_the_ID() ) ?></span></h3>

        <div class="single-container" id="audiovisual">

            <div class="single-content">
                <?php the_title( '<p class="page-subtitle">', '</p>' );?>
                <p class="text"><?php the_field('conteudo'); ?></p>
                <?php the_field('midia'); ?>
            </div>
            
            <div class="single-info">
                <p class="text">Direção: <?php the_field('direcao'); ?></p>
                <p class="text">Figurinista: <span><?php the_field('figurinista'); ?></span></p>
                <div class="gallery-box">
                    <?php echo do_shortcode(get_field('galeria')); ?>
                </div>
            </div>

        </div>

    </div>

<?php get_footer(); ?>