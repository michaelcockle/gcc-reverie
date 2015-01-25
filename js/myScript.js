/* Author:

$(document).ready(function() {
	//$('body').css('color','green');
}); // End Doc Ready -----
*/


//alert('boo');

/*
Modernizr.load({
  test : Modernizr.touch,
  yep  : ['http://michaelcockle.co.uk/wp-content/themes/mc/js/yep.js'],
  nope : ['http://michaelcockle.co.uk/wp-content/themes/mc/js/nope.js'],
  complete: function() {
	 jQuery.noConflict();
	 console.log('Yepnope Working');
	 //alert('boo');
	 //jQuery('h2#desc, .page h2').textshadow();
	 //jQuery('body').css('color','green');

  }
});
*/
console.log('LOADED -> myScript.js');


// Hide Menu bar in mobile phones --------

(function( win ){
	var doc = win.document;

	// If there's a hash, or addEventListener is undefined, stop here
	if( !location.hash && win.addEventListener ){
		//scroll to 1
		window.scrollTo( 0, 1 );
		var scrollTop = 1,
			getScrollTop = function(){
				return win.pageYOffset || doc.compatMode === "CSS1Compat" && doc.documentElement.scrollTop || doc.body.scrollTop || 0;
			},
			//reset to 0 on bodyready, if needed
			bodycheck = setInterval(function(){
				if( doc.body ){
					clearInterval( bodycheck );
					scrollTop = getScrollTop();
					win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
				}
			}, 15 );
		win.addEventListener( "load", function(){
			setTimeout(function(){
					//reset to hide addr bar at onload
					win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
			}, 0);
		} );
	}
})( this );


$(document).ready(function() {
  $('body').css('color','green');
}); // End Doc Ready -----
// $(function(){
//   console.log('argh');
// });


/* Isotope responsive eg


$(function(){

    var $container = $('#container');


      // add randomish size classes
      $container.find('.element').each(function(){
        var $this = $(this),
            number = parseInt( $this.find('.number').text(), 10 );
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });

    $container.isotope({
      itemSelector : '.element',
      // disable resizing
      resizable: false,
      // set columnWidth to a percentage of container width
      masonry: {
        columnWidth: $container.width() / 5
      },
      getSortData : {
        symbol : function( $elem ) {
          return $elem.attr('data-symbol');
        },
        category : function( $elem ) {
          return $elem.attr('data-category');
        },
        number : function( $elem ) {
          return parseInt( $elem.find('.number').text(), 10 );
        },
        weight : function( $elem ) {
          return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
        },
        name : function ( $elem ) {
          return $elem.find('.name').text();
        }
      }
    });

    // update columnWidth on window resize
    $(window).smartresize(function(){
      $container.isotope({
        // set columnWidth to a percentage of container width
        masonry: {
          columnWidth: $container.width() / 5
        }
      });
    });


      var $optionSets = $('#options .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');

        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }

        return false;
      });



      $('#insert a').click(function(){
        var $newEls = $( fakeElement.getGroup() );
        $container.isotope( 'insert', $newEls );

        return false;
      });

      $('#append a').click(function(){
        var $newEls = $( fakeElement.getGroup() );
        $container.append( $newEls ).isotope( 'appended', $newEls );

        return false;
      });



      // change size of clicked element
      $container.delegate( '.element', 'click', function(){
        $(this).toggleClass('large');
        $container.isotope('reLayout');
      });

      // toggle variable sizes of all elements
      $('#toggle-sizes').find('a').click(function(){
        $container
          .toggleClass('variable-sizes')
          .isotope('reLayout');
        return false;
      });


    var $sortBy = $('#sort-by');
    $('#shuffle a').click(function(){
      $container.isotope('shuffle');
      $sortBy.find('.selected').removeClass('selected');
      $sortBy.find('[data-option-value="random"]').addClass('selected');
      return false;
    });

  });

*/

