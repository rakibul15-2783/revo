<nav class="navbar navbar-expand navbar-light navbar-bg">
               <a class="sidebar-toggle d-flex">
               <i class="hamburger align-self-center"></i>
               </a>
               
               <div class="navbar-collapse collapse">
                  <ul class="navbar-nav navbar-align">
                     <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                        <i class="align-middle" data-feather="settings"></i>
                        </a>
                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                        <img src="{{ asset('admin') }}/assets/img/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark">{{ Auth::user()->username }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                           <a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
                           
                           <a class="dropdown-item" href="{{ route('adminlogout') }}">Log out</a>
                        </div>
                     </li>
                  </ul>
               </div>
            </nav>