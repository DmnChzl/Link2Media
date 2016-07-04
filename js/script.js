(function($){

  /* PreLoader */
  $(window).load(function() {
    $('#status').fadeOut();
    $('#preloader').delay(300).fadeOut('slow');
  });

  "use strict";

  $(document).ready(function() {
    "use strict";

    var media = 'audio';
    var navBar = 'fix';
    var offSet = $("#download-form").offset().top;
    
    $('.parallax').parallax();
    $(".main").toggleClass('fadeInCenter', true);

    /* NavBar Behavior */
    $(window).scroll(function() {
      var scrollTop = $(document).scrollTop();
      if(scrollTop > offSet && navBar == 'fix') {
        $("#download-form").toggleClass('fixed', true);
      } else {
        $("#download-form").toggleClass('fixed', false);
      }
    });

    /* Audio Selected */
    $("#audio").click(function() {
      media = 'audio';
    });

    /* Video Selected */
    $("#video").click(function() {
      media = 'video';
    });

    /* Input Empty */
    $("#erase").click(function() {
      $("input#search").val('');
    });

    /* Download Form */
    $('#search').keyup(function (event) {
      if (event.keyCode == 13) {
        if ($("input#search").val().length == 0) {
          Materialize.toast('Please complete this field.', 3000);
        } else {
          navBar = 'wait';
          $("#download-form").toggleClass('fixed', false);
          var link = $("input#search").val();
          $("#download-form").addClass('inactive');
		  $("#download-progress").removeClass('inactive');
	      $("#download-progress").addClass('active');
		  $.ajax({
            method: "POST",
            url: "php/script.php",
            data: {
              "link": link,
              "media": media
            },
			dataType: "json",
            success: function(data) {
              navBar = 'static';
              if(data.success == 1) {
				$("#download-progress").removeClass('active');
				$("#download-progress").addClass('inactive');
				$("#download-form").removeClass('inactive');
                Materialize.toast('Corrupt link !', 3000);
              } else {
				$("#download-progress").removeClass('active');
				$("#download-progress").addClass('inactive');
				$("#download-button").removeClass('inactive');
    	        $("#download-button").addClass('active');
				$('#download-button').val(data.filename);
                Materialize.toast('Ready !', 3000);
              }
            },
            error: function() {
			  $("#download-progress").removeClass('active');
	          $("#download-progress").addClass('inactive');
	          $("#download-form").removeClass('inactive');
              $('#download-form').html("<h3 class='header center red-text'>Fatal Error</h3>", 1500);
            }
          });
        }
      }
    });
	
	/* Download Button */
    $("#download-submit").click(function() {
      console.log(media);
      $("input#search").val('');
      $("#download-button").removeClass('active');
      $("#download-button").addClass('inactive');
      $("#download-form").removeClass('inactive');
      Materialize.toast('Downloading...', 3000);
    });
  });
})(jQuery);
