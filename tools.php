<!-- Check Out Modal -->
<div class="modal fade" id="checkOutModal" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="checkOutModalLabel">Check Out Tools</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Please fill out the following information in order to check out/borrow tools.

        <br /><br />

        <form name="toolCheckOutForm" id="toolCheckOutForm">
            <div class="form-group">
                <label for="toolNameField">Name</label>
                <input type="text" class="form-control" id="toolNameField" placeholder="Ex: Johnny Appleseed">
            </div>
            <div class="form-group">
                <label for="toolOutIDField">Tool ID</label>
                <input type="tel" class="form-control" id="toolOutIDField" placeholder="Ex: 111222">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="checkOutTool()" id="toolCheckOutButton" name="toolCheckOutButton">Check Out</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Check In Modal -->
<div class="modal fade" id="checkInModal" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="checkInModalLabel">Check In Tools</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="toolInIDField">Tool ID</label>
                <input type="tel" class="form-control" id="toolInIDField" placeholder="Ex: 111222">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Check In</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#checkOutModal"><br /><i class="fas fa-upload fa-10x"></i><br /><br />Check Out Tools<br /><br /></button>
        <br /><br />
    </div>
    <div class="col-sm-3">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#checkInModal"><br /><i class="fas fa-download fa-10x"></i><br /><br />Check In Tools<br /><br /></button>
    </div>
    <div class="col-sm-3"></div>
</div>

<script>
    function checkOutTool() {

        // Need to add API page & need to implement feedback modals

        // Show Loader
        $("#toolCheckOutButton").html("Sending Info <i class='fas fa-sync fa-spin'></i>");

        // Send Ajax Request to API
        $.post("api/toolout.php", $("#toolCheckOutForm").serialize())
            .done(function( data ) {
                // Do Actions
                if (data == "Success") {
                    $('#successModalStudent').modal('show');
                } else if (data == "Error") {
                    $('#errorModalStudent').modal('show');
                } else if (data == "Issue") {
                    $('#issueModalStudent').modal('show');
                } else {
                    $('#errorModalStudent').modal('show');
                }
            })
            .fail(function() {
                // No Connection
                $('#connectionModalStudent').modal('show');
            })
            .always(function() {
                // Hide Loader
                $("#studentSubmit").html("Check Out");
            });

    }
</script>
