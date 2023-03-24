

This README contains all the information for setting up a working enviroment ready for 
custom WordPress theme development as well as a help guide for the most used WordPress functions and practices

Matthew Persell-Thompson
Web Developer
-------------










Setting up custom theme development enviroment ------------------------------------------------------------



* Download 'Local' to create local WP sites (localwp.com)

* This cloned github respository should be downloaded into the local wordpress site's 'wp-content/themes' directory

* Change the name of this directory from 'custom-wp-theme' to 'project-name-custom-theme' 

* Main plugins used - ACF , All In One Migration



///////////////////////////////////////////////////////////////////////////


DOWNLOAD ALL NECESSARY PACKAGES & DEPENDENCIES (Compiling, Live Reloading)
Make sure node.js is installed (node -v)


npm i
npm init -y
npm install laravel-mix --save-dev
npm install webpack-livereload-plugin@1 --save-dev
npm install -g sass



///////////////////




LIVE SERVER SET UP

* Install Live Server VS Code Extension by Ritwick Dey and activate
* Install Live Server Web Extension (Should have the same icon)
* Click 'Go Live' in bottom right corner (Should change to 'Port : 5500')
* Copy the URL of the page that the browser opens up and paste into 'Live Server Address' field in the extension
* Copy the URL of the local Wordpress site's home page (website-name.local) and paste into 'Actual Server Address' field in the extension
* Run 'npx mix watch' and refresh browser
* Test by changing colour of something 



npx mix watch - Compile JS & SCSS files Automatically (Recommended)
npx mix - Compile JS & SCSS files Manually
































WordPress Theme Development Help Guide  ----------------------------





TITLE                            ------   <?php echo the_title();?>

EXCERPT                          ------   <?php echo the_excerpt();?>

CONTENT                          ------   <?php echo get_the_content();?>

IMAGES FROM 'IMAGES' FOLDER      ------   <?php echo get_theme_file_uri('images/picture.png');?>

LINK TO SPECIFIC PAGE            ------   <?php echo site_url('/page-name');?>

ACF CUSTOM FIELDS                ------   <?php echo the_field('name_of_custom_field')?>

CUSTOM 'CUSTOMISE' CONTROLS      ------   <?php echo get_theme_mod('name-of-custom-theme-mod')?> 

MENUS 

    <ul class="">
    <a href="/" class="">
    <?php
    wp_nav_menu( array(
                    'menu'           => 'Your Menu Name',
                    'theme_location' => 'main-menu',
                    'depth'    => 2
                ) );
    ?>
    </a>
    </ul>





SINGLE POST PAGES

single.php                                  -----  Used for individual pages for standard posts

single-custom-post-type-name.php            -----  Used for individual pages for custom post types



PAGE TEMPLATES

// Template Name: Your Page Name Template   -----  Add underneath get_header(); of any page php file and select in correspsonding page on WP to display for specific pages

















THE WORDPRESS LOOP 


/////////////////////////////////////////////////////////////////////////////////////////////////////////////


<?php 

$anyName = new WP_Query(array(
'posts_per_page' => -1,                    
'post_type'      => 'your-post-type-name', 
'orderby'        => 'post_date',
'order'          => 'DESC'
'meta_tag'       => 'custom-field-name'      SPECIFIC FIELD NAME
'meta_value'     => 'custom-field-value'     SPECIFIC FIELD VALUE
 ));
 

while($anyName->have_posts()) {
    $anyName->the_post(); ?>

    <h1><?php echo the_title();?></h1>
    <div><?php echo the_field('your-custom-field')?></div>

<?php 
}?>


/////////////////////////////////////////////////////////////////////////////////////////////////////////////











CUSTOM POST TYPES 


/////////////////////////////////////////////////////////////////////////////////////////////////////////////


1. Create an 'mu-plugins' folder in your local WP sites 'wp-content' folder

2. Create a 'custom-post-type.php' within the 'mu-plugins' folder

3. In this file use the below function to create custom post types (Using 'Projects' as an example)


<?php

function custom_post_types() {

    register_post_type('Projects', array(
        'supports' => array('title', 'except'),
        'rewrite' => array('slug' => 'projects'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'Projects',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'all_items' => 'All Projects',
            'singular_name' => 'Project'
        ),
        'menu_icon' => 'dashicons-admin-home',
    ));

}

add_action('init', 'custom_post_types');

?>



* USE ACF plugin by 'WP Engine' to assign your custom post type custom fields

/////////////////////////////////////////////////////////////////////////////////////////////////////////////














CREATING NEW CUSTOM CUSTOMISE CONTROL


/////////////////////////////////////////////////////////////////////////////////////////////////////////////



function section-name($wp_customize) {

    1. CREATE NEW SECTION IN MAIN 'CUSTOMISE' MENU

    $wp_customize->add_section('section-name', array(
        'title' => 'New Section Name'
    ));
    
    
    2. NAME OF CUSTOM FIELD ** REFER TO BELOW AND WHEN USING THE get_theme_mod FUNCTION

    $wp_customize->add_setting('section-name-title', array(
        'default' => 'This will display as a default!',
    ));
    

    3. NAME & TYPE OF FIELD ALSO WHAT SECTION IT BELONGS TO

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'section-name-title-control', array(
        'label' => 'Section Title',
        'section' => 'section-name',            1. NAME OF SECTION 
        'settings' => 'section-name-title'      2. NAME OF NEW CUSTOM FIELD
        'type' => 'text'                        3. TYPE OF INPUT (text,textarea,dropdown_pages)
    )));    
    
    }
    


    // CUSTOMISABLE IMAGE
    
    $wp_customize->add_setting('new-section-image');
    
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'new-section-image-control', array(
        'label' => 'Section Image',
        'section' => 'new-section',
        'settings' => 'new-section-image',
        'height' => '1080',
        'width' => '1920'
    )));
    

    
    // RUNS THE ABOVE FUNCTION 
    add_action('customize_register', 'new_section');

?>
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
