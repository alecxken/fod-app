@extends('layouts.template')
@section('extracss')
<script src="{{asset('jquery/dist/jquery.min.js')}}"></script>
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('asset/vendors/summernote/summernote-bs4.min.css')}}">
@endsection
@section('extrajs')
   
<script src="{{asset('asset/vendors/summernote/summernote-bs4.min.js')}}"></script> 
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

  
  })
</script>
@endsection
@section('content')
  
   <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<div class="row">
  <div class="col-md-12">
    <div class="card card-outline-success">
            <div class="card-header bg-indigo">
                 <h6 class="card-title  ">CONTENT UPLOAD</h6>
            </div> 
      {!! Form::open(['method'=> 'post','url' => 'store-news', 'files' => true ]) !!}
        <div class="card-body"> 
          <div class="row">

           <div class="form-group col-md-12 center">
             {!! Form::label('weight', 'CONTENT TITLE ', ['class' => 'awesome'])!!}
            <input type="text" name="title" class="form-control">
           </div>  

            <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'CONTENT COVER PHOTO', ['class' => 'awesome'])!!}
            <input type="file" name="cover_photo" class="form-control" required="">
           </div>  
              <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'CONTENT CATEGORY ', ['class' => 'awesome'])!!}
              <select class="form-control input-sm" id="category" required="" name="category" >                        
                        <option value="">Select Below</option>
                        <option value="cover">Main Slider</option>
                        <option value="flash">New Alerts</option>
                        <option value="press">Normal News</option>
                  </select>
           </div>

            <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'Any Extra Photo(s)', ['class' => 'awesome'])!!}
             <input type="file" name="pictures[]" multiple="" class="form-control input-sm">
         
           </div>

           <div class="form-group col-md-12 center">
             {!! Form::label('weight', 'Brief Desription', ['class' => 'awesome'])!!}
            <textarea name="brief_desc" maxlength="250" class="form-control"></textarea> 
           </div>  
           <div class="form-group col-md-12 center">
                  {!! Form::label('weight', 'Detailed Desription', ['class' => 'awesome'])!!}
            
              <textarea id="summernote" name="description" placeholder="Enter main content here"></textarea>
           
           </div>

          
         
       </div>



          <div class="box-footer">
          
        
             <button class="btn btn-success " type="Submit">Submit</button>
          </div>

</div>
          
      </div>
     {!!Form::close()!!}
  </div>


  <div class="col-md-12">
    <div class="card card-success">
        <div class="card-header with-border ">
            <center><h6 class="card-title  ">UPLOADED  CONTENT</h6></center>
         </div> 
        <div class="card-body">    
      

    <table class="table table-bordered table-striped table-sm small " id="users-table">
        <thead>
            <tr>
              <th>Category</th> 
               <th>Content Title</th>
               <th>cover photo</th>
             
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
         
        ajax: '{!! route('ekecontent.index') !!}',
        columns: [
         { data: 'category', name: 'category' },
            { data: 'name', name: 'name' },
           
            { data: 'cover_photo', name: 'cover_photo' },
            { data: 'action', name: 'action' }
            // { data: 'id', name: 'id' }
           
        ]
    });
});
</script>
@endpush
      

        </div>
      </div>
    </div>
    <!--   <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script> -->
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
 
  @endsection