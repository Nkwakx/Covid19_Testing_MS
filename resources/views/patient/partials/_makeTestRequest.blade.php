@csrf

<div id="make_test_request" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PLEASE CONFIRM AND GROUP PEOPLE THAT WILL TEST IN ONE PLACE</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-4">
                    <h6 style="text-color:blue">ARE YOU GOING TO TEST IN A SAME PLACE?</h6>
                    <div class="form-check">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="med_aid_question"
                                id="med_aid_question" value="Yes">
                            <label class="form-check-label" for="med_aid_question">
                                Yes
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="med_aid_question"
                                id="med_aid_question" value="No">
                            <label class="form-check-label" for="med_aid_question">
                                No
                            </label>
                        </div>
                    </div>
                </div>
               <div class="row">
                    <div class="form-group col-md-7">
                        <label class="control-label">Select those that are going to test and group those that will test in one place</label>
                        <div class="mb-3">
                           
                           </div>
                    </div>
               </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Confirm and submit</button>
            </div>
        </div>
    </div>
</div>
