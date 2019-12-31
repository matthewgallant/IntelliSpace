<!-- Form -->
<form name="studentForm" id="studentForm">
    <div class="form-group">
        <label for="nameField">Full Name</label>
        <input type="text" class="form-control" id="nameField" name="nameField" placeholder="Ex: Johnny Appleseed">
    </div>
    <div class="form-group">
        <label for="gradeSelect">Grade</label>
        <select class="form-control" id="gradeSelect" name="gradeSelect">
            <option>Freshman</option>
            <option>Sophomore</option>
            <option>Junior</option>
            <option>Senior</option>
            <option>Other</option>
        </select>
    </div>
    <div class="form-group">
        <label for="classField">Class Name</label>
        <input type="text" class="form-control" id="classField" name="classField" placeholder="Ex: English">
    </div>
    <div class="form-group">
        <label for="teacherField">Teacher Name</label>
        <input type="text" class="form-control" id="teacherField" name="teacherField" placeholder="Ex: Mr. Appleseed">
    </div>
    <div class="form-group">
        <label for="gradeSelect">Period</label>
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
    <button type="button" name="studentSubmit" id="studentSubmit" class="btn btn-primary btn-block" onclick="checkInStudent()">Check In</button>
</form>

<!-- Success Modal -->
<div class="modal fade" id="successModalStudent" data-backdrop="static" tabindex="-1" role="dialog">
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
        <a href="main.php" class="btn btn-primary btn-block">Close</a>
      </div>
    </div>
  </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModalStudent" data-backdrop="static" tabindex="-1" role="dialog">
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
<div class="modal fade" id="issueModalStudent" data-backdrop="static" tabindex="-1" role="dialog">
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
<div class="modal fade" id="connectionModalStudent" data-backdrop="static" tabindex="-1" role="dialog">
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
    function checkInStudent() {

        // Show Loader
        $("#studentSubmit").html("Sending Info <i class='fas fa-sync fa-spin'></i>");

        // Send Ajax Request to API
        $.post("api/students.php", $("#studentForm").serialize())
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
                $("#studentSubmit").html("Check In");
            });

    }
</script>