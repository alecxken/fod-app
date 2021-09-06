<div id="add_donation" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                       
                            


                            <div class="form-group col-md-4">
                                 {{ Form::label('email', 'Donor  Name') }}
                                 {{ Form::text('ben_name','', array('class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-4">
                                 {{ Form::label('email', 'Donor  Email') }}
                                 {{ Form::text('ben_name','', array('class' => 'form-control input-sm')) }}
                            </div>

                    
                          <div class="form-group col-md-4">
                                {{ Form::label('Donation Category ', '') }}
                                   <select class="form-control input-sm" name="State" required="">
                                     <option value="">Select State</option>
                                       @if(!empty($dropdowns)) 
                                        @foreach($dropdowns as $c)
                                        @if($c->column_name == 'State')
                                            <option>{{$c->item}}</option>                  
                                        @endif
                                        @endforeach
                                        @endif                                      
                                    </select>
                            </div>    


          

                                <div class="form-group col-md-12">
                                {{ Form::label('email', 'Description') }}
                                {{ Form::textarea('alt_ben_mobile_number','', array('class' => 'form-control input-sm','maxlength'=>'10')) }}
                               </div>

                       
                       


                            

                </div>
              
              
                
								
									</div>
									<div class="modal-footer">
										   {{ Form::submit('Click To Submit', array('class' => 'btn btn-success pull-right')) }}

									</div>
								  {!!Form::close()!!}
							</div>
						</div>
					</div>
				</div>