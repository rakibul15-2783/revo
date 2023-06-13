<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" href="{{ asset('admin') }}/assets/img/favicon.ico" />
      <title>Revo Admin &amp; Dashboard Template</title>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

      @include('admin.includes.css')
   </head>
   <body>
      <div class="wrapper">
      @include('admin.includes.sidebar')

         <div class="main">
         @include('admin.includes.topbar')
            <main class="content">

               <!-- main content -->
               @yield('main-content')
               
            </main>
            @include('admin.includes.footer')
         </div>
      </div>
      @include('admin.includes.js')
     
   </body>
</html>