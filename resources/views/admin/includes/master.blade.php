<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" href="{{ asset('admin') }}/assets/img/favicon.ico" />
      <title>Revo Admin &amp; Dashboard Template</title>
 
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
      @yield('js')
     
   </body>
</html>