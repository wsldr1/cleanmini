<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package clean_mini
 * @since 1.0
 */
require get_template_directory(). '/template/page-class.php';
get_header();
$demo =false;
$img= 'background-image:url("' .wp_get_attachment_url(get_theme_mod('cover_image')).'")';
$bodyBcImage = 'background-image:url("'.get_theme_mod('custom_background_image'). '")' ;
?>



  <body class=<?php body_class()?> style=<?php  echo $bodyBcImage;?>>
    <div class='banner' style='max-height:800px; <?php echo $img ;?>'>
      <div class='header-container' >
        <h1><a href= "<?php echo get_bloginfo('url')?>"><?php  echo get_bloginfo('name'); ?></a></h1>
        <h2><?php echo get_bloginfo("description");?></h2>
      </div>
        <?php wp_nav_menu(array(
                        'menu' => 'header_menu',
                        'menu_id' => 'header_menu',
                        'menu_class' => 'header-menu',
        ));
        ?>
      
      <?php 
      if(get_theme_mod('cover_image')!= null)
      {
      ?>
      <?php }?>
    </div>
      
    <?php 
    ?>
    <div class = 'sidebar'> <?php dynamic_sidebar('sidebar 1'); ?> </div>
    <?php 
      

    $load_posts = new Page_load();
    $load_posts = $load_posts->load_posts();
    get_footer();
?>