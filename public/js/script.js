$(document).ready(function(){

  function reset_message_forms(type) {
    if($('#'+type+'-submit').attr('disabled')) { //check if the submit button is diabled
      $('#'+type+'-submit').prop('disabled', false); //enable submit button again
      $('#'+type+'-form').each(function(){
        this.reset(); //remove all previously filled forms
      });
    }
  }

  reset_message_forms('contact');

  //script for line radio buttons
  $('.icheck').each(function(){
    var self = $(this),
    label = self.next(),
    label_text = label.text();

    label.remove();
    self.iCheck({
      checkboxClass: 'icheckbox_line-green',
      radioClass: 'iradio_line-green',
      insert: '<div class="icheck_line-icon"></div>' + label_text
    });
  });

  //cta phase 1
  $('.ask-email').submit(function() {
    //hide email textbox and submit button
    $(this).hide();
    $('.cta-email').hide();

    //show choices
    $('.icheck-container').fadeIn();
  });

  //cta last phase
  $('.cta-button-last').click(function() {
    //hide choices
    $('.icheck-container').hide();

    //show thank you
    $('.thanks').fadeIn();
  });

  //Message AJAX DRY function
  function message(type) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      }
    });
    //Convert message form to json string
    var message_form = $('#'+type+'-form').serializeArray();
    //Add extra message identifier parameter to message_form json string  
    message_form.push({name: "message-type", value:type});

    $.ajax({
      type: 'post',
      url: '/register/message',
      dataType: 'json',
      data: message_form,
      beforeSend : function() {
        $('#'+type+'-sending').fadeIn(); //show progress
      },
      success: function(data) {
        $('#'+type+'-sending').hide(); //hide progress
        if (data.errors) { //if there are errors
          $('#'+type+'-errors').html(''); //clear any previous errors from previous submit
          for (var i = 0; i < data.errors.length; i++) { //loop through each error
            $('#'+type+'-errors').append(function() { //return and append each error
                  return '<li>'+data.errors[i]+'</li>'; 
            });
          } //add errors to div
          $('#'+type+'-errors').fadeIn(); //show error div
        } else if (data.success) { //if write is successful
          $('#'+type+'-errors').hide(); //hide the error div
          $('#'+type+'-success').fadeIn(); //show success div
          $('#'+type+'-submit').prop('disabled', true); //disable submit button
        }
      }
    });

  }

  //submit form using AJAX
  $('#contact-submit').click(function() {
    message('contact');
  });

});