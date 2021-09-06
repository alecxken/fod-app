@extends('layouts.main')
@section('content')  
  @section('extracss')

    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">
 
@endsection
@section('extrajs')
   <script src="{{asset('jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script> 

@endsection
@section('content')

  
  <div class="row">
                    

                    <div class="  col-md-12">
                        <div class="card shadow-sm ctm-border-radius">
                           
                        </div>
                        <div class="ctm-border-radius shadow-sm card">
                            <div class="card-body">

                                <!--Content table-->
                                <div class="table-back employee-office-table">
                                    <div class="table-responsive" id="table_wrapper">
                                           <table class="table table-bordered table-striped table-sm small " id="users-table">
                                            <thead>
                                                <tr>
                                                   <th>Full Name</th>   
                                                   <th>Contact Number</th>
                                                   <th>Extension Number</th>
                                                  <th>Department</th> 
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
                                                       
                                                      ajax: '{!! route('staff.index') !!}',
                                                      columns: [
                                                          { data: 'full_name', name: 'full_name' },
                                                          { data: 'phone_no', name: 'phone_no' },
                                                          { data: 'ext_no', name: 'ext_no' },
                                                          { data: 'department', name: 'department' },
                                                          { data: 'action', name: 'action' }
                                                          
                                                         
                                                      ]
                                                  });
                                              });
                                              </script>
                                              @endpush
      
                                    </div>
                                </div>
                                <!-- /Content Table -->

                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Add Contact The Modal -->
    <div class="modal fade" id="add-department">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Add New User</h4>

                      {{ Form::open(['method'=> 'post','url' => 'store-ess-staff']) }}
                                        
                                    
              
                   
                    <div class="input-group mb-3">
                          <select class="form-control select2" name="user_id" Required>
                            <option value="">Please Select Staff Email Address </option>
                             @if(!empty($users))                                
                                  @foreach ($users as $use)
                                      <option>{{$use->email}}</option>
                                  @endforeach
                              @endif
                       </select>
                    </div>

                    <div class="input-group mb-3">
                          <select class="form-control select2" name="department" Required>
                            <option value="">Please Select Staff Department </option>
                               @if(!empty($dropdown)) @foreach($dropdown as $c)
                                                 @if($c->column_name == 'department')
                                                      <li>
                          <a href="{{url('content-query/'.$c->item)}}">{{$c->item}}</a>
                        </li>
                                                 @endif @endforeach @endif
                       </select>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="full_name" placeholder="User Full Name">
                    </div>

                     <div class="input-group mb-3">
                        <input type="text" class="form-control" name="role" placeholder="User Role/Position Name">
                    </div>

                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="phone_no" placeholder="User Phone Number">
                    </div>

                     <div class="input-group mb-3">
                        <input type="number" class="form-control" name="ext_no" placeholder="87100000">
                    </div>

                  
                    <button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3"
                        data-dismiss="modal">Cancel</button>
                    <button type="submit"
                        class="btn btn-theme  button-1 text-white ctm-border-radius float-right">Save</button>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
   
                         
@include('admin.modallinks')

  <script type="text/javascript">
    //display modal form for task editing
     $(document).ready(function(){

    var url = "edit-user";

    $('.open-modal').click(function(){
        var task_id = $(this).val();

        $.get(url + '/' + task_id, function (data) {
            //success data
            console.log(data);
            $('#taskid').val(data.user_id);
            $('#phone_no').val(data.phone_no);
            $('#ext_no').val(data.ext_no);
            $('#departments').text(data.department);
            $('#full_name').val(data.full_name);
             $('#user_id').val(data.email);
                    
            $('#edit-user').modal('show');
        }) 
    });
  });


     
    </script>
     

    @endsection

