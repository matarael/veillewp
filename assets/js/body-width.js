jQuery(document).ready(function($) {
    
	var self = this;
	var colonneMax = ($(window).innerWidth() - $(window).innerWidth() % 250) / 250;
    /* --------------------------------------- METHODS ---------------------------------------- */
	
	//dimensionne projectContainer
	this.size = function(){
		colonneMax = ($(window).innerWidth() - $(window).innerWidth() % 250) / 250;
		$( ".grid" ).css( 'width', 250 * colonneMax - 10 + 'px');
	};
	
	/* ---------------------------------------- EVENTS ---------------------------------------- */

	 //dimensionne projectContainer au lancement de la page
		self.size();
	//dimensionne projectContainer si la taille de la fenetre est modifié
		$(window).resize(function(){self.size();}); 
		
	/* ------------------------------------ DOCUMENT.READY ------------------------------------ */
});