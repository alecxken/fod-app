@extends('layouts.main')
@section('extracss')
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('extrajs')
      <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

@endsection
@php 


@endphp


@section('content')


  <div class="row" data-aos="fade-up">
    <div class="col-lg-12">
      <div class="card card-success">
        <div class="card-header ">
            <p class="card-title  ">Scheduling donation Donation To  {{$data->name ?? ''}} Foodbank </p></br>
                    {!! Form::open(['method'=> 'post','url' => 'store_donation_foodbank', 'files' => true ]) !!}
                    <div class="row">
                       
                            

                        <div class="form-group col-md-4">
                                 {{ Form::label('email', 'Food Banks') }}
                                 {{ Form::text('food_bank',$data->name ?? '', array('id'=>'food_bank','class' => 'form-control input-sm','readonly')) }}
                            </div>
                            <div class="form-group col-md-4">
                                 {{ Form::label('email', 'Donor  Name') }}
                                 {{ Form::text('donor_name','', array('id'=>'donor_name','class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-4">
                                 {{ Form::label('email', 'Donor  Email') }}
                                 {{ Form::email('donor_email','', array('id'=>'donor_email','class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-6">
                                 {{ Form::label('email', 'Drop-Off  Date') }}
                                 {{ Form::date('donation_date','', array('id'=>'donor_date','class' => 'form-control input-sm')) }}
                            </div>


                    
                              <div class="form-group col-md-6">
                                    {{ Form::label('Donating Perishable Goods ? ', '') }}
                                       <select class="form-control input-sm" name="cooling" required="">
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
    @endsection