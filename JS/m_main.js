// nav
var timeout    = 200;
var closetimer = 0;
var ddmenuitem = 0;
function jsddm_open()
{  jsddm_canceltimer();
   jsddm_close();
   ddmenuitem = $(this).find('ul').css('visibility', 'visible');}
function jsddm_close()
{  if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}
function jsddm_timer()
{  closetimer = window.setTimeout(jsddm_close, timeout);}
function jsddm_canceltimer()
{  if(closetimer)
   {  window.clearTimeout(closetimer);
      closetimer = null;}}
$(document).ready(function()
{  $('#nav > li').bind('mouseover', jsddm_open)
   $('#nav > li').bind('mouseout',  jsddm_timer)});
document.onclick = jsddm_close;



// topnav
var timeout    = 200;
var closetimer = 0;
var ddmenuitem = 0;
function jsddm_open()
{  jsddm_canceltimer();
   jsddm_close();
   ddmenuitem = $(this).find('ul').css('visibility', 'visible');}
function jsddm_close()
{  if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}
function jsddm_timer()
{  closetimer = window.setTimeout(jsddm_close, timeout);}
function jsddm_canceltimer()
{  if(closetimer)
   {  window.clearTimeout(closetimer);
      closetimer = null;}}
$(document).ready(function()
{  $('#topnav > li').bind('mouseover', jsddm_open)
   $('#topnav > li').bind('mouseout',  jsddm_timer)});
document.onclick = jsddm_close;



// product tabs
$(document).ready(function() {
	$(".product-tab-content").hide();
	$("ul#product-tab li:first").addClass("active").show();
	$(".product-tab-content:first").show();
	$("ul#product-tab li").click(function() {
		$("ul#product-tab li").removeClass("active"); 
		$(this).addClass("active"); 
		$(".product-tab-content").hide(); 
		var activeTab = $(this).find("a").attr("href"); 
		$(activeTab).show();
		return false;
	});
});



// modal window
$(document).ready(function() {	
	$('a[name=modal]').click(function(e) {
		e.preventDefault();
		var id = $(this).attr('href');
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		$('#mask').fadeIn(500);	
		var winH = $(window).height();
		var winW = $(window).width();
		$(id).fadeIn(500); 
	});
	$('.window .close').click(function (e) {
		e.preventDefault();
		$('#mask, .window').hide();
	});		
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
	
});



// add to bookmark
function bookmarksite(){
if (document.all)
window.external.AddFavorite(location.href, document.title);
else if (window.sidebar)
window.sidebar.addPanel(document.title, location.href, "")
}