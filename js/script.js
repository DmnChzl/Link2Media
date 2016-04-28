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
      if(navBar == 'static') {
        $('#download-form').html("<div class='row center'><nav><div class='nav-wrapper'><div class='input-field teal lighten-1'><input id='search' type='search' placeholder='URL' required><label for='search'><i class='material-icons'>file_download</i></label><i id='erase' class='material-icons'>close</i></div></div></nav></div>", 1500);
      }
    });

    /* Video Selected */
    $("#video").click(function() {
      media = 'video';
      if(navBar == 'static') {
        $('#download-form').html("<div class='row center'><nav><div class='nav-wrapper'><div class='input-field teal lighten-1'><input id='search' type='search' placeholder='URL' required><label for='search'><i class='material-icons'>file_download</i></label><i id='erase' class='material-icons'>close</i></div></div></nav></div>", 1500);
      }
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
          $('#download-form').html("<div class='progress'><div class='indeterminate'></div></div>", 1500);
          $.ajax({
            method: "POST",
            url: "php/script.php",
            data: {
              "link": link,
              "media": media
            },
            success: function(data) {
              navBar = 'static';
              data = JSON.parse(data);
              if(data.success == 1) {
                $('#download-form').html("<h2 class='header center orange-text'>Corrupt Link</h2>", 1500);
              } else {
                $('#download-form').html("<form method='post' action='php/download.php'><input id='download-button' type='hidden' name='filename'><input class='waves-effect waves-light btn-large teal' type='submit' value='Download'></form>");
                $('#download-button').val(data.filename);
                Materialize.toast('Ready !', 3000);
              }
            },
            error: function() {
              navBar = 'error';
              $('#download-form').html("<h2 class='header center red-text'>Fatal Error</h2>", 1500);
            }
          });
        }
      }
    });
  });
})(jQuery);
