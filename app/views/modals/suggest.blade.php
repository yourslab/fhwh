  <!-- Modal -->
  <div class="modal fade" id="suggestions" tabindex="-1" role="dialog" aria-labelledby="Suggestions?" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Have any suggestions for us?</h4>
        </div>
        <div class="modal-body">
          <form action="{{ action('UserController@registerMessage') }}" accept-charset="UTF-8" id="suggest-form" role="form" method="POST">
            <div class="form-group">
              <label for="suggest-name">Name</label>
              <input type="text" class="form-control" id="suggest-name" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="suggest-email">Email</label>
              <input type="text" class="form-control" id="suggest-email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="suggest-message">Suggestion</label>
              <textarea class="form-control" id="suggest-message" rows="3" placeholder="Enter suggestion"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="suggest-submit" class="btn btn-primary">Send</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->