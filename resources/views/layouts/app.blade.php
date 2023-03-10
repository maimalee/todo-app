@php use Illuminate\Support\Facades\Auth;

@endphp
    <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>
    <link rel="shortcut icon" type="image/png" href="/assets/images/suhail.ico">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>
</head>

<body>
<div class="wrapper">
    @if(Auth::check())

        <!-- Sidebar  -->
        <nav id="sidebar" class="bg-drk" style="background-color:#101010; color: white; ">
            <ul class="list-unstyled components" style="margin-left: 10px">
                <div class="text-center mt-4">
                    Todo-Best-App
                </div>
                <div class="mt-3 text-center">
                    <img src="/images/suhail.jpg" alt="" class="rounded-circle" style="width: 100px; height: 100px">
                </div>
                @if(Auth::user()['role'] != 'admin')
                    <li>
                        <a href="/" class="text-decoration-none mt-4">
                            <i class="fas fa-home me-4"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{Route('todo.index')}}" class="text-decoration-none">
                            <i class="fas fa-book-open me-4"></i>
                            Todo
                        </a>
                    </li>

                    <li>
                        <a href="" class="text-decoration-none">
                            <i class="fas fa-bell me-4"></i>
                            Notification
                            <span class="badge bg-white" style="color: black">1</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="text-decoration-none">
                            <i class="fa fa-cog fa-spin me-4"></i>
                            Account
                        </a>
                    </li>

                @else

                <!-- Admin section -->
                <li>
                    <a href="{{Route('admin.users')}}" class="text-decoration-none mt-4">
                        <i class="fas fa-bell me-4"></i>
                        Users
                      @if($global['users'] ?? 0 > 0)
                            <span class="badge bg-white" style="color: #1a202c">{{$global['users']}}</span>
                      @endif
                        </a>
                </li>

                <li>
                    <a href="{{Route('admin.todo')}}" class="text-decoration-none">
                        <i class="fa fa-book-open me-4"></i>
                        Todo
                    </a>
                </li>

                <li>
                    <a href="" class="text-decoration-none">
                        <i class="fa fa-cog fa-spin me-4"></i>
                        Setting
                    </a>
                </li>

            </ul>
            @endif
            <div class="mt-5 m-lg-3">
                <!-- Owner info -->

                {{Auth::user()['fullname']}} <br>
                {{Auth::user()['email']}} <br>


            </div>
        </nav>

    @endif
    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                @if(Auth::check())
                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                @endif


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        @if(Auth::check())
                            <div class="m-lg-1">
                                {{Auth::user()['username']}}
                            </div>
                            <form action="{{Route('logout')}}" method="POST">
                                @csrf
                                <div class="text-end">

                                    <button class="btn btn-dark">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Logout
                                    </button>
                                </div>
                            </form>
                        @else
                            <li>
                                <a href="{{Route('register')}}" class="text-decoration-none">
                                    Register
                                </a>
                            </li>
                            &nbsp;&nbsp;&nbsp;
                            <li>
                                <a href="{{Route('login')}}" class="text-decoration-none">
                                    Login
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
</div>


<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>

</html>
