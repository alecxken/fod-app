@extends('layouts.log')

@section('content')


                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="hidden" name="affilite" value="EKE">

                        <div class="form-group row">
                            <label for="email" class="ol-form-label text-md-right">{{ __('Your Windows Username') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class=" col-form-label text-md-right">{{ __('Your Windows Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                     

                        <div class="form-group ">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary account-btn">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
               
@endsection
