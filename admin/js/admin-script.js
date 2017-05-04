    jQuery( document ).ready( function ( $ ) {
    $('.chosen').chosen({
      placeholder_text_single: "انتخاب کنید",
      no_results_text: "موردی یافت نشد",
      width: "100%"
    });
    $(document).on('click' , '.icon-menus' , function(e){
        e.preventDefault();
        console.log('it work');
        $(this).next(".menu-icons-wrapper").slideToggle();
    });
    $(".select2dropdown").select2({width: '470',theme: "classic"});
    //
    var file_frame;
    $( '.rng-button-banner' ).live( 'click', function ( event ) {
        event.preventDefault();
        window.next_element = $( this ).next( '.rng-link-banner' );
        if ( file_frame ) {
            file_frame.open();
            return;
        }
        file_frame = wp.media.frames.file_frame = wp.media();

        file_frame.on( 'select', function () {
            attachment = file_frame.state().get( 'selection' ).first().toJSON();
            next_element.val( attachment.url );
        } );
        file_frame.open();
    } );
});