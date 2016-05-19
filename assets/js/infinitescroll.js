function InfiniteScroll () {

    var loader = jQuery('.loader');                     //gif loader
    var busy = false;                                   //chargement en cours ou non
    var i = 1;
    var offset = jQuery('.grid-item:last').offset();
    
/* --------------------------------------- METHODS ---------------------------------------- */
    
    

/* ---------------------------------------- EVENTS ---------------------------------------- */
    jQuery(window).scroll(function(){
        if( ( ( offset.top+jQuery('.grid-item:last').height() ) - jQuery(window).height() <= jQuery(window).scrollTop() ) 
            && busy == false
        ) {
            
            i++;            //on incrément le numéro de page à charger
            busy = true;    //On est occupé
            loader.show();  //on affiche le loader
            
            //jQuery.get(document.location.href + 'page/' + i + '.grid > *')
            //.done( function ( data ) { 
                //alert(data);
                //alert( jQuery('.grid', data ).html() );
                
                //masque le loader
                //loader.hide();
                
                //var newitem = jQuery(data).html(data);
                //alert(newitem);
                
                //on ajoute les nouveaux articles
                //jQuery('.grid-item:last').after( data );
                //newitem.appendTo(".grid");
                //alert();
                //on met à jour la valeur offset du dernier article
                //offset = jQuery('.grid-item:last').offset();
                
                //jQuery('.grid').masonry( 'appended', newitem, true );
                //jQuery('.grid').append( newitem ).masonry( 'appended', "".grid-item"" );
                
                
                //on met a jour busy
                //busy = false;
            //} )
            //.fail(  );
            
            
            var page_url = document.location.href + 'page/' + i;
            
            jQuery.get(page_url, function(data){
                $("#menu_content").html( $(data).find('#content').html());
            })
            
        }
        
    })


};