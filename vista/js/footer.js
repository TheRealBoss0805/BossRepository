/* scroll to top */
function totop_button(a) {
    var b = $("#totop");
    b.removeClass("off on");
    if (a == "on"){ 
        b.addClass("on"); 
    } else { 
        b.addClass("off"); }
}
window.setInterval(function () {
    var b = $(this).scrollTop();
    var c = $(this).height();
    if (b > 0) { 
        var d = b + c / 2; 
    } else { 
        var d = 1; }
    if (d < 1e3) { 
        totop_button("off"); 
    } else { 
        totop_button("on"); }
}, 300);

$("#totop").click(function (e) {
    e.preventDefault();
    $('body,html').animate({scrollTop:0},800, 'easeOutExpo');
});
/* --- end scroll to top*/