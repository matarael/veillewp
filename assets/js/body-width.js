jQuery(document).ready(function($) {
    
	var self = this;
	var colonneMax = ($(window).innerWidth() - $(window).innerWidth() % 300) / 300;
    /* --------------------------------------- METHODS ---------------------------------------- */
	
	//dimensionne projectContainer
	this.size = function(){
		colonneMax = ($(window).innerWidth() - $(window).innerWidth() % 300) / 300;
		$( ".grid" ).css( 'width', 300 * colonneMax - 20 + 'px');
	};
	
	/* ---------------------------------------- EVENTS ---------------------------------------- */

	 //dimensionne projectContainer au lancement de la page
		self.size();
	//dimensionne projectContainer si la taille de la fenetre est modifié
		$(window).resize(function(){self.size();}); 
		
	/* ------------------------------------ DOCUMENT.READY ------------------------------------ */
});