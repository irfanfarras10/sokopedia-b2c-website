<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <title>@yield('title')</title>
    <style>
        .admin {
            text-align: center;
            width: 800px;
            margin: auto;
            padding: 20px;
            background-color: wheat;
            margin-top: 30px;
            color: black;
        }

        .product {
            text-align: center;
            width: 800px;
            margin: auto;
            padding: 20px;
            background-color: white;
            margin-top: 30px;
            color: black;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-success">
        <!-- Navbar content -->
        <div class="container">

            <a class="navbar-brand text-light bg-success" href="/admin">Admin</a>

            {{-- <ul class="navbar-nav mr-auto ">
            <li class="nav-item active"> --}}

            <div class="btn-group mr-auto">
                <button type="button" class="btn dropdown-toggle bg-success text-light" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Product and Category
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/admin/add-product">add product</a>
                    <a class="dropdown-item" href="/admin/list-product">show all product</a>
                    <a class="dropdown-item" href="/admin/add-category">add category</a>

                    <a class="dropdown-item" href="/admin/show-category">show all category</a>

                </div>


            </div>

            {{-- </li>
            
            
        </ul> --}}



            <div class="btn-group ">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu">

                    <a class="dropdown-item" href="{{ url('/') }}">
                      Home Page
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        class="d-none">
                        @csrf
                    </form>

                </div>



            </div>
        </div>
    </nav>


    @yield('content')



</body>

</html>
