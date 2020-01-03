<!-- Copyright Modal -->
<div class="modal fade" id="copyrightModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="copyrightModalLabel">About <b>IntelliSpace SMT</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3">
                    <img src="resources/gallant-media.png" class="img-fluid" alt="Gallant Media Logo">
                </div>
                <div class="col-sm-9">
                    <h3><b>IntelliSpace SMT</b></h3>
                    <h6>Version <?php echo $system_version; ?></h6>
                    <h6>&copy <?php echo date("Y"); ?> <a href="https://gallantmedia.us" target="_BLANK">Gallant Media</a>. All rights reserved.</h6>
                    <h6>Licensed to: <?php echo $system_name; ?></h6>
                </div>
            </div>
            <br />
            <b>Warning:</b> This software is protected by copyright law and international treaties. Unauthorized reproduction or distribution of this program, or any portion of it, may result in severe civil and criminal penalties, and will be prosecuted to the maximum extent possible under law.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div style="text-align: center;">
    <p><a data-toggle="modal" data-target="#copyrightModal">Powered by <b>IntelliSpace SMT</b></a></p>
</div>