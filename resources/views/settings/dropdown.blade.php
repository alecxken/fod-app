@extends('layouts.template')
@section('extracss')
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('extrajs')
      <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<!--   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
 -->
@endsection
@section('content')

<div class="row">
  <div class="col-md-4">
    <div class="card card-success">
            <div class="card-header bg-indigo">
                 <h6 class="card-title text-white ">DROPDOWN LIST</h6>
            </div> 
      {!! Form::open(['method'=> 'post','url' => 'store-dropdowns', 'files' => true ]) !!}
        <div class="card-body"> 

           <div class="form-group col-md-12 center">
             {!! Form::label('weight', 'TABLE NAME ', ['class' => 'awesome'])!!}
             <select class="form-control" name="table_name" id="residence">
               <option  value="">SELECT TABLE</option>
               @foreach($tables as  $columns)
                         
                 <option>{{$columns->$dbname}}</option>
               @endforeach
             </select>
           </div>   
            
           <div class="form-group col-md-12 center">
             {!! Form::label('weight', 'COLUMN  NAME ', ['class' => 'awesome'])!!}
              <select class="form-control input-sm" id="subresidence" name="column_name" >                        
                        <option value="">CHOOSE COLUMN</option>
                  </select>
           </div>

            <div class="form-group col-md-12 center">
             {!! Form::label('weight', 'DROPDOWN NAME ', ['class' => 'awesome'])!!}
             <input type="text" name="dropdown_name" class="form-control input-sm">
         
           </div>

          <div class="form-group col-md-12 center">
             {!! Form::label('weight', 'ACTION ', ['class' => 'awesome'])!!}
             <br>
             <button class="btn btn-success form-control" type="Submit">Submit</button>
          </div>

</div>
          
      </div>
     {!!Form::close()!!}
  </div>


  <div class="col-md-8">
    <div class="card card-success">
        <div class="card-header with-border ">
            <center><h6 class="card-title  ">UPLOADED DROPDOWNS SETTINGS</h6></center>
         </div> 
        <div class="card-body">    
      

    <table class="table table-bordered table-striped table-sm small " id="users-table">
        <thead>
            <tr>
              <th>Token</th> 
               <th>Table Name</th>
               <th>Table Column</th>
              <th>Dropdown Item</th>     
              <th>Action</th>   
            </tr>
        </thead>
    </table>

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
         order: [[0, 'desc']],
         
        ajax: '{!! route('dropdowns.index') !!}',
        columns: [
            { data: 'token', name: 'token' },
            { data: 'table_name', name: 'table_name' },
            { data: 'column_name', name: 'column_name' },
            { data: 'item', name: 'item' },
            { data: 'item_desc', name: 'item_desc' },
           
        ]
    });
});
</script>
@endpush
      

        </div>
      </div>
    </div>
      <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript">
    
     $(document).ready(function() {

       var base_url = window.location.origin;
     var url = "get-column";


       $('#residence').change(function(){
         var tokenid = $(this).val();
        $.get(base_url + '/' + url + '/' + tokenid, function (data) {
            //success data
            document.getElementById("subresidence").innerHTML ="";
            document.getElementById("subresidence").innerHTML +='<option value=""> Choose Column </option>';
            console.log(data);
                for (i = 0; i < data.length; i++) {
                  var opt = document.createElement("option");
                  
       document.getElementById("subresidence").innerHTML += ' <option {{ old('source') == ' + data[i] + ' ? 'selected' : '' }} id="' + i + '">' + data[i] + '</option>';
                      }
                         })
                    });
} );
</script>
    </script>
  @endsection