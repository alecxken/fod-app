@extends('layouts.main')

@section('content')

  <div class="az-column-signup-left">
      
      </div><!-- az-column-signup-left -->
      <div class="az-column-signup">
     
        <div class="az-signup-header">
          <h2>Welcome </h2>
          <h4>Signup and only takes a minute.</h4>

              <form method="POST" action="{{ route('register') }}">
                        @csrf
          

            <div class="form-group">
              <label>Firstname &amp; Lastname</label>

                 <input id="name" placeholder="Enter your firstname and lastname" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
       
            </div><!-- form-group -->
            <div class="form-group">
              <label>Email</label>
                          <input placeholder="Enter your email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div><!-- form-group -->
            <div class="form-group">
              <label>Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div><!-- form-group -->
      <div class="form-group">
              <label>Confirm Password</label>
         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                           
            </div>
        
                
            <button type="submit" class="btn btn-success btn-block">Click To Create Account</button>
           <!-- row -->
          </form>
        </div><!-- az-signup-header -->
        <div class="az-signup-footer">
          <p>Already have an account? <a href="{{url('login')}}">Sign In</a></p>
        </div><!-- az-signin-footer -->
      </div><!-- az-column-signup -->

@endsection
