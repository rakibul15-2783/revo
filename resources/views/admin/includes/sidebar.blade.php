
<nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
               <a class="sidebar-brand" href="index.html">
               <img src="{{ asset('admin') }}/assets/img/logo-white.png" height="50px" alt="Revo Interactive">
               </a>
               <ul class="sidebar-nav">
                  <li class="sidebar-header">
                     Pages
                  </li>
                  <li class="sidebar-item ">
                     <a href="{{ route('adminprofile') }}"  class="sidebar-link collapsed">
                     <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                     </a>
                     <a href="{{ route('userdetails') }}"  class="sidebar-link collapsed">
                     <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">User Details</span>
                     </a>
                     <a href="{{ route('orderdetails') }}"  class="sidebar-link collapsed">
                     <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Order Details</span>
                     </a>
                     <a href="{{ route('makeorder') }}"  class="sidebar-link collapsed">
                     <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Make Order</span>
                     </a>
                     <a href="{{ route('deposit') }}"  class="sidebar-link collapsed">
                     <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Deposit</span>
                     </a>
                     <a href="{{ route('depositview') }}"  class="sidebar-link collapsed">
                     <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">View Amount</span>
                     </a>
                     
                  </li>  
               </ul>
            </div>
         </nav>
         