  <!-- Modal -->
  <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="Contact Us" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Feel free to contact us!</h4>
        </div>
        <div class="modal-body">
        <div class="alert alert-info" id="contact-sending" style="display:none;">Sending, please wait...</div>
        <div class="alert alert-success" id="contact-success" style="display:none;">Your message was sent!</div>
        <div class="alert alert-danger" id="contact-errors" style="display:none;padding:0 5% 0 5%;"></div>
          <form action="{{ action('UserController@registerMessage') }}" accept-charset="UTF-8" id="contact-form" role="form" method="POST">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" id="password" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" name="message" id="message" rows="3" placeholder="Enter message"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" id="contact-submit" class="btn btn-primary">Send</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->