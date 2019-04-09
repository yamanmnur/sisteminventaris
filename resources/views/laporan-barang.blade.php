

<html lang="en">

        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
          <meta name="author" content="Creative Tim">
          <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
          <!-- Favicon -->
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
          <!-- Icons -->
          
          <link href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
          <link href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
          <!-- Argon CSS -->
          <link type="text/css" href="{{ asset('assets/css/argon.min.css?v=1.0.0') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}" >
        </head>
        <body>
            <!-- Sidenav -->
            <div class="container">
                    <h2>Bordered Table</h2>
                    <p>The .table-bordered class adds borders to a table:</p>            
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>John</td>
                          <td>Doe</td>
                          <td>john@example.com</td>
                        </tr>
                        <tr>
                          <td>Mary</td>
                          <td>Moe</td>
                          <td>mary@example.com</td>
                        </tr>
                        <tr>
                          <td>July</td>
                          <td>Dooley</td>
                          <td>july@example.com</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
        
        </body>
        <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
        
         <!-- Optional JS -->
        <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
        <!-- Argon JS -->
        <script src="{{ asset('assets/js/argon.min.js?v=1.0.0') }}"></script>
        <script src="{{asset('js/app.js')}}"></script>
         
        <script>
        // $(function(){
        //     $('#boraks').trigger('click'); // alternatively $('selector').click();
        // });
        $('#login-modal').on('click', function(event) {
            event.preventDefault(); 
            var url = '/login';
            location.replace(url);
        });</script>
         
        
        </html>