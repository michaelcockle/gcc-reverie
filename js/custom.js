

// 07528374074



$(function () { // Start doc ready
  var dupLink = function() {
   var topAnchor = $('.menu-item.has-dropdown > a');
   $(topAnchor).each(function(i) {
    var txt = $(this).text();
    var href = $(this).attr('href');
    var link = $( '<li><a class="dup-link" href="' + href + '">' + txt + ' </a></li>' );

      // dont make link if its empty
      if (href !== '#') {
        $(this).next('ul').find('.back').after(link);
      }

    });
 }

 if (Modernizr.touch) {
  dupLink();
}

if (window.matchMedia("(min-width:0px) and (max-width:641px)").matches && !(Modernizr.touch)) {
 dupLink();
}










  });// End doc ready.


