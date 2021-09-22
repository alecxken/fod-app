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
                        <h4 class="card-title">My Donations</h4>
                        <p class="card-text">@if(!empty($mydonations)) {{$mydonations}} @else 0 @endif</p>
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
                        <h4 class="card-title">Received Donations</h4>
                        <p class="card-text">@if(!empty($accepted)) {{$accepted}} @else 0 @endif</p>
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
                        <h4 class="card-title">Pending Download</h4>
                        <p class="card-text">@if(!empty($pending)) {{$pending}} @else 0 @endif</p>
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
                        <p class="card-text">M</p>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    
          


              


    
@endsection
