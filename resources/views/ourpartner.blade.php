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
            <p class="card-title  ">Registered Foodbanks </p></br>
              {!! Form::open(['method'=> 'post','url' => 'get-food', 'files' => true ]) !!}
                     <div class="row">
                       
   
                          <div class="form-group col-md-4 center">
                                    {!! Form::label('weight', 'Company Name ', ['class' => 'awesome'])!!}
                                     <input type="text" name="name" class="form-control input-sm">
                                </div>
                                 <div class="form-group col-md-4 center">
                                    {!! Form::label('weight', 'Company Location ', ['class' => 'awesome'])!!}
                                     @php $locations = \App\models\FoodBank::all()->groupBy('location'); @endphp
                                     <select class="form-control" name="location">
                                             <option value="">Select State</option>
                                           @if(!empty($locations)) 
                                            @foreach($locations as $key => $loc)
                                           
                                                <option>{{$key}}</option>                  
                                            
                                            @endforeach
                                            @endif         
                                     </select>
                                </div>
                                 <div class="form-group col-md-4 center">
                                    {!! Form::label('weight', 'Action ', ['class' => 'awesome'])!!}
                                     <button type="submit" class="form-control btn btn-success"> <i class="fa fa-search"></i> Search</button>
                                </div>
                      
                         
                              </div>
                               {!!Form::close()!!}
                            </div>
                         </div>
                       
                           <div class="card-body">  

                             @if(!empty($content))
                              @foreach($content as $cont)
                        
                               
                               <div class="col-lg-12 center stretch-card grid-margin">
                                <div class="col-sm-4 grid-margin">
                                  <div class="position-relative">
                                    <div class="rotate-img">
                                      <img
                                        src="{{asset('files/'.$cont->image ?? '')}}"
                                        alt="thumb"
                                        class="img-fluid"
                                      />
                                    </div>
                                    <div class="badge-positioned">
                                      <span class="badge badge-danger font-weight-bold"
                                        >{{$cont->name ?? ''}}</span
                                      >
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-sm-8  grid-margin">
                                  <h2 class="mb-2 font-weight-600">
                                   Located in {{$cont->location ?? ''}}
                                  </h2>
                                  <div class="fs-13 mb-2">
                                
                                    <span class="mr-2">    <a href="{{url('receive-donation/'.$cont->id ?? '')}}" class="btn btn-xs btn-success  label-sm  foodbanks">Donate Now to {{$cont->name ?? ''}} </a></span>
                                  </div>
                                  <p class="mb-0">
                                  {{$cont->description ?? ''}}
                                  </p>
                                </div>                               
                                </div>
                                 <hr>
                                  @endforeach
                               @endif
                           </div>

                                 <div class="card-footer">
                                    <div class="row">
                                      <center> <div class="col-sm-4  grid-margin">{{ $content->links() }}</div></center>
                                    </div>
                                 </div>
                </div>
              </div>


    

               <script type="text/javascript">

           $('.modelClose').on('click', function(){
            $('#modal-user').hide();
        });
        var id;
        $('body').on('click', '#foodbanks', function(e) {
            e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id =  $(this).val();
            $.ajax({
                url: "get-foodbank/"+id,
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(data) {
                 
                    console.log(data);
                    $('#task_id').val(data.id);         
                    $('#location').val(data.location); 
                    $('#email').val(data.email);   
                     $('#update_foodbanks').show();                                
                    
                }
            });
        });


</script>
        @include('content.donate')
              @include('content.donates')
@endsection