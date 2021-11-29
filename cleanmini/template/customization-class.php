<?php
/**
 *
 * Additional class for wordpress customizer
 * @package clean_mini
 * @since 1.0
 */

class Customization_Class{

    public function customize(){
        $mods = array(
          'body{'.$this->background_option(). '}',
          ':root{
            '. $this->margin().'
            '.$this->text_size().'
          --custom-background-color:'.$this->defaults( 'custom_background_color' ). ';
          --highlight-color:'.$this->defaults( 'custom_highlight_color1' ).';
          --highlight-color2:'.$this->defaults( 'custom_highlight_color1' ).';
          --highlight-color3:'.$this->defaults( 'custom_highlight_color1' ).';
          --text-color:'.$this->defaults( 'text_color' ).';
          --text-second-color:'.$this->defaults( 'text_second_color' ).';
          --post-background-color:'. $this->defaults( 'post_custom_background_color' ).';
          --h1-color:' .$this->defaults( 'custom_h1_color' ).'}',
        );
        return $mods;
    }
    
    function defaults( $input ){
      $default = def();
      $mod = get_theme_mod( $input );
      if( $mod === '' || $mod === 'null' || $mod === false ){
        return $default[$input];
      }
      else{
        return $mod;
      }
    
    }
  
    function margin(){
    
      $final = array(
        array(50,400,50,400),
        array(50,700,50,100),
        array(50,100,50,700),
        array(40,400,40,400),
        array(40,600,40,200),
        array(40,200,40,600),
        array(30,400,30,400),
        array(30,500,30,300),
        array(30,300,30,500),
      );
    
      if ( get_theme_mod('custom_page_size_position') ){
        $i = get_theme_mod('custom_page_size_position');
        
        return '--bc-margin-left: calc('.$final[$i][0].'% - ' .$final[$i][1].'px); 
        --bc-margin-right: calc('.$final[$i][2].'% - '.$final[$i][3].'px);';
      }
    }
    function text_size(){
      if( get_theme_mod('text_size'))
      {
        switch(get_theme_mod('text_size')){
          case 0:
            return '--h1-size: 5.875rem;
                    --post-h1: 1.668rem;
                    --content-p-size: 1.25rem;
                    --p-size: 1.25rem;
                    --menu-margin:20%;        
            
            ';
            break;
          case 1:
            return '--h1-size: 4rem;
                    --post-h1: 1.2rem;
                    --content-p-size: 1rem;
                    --p-size: 1.25rem; 
                    --menu-margin: 20%
            ';
            break;
          case 2:
            return '--h1-size: 6.0rem;
                    --post-h1: 1.8rem;
                    --content-p-size: 1.5rem;
                    --p-size: 1.25rem; 
                    --menu-margin: 36%;
            ';
            break;
        }
      }
    
    }
    
    function background_option(){
      if(get_theme_mod('custom_bc_options')){
        switch(get_theme_mod('custom_bc_options'))
        {
          case 'no':
            return '
              background-repeat: no-repeat;
              background-size: auto;
              background-attachment: inherit;';
              
            break;
          case 'fill':
            return '
              background-repeat: no-repeat;
              background-size: cover;
              background-attachment: inherit;';
            break;
          case 'fixed':
            return '
              background-size: cover;
              background-attachment: fixed;
              background-repeat: no-repeat;';
            break;
          case 'checkboard':
            return '
              background-repeat: repeat;
              background-size: 20%;
              background-attachment: inherit;';
            break;
        }
      }
    }
}

?>