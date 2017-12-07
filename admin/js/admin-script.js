jQuery(document).ready(function ($) {
    $('.chosen').chosen({
        placeholder_text_single: "انتخاب کنید",
        no_results_text: "موردی یافت نشد",
        width: "100%"
    });
    /**
     * Shortcode Creator
     */
    $(".rng-shortcode-creator-wrapper .rng-shortcode").first().show();
    $(".rng-shortcode-creator").change(function () {
        var select_shortcode = $(this).find("option:selected").attr('class');
        $(".rng-shortcode-creator-wrapper .rng-shortcode").hide();
        $(".rng-shortcode-creator-wrapper div." + select_shortcode).slideDown();
    });
    //intro
    $(".create-shortcode-about-intro").click(function () {
        var logo = $(".about-intro-logo").val();
        var header = $(".about-intro-header").val();
        var content = $(".about-intro-caption").val();
        var output = '[intro logo="' + logo + '" header="' + header + '" content= "' + content + '"]';
        $(".about-intro-output").val(output);
    });
    //blog-squre
    $(".create-shortcode-blog-squre").click(function () {
        var title = $(".blog-squre-title").val();
        var caption = $(".blog-squere-caption").val();
        var output = '[blog_squre title="' + title + '" caption= "' + caption + '"]';
        $(".blog-squre-output").val(output);
    });
    //blog-squrehalf
    $(".create-shortcode-blog-squrehalf").click(function () {
        var id = $(".blog-squrehalf-id option:selected").val();
        var title = $(".blog-squrehalf-title").val();
        var caption = $(".blog-squrehalf-caption").val();
        var output = '[blog_squrehalf id="' + id + '" title="' + title + '" caption= "' + caption + '"]';
        $(".blog-squrehalf-output").val(output);
    });
    //product-mix
    $(".create-shortcode-product-mix").click(function () {
        var id = $(".product-mix-id option:selected").val();
        var title = $(".product-mix-title").val();
        var caption = $(".product-mix-caption").val();
        var output = '[product_mix id="' + id + '" title="' + title + '" caption= "' + caption + '"]';
        $(".product-mix-output").val(output);
    });
    //product-tab
    $(".create-shortcode-product-feature").click(function () {
        var cat = [];
        $(".product-feature-cat option:selected").each(function(){
            cat.push(this.value);
        });
        console.log(cat);
        $(".product-feature-cat option:selected").val();
        console.log(cat);
        var title = $(".product-feature-title").val();
        var caption = $(".product-feature-caption").val();
        var output = '[product_tab category="' + cat + '" title="' + title + '" description= "' + caption + '"]';
        $(".product-feature-output").val(output);
    });
    //qa-single
    $(".create-shortcode-qa-single").click(function () {
        var id = $(".qa-single-id option:selected").val();
        var title = $(".qa-single-title").val();
        var caption = $(".qa-single-caption").val();
        var output = '[qa_single id="' + id + '" title="' + title + '" caption= "' + caption + '"]';
        $(".qa-single-output").val(output);
    });
    //qa-tab
    $(".create-shortcode-qa-tab").click(function () {
        var title = $(".qa-tab-title").val();
        var caption = $(".qa-tab-caption").val();
        var output = '[qa_tab title="' + title + '" caption= "' + caption + '"]';
        $(".qa-tab-output").val(output);
    });
    //qa-vtab
    $(".create-shortcode-qa-vtab").click(function () {
        var id = $(".qa-vtab-id option:selected").val();
        var title = $(".qa-vtab-title").val();
        var caption = $(".qa-vtab-caption").val();
        var output = '[qa_vtab id="' + id + '" title="' + title + '" caption= "' + caption + '"]';
        $(".qa-vtab-output").val(output);
    });
    /**
     * Menu icon
     */
    $(document).on('click', '.icon-menus', function (e) {
        e.preventDefault();
        $(this).next(".menu-icons-wrapper").slideToggle();
    });
    /**
     * 
     */
    $(".select2dropdown").select2({width: '470', theme: "classic"});
    /**
     * wp_enqueue_media
     */
    var file_frame;
    $('.rng-button-banner').live('click', function (event) {
        event.preventDefault();
        window.next_element = $(this).next('.rng-link-banner');
        if (file_frame) {
            file_frame.open();
            return;
        }
        file_frame = wp.media.frames.file_frame = wp.media();

        file_frame.on('select', function () {
            attachment = file_frame.state().get('selection').first().toJSON();
            next_element.val(attachment.url);
        });
        file_frame.open();
    });
});