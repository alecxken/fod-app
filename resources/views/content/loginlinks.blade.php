	
    @extends('layouts.main')
@section('content')
    <!-- Page Header -->
      <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/Ionicons/css/ionicons.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/line-awesome/css/line-awesome.min.css')}}">
 <link rel="stylesheet" href="{{asset('myfiles/css/style2.css')}}">
						
							<!-- /Page Header -->
					
					
					
                       
                                                    
                                                
						  <div class="col-md-12 job-list">							
								<div class="job-list-det">
									<div class="job-list-desc">
										<h3 class="job-list-title">LIVE</h3>
										<h4 class="job-department">Click To View Login Links</h4>
										<br>
										<div class="row">
								
										@foreach ($data as $item)
											  @if($item->type == 'LIVE')
											<div class="col-md-3">
					                     <a href="{{$item->url}}" target="_blank" class="text-dark"> <p><i class="fa fa-dot-circle-o text-success mr-2"></i>{{$item->name}}</p>
											</a></div>
                                            @endif
										
											
										@endforeach
								
									
									
									</div>
								
								</div>
							
					      	</div>

						</div>

                          <div class="col-md-12 job-list">							
								<div class="job-list-det">
									<div class="job-list-desc">
										<h3 class="job-list-title">DR</h3>
										<h4 class="job-department">Click To View Login Links</h4>
										<br>
										<div class="row">
								
										@foreach ($data as $item)
											  @if($item->type == 'DR')
											<div class="col-md-3">
					                     <a href="{{$item->url}}" target="_blank" class="text-dark"> <p><i class="fa fa-dot-circle-o text-purple mr-2"></i>{{$item->name}}</p>
											</a></div>
                                            @endif
										
											
										@endforeach
								
									
									
									</div>
								
								</div>
							
					      	</div>

						</div>
					

                         @endsection



							
				