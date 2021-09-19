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
                <h3 class="page-title">Donations Action Section</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                  <li class="breadcrumb-item active">Donations Section</li>
                </ul>
              </div>
          
            </div>
            </div>
        </div>
      </div>

     <hr>
    <div class="card card-success">
        <div class="card-header ">
            <p class="card-title  ">Registered Donations </p>
         </div> 
        <div class="card-body">    
      

    <table class="table  table-bordered table-responsive table-striped table-sm small " id="users-table">
        <thead>
            <tr>
              <th>Token</th> 
               <th>Donor</th>
               <th>FoodBank</th>
               <th>Description </th>     
               <th>Donation_Date</th>  
               <th>Status</th>  
              <th> Action</th> 
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
         
        ajax: '{!! route('donations.index') !!}',
        columns: [

            { data: 'token', name: 'token' },
            { data: 'donor', name: 'donor' },
            { data:'food_bank',name: 'food_bank'},
            { data: 'description', name: 'description' },
            { data: 'donation_date', name: 'donation_date' },
            { data: 'status', name: 'status' },
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
                url: "gets-foodbank/"+id,
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(data) {
                 
                    console.log(data);

                    $('#token').val(data.token);
                    $('#donor').val(data.donor);
                    $('#donation_date').val(data.donation_date);
                    $('#status').val(data.status);
                
                     $('#modaldemo2').show();                                
                    
                }
            });
        });


</script>
  

  @include('company.viewdonor')
  @endsection