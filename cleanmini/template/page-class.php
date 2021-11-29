<?php
/**
 *
 * Displays post elements
 * @package clean_mini
 * @since 1.0
 */

class Page_load
{
  public function load_posts(){
    if( have_posts() ){
      $i = 0;
      while( have_posts() ){
      
        the_post();
        ?>
  
      <div class='post-container' <?php post_class();?>>
          <?php $this->title_behaviour(); ?>
          <div class= 'date'>
      <p><?php echo the_date();?>
            </p>
        </div>
        <div class='content'><?php  
          if(is_home() || is_search()){

            the_excerpt();
            }
          else{
            the_content();
            wp_link_pages();
          } ?>
        <?php  if (has_category()){the_category();} 
               if (has_tag()){the_tags();}?>

          <p><?php the_author(); ?></p>
          <?php  
          if(!is_home())
          {
          previous_post_link($format = '%link');
          ?></br>
          <?php
          next_post_link($format = '%link');
          }?>
        
        </div>

        <div class= 'comments' style ="margin-left:1em">
              <?php comments_number();?> 
              <?php  comments_template(); ?>
        </div>
        <?php
        if(is_home() || is_search())
        {
          ?>
          <div class='expand-btn'>
          <div class='rect'>
            <a class='exp-col' href= '<?php echo get_permalink();?>'><?php echo sprintf(__('Read More','clean-mini')) ?></a>
          </div>
          </div>
        <?php }
        ?>

      </div>



      <?php
      wp_reset_postdata();
      }
    }
  }

  public function title_behaviour(){
    if(is_home()){
      get_theme_mod('title_behaviour',true);
      switch(get_theme_mod('title_behaviour',true)){
      
        case('no'):
          ?>
          <h1><?php echo the_title();?></h1>
          <?php
        break;

         case('same'):
          ?>
          <a href='<?php echo get_permalink(); ?>'><?php the_title(); ?></a>
          <?php
        break;
      
        case('new'):
          ?>
          <a href='<?php echo get_permalink(); ?>' target="_blank" > <?php the_title() ?> </a>
          <?php
        break;
      }
    }
    else{
      ?>
      <a href='<?php echo get_permalink(); ?>'> <?php the_title() ?> </a>
      <?php
    }
  }

}
?>