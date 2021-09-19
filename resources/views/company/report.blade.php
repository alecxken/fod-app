@extends('layouts.template')
@section('extracss')
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('extrajs')
      <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

@endsection
@section('content')

        <div class="col-md-12" >
          <div class="row">
          
            <div class="page-header">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="page-title">Donations Reports</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                  <li class="breadcrumb-item active">Donations</li>
                </ul>
              </div>
        
            </div>
            </div>
        </div>
      </div>

     <hr>
    <div class="card card-success">
        <div class="card-header ">
            <p class="card-title  ">Reports </p>
              {!! Form::open(['method'=> 'post','url' => 'get-report', 'files' => true ]) !!}
                     <div class="row">
                       
   
                               <div class="form-group col-md-3 center">
                                    {!! Form::label('weight', ' From ', ['class' => 'awesome'])!!}
                                     <input type="date" name="from" class="form-control input-sm">
                                </div>
                                  <div class="form-group col-md-3 center">
                                    {!! Form::label('weight', ' To ', ['class' => 'awesome'])!!}
                                     <input type="date" name="to" class="form-control input-sm">
                                </div>
                                 <div class="form-group col-md-3 center">
                                    {!! Form::label('weight', 'Company Location ', ['class' => 'awesome'])!!}
                                  
                                     <select class="form-control" name="status">
                                             <option value="">Select Status</option>
                                              <option value="New">New Donations</option> 
                                              <option value="Received">Received Donations</option>  
                                              <option value="Pending">Undelivered Donations</option>                   
                                            
                                               
                                     </select>
                                </div>
                                 <div class="form-group col-md-3 center">
                                    {!! Form::label('weight', 'Action ', ['class' => 'awesome'])!!}
                                     <button type="submit" class="form-control btn btn-success"> <i class="fa fa-search"></i> Search</button>
                                </div>
                      
                         
                              </div>
                               {!!Form::close()!!}
         </div> 
        <div class="card-body" id="table_wrapper">    
      

    <table id="report-table" class="table  table-bordered table-responsive table-striped table-sm small " id="users-table">
        <thead>
            <tr>
              <th>Token</th> 
               <th>Donor</th>
               <th>FoodBank</th>
               <th>Description </th>     
               <th>Donation_Date</th>  
               <th>Status</th>  
            
            </tr>
        </thead>
        <tbody>
          @if(!empty($data))
          @foreach($data as $values)
          <tr>
              <td>{{$values->token ?? ''}}</td>
              <td>{{$values->donor ?? ''}}</td>
              <td>{{$values->food_bank ?? ''}}</td>
              <td>{{$values->description ?? ''}}</td>
              <td>{{$values->donation_date ?? ''}}</td>
              <td>{{$values->status ?? ''}}</td>
            
          </tr>
          @endforeach
          @endif
        </tbody>
    </table>

  </div>
</div>
<script type="text/javascript">
  
     $(document).ready(function() {
var table = $('#report-table').DataTable(
    {
    paging     : true,
    lengthChange: true,
    searching   : true,
    ordering   : true,
    info       : true,
    autoWidth   : true,
    buttons: [
       'excel'
    ]
    });

    table.buttons().container()
        .appendTo( '#table_wrapper .col-sm-6:eq(0)' );

} );
</script>


  @endsection