( function($) {
    
   wp.customize('text_color', function( value ){
        value.bind( function( newVal ){
                live_preview_setting(newVal, '--text-color');
        });
    });

   wp.customize('text_second_color', function ( value ){
       value.bind( function(newVal){
            live_preview_setting(newVal,'--text-second-color');
       });
   });

   wp.customize('custom_background_color', function( value ){
       value.bind( function(newVal){
            live_preview_setting(newVal, '--custom-background-color');
       });
   });

   wp.customize('custom_highlight_color1', function( value ){
       value.bind(function(newVal){
           live_preview_setting(newVal, '--highlight-color1');
       });
   });
   wp.customize('post_custom_background_color', function( value ){
       value.bind(function(newVal){
            live_preview_setting(newVal,'--post-background-color');
       });
   });

   wp.customize('custom_h1_color', function( value ){
       value.bind(function( newVal ){
            live_preview_setting(newVal,'--h1-color');
       });
   });
}( jQuery ));

function live_preview_setting(value, property){
    var rootSelector = document.querySelector(':root');
    rootSelector.style.setProperty(property,value);

}

