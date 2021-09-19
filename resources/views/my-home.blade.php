@extends('layouts.main')

@section('content')
  
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/chart.min.js" integrity="sha512-JxJpoAvmomz0MbIgw9mx+zZJLEvC6hIgQ6NcpFhVmbK1Uh5WynnRTTSGv3BTZMNBpPbocmdSJfldgV5lVnPtIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="container d-block">

           <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="card dash-widget ctm-border-radius shadow-sm">
                    <div class="card-body">
                      <div class="card-icon bg-primary">
                        <i class="fa fa-users" aria-hidden="true"></i>
                      </div>
                      <div class="card-right">
                        <h4 class="card-title">Order Parties</h4>
                        <p class="card-text">@if(!empty($orderparty)) {{$orderparty}} @else 0 @endif</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                  <div class="card dash-widget ctm-border-radius shadow-sm">
                    <div class="card-body">
                      <div class="card-icon bg-warning">
                        <i class="fa fa-globe"></i>
                      </div>
                      <div class="card-right">
                        <h4 class="card-title">Clients</h4>
                        <p class="card-text">@if(!empty($clients)) {{$clients}} @else 0 @endif</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                  <div class="card dash-widget ctm-border-radius shadow-sm">
                    <div class="card-body">
                      <div class="card-icon bg-danger">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                      </div>
                      <div class="card-right">
                        <h4 class="card-title">Active Orders</h4>
                        <p class="card-text">@if(!empty($orders)) {{$orders}} @else 0 @endif</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                  <div class="card dash-widget ctm-border-radius shadow-sm">
                    <div class="card-body">
                      <div class="card-icon bg-success">
                        <i class="fa fa-link" aria-hidden="true"></i>
                      </div>
                      <div class="card-right">
                        <h4 class="card-title">Value</h4>
                        <p class="card-text">$5.8M</p>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        
    
          


                <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                            <aside class="sidebar sidebar-user">
                              
                                <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
                                    <div class="user-info card-body">
                                        <div class="user-avatar mb-4">
                                         
                                        </div>
                                        <div class="user-details">
                                            <h4><b>Welcome {{Auth::user()->name}}</b></h4>
                                            <p>{{\Carbon\Carbon::today()->format('D, d M Y')}}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <style type="text/css">
                                    .custom-badge {
    padding: 0.8rem 1.25rem; 
    border-radius: 50em; 
    background: #f1f3f6;
    margin-bottom: 5px;
    color: #fff;
    background-color: #6c757d;
}
.ctm-bg-danger {
    background: #ff6a6c;
}
.ctm-bg-warning {
    background: #feb71d;
}
.ctm-bg-info {
    background: #58c9e9;
}
.ctm-bg-success {
    background: #62d03a;
}
.ctm-border-radius {
    border-radius: 10px;
}
.ctm-btn-padding {
    padding: 10px 15px;
}
.ctm-text-sm {
    font-size: 14px;
    color: #888;
}
.ctm-padding {
    padding: 1.25rem;
}
.ctm-margin-btm {
    margin-bottom: 1.25rem !important;
}
                                </style>
                                <!-- Sidebar -->
                                <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                                    <div class="card ctm-border-radius shadow-sm border-none grow">
                                        <div class="card-body">
                                            <div class="row no-gutters">
                                                <div class="col-6 align-items-center text-center">
                                                    <a href="/home" class="text-white active p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span class="typcn typcn-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>                                              
                                                </div>
                                               
                                                <div class="col-6 align-items-center shadow-none text-center">                                              
                                                    <a href="" class="text-dark p-4 ctm-border-right"><span class="typcn typcn-calendar pr-0 pb-lg-2 font-23"></span><span class="">Calendar</span></a>                                               
                                                </div>
                                                <div class="col-6 align-items-center shadow-none text-center">                                          
                                                    <a href="" class="text-dark p-4 ctm-border-right ctm-border-left"><span class="fa fa-users pr-0 pb-lg-2 font-23"></span><span class="">Leave</span></a>                                         
                                                </div>
                                              
                                                <div class="col-6 align-items-center shadow-none text-center">                                              
                                                    <a href="" class="text-dark p-4 ctm-border-right ctm-border-left"><span class="fa fa-rocket pr-0 pb-lg-2 font-23"></span><span class="">Reports</span></a>                                                
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- /Sidebar -->
                                
                                
                                
                                
                            </aside>
                        </div>
                    
                        <div class="col-xl-9 col-lg-8 col-md-12">
            
              <!-- Widget -->
              
                <div class="row">
                  @if(!empty($datas))
                       <div class="col-sm-12">
                       
                         <div class="card card-dashboard-twenty">
                           <div class="card-header with-border ">
                      <h6 class="card-title " align="center"><i class='fa fa-pencil'></i> Order Status Summary Chart</h6>
                </div>
             
                          <div class="card-body">
                              <div>{!! $datas->container() !!}</div>
                          </div>
                        </div>
                               {!! $datas->script() !!}
                        </div>
                  @endif
                </div>
              </div>
            </div>
     


          <div class="col-md-12">
           <!--  <div class="row row-sm">
              <div class="col-sm-6">
                <div class="card card-dashboard-twenty">
                  <div class="card-body">
                    <label class="az-content-label tx-13 tx-primary">New Orders</label>
                    <p>Customers who have upgraded the level of your products or service.</p>
                    <div class="expansion-value">
                      <strong>$1,500</strong>
                      <strong>$1,120</strong>
                    </div>
                    <div class="progress">
                      <div class="progress-bar wd-70p" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="expansion-label">
                      <span>This Month</span>
                      <span>Previous Month</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 ">
                <div class="card card-dashboard-twenty ht-md-100p">
                  <div class="card-body">
                    <label class="az-content-label tx-13 tx-danger">Compeleted Orders</label>
                    <p>Customers who have ended their subscription with you.</p>
                    <div class="expansion-value">
                      <strong>$1,900</strong>
                      <strong>$1,680</strong>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="expansion-label">
                      <span>This Month</span>
                      <span>Previous Month</span>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
       </div>
        </div>
      </div>



    
@endsection
