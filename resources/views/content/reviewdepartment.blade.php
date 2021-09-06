@extends('layouts.main')
@section('content')
@section('extracss')
  <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/Ionicons/css/ionicons.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/line-awesome/css/line-awesome.min.css')}}">
 <link rel="stylesheet" href="{{asset('myfiles/css/style2.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css')}}">
 @endsection
	<!-- Page Header -->

						{{-- 	<div class="page-header">
								<div class="row">
									<div class="col-sm-12">
										<h3 class="page-title">{{$dept}} </h3>
										<ul class="breadcrumb">
											<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
											<li class="breadcrumb-item active">{{$dept}}</li>
										</ul>
									</div>
								</div>
							</div> --}}
							<!-- /Page Header -->
				{{--  --}}

<div class="row">

	<div class="card card-file">
		<div class="col-md-12">
<div class="table-responsive">
<table class="table table-striped custom-table mb-0 datatable">
<thead>
<tr>
<th >#</th>
<th>Document Category </th>
<th>Department </th>
<th>Description </th>
<th> Size  </th>
<th class="text-right">Action</th>
</tr>
</thead>
<tbody>
	@if(!empty($collection))
										@foreach ($collection as $file)
											     	@if ($file->department == $dept)
<tr>
	<td>  @if($file->type == 'docx')
																		<i class="fa fa-file-word-o"></i>
                                                                        @elseif($file->type == 'txt')
                                                                        <i class="fa fa-file-text-o"></i>
                                                                        @elseif($file->type == 'pdf')
                                                                        <i class="fa fa-file-pdf-o"></i>
                                                                        @elseif($file->type == 'ppt')
                                                                        <i class="fa fa-file-powerpoint-o"></i>
                                                                        @elseif($file->type == 'mp3')
                                                                        <i class="fa fa-file-audio-o"></i>
                                                                         @elseif($file->type == 'mp4')
                                                                        <i class="fa fa-file-video-o"></i>
                                                                        @elseif($file->type == 'xls')
                                                                        <i class="fa fa-file-excel-o"></i>
                                                                        @endif</td>
                                                                        <td>{{$file->category ?? ''}}</td>
                                                                        <td>{{$file->department ?? ''}}</td>
                                                                        <td>{{$file->name ?? ''}}</td>
                                                                        <td> <span>{{$file->size * 0.001}} kb</span></td>
                                                                        <td><a href="{{url('content-view/'.$file->id)}}" class="badge badge-success">View File</a></td>
</tr>
@endif
@endforeach
@endif
</tbody>
</table>
</div>
</div>
</div>


</div>
@section('extrajs')

	<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js')}}"></script>
@endsection						
				
@endsection