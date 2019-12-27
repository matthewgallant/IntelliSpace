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
                <input type="text" class="form-control" id="toolNameField" name="toolNameField" placeholder="Ex: Johnny Appleseed">
            </div>
            <div class="form-group">
                <label for="toolOutIDField">Tool ID</label>
                <input type="tel" class="form-control" id="toolOutIDField" name="toolOutIDField" placeholder="Ex: 111222">
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
        <form name="toolCheckInForm" id="toolCheckInForm">
            <div class="form-group">
                <label for="toolInIDField">Tool ID</label>
                <input type="tel" class="form-control" id="toolInIDField" name="toolInIDField" placeholder="Ex: 111222">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="checkInTool()" id="toolCheckInButton" name="toolCheckInButton">Check In</button>
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

<!-- Success Modal -->
<div class="modal fade" id="successModalToolOut" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Check Out Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        The Tool Has Been Checked Out Successfully!

        <br /><br />

        <i class="far fa-check-circle fa-10x"></i>
      </div>
      <div class="modal-footer">
        <a href="main.php" class="btn btn-primary btn-block">Close</a>
      </div>
    </div>
  </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModalToolOut" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Check Out Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        An Unknown Error Has Occured. Please Try Again Later.

        <br /><br />

        <i class="far fa-times-circle fa-10x"></i>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Issue Modal -->
<div class="modal fade" id="issueModalToolOut" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="issueModalLabel">Check Out Issue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        Please Fill In All Of The Fields Provided.

        <br /><br />

        <i class="far fa-times-circle fa-10x"></i>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Connection Modal -->
<div class="modal fade" id="connectionModalToolOut" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="connectionModalLabel">Connection Issue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        This Device Does Not Seem To Have An Active Internet Connection.

        <br /><br />

        <i class="fas fa-wifi fa-10x"></i>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModalToolIn" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Check In Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        The Tool Has Been Checked In Successfully!

        <br /><br />

        <i class="far fa-check-circle fa-10x"></i>
      </div>
      <div class="modal-footer">
        <a href="main.php" class="btn btn-primary btn-block">Close</a>
      </div>
    </div>
  </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModalToolIn" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Check In Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        An Unknown Error Has Occured. Please Try Again Later.

        <br /><br />

        <i class="far fa-times-circle fa-10x"></i>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Issue Modal -->
<div class="modal fade" id="issueModalToolIn" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="issueModalLabel">Check In Issue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        Please Fill In All Of The Fields Provided.

        <br /><br />

        <i class="far fa-times-circle fa-10x"></i>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Connection Modal -->
<div class="modal fade" id="connectionModalToolIn" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="connectionModalLabel">Connection Issue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        This Device Does Not Seem To Have An Active Internet Connection.

        <br /><br />

        <i class="fas fa-wifi fa-10x"></i>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    function checkOutTool() {

        // Show Loader
        $("#toolCheckOutButton").html("Sending Info <i class='fas fa-sync fa-spin'></i>");

        // Send Ajax Request to API
        $.post("api/toolout.php", $("#toolCheckOutForm").serialize())
            .done(function( data ) {
                // Do Actions
                if (data == "Success") {
                    $('#successModalToolOut').modal('show');
                } else if (data == "Error") {
                    $('#errorModalToolOut').modal('show');
                } else if (data == "Issue") {
                    $('#issueModalToolOut').modal('show');
                } else {
                    $('#errorModalToolOut').modal('show');
                }
            })
            .fail(function() {
                // No Connection
                $('#connectionModalToolOut').modal('show');
            })
            .always(function() {
                // Hide Loader
                $("#toolCheckOutButton").html("Check Out");
            });

    }

    function checkInTool() {

        // Show Loader
        $("#toolCheckInButton").html("Sending Info <i class='fas fa-sync fa-spin'></i>");

        // Send Ajax Request to API
        $.post("api/toolin.php", $("#toolCheckInForm").serialize())
            .done(function( data ) {
                // Do Actions
                if (data == "Success") {
                    $('#successModalToolIn').modal('show');
                } else if (data == "Error") {
                    $('#errorModalToolIn').modal('show');
                } else if (data == "Issue") {
                    $('#issueModalToolIn').modal('show');
                } else {
                    $('#errorModalToolIn').modal('show');
                }
            })
            .fail(function() {
                // No Connection
                $('#connectionModalToolIn').modal('show');
            })
            .always(function() {
                // Hide Loader
                $("#toolCheckInButton").html("Check In");
            });

    }
</script>
