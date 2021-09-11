@extends('layouts.main')
@section('extracss')
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('extrajs')
      <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

@endsection
@php 
$content = \App\Models\Content::all()->take(4);
$flashnews = \App\Models\Content::all()->where('category','flash')->last();
$cover = \App\Models\Content::all()->where('category','cover')->last();
$press = \App\Models\Content::all()->where('category','press')->take(3);

@endphp
@section('flashnews')
@if(!empty($flashnews))
 <div class="flash-news-banner">
          <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <span class="badge badge-dark mr-3">Press Release </span>
                <p class="mb-0">
                 {{$flashnews->name ?? ''}}
                </p>
              </div>
              <div class="d-flex">
                <span class="mr-3 text-danger">{{\carbon\Carbon::today()->format('D, d M Y')}}</span>
                <span class="text-danger">18°C Nairobi</span>
              </div>
            </div>
          </div>
        </div>
        @endif
@endsection
@section('content')


  <div class="row" data-aos="fade-up">
              <div class="col-xl-8 stretch-card grid-margin">
                <div class="position-relative">
                  @if(!empty($cover))
                  <img style="background-image: linear-gradient(to bottom, black, white)" 
                    src="{{asset('asset/images/dashboard/'.$cover->cover_photo ?? 'home.png')}}"
                    alt="banner"
                    class="img-fluid"
                  />
                  <div class="banner-content">
                    <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                      EKE News updates
                    </div>
                    <h1 class="mb-0">FD-BANK UPDATES</h1>
                    <h1 class="mb-2">
                     {{$cover->name ?? '' }}
                    </h1>
                    <div class="fs-12">
                      <span class="mr-2">Photo </span> ago
                    </div>
                  </div>
                  @else
                   <img style="background-image: linear-gradient(to bottom, black, white)" 
                    src="{{asset('asset/images/dashboard/home.png')}}"
                    alt="banner"
                    class="img-fluid"
                  />
                  <div class="banner-content">
                    <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                       No News updates yet
                    </div>
                    <h1 class="mb-0">FD-BANK CX  </h1>
                    <h1 class="mb-2">
                     Lets Stand Out
                    </h1>
                    <div class="fs-12">
                      <span class="mr-2">Photo </span> ago
                    </div>
                  </div>

                  @endif
                </div>
              </div>
              <div class="col-xl-4 stretch-card grid-margin">
                <div class="card bg-dark text-white">
                  <div class="card-body">
                    <h2>Latest </h2>

                    <div
                      class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between"
                    >
                      <div class="pr-3">
                        <h5>OLA Energy partners with FD-BANK to offer digital financial services at its stations across Africa</h5>
                        <div class="fs-12">
                          <span class="mr-2">Photo </span>
                        </div>
                      </div>
                      <div class="rotate-img">
                        <img
                          src="{{asset('asset/images/dashboard/home_1.png')}}"
                          alt="thumb"
                          class="img-fluid img-lg"
                        />
                      </div>
                    </div>

                    <div
                      class="d-flex border-bottom-blue pb-4 pt-4 align-items-center justify-content-between"
                    >
                      <div class="pr-3">
                        <h5>FD-BANK Transnational Incorporated Lists On LSE For US$350M</h5>
                        <div class="fs-12">
                          <span class="mr-2">Photo </span>3 Weeks ago
                        </div>
                      </div>
                      <div class="rotate-img">
                        <img
                          src="asset/images/dashboard/home_2.jpg"
                          alt="thumb"
                          class="img-fluid img-lg"
                        />
                      </div>
                    </div>

                    <div
                      class="d-flex pt-4 align-items-center justify-content-between"
                    >
                      <div class="pr-3">
                        <h5>AUDA-NEPAD and FD-BANK Group partnership moves to finance phase under the 100,000 MSMEs Initiative</h5>
                        <div class="fs-12">
                          <span class="mr-2">Photo </span>10 Minutes ago
                        </div>
                      </div>
                      <div class="rotate-img">
                        <img
                          src="asset/images/dashboard/home_3.jpg"
                          alt="thumb"
                          class="img-fluid img-lg"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h2>Quick Links</h2>
                    <ul class="vertical-menu">
                     
                      <li>  <a href="#" target="_blank" class="text-dark"> <p><i class="fa fa-dot-circle-o text-success mr-2"></i>News 1</p>
                      </a></li>
                                           
                    
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    @if(!empty($content))
                    @foreach($content as $cont)
                    <div class="row">
                      <div class="col-sm-4 grid-margin">
                        <div class="position-relative">
                          <div class="rotate-img">
                            <img
                              src="{{asset('asset/images/dashboard/'.$cont->cover_photo ?? '')}}"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
                              >Flash news</span
                            >
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-sm-8  grid-margin">
                        <h2 class="mb-2 font-weight-600">
                          {{$cont->name ?? ''}}
                        </h2>
                        <div class="fs-13 mb-2">
                          <span class="mr-2">Photo </span>
                        </div>
                        <p class="mb-0">
                        {{$cont->brief_desc ?? ''}}
                        </p>
                      </div>
                     
                    </div>
                    @endforeach
                     @endif


                   {{--  <div class="row">
                      <div class="col-sm-4 grid-margin">
                        <div class="position-relative">
                          <div class="rotate-img">
                            <img
                              src="asset/images/dashboard/home_5.jpg"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
                              >Flash news</span
                            >
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8  grid-margin">
                        <h2 class="mb-2 font-weight-600">
                          No charges over 2017 Conservative battle bus cases
                        </h2>
                        <div class="fs-13 mb-2">
                          <span class="mr-2">Photo </span>10 Minutes ago
                        </div>
                        <p class="mb-0">
                          Lorem Ipsum has been the industry's standard dummy
                          text ever since the 1500s, when an
                        </p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <div class="position-relative">
                          <div class="rotate-img">
                            <img
                              src="asset/images/dashboard/home_6.jpg"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
                              >Flash news</span
                            >
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <h2 class="mb-2 font-weight-600">
                          Kaine: Trump Jr. may have committed treason
                        </h2>
                        <div class="fs-13 mb-2">
                          <span class="mr-2">Photo </span>10 Minutes ago
                        </div>
                        <p class="mb-0">
                          Lorem Ipsum has been the industry's standard dummy
                          text ever since the 1500s, when an
                        </p>
                      </div>
                    </div> --}}
                  </div>
                </div>
              </div>
            </div>

            @include('content.donate')
@endsection