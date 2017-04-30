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
});