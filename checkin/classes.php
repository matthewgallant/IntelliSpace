<div style="text-align: center;">
    <br />
    <h3>Class Check In</h3>
    <br />
</div>

<!-- Form -->
<form name="classForm" id="classForm">
    <div class="form-group">
        <label for="teacherField">Teacher Name</label>
        <input type="text" class="form-control" id="teacherField" name="teacherField" placeholder="Ex: Mr. Appleseed">
    </div>
    <div class="form-group">
        <label for="classField">Class Name</label>
        <input type="text" class="form-control" id="classField" name="classField" placeholder="Ex: English">
    </div>
    <div class="form-group">
        <label for="periodSelect">Period</label>
        <select class="form-control" id="periodSelect" name="periodSelect">
            <option>Period 1</option>
            <option>Period 2</option>
            <option>Period 3</option>
            <option>Period 4</option>
            <option>Period 5</option>
            <option>Period 6</option>
            <option>Period 7</option>
            <option>Period 8</option>
            <option>Period 9</option>
            <option>Period 10</option>
        </select>
    </div>
    <div class="form-group">
        <label for="descriptionArea">Description of Activity</label>
        <textarea class="form-control" id="descriptionArea" name="descriptionArea" rows="3" placeholder="Ex: Book Projects"></textarea>
    </div>
    <button type="button" name="classSubmit" id="classSubmit" class="btn btn-primary btn-block" onclick="checkInClass()">Check In</button>
</form>

<!-- Success Modal -->
<div class="modal fade" id="successModalClass" data-backdrop="static" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Check In Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        You've Been Checked In Successfully!

        <br /><br />

        <i class="far fa-check-circle fa-10x"></i>
      </div>
      <div class="modal-footer">
        <a href="./" class="btn btn-primary btn-block">Close</a>
      </div>
    </div>
  </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModalClass" data-backdrop="static" tabindex="-1" role="dialog">
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
<div class="modal fade" id="issueModalClass" data-backdrop="static" tabindex="-1" role="dialog">
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
<div class="modal fade" id="connectionModalClass" data-backdrop="static" tabindex="-1" role="dialog">
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
    function checkInClass() {

        // Show Loader
        $("#classSubmit").html("Sending Info <i class='fas fa-sync fa-spin'></i>");

        // Send Ajax Request to API
        $.post("api/classes.php", $("#classForm").serialize())
            .done(function( data ) {
                // Do Actions
                if (data == "Success") {
                    $('#successModalClass').modal('show')
                } else if (data == "Error") {
                    $('#errorModalClass').modal('show')
                } else if (data == "Issue") {
                    $('#issueModalClass').modal('show')
                } else {
                    $('#errorModalClass').modal('show')
                }
            })
            .fail(function() {
                // No Connection
                $('#connectionModalClass').modal('show')
            })
            .always(function() {
                // Hide Loader
                $("#classSubmit").html("Check In");
            });

    }
</script>