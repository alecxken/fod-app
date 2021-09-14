@extends('layouts.main')
@section('extracss')
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('extrajs')
      <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

@endsection
@php 


@endphp


@section('content')


  <div class="row" data-aos="fade-up">
         
              <div class="col-lg-12 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    @if(!empty($content))
                    @foreach($content as $cont)
                    <div class="row">
                      <div class="col-sm-4 grid-margin">
                        <div class="position-relative">
                          <div class="rotate-img">
                            <img
                              src="{{asset('files/'.$cont->image ?? '')}}"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
                              >{{$cont->name ?? ''}}</span
                            >
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-sm-8  grid-margin">
                        <h2 class="mb-2 font-weight-600">
                         Located in {{$cont->location ?? ''}}
                        </h2>
                        <div class="fs-13 mb-2">
                          <span class="mr-2"><a href="{{url('donate')}}" class="btn btn-info">Donate Now to {{$cont->name ?? ''}} </a></span>
                        </div>
                        <p class="mb-0">
                        {{$cont->description ?? ''}}
                        </p>
                      </div>
                     
                    </div>
                    @endforeach
                     @endif


                 
                  </div>
                  <div class="card-footer">{{ $content->links() }}</div>
                </div>
              </div>
            </div>

            @include('content.donate')
@endsection