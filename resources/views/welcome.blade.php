<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body><!--
        <div id="app">
            <jenis-component></jenis-component>
        </div>
    -->


        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content" >
                <div class="title m-b-md">
                    Sistem Inventarisir SMKN 2 Bandung
                    <!--@{{ message }}-->
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Operator</a>
                    <a href="{{ route('login') }}">User(Siswa-guru-caraka)</a>
                    <a href="https://laravel-news.com">Admin</a>
                    
                </div>
            </div>
        </div><!--
        <div id="nama">
            <h1 v-text="namaanda"></h1>
            <h2 >@{{ angka }}</h2>
            <button v-on:click="tambahdata" class="btn btn-primary">tambah</button>
        </div> -->
    <script src="{{asset('js/app.js')}}"></script>
        <script>
        var app = new Vue({
            el : '#nama',
            data: {
                namaanda : 'selamat datang',
                message : 'yaman m nur',
                angka : 0
            },
            methods: {
                tambahdata: function(){
                    this.angka += 1
                }
            }
        });
        </script>
    </body>
</html>
