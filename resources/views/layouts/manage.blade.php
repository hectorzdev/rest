<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('frontend/css/manage.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{asset('frontend/images/icon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js">
    <title>Rest - Massage</title>
</head>
<body>
    <div class="main-header">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                       Rest
                    </a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link {{$page == 'orders' ? 'active' : ''}}" href="{{url('order')}}">Orders</a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link {{$page == 'zipcode' ? 'active' : ''}}" href="{{url('zipcode')}}">Zipcode</a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link" href="#" onclick="logout()"><i class="fas fa-sign-in-alt"></i> Sign out</a>
                </li>
            </ul>
        </div>
    </div>
    @yield('content')

    <div class="footer mt-5">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">
                        Copyright © 2021 , Rest.com
                    </a>
                </li>
            </ul>
        </div> 
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        var _token = $('meta[name="csrf-token"]').attr('content')

        $(document).ready(function(){
            
            $('.dataTable').dataTable()
        })

        function logout(){
            
            $.post(`{{url('logout')}}` , {_token:_token}  , function(){

            })
            location.reload()
        }
    </script>

    @yield('script')
</body>
</html>