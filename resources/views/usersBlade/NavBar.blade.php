<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><img src="https://cdn.dribbble.com/users/230290/screenshots/15128882/media/4175d17c66f179fea9b969bbf946820f.jpg?compress=1&resize=400x300&vertical=top" alt="" height="40" width="200"></a>
        <button class="navbar-toggler text-white" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="material-symbols-outlined">
                density_small
                </span>
        </button>
          
        
    </form>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a  class="nav-link {{Request::is('/') ? 'active' : 'null'}}" aria-current="page" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{Request::is('categories') ? 'active' : 'null'}} " href="{{url('/search')}}">Search</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{Request::is('categories') ? 'active' : 'null'}} " href="{{url('/lostphone')}}">Report a lost phone</a>
                </li>
                @if (Auth::user())
                    
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>


                    <div class="nav-item dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        
                        <a class=" dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @else
                <li class="nav-item" >
                    <a class="nav-link {{Request::is('Cart') ? 'active' : 'null'}} " href="{{url('/login')}}">login</a>

                </li>
                <li class="nav-item" >
                    <a class="nav-link {{Request::is('Cart') ? 'active' : 'null'}} " href="{{url('/register')}}">Register</a>

                </li>
               

                    @endif
                
            </ul>
        </div>
    </div>
</nav>

