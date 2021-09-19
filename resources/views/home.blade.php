@extends('layouts.template')

@section('content')
  
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/chart.min.js" integrity="sha512-JxJpoAvmomz0MbIgw9mx+zZJLEvC6hIgQ6NcpFhVmbK1Uh5WynnRTTSGv3BTZMNBpPbocmdSJfldgV5lVnPtIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="container d-block">

         
    
          <div class="row">
          <div class="col-md-12">
           <div class="card-group m-b-40">
            <div class="card">
              <div class="card-body">
                  <div class="d-flex justify-content-between mb-3">
                    <div>
                         <span class="d-block">Registered Foodbanks</span>
                    </div>
                    <div>
                      <span class="text-success">+10%</span>
                    </div>
                  </div>
                  <h3 class="mb-3"> @if(!empty($donations)) {{$donations}} @else 0 @endif </h3>
                  <div class="progress mb-2" style="height: 5px;">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                        <p class="card-text"></p>
                     <p class="mb-0">Overall Number @if(!empty($donations)) {{$donations}} @else 0 @endif </p>
              </div>
            </div>
          <div class="card">
          <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
          <div>
          <span class="d-block">Pending Delivery</span>
          </div>
          <div>
          <span class="text-success">+1.5%</span>
          </div>
          </div>
          <h3 class="mb-3"> @if(!empty($newdonations)) {{$newdonations}} @else 0 @endif</h3>
          <div class="progress mb-2" style="height: 5px;">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <p class="mb-0">Previously <span class="text-muted"> @if(!empty($newdonations)) {{$newdonations}} @else 0 @endif</span></p>
          </div>
        </div>
<div class="card">
<div class="card-body">
<div class="d-flex justify-content-between mb-3">
<div>
<span class="d-block">Closed Items</span>
</div>
<div>
<span class="text-danger">-2.8%</span>
</div>
</div>
<h3 class="mb-3">@if(!empty($receiveddonations)) {{$receiveddonations}} @else 0 @endif</h3>
<div class="progress mb-2" style="height: 5px;">
<div class="progress-bar bg-success" role="progressbar" style="width: 90%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<p class="mb-0">Total <span class="text-muted">@if(!empty($receiveddonations)) {{$receiveddonations}} @else 0 @endif</span></p>
</div>
</div>

</div>
</div>
</div>


                <div class="row">
                    
                        <div class=" col-md-12">
            
              <!-- Widget -->
              
                <div class="row">
                  @if(!empty($datas))
                       <div class="col-sm-6">
                       
                         <div class="card card-dashboard-twenty">
                           <div class="card-header with-border ">
                      <h6 class="card-title " align="center"><i class='fa fa-pencil'></i> Donations Status Summary Chart</h6>
                </div>
             
                          <div class="card-body">
                              <div>{!! $datas->container() !!}</div>
                          </div>
                        </div>
                               {!! $datas->script() !!}
                        </div>

                          <div class="col-sm-6">
                       
                         <div class="card card-dashboard-twenty">
                           <div class="card-header with-border ">
                      <h6 class="card-title " align="center"><i class='fa fa-pencil'></i> Donations Org Summary Chart</h6>
                </div>
             
                          <div class="card-body">
                              <div>{!! $org->container() !!}</div>
                          </div>
                        </div>
                               {!! $org->script() !!}
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
