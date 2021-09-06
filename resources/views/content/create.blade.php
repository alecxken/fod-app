@extends('layouts.template')

@section('content')

<div >
<div class="content container-fluid">
				
					<div class="row">
						<div class="col-sm-12">
							<div class="file-wrap">
								<div class="file-sidebar">
									<div class="file-header justify-content-center">
										<span>Projects</span>
										<a href="javascript:void(0);" class="file-side-close"><i class="fa fa-times"></i></a>
									</div>
									<form class="file-search">
										<div class="input-group">
											<div class="input-group-prepend">
												<i class="fa fa-search"></i>
											</div>
											<input type="text" class="form-control" placeholder="Search">
										</div>
									</form>
									<div class="file-pro-list">
										<div class="file-scroll">
											<ul class="file-menu">
												<li class="active">
													<a href="{{url('content-upload')}}">All Projects</a>
												</li>
                                                @if(!empty($dropdown)) @foreach($dropdown as $c)
                                                 @if($c->column_name == 'category')
                                                    	<li>
													<a href="{{url('content-query/'.$c->item)}}">{{$c->item}}</a>
												</li>
                                                 @endif @endforeach @endif
											
																						</ul>
											<div class="show-more">
												<a href="#">Show More</a>
											</div>
										</div>
									</div>
								</div>
								<div class="file-cont-wrap">
									<div class="file-cont-inner">
										<div class="file-cont-header">
											<div class="file-options">
												<a href="javascript:void(0)" id="file_sidebar_toggle" class="file-sidebar-toggle">
													<i class="fa fa-bars"></i>
												</a>
											</div>
											<span>File Manager</span>
											<div class="file-options">
												<span class="btn-file"><div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i>Upload Documents</a>
							</div></span>
											</div>
										</div>
										<div class="file-content">
											<form class="file-search">
												<div class="input-group">
													<div class="input-group-prepend">
														<i class="fa fa-search"></i>
													</div>
													<input type="text" class="form-control" placeholder="Search">
												</div>
											</form>
											<div class="file-body">
												<div class="file-scroll">
													<div class="file-content-inner">
														{{-- <h4>Recent Files</h4> --}}
													
														<h4>Files</h4>
														<div class="row row-sm">
                                                        
                                                            @if(!empty($data))
                                                            @foreach($data as $file)
															<div class="col-12 col-md-3">
																<div class="card card-file">
																	<div class="dropdown-file">
																		<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			{{-- <a href="#" class="dropdown-item">View Details</a> --}}
																			<a href="#" class="dropdown-item">Share</a>
																			<a href="{{url('content-download/'.$file->id)}}" class="dropdown-item">Download</a>
																			{{-- <a href="#" class="dropdown-item">Rename</a> --}}
																			<a href="{{url('content-delete/'.$file->id)}}" class="dropdown-item">Delete</a>
																		</div>
																	</div>
																	<div class="card-file-thumb">
                                                                        @if($file->type == 'docx')
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
                                                                        @endif
																	</div>
																	<div class="card-body">
																		<h6><a href="">{{$file->name}}</a></h6>
																		<span>{{$file->size * 0.001}} kb</span>
																	</div>
																	<div class="card-footer">{{$file->created_at}}</div>
																</div>
															</div>
                                                            @endforeach
                                                            @endif
                                                        
															
														

														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
                </div>

</div>
	<!-- Edit Leave Modal -->
				<div id="add_leave" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add new  Document</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								  {{ Form::open(['method'=> 'post','url' => 'store-file-content','files' => true]) }}
  
                                    <div class="form-group">
										<label>Title <span class="text-danger">*</span></label>
										<input class="form-control" required name="title" value="" type="text">
									</div>

                                     <div class="form-group">
										<label>Upload File <span class="text-danger">*</span></label>
										<input class="form-control" required name="file"  type="file">
									</div>


									<div class="form-group">
										<label>File Category <span class="text-danger">*</span></label>
										<select name="category" required class="form-control select">
											<option value="">Select File Category</option>
											  @if(!empty($dropdown))
                                               @foreach($dropdown as $c)
                                                    @if($c->column_name == 'category')
                                                    <option>{{$c->item}}</option>
                                                    @endif
                                                @endforeach
                                              @endif
										</select>
									</div>
                                    <div class="form-group">
										<label>Deparment <span class="text-danger">*</span></label>
										<select name="department" required class="form-control select">
											<option>Select Department </option>
											@if(!empty($dropdown))
                                               @foreach($dropdown as $c)
                                                    @if($c->column_name == 'department')
                                                    <option>{{$c->item}}</option>
                                                    @endif
                                                @endforeach
                                              @endif
										</select>
									</div>

									<div class="form-group">
										<label>Document Description <span class="text-danger">*</span></label>
										<textarea rows="4" required class="form-control" name="content"></textarea>
									</div>
									<div class="submit-section">
										<button type="submit" class="btn btn-primary submit-btn">Save</button>
									</div>
								{!!Form::close()!!}
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Leave Modal -->
@endsection