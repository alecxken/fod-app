<div id="add_ngo" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">New Foodbank Registration </h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							
                                  {!! Form::open(['method'=> 'post','url' => 'store-foodbank', 'files' => true ]) !!}
                                 
                                       <input type="hidden" name="token" readonly="" value="{{$token}}">
                                <div class="row">

                                <div class="form-group col-md-4 center">
                                    {!! Form::label('weight', 'Company Name ', ['class' => 'awesome'])!!}
                                     <input type="text" name="name" class="form-control input-sm">
                                </div>



                                
                                <div class="form-group col-md-4 center">
                                    {!! Form::label('weight', 'Physical Addresss ', ['class' => 'awesome'])!!}
                                    <input type="text" name="physical_address" class="form-control input-sm">
                                </div>

                                <div class="form-group col-md-4 center">
                                    {!! Form::label('weight', 'Company Locations ', ['class' => 'awesome'])!!}
                                    <input type="text" name="location" class="form-control input-sm">
                                </div>

                              
                                <div class="form-group col-md-4 center">
                                    {!! Form::label('weight', 'Company Email Address', ['class' => 'awesome'])!!}
                                    <input type="email" name="email" class="form-control input-sm">
                                </div>

                             
                                <div class="form-group col-md-4 center">
                                    {!! Form::label('weight', ' Contact Person MobileNo', ['class' => 'awesome'])!!}
                                    <input type="NUMBER" name="phone_number" class="form-control input-sm">
                                </div>


                               

                            <div class="form-group col-md-4">
                                   {!! Form::label('weight', 'Company Image', ['class' => 'awesome'])!!}
                              <input type="file" name="image" required="" class="form-control">
                            </div>


                                 <div class="form-group col-md-12 center">
                                    {!! Form::label('weight', ' Contact Description', ['class' => 'awesome'])!!}
                                    <input type="text" name="description" class="form-control input-sm">
                                </div>

                         
								
									</div>
                            </div>
									<div class="modal-footer">
										   {{ Form::submit('Click To Register', array('class' => 'btn btn-success pull-right')) }}

									</div>
								  {!!Form::close()!!}
							</div>
						</div>
					</div>
				</div>