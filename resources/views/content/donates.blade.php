<div id="update_foodbanks" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-md" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">CAPTURE NEW DONATION </h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							
                    {!! Form::open(['method'=> 'post','url' => 'store_donation', 'files' => true ]) !!}
                    <div class="row">
                       
                            

                        <div class="form-group col-md-12">
                                 {{ Form::label('email', 'Food Banks') }}
                                 {{ Form::date('food_bank','', array('id'=>'food_bank','class' => 'form-control input-sm','readonly')) }}
                            </div>
                            <div class="form-group col-md-12">
                                 {{ Form::label('email', 'Donor  Name') }}
                                 {{ Form::text('donor_name','', array('id'=>'donor_name','class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-12">
                                 {{ Form::label('email', 'Donor  Email') }}
                                 {{ Form::email('donor_email','', array('id'=>'donor_email','class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-12">
                                 {{ Form::label('email', 'Drop-Off  Date') }}
                                 {{ Form::date('donation_date','', array('id'=>'donor_date','class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-12">
                                 {{ Form::label('email', 'Drop-Off  Date') }}
                                 {{ Form::date('location','', array('id'=>'location','class' => 'form-control input-sm','readonly')) }}
                            </div>


                    
                              <div class="form-group col-md-12">
                                    {{ Form::label('Perishable Goods ', '') }}
                                       <select class="form-control input-sm" name="State" required="">
                                         <option value="">Select State</option>
                                           @if(!empty($dropdowns)) 
                                            @foreach($dropdowns as $c)
                                            @if($c->column_name == 'cooling')
                                                <option>{{$c->item}}</option>                  
                                            @endif
                                            @endforeach
                                            @endif                                      
                                        </select>
                                </div>    


          

                                <div class="form-group col-md-12">
                                {{ Form::label('email', 'Donation Description') }}
                                {{ Form::textarea('description','', array('class' => 'form-control input-sm','maxlength'=>'10' ,'rows'=>'2')) }}
                               </div>
                        </div>	</div>
									<div class="modal-footer">
										   {{ Form::submit('Click To Submit', array('class' => 'btn btn-success pull-right')) }}

									</div>
								  {!!Form::close()!!}
							</div>
						</div>
					</div>
