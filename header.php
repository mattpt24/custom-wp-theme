<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
  <meta charset="<?php bloginfo('charset');?>">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <!-- GRABS THINGS LIKE CSS & CDN's FROM FUNCTIONS.PHP -->
    <?php wp_head();?>
    <!--  -->
    
</head>
<body <?php body_class();?>>



<!-- NAVBAR -->
<header class="site-header">
    <nav class="navbar__container">
        <a class="nav__logo" href="<?php echo site_url()?>">CompanyName</a>

        <ul class="nav__list">
            <li><a class="nav__link" href="<?php echo site_url('/page-one')?>">Page 1</a></li>
            <li><a class="nav__link" href="<?php echo site_url('/page-two')?>">Page 2</a></li>
            <li><a class="nav__link" href="<?php echo site_url('/page-three')?>">Page 3</a></li>
            <li><a class="nav__link" href="<?php echo site_url('/page-four')?>">Page 4</a></li>
            <li><a class="nav__link" href="<?php echo site_url('/page-five')?>">Page 5</a></li>
        </ul>


        <div class="nav__btn__container">
            <a class="btn btn--dark" href="<?php echo site_url('/contact')?>">Get In Touch</a>
            &nbsp;
            <a class="btn btn--transparent" href="<?php echo site_url('/contact')?>">Sign In</a>
        </div>
    </nav> 
</header>

