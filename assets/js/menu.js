// menu

function Menu () {

    var self = this;
    var Nav = "";
    var NavWidth = "";
    var NavPosition = "";
    var WindowWidth = "";
    var GridWidth = "";    
    
    /* --------------------------------------- METHODS ---------------------------------------- */

    
    //function to expand and retract menu
    this.expand = function(){
        Nav = jQuery('nav').css( "left" );
        NavPosition = parseInt(Nav);
            
            if(NavPosition == 0) {
                jQuery('nav').css( "left", -300 );
            }
            else{
                jQuery('nav').css( "left", 0 );
            }
        
        NavPosition = parseInt(Nav);
        WindowWidth = jQuery(window).innerWidth();
        GridWidth = WindowWidth + NavPosition;

        jQuery('.grid').css( "margin-left", -NavPosition );
        
        setTimeout(
            function() 
            {
                Masonry().size();
                Masonry().masonryinit();
            }, 400);

    };
    
	/* ---------------------------------------- EVENTS ---------------------------------------- */

    jQuery('#logo').click(function(){self.expand();}); 
    
};