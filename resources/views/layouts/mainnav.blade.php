        <header id="header" >
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                  <ul class="navbar-top-left-menu">
                   
                 <!--    <li class="nav-item">
                      <a href="#" class="nav-link">Events</a>
                    </li>
                <li class="nav-item">
                      <a href="#" class="nav-link">Write for Us</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">In the Press</a>
                    </li>  -->
                  </ul>
                  <ul class="navbar-top-right-menu" >
              
                    <li class="nav-item">
                      <a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
                    </li>
                    @auth
                      <li class="nav-item">
                        <a href="{{url('/my-home')}}" class="nav-link">{{Auth::user()->name}}</a>
                      </li>  
                       <li class="nav-item">
                        <a href="{{ route('logout') }}"   onclick="event.preventDefault();    document.getElementById('logout-form').submit();"  class="nav-link">Sign Out</a>
                      </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                       @csrf
                                   </form>
                    @else 
                     <li class="nav-item">
                      <a href="{{url('/login')}}" class="nav-link">Login</a>
                     </li>
                     <li class="nav-item">
                      <a href="{{url('/register')}}" class="nav-link">Register</a>
                     </li> 
                     
                     @endif

              
                
                  
                  </ul>
                </div>
              </div>
              <div class="navbar-bottom" >
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <a class="navbar-brand" href="#"
                      ><img src="{{asset('images/logo.png')}}" style="width: 90px;" alt=""
                    /></a>
                  </div>
                  <div>
                    <button
                      class="navbar-toggler"
                      type="button"
                      data-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent"
                      aria-expanded="false"
                      aria-label="Toggle navigation"
                    >
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                      class="navbar-collapse justify-content-center collapse"
                      id="navbarSupportedContent"
                    >
                      <ul
                        class="navbar-nav d-lg-flex justify-content-between align-items-center"
                      >
                        <li>
                          <button class="navbar-close">
                            <i class="mdi mdi-close"></i>
                          </button>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="{{url('/')}}">Home</a>
                        </li>

                        <li class="nav-item active">
                          <a class="nav-link" href="{{url('/')}}">About Us</a>
                        </li>
                                
    
                      
                        <li class="nav-item">
                          <a class="nav-link" href="{{url('/our-partners')}}">Food Banks</a>
                        </li>

                          <li class="nav-item">
                          <a class="nav-link btn btn-info" data-toggle="modal" data-target="#add_beneficiary"><i class="fa fa-plus"></i> Click To Donate</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <ul class="social-media">
                  <!--   <li>
                      <a href="#">
                        <i class="mdi mdi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-youtube"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-twitter"></i>
                      </a>
                    </li> -->
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </header>