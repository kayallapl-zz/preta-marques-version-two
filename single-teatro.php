<?php get_header(); ?>

    <div class="section-inner page" id="page-portfolio">
            
        <h3 class="page-title">Portfólio  <a href="<?= get_post_type_archive_link( get_post_type( get_the_ID() ) ) ?>" class="page-subtitle"><?php echo get_post_type( get_the_ID() ) ?></a></h3>

        <div class="single-container" id="teatro">

            <?php the_title( '<p class="page-subtitle">', '</p>' );?>
            
            <div class="single-info">

                <?php if ( get_field('direcao') ) : ?>
                    <p class="text">Direção: <?php the_field('direcao'); ?></p>
                <?php endif; ?>

                <?php if ( get_field('figurinista') ) : ?>
                    <p class="text">Figurinista: <span <?php if (get_field('assistente_de_figurino') == "") echo "class=\"highlighted\""; ?>><?php echo get_field('figurinista'); ?></span></p>
                <?php endif; ?>

                <?php if ( get_field('assistente_de_figurino') ) : ?>
                    <p class="text">Assistente de Figurino: <span class="highlighted"><?php the_field('assistente_de_figurino'); ?></span></p>
                <?php endif; ?>

            </div>

            
            <div class="gallery-bigbox">
                <?php echo do_shortcode(get_field('galeria')); ?>
            </div>

        </div>

    </div>

<?php get_footer(); ?>