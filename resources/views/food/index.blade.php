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
                <h3 class="page-title">FoodBank Section</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                  <li class="breadcrumb-item active">FoodBank Section</li>
                </ul>
              </div>
              <div class="col-auto float-right ml-auto">
                 <a  class="btn add-btn"  href="" data-toggle="modal" data-target="#add_ngo"><i class="fa fa-plus"></i> Register New Food Bank</a>
                           
                 </div>
            </div>
            </div>
        </div>
      </div>

     <hr>
    <div class="card card-success">
        <div class="card-header ">
            <p class="card-title  ">Registered Organizations </p>
         </div> 
        <div class="card-body">    
      

    <table class="table  table-bordered table-responsive table-striped table-sm small " id="users-table">
        <thead>
            <tr>
              <th>Token</th> 
               <th>Company Name </th>
               <th>Location </th>
              <th>Capacity </th>     
              <th>Cooling?</th>  
               <th>Contact Email</th>  
              <th> Action</th> 
            </tr>
        </thead>
    </table>

@push('scripts')

 @include('food.modalcreate')
 
 @include('food.modaledit')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
         order: [[0, 'desc']],
         
        ajax: '{!! route('foodbank.index') !!}',
        columns: [
            { data: 'token', name: 'token' },
            { data: 'name', name: 'name' },
            {data:'location',name: 'location'},
            { data: 'capacity', name: 'capacity' },
            { data: 'cooling', name: 'cooling' },
            // { data: 'phone_number', name: 'phone_number' },
            { data: 'email', name: 'email' },
              { data: 'action', name: 'action' },
           
        ]
    });
});



$('#users-table').on('click', '.btn-delete[data-remote]', function (e) { 
e.preventDefault();
 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var url = $(this).data('remote');
// confirm then
if (confirm('Are you sure you want to delete this?')) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {_method: 'DELETE'}
    }).always(function (data) {
        $('#users-table').DataTable().draw(false);
    });
}else
    alert("You have cancelled!");});
</script>
@endpush
      

        </div>
      </div>
    </div>

    
    <script type="text/javascript">

           $('.modelClose').on('click', function(){
            $('#update_ngo').hide();
        });
        var id;
        $('body').on('click', '#getEditProductData', function(e) {
            e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id =  $(this).val();
            $.ajax({
                url: "gets-ngo/"+id,
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(data) {
                 
                    console.log(data);

                    $('#token').val(data.id);
                    $('#name').val(data.name);
                    $('#physical_address').val(data.physical_address);
                    $('#email').val(data.email);
                    $('#rep_name').val(data.rep_name);
                    $('#rep_phone_number').val(data.rep_phone_number);
                     $('#update_ngo').show();                                
                    
                }
            });
        });


</script>
     
  @endsection