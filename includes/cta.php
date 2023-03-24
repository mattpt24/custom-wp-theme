
<section id="cta">
 <img src="<?php echo wp_get_attachment_url(get_theme_mod('custom-theme-cta-image'));?>" alt="" class="cta__image">

    <div class="cta__left">
    <h2 class="cta__title"><?php echo get_theme_mod('custom-theme-cta-title')?></h2>
    <p class="cta__subtitle"><?php echo get_theme_mod('custom-theme-cta-subtitle')?></p>
    </div>

    <div class="cta__right">
        <a href="<?php echo get_permalink(get_theme_mod('custom-theme-cta-link'))?>" target="_blank" class="btn btn--light">Learn more</a>
    </div>
</section>
