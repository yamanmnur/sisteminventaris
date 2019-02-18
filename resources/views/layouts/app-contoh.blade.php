

<html lang="en">

        <head>
           
         <meta name="csrf-token" content="{{ csrf_token() }}" >
        </head>
        <body>
            <div id="app">
 <!-- Sidenav -->
 @yield('header')
 <!-- Page content -->
 
   @yield('content')
            </div>
           
        
        </body>
          
        <script src="{{asset('js/app.js')}}"></script>
       
        
        </html>