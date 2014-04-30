$(document).ready(function(){

  function reset_register_form() {
    $('#register-form').each(function(){
      this.reset(); //remove all previously filled forms
    });    
  }

  reset_register_form();

  function reset_message_forms(type) {
    if($('#'+type+'-submit').attr('disabled')) { //check if the submit button is diabled
      $('#'+type+'-submit').prop('disabled', false); //enable submit button again
      $('#'+type+'-form').each(function(){
        this.reset(); //remove all previously filled forms
      });
    }
  }

  reset_message_forms('contact');
  reset_message_forms('suggest');

  function csrf_send() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      }
    });
  }
  
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
  $('.cta-button').click(function() {
    csrf_send();
    var email = $('.cta-email').val();
    var count = $('input[name=count]').val();
    var captcha = $('input[name=captcha]').val();

    $.ajax({
      type: 'post',
      url: '/register/user/email',
      dataType: 'json',
      data: {
        email : email, captcha : captcha, count : count
      },
      success: function(data) {
        if (data.errors) { //if there are errors
          $('#cta-errors').html(''); //clear any previous errors from previous submit
          for (var i = 0; i < data.errors.length; i++) { //loop through each error
            $('#cta-errors').append(function() { //return and append each error
              return data.errors[i]; //add errors to div
            });
          } 
          $('#cta-errors').fadeIn();
        } else if (data.success) { //if write is successful
          $('#cta-errors').hide(); 
          $('.cta-button').hide(); 
          $('.cta-email').hide();
          $('.icheck-container').fadeIn(); //show type choices
        }
      }
    });
  });

  //cta last phase
  $('.icheck').on('ifChecked', function(){
    csrf_send();
    var type = $('.icheck:checked').val();
    //hide choices
    $('.icheck-container').hide();

    $.ajax({
      type: 'post',
      url: '/register/user/type',
      dataType: 'json',
      data: {
        type : type
      }
    });    

    //show thank you
    $('.thanks').fadeIn();
  });

  //Message AJAX DRY function
  function message(type) {
    csrf_send();
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

  //submit contact form using AJAX
  $('#contact-submit').click(function() {
    message('contact');
  });

  //submit suggestion form using AJAX
  $('#suggest-submit').click(function() {
    message('suggest');
  });

});