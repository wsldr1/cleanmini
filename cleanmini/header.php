<?php 
/**
 * The template for displaying the header.
 *
 * This is the template that displays all of the head section,
 * the site branding (logo, title, description) and the main menu.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @link clean_mini
 * @package clean_mini
 * @since 1.0
 */

?><!DOCTYPE html>
<html><head <?php language_attributes();?>>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php the_title(); ?></title>
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php
    feed_links();
    wp_body_open();
    wp_head();
  ?>

<style>
    .wp-block-search__input{
  background-color: var(--highlight-color);
  color: var(--h1-color);
  border-radius: 2px;
  }

  .wp-block-search__button{
  background: var(--highlight-color);
  border-radius: 2px solid var(--highlight-color);
  color: var(--text-color);
  
  }
  
  <?php 
    if(get_theme_mod('cover_image')==''){
      ?>
       .banner{
         background-color: var(--post-background-color);
       }
      <?php
    }
  ?>
</style>
</head>

