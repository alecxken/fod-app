<div id="modaldemo2" class="modal">
      <div class="modal-dialog" role="document">
         {!! Form::open(['method'=> 'post','url' => 'update-donations', 'files' => true ]) !!}
         <input type="hidden" value="12345678" name="password">
        <div class="modal-content modal-content-demo ">
          <div class="modal-header ">
            <h6 class="modal-title">Update Donations </h6>
            <button type="button" class="close modelClose" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                           <h6></h6>
                            <div class="row">
 <input type="hidden" name="id" id="id" class="form-control input-sm">
                                <div class="form-group col-md-12 center">
                                    {!! Form::label('weight', 'Donor Token ', ['class' => 'awesome'])!!}
                                     <input type="text" name="token" id="token" readonly="" class="form-control input-sm">
                                </div>

                                <div class="form-group col-md-12 center">
                                    {!! Form::label('weight', 'Donor Name ', ['class' => 'awesome'])!!}
                                     <input type="text" name="name" id="donor" readonly="" class="form-control input-sm">
                                </div>

                                
                                <div class="form-group col-md-12 center">
                                    {!! Form::label('weight', 'Donation Date', ['class' => 'awesome'])!!}
                                    <input type="date" name="donotion_date" readonly="" id="donation_date" class="form-control input-sm">
                                </div>

                                <div class="form-group col-md-12 center">
                                    {!! Form::label('weight', 'Received ', ['class' => 'awesome'])!!}
                                    <select class="form-control" name="status">
                                      <option value="">Select Status</option>
                                      <option value="Received">Yes</option>
                                      <option value="Pending">No</option>
                                    </select>
                                </div>

                  </div>



               </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-success">Submit </button>
            <button type="button" class="btn btn-outline-danger modelClose" data-dismiss="modal">Close</button>
          </div>
        </div>
          {!!Form::close()!!}
      </div><!-- modal-dialog -->
    </div>