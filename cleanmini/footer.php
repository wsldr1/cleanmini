<?php 
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #page div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @link clean_mini
 * @package clean_mini
 * @since 1.0
 */
?>
<footer>
  <div id='sidebar' class="sidebar" style="list-style: none">
        <?php dynamic_sidebar('sidebar 2'); ?>
      </div>
      <?php wp_footer();?>


</footer>
