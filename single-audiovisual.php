<?php get_header(); ?>

    <div class="section-inner page" id="page-portfolio">
            
        <h3 class="page-title">Portfólio <a href="<?= get_post_type_archive_link( get_post_type( get_the_ID() ) ) ?>" class="page-subtitle"><?php echo get_post_type( get_the_ID() ) ?></a></h3>

        <div class="single-container" id="audiovisual">

            <div class="single-content">
                <?php the_title( '<p class="page-subtitle">', '</p>' );?>
                <p class="text"><?php the_field('conteudo'); ?></p>
                <?php the_field('midia'); ?>
                <?php the_field('midia_alternativa'); ?>
                <?php if ( get_field('internal_video') ) : ?>
                    <video width="100%" controls>
                      <source src="<?php the_field('internal_video'); ?>" type="video/mp4">
                      Your browser does not support HTML video.
                    </video>
                <?php endif; ?>
                <?php if ( get_field('link1') ) : ?>
                    <p class="alternative_link">
                        <img src="<?= get_template_directory_uri() ?>/assets/icons/follow_link.svg" alt="">
                        <a target="_blank" href="<?php the_field('link1'); ?>">
                            <?php the_field('link1_title'); ?>
                        </a>
                    </p>
                <?php endif; ?>
                <?php if ( get_field('link2') ) : ?>
                    <p class="alternative_link">
                        <img src="<?= get_template_directory_uri() ?>/assets/icons/follow_link.svg" alt="">
                        <a target="_blank" href="<?php the_field('link2'); ?>">
                            <?php the_field('link2_title'); ?>
                        </a>
                    </p>
                <?php endif; ?>
                <?php if ( get_field('link3') ) : ?>
                    <p class="alternative_link">
                        <img src="<?= get_template_directory_uri() ?>/assets/icons/follow_link.svg" alt="">
                        <a target="_blank" href="<?php the_field('link3'); ?>">
                            <?php the_field('link3_title'); ?>
                        </a>
                    </p>
                <?php endif; ?>
            </div>
            
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

                <div class="gallery-box">
                    <?php echo do_shortcode(get_field('galeria')); ?>
                </div>

            </div>

        </div>

    </div>

<?php get_footer(); ?>