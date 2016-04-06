function Masonry () {
    
    var self = this;
	var GridWidth = "" ;
	var GridItemWidth = "" ;
    var BreakPoints = "" ;
    
    /* --------------------------------------- METHODS ---------------------------------------- */
	
	//dimensionne projectContainer
	this.size = function(){
        GridWidth = (jQuery(".grid").width());
        
            if(GridWidth > 1900) {
                GridItemWidth = GridWidth / 6;
            }
            else if(GridWidth > 1500 && GridWidth < 1899 ) {
                GridItemWidth = GridWidth / 5;
            }
            else if(GridWidth > 1300 && GridWidth < 1499 ) {
                 GridItemWidth = GridWidth / 4;
            }
            else if(GridWidth > 1000 && GridWidth < 1299 ) {
                 GridItemWidth = GridWidth / 3;
            }           
            else if(GridWidth > 600 && GridWidth < 999 ) {
                 GridItemWidth = GridWidth / 2;
            }
            else {
                 GridItemWidth = GridWidth / 1;
            }

		jQuery('.grid-item').css( "width", GridItemWidth );
	};
    
    //masonry function
    this.masonryinit = function(){
        jQuery('.grid').masonry({
          itemSelector: '.grid-item',
          columnWidth: (GridItemWidth),
          gutter: 0
        });    
    };
	
	/* ---------------------------------------- EVENTS ---------------------------------------- */
    
    //initialise masonry au chargement de la page
    self.size();
    self.masonryinit();
    
    //réinitialise masonry au redimensionnement de la page
    jQuery(window).resize(function(){self.size();}); 
    jQuery(window).resize(function(){self.masonryinit();});
};