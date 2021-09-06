	
    @extends('layouts.master')
@section('content')
    <!-- Page Header -->
							<div class="page-header">
								<div class="row">
									<div class="col-sm-12">
										<h3 class="page-title">KNOWLEDGE BASE</h3>
										<ul class="breadcrumb">
											<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
											<li class="breadcrumb-item active">KNOWLEDGE BASE</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /Page Header -->
					
					
						@if(!empty($dropdown)) @foreach($dropdown as $c)
                         @if($c->column_name == 'category')
                                                    
                                                
						  <div class="col-md-12 job-list">							
								<div class="job-list-det">
									<div class="job-list-desc">
										<h3 class="job-list-title">{{$c->item}}</h3>
										<h4 class="job-department">Read and View {{$c->item}} Details by clicking below links</h4>
										<br>
										<div class="row">
									 @if(!empty($collection))
										@foreach ($collection as $item)
											@if ($item->category == $c->item)
											<div class="col-md-3">
					                     <a href="{{url('view-data-content/'.$item->file)}}" class="text-dark"> <p><i class="fa fa-dot-circle-o text-purple mr-2"></i>{{$item->title}}</p>
											</a></div>
											@endif
											
										@endforeach
									 @else
									 <p>No Data Uploaded Yet</p>
									 @endif
									
									
									</div>
								
								</div>
							
					      	</div>

						</div>
						 @endif @endforeach @endif

                         @endsection



							
				