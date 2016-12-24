$(document).ready(function(){
//+------------------------------------------+
// featured-tab-menu
//+------------------------------------------+
    $("#featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
    $("ul.featured-head li:first").addClass("active");//show first tab is active
    $("#featured-tab-container .tab-menu-content:first").show();//show first content is of tab
    $("ul.featured-head li").click(function(){
        var attr = $(this).find("a").attr("href");
        $("#featured-tab-container .tab-menu-content").hide(); //hide all contenet of tab
        $("ul.featured-head li").removeClass("active");//remove all active class
        $(this).addClass("active");//active the tab that you click this
        $(attr).fadeIn();//fade in the content of tab you click on this
        return false;
    });
//+------------------------------------------+
// jQeury menu-icon hover
//+------------------------------------------+
    $("main nav#main-menu ul li a").hover(function(){
        var icon_class = $(this).find("i").attr("class"); 
        var c_icon_class = icon_class.substr(14);
        c_icon_class = "icon-animals c" + c_icon_class;
        $(this).find("i").removeClass(icon_class).addClass(c_icon_class);
    } , function(){
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
    var moretext = "Readmore";
    var lesstext = "ShowLess";
    $('.more').each(function() {
        var content = $(this).html();
        if(content.length > showChar) {
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
            $(this).html(html);
        }
    });
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
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
    $(".product .product-content .filter-title").click(function(e){
        e.preventDefault();
        $(this).find(".filter-content").att("display" , "none");
        return false;
    });
    $(".product-content-filter .filter-content ul li a").click(function(e){
        e.preventDefault();
        return false;
    });
//+------------------------------------------+
// product-filter
//+------------------------------------------+
    var containerEl = document.querySelector('.product-item-container');
    var mixer = mixitup(containerEl);
});
