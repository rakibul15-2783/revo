
<nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
               <a class="sidebar-brand" href="index.html">
               <img src="{{ asset('admin') }}/assets/img/logo-white.png" height="50px" alt="Revo Interactive">
               </a>
               <ul class="sidebar-nav">
                  <li class="sidebar-header">
                     Pages
                  </li>
                  <li class="sidebar-item active">
                     <a href="#dashboard" data-toggle="collapse" class="sidebar-link collapsed">
                     <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                     </a>
                     <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('userdetails') }}">User Details</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('orderdetails') }}">Order Details</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('makeorder') }}">Make Order</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('deposit') }}">Deposit</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('depositview') }}">View Amount</a></li>
                     </ul>
                  </li>  
               </ul>
            </div>
         </nav>
         