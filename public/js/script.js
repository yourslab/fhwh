$(document).ready(function(){

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

  //script for cta phase 1
  $('.cta-button').click(function() {
    //hide email textbox and submit button
    $(this).hide();
    $('.cta-email').hide();

    //show choices
    $('.icheck-container').fadeIn();
  });

  //script for cta last phase
  $('.cta-button-last').click(function() {
    //hide choices
    $('.icheck-container').hide();

    //show thank you
    $('.thanks').show();
  });
});