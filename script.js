$(document).ready(function(){
$('.faq li.q').click(function () {
  $(this).next('.faq li.a').slideToggle();
  $(this).parent().addClass('active');
  $(this).parent().siblings().children('.faq li.a').slideUp();
  $(this).parent().siblings().removeClass('active';)
});
});
