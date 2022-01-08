// Adding class on scroll
$(function () {
  $(document).scroll(function () {
    var $moblieheader = $(".scroll-change");
    $moblieheader.toggleClass(
      "scrolled",
      $(this).scrollTop() > $moblieheader.height()
    );
  });
});

// Adding class after scroll past header
$(function () {
  $(document).scroll(function () {
    var $header = $("header");
    $header.toggleClass(
      "scrolled-mobile",
      $(this).scrollTop() > $header.height()
    );
  });
});
