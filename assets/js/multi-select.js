function MultiSelect () {
    
    var orderCount = 0;
    
/* --------------------------------------- METHODS ---------------------------------------- */
    
    

/* ---------------------------------------- EVENTS ---------------------------------------- */



    jQuery('.multiselect').multiselect({
            enableFiltering: true,  
            maxHeight: 200,
            buttonWidth: '260px',
            nonSelectedText: 'choisir des catégories!',
    });

       
    jQuery('#example-order-button').on('click', function() {
        var selectedAuthor = [];
        var selectorCategory = [];
        
        jQuery('.selectorAuthor option:selected').each(function() {
            selectedAuthor.push([jQuery(this).val()]);
        });
        
        jQuery('.selectorCategory option:selected').each(function() {
            selectorCategory.push([jQuery(this).val()]);
        });

        //alert( 'Categorie(s) : ' + selectorCategory + ' & auteur(s) : ' + selectedAuthor );
        //jQuery.post( "index.php", { 'cat[]': [ "Jon", "Susan" ] } );
        jQuery.post( "index.php",
            
            function() {
                alert( "success" );
            })
            .done(function() {
                alert( "second success" );
            })
            .fail(function() {
                alert( "error" );
            })
            .always(function() {
                alert( "finished" );
            });
    });
    
    
    
};