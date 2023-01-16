<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  {{-- <title>CodePen - Bootstrap Sidebar</title> --}}
  <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


<!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script><link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
    <style>
        /*
    DEMO STYLE
*/

@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}
.body {
    display: flex;
    width: 100%;
    align-items: stretch;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background-color:rgb(200, 200, 200);
    color:#ffc107;
    transition: all 0.3s;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
    text-decoration: none;
    color:#fff;

}

#content {
    width: 100%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
}
.active1{
    background-color:#ffc107       ;
    color:rgb(200, 200, 200);
}
a{

    /* color: #fafafa */
}
    </style>
    @yield('style')
</head>
<body>
<!-- partial:index.partial.html -->
<div class="body">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> inventory</a>
                    <ul @if(Route::current()->getName() == 'create' || Route::current()->getName() == 'list') class="collapse list-unstyled show" @else  class="collapse list-unstyled " @endif id="homeSubmenu">
                        <li>
                            <a href="{{route('create')}}" @if(Route::current()->getName() == 'create') class="active1" @endif>create inventory</a>
                        </li>
                        <li>
                            <a href="{{route('list')}}" @if(Route::current()->getName() == 'list') class="active1" @endif>List inventory</a>
                        </li>
                    </ul>
                </li>
            </ul>


        </nav>

        <!-- Page Content  -->
        <div id="content">
            @yield('headder')
            @yield('min')

        </div>
    </div>
<!-- partial -->
  <script  src="./script.js"></script>
  @yield('script')

</body>
</html>
