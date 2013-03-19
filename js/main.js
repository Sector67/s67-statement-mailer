$(function(){

  $('.loading-indicator').width($('#wrapper').width());
  $('.loading-indicator').height($('#wrapper').height());

  // Submit data for cleaning
  $('#submit').click(function(){
    $('.loading-indicator').fadeIn(200);
    $('#csvform').ajaxSubmit(function(data){
      $('#wrapper').html(data);
      // Scroll to the top or bottom
      $('#scrollToBottom').click(function(){
        $('html, body').animate({
          scrollTop: $('body').height() - $(window).height() + 90
        }, $('body').height()/2);
      });
      $('#scrollToTop').click(function(){
        $('html, body').animate({
          scrollTop: 10
        }, 2000);
      });
      // Run this when the user clicks the big ol button
      $('#bigredbutton').click(function(){
        $('.loading-indicator').width($('#wrapper').width());
        $('.loading-indicator').height($('#wrapper').height());
        $('.loading-indicator').fadeIn(200);
        submitForm();
      });
    });
  });
});

// Submit the cleaned data
function submitForm(){
  var con = confirm('u sure?');
  window.email_headers = [];

  // Generate the email headers and their positions
  $('tr').first().find('td').each(function(){
    window.email_headers.push($(this).text());
  });

  if (con === true){

    // Row index.
    var trid = 0;

    // Total returned
    window.trreturned = 0;

    // Run for each row
    $('tr').each(function(){

      // If it's the first row it's headers, so skip it and increment.
      if (trid++ === 0){
        return;
      }

      // Create an array to store the email
      var this_email = [];

      // Assemble the email
      $(this).find('td').each(function(){
        this_email.push($(this).text());
      });

      // Post the email to the server
      $.post(
        '/mailer.php',
        {
          'headers': window.email_headers,
          'data' :this_email
        },
        function(data){
          window.trreturned++;
        }
      );


      window.trs = trid;
    });
  waitForAll();
  } else {
    $('.loading-indicator').fadeOut(200);
  }
}

function waitForAll(){
  window.waitInterval = window.setInterval(function(){
    if((window.trreturned + 1) == (window.trs)){
      $('.loading-indicator').fadeOut(200);
      window.clearInterval(window.waitInterval);
      alert('Mail sent :)');
    }
  }, 200);
}

