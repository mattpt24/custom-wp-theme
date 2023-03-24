<?php
get_header();


while(have_posts()) {
the_post(); ?>
<div class="page__main__wrapper">
        <h1 style="background-image: url(<?php echo get_theme_file_uri('/images/page-title-bg.jpg')?>)" class="page-banner__title"><?php the_title();?></h1>
        <div class="page__content">


        <?php the_content();?>

        
        <!-- ONLY ON PAGE 22 (CONTACTS PAGE) DISPLAY THIS  -->
        <?php if (is_page(22)){?>
        <h1>This only appears on page 22 (Contact page)</h1>
        <?php } ?>




        </div>
</div>
<?php
}


get_footer();
?>