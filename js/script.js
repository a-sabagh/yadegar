jQuery(document).ready(function ($) {
//+------------------------------------------+
// product-tab HOVER
//+------------------------------------------+
    $('.product-tab ul.tabs li.tab-link').removeClass('current');
    $('.product-tab ul.tabs li.tab-link').first().addClass('current');
    $('.product-tab .tab-content').removeClass('current');
    var f_content = $('.product-tab ul.tabs li.tab-link').first().attr('data-tab');
    $("#" + f_content).addClass('current');
    $('.tabs .tab-link').hover(function () {
        var tab_id = $(this).attr('data-tab');
        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');
        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    });
//+------------------------------------------+
// featured-tab-menu CLICK
//+------------------------------------------+
    $(".toturial-tab .featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
    $(".toturial-tab ul.featured-head li:first").addClass("active");//show first tab is active
    $(".toturial-tab .featured-tab-container .tab-menu-content:first").show();//show first content is of tab
    $(".toturial-tab ul.featured-head li").click(function () {
        var attr = $(this).find("a").attr("href");
        $(".toturial-tab .featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
        $(".toturial-tab ul.featured-head li").removeClass("active");//remove all active class
        $(this).addClass("active");//active the tab that you click this
        $(attr).fadeIn();//fade in the content of tab you click on this
        return false;
    });
    $(".vertical-tab .featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
    $(".vertical-tab ul.featured-head li:first").addClass("active");//show first tab is active
    $(".vertical-tab .featured-tab-container .tab-menu-content:first").show();//show first content is of tab
    $(".vertical-tab ul.featured-head li").click(function () {
        var attr = $(this).find("a").attr("href");
        $(".vertical-tab .featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
        $(".vertical-tab ul.featured-head li").removeClass("active");//remove all active class
        $(this).addClass("active");//active the tab that you click this
        $(attr).fadeIn();//fade in the content of tab you click on this
        return false;
    });
    $(".fqa-tab .featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
    $(".fqa-tab ul.featured-head li:first").addClass("active");//show first tab is active
    $(".fqa-tab .featured-tab-container .tab-menu-content:first").show();//show first content is of tab
    $(".fqa-tab ul.featured-head li").click(function () {
        var attr = $(this).find("a").attr("href");
        $(".fqa-tab .featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
        $(".fqa-tab ul.featured-head li").removeClass("active");//remove all active class
        $(this).addClass("active");//active the tab that you click this
        $(attr).fadeIn();//fade in the content of tab you click on this
        return false;
    });
    $(".product-article .featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
    $(".product-article ul.featured-head li:first").addClass("active");//show first tab is active
    $(".product-article .featured-tab-container .tab-menu-content:first").show();//show first content is of tab
    $(".product-article ul.featured-head li").click(function () {
        var attr = $(this).find("a").attr("href");
        $(".product-article .featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
        $(".product-article ul.featured-head li").removeClass("active");//remove all active class
        $(this).addClass("active");//active the tab that you click this
        $(attr).fadeIn();//fade in the content of tab you click on this
        return false;
    });
//+------------------------------------------+
// featured-tab-menu profile-tab
//+------------------------------------------+


    $(".profile-content .featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
    $(".profile-tab ul.featured-head li:first").addClass("active"); //show first tab is active
    $(".profile-content .featured-tab-container .tab-menu-content:first").show();//show first content is of tab
    $(".profile-tab ul.featured-head li").click(function () {
        var attr = $(this).find("a").attr("href");
        $(".profile-content .featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
        $(".profile-tab ul.featured-head li").removeClass("active");//remove all active class
        $(this).addClass("active");//active the tab that you click this
        $(attr).fadeIn();//fade in the content of tab you click on this
        return false;
    });


//+------------------------------------------+
// jQeury menu-icon hover
//+------------------------------------------+
    $("main nav#main-menu ul li a").hover(function () {
        var icon_class = $(this).find("i").attr("class");
        var c_icon_class = icon_class.substr(14);
        c_icon_class = "icon-animals c" + c_icon_class;
        $(this).find("i").removeClass(icon_class).addClass(c_icon_class);
    }, function () {
        var icon_class = $(this).find("i").attr("class");
        var w_icon_class = icon_class.substr(14);
        w_icon_class = "icon-animals w" + w_icon_class;
        $(this).find("i").removeClass(icon_class).addClass(w_icon_class);
    });
//+------------------------------------------+
// jQeury Custom readmore..
//+------------------------------------------+
    var showChar = 100;
    var ellipsestext = "...";
    var moretext = "نمایش بیشتر";
    var lesstext = "نمایش کمتر";
    $('.more').each(function () {
        var content = $(this).html();
        if (content.length > showChar) {
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
            var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
            $(this).html(html);
        }
    });
    $(".morelink").click(function () {
        if ($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
//+------------------------------------------+
// product-filter-title-toggle
//+------------------------------------------+
    $(".product .product-content .filter-title").click(function (e) {
        e.preventDefault();
        $(".product-content-filter .filter-content").slideToggle();
        return false;
    });
    $(".product-content-filter .filter-content ul li a").click(function (e) {
        e.preventDefault();
        return false;
    });
//+------------------------------------------+
// category-title-toggle
//+------------------------------------------+
    $(".category-box .category-box-title .cb-title-link").click(function (e) {
        e.preventDefault();
        $(".category-box .category-box-content").slideToggle();
        return false;
    });
//+------------------------------------------+
// jquery archive toggler
//+------------------------------------------+
    var test = $(".category .row-post:odd").each(function () {
        var before = $(this).find(".row-post-item .blog-square-in:last-child");
        $(this).find(".row-post-item .blog-square-in:first-child").before(before);
        $(this).find(".row-post-item:first-child .blog-square-in:first-child").remove();
        $(this).find(".row-post-item:last-child .blog-square-in:first-child").remove();
    });
//+------------------------------------------+
// load-more-post
//+------------------------------------------+
    $(".category .rng-load .row-post").slice(0, 3).attr("style", "display: table");
    $(".category .rng-load .load-more #load-more-post").click(function (e) {
        e.preventDefault();
        $(".category .rng-load .row-post:hidden").slice(0, 3).fadeIn("slow").attr("style", "display: table");
        if ($(".category .rng-load .row-post:hidden").length == 0) {
            $(".category .rng-load .load-more #load-more-post").fadeOut("slow");
        }
        return false;
    });
//+------------------------------------------+
// accordian
//+------------------------------------------+
    $(".accordian li").removeClass("active");//remove active class from all li
    $(".accordian li .accordian-panel").hide();//hide all accordian panel
    $(".accordian li").click(function () {
        var content = $(this).children("div.accordian-panel");//define content as accordian panel of clicked li
        if (content.is(":hidden")) {
            $(this).addClass("active").children(".accordian-panel").slideDown(403);//if content hidden slidedown
        } else {
            $(this).removeClass("active").children("div.accordian-panel").slideUp(400);//if content show slideup
        }
    });
//+------------------------------------------+
// load-more-qa
//+------------------------------------------+
    $(".rng-load .qa-accordian .accordian li").slice(0, 4).fadeIn("slow");
    $(".category .rng-load .load-more #load-more-qa").click(function (e) {
        e.preventDefault();
        $(".qa-accordian .accordian li:hidden").slice(0, 3).fadeIn("slow");
        if ($(".qa-accordian .accordian li:hidden").length == 0) {
            $(".category .rng-load .load-more #load-more-qa").fadeOut("slow");
        }
        return false;
    });
//+------------------------------------------+
// Cross-clear
//+------------------------------------------+
    $(".cross-clean").click(function () {
        // alert("it work");
        $(this).prev().val("").focus();
    });
//+------------------------------------------+
// mobile-nav-toggler
//+------------------------------------------+
    $(".nav-btn-meta .btn-search").click(function () {
        $(this).toggleClass("active");
        $("nav#main-menu .mobile-search-wrapper").slideToggle();
    });
//+------------------------------------------+
// mobile-top-menu has-child-class
//+------------------------------------------+
    $("#mobile-top-menu > ul > li").has("ul").addClass("has-child");
    $("#mobile-top-menu > ul > li.has-child").click(function (e) {
        e.preventDefault();
        $(this).children("ul").slideToggle();
        return false;
    });
//+------------------------------------------+
// mobile-menu-toggler
//+------------------------------------------+
    $("#main-menu div.mobile-menu-toggler a").click(function (e) {
        e.preventDefault();
        var value = $(this).text();
        if (value == "منوی بالا") {
            value = "منوی سایدبار";
        } else {
            value = "منوی بالا";
        }
        $(this).text(value);
        $(this).parent().toggleClass("red");
        $("main nav#main-menu #mobile-top-menu").toggleClass("show");
        $("main #main-menu ul.side-menu").toggleClass("hide");
        return false;
    });
    $("#main-menu .nav-btn-meta .btn-menu").click(function (e) {
        e.preventDefault();
        $(this).toggleClass("active");
        $("#main-menu .menu-all").slideToggle();
        return false;
    });
    // if($(".button.text-center a.btn-all").length() == 1){
    //     $(".button.text-center").attr("style" , "height: 0;");
    // }


    //+------------------------------------------+
    // slick-slider
    //+------------------------------------------+
    var slick_selector = $(".pt-slider");
    if (slick_selector.length) {
        $('.pt-slider').slick({
            dots: false
            , slidesToShow: 4
            , responsive: [
                {breakpoint: 1200,
                    settings: {slidesToShow: 3, dots: true}
                }
                , {
                    breakpoint: 992,
                    settings: {slidesToShow: 2, dots: true}
                }
                , {
                    breakpoint: 600,
                    settings: {slidesToShow: 1, dots: true}
                }
            ]
        });
    }

});//jQeury

//--------------------------------------jQuery----------------------------------------+

//--------masonryGrid----------//
var masonry = document.getElementsByClassName("grid");
if (masonry.length) {
//        if (typeof Masonry !== "undefined") {
    var container = document.querySelector('.grid');
    var masonry = new Masonry(container, {
        itemSelector: '.grid-item'
    });
//        }    
}
//--------portfolio-filter----------//
var mixedup_selector = document.getElementsByClassName("product-item-container");
if (mixedup_selector.length) {
    var containerEl = document.querySelector('.product-item-container');
    var mixer = mixitup(containerEl);
}
//--------emailCurrentPage----------//
function emailCurrentPage() {
    window.location.href = "mailto:?subject=" + document.title + "&body=" + escape(window.location.href);
}
//--------printCurrentPage----------//
function printCurrentPage() {
    window.print();
}
