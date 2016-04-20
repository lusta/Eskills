<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
					@if (Auth::check())
					    @if(!Entrust::hasRole('admin'))
							<li><a href="{{ url('/skills') }}">SkillsGaps</a></li>
						@endif
					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>

					@else
					<li><a id="Logout" href="{{ url('/auth/logout') }}">Logout</a></li>
						<li class="dropdown" id="LogoutUser">
							<a href="" id="LogInUser" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
								<li><a href="{{ url('/auth/logout') }}">Profile</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	@if (Auth::check())
    	@if(Entrust::hasRole('admin'))
			<div class="row">
			    <!-- uncomment code for absolute positioning tweek see top comment in css -->
			    <!-- <div class="absolute-wrapper"> </div> -->
			    <!-- Menu -->
			    <div class="side-menu">
			    
			    <nav class="navbar navbar-default" role="navigation">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			        <div class="brand-wrapper">
			            <!-- Hamburger -->
			            <button type="button" class="navbar-toggle">
			                <span class="sr-only">Toggle navigation</span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			            </button>

			            <!-- Brand -->
			            <div class="brand-name-wrapper">
			                <a class="navbar-brand" href="#">
			                    Admin Dashboard
			                </a>
			            </div>

			            <!-- Search -->
			            <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
			                <span class="glyphicon glyphicon-search"></span>
			            </a>

			            <!-- Search body -->
			            <div id="search" class="panel-collapse collapse">
			                <div class="panel-body">
			                    <form class="navbar-form" role="search">
			                        <div class="form-group">
			                            <input type="text" class="form-control" placeholder="Search">
			                        </div>
			                        <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
			                    </form>
			                </div>
			            </div>
			        </div>

			    </div>

			    <!-- Main Menu -->
			    <div class="side-menu-container">
			        <ul class="nav navbar-nav">

			            <li><a href="{{ url('/admin/users') }}"><span class="glyphicon glyphicon-send"></span> Home</a></li>
			            <li class="active"><a href="{{ url('/admin/skills') }}"><span class="glyphicon glyphicon-plane"></span> SkillsGap</a></li>
			            <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Challenges</a></li>

			            <!-- Dropdown-->
			            <li class="panel panel-default" id="dropdown">
			                <a data-toggle="collapse" href="#dropdown-lvl1">
			                    <span class="glyphicon glyphicon-user"></span> Comments <span class="caret"></span>
			                </a>

			                <!-- Dropdown level 1 -->
			                <div id="dropdown-lvl1" class="panel-collapse collapse">
			                    <div class="panel-body">
			                        <ul class="nav navbar-nav">
			                            <li><a href="#">SkillsGap Comments</a></li>
			                            <li><a href="#">Challenge Comments</a></li>
			                            <li><a href="#">Solutions Comments</a></li>

			                            <!-- Dropdown level 2 -->
			                            <li class="panel panel-default" id="dropdown">
			                                <a data-toggle="collapse" href="#dropdown-lvl2">
			                                    <span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>
			                                </a>
			                                <div id="dropdown-lvl2" class="panel-collapse collapse">
			                                    <div class="panel-body">
			                                        <ul class="nav navbar-nav">
			                                            <li><a href="#">Link</a></li>
			                                            <li><a href="#">Link</a></li>
			                                            <li><a href="#">Link</a></li>
			                                        </ul>
			                                    </div>
			                                </div>
			                            </li>
			                        </ul>
			                    </div>
			                </div>
			            </li>

			            <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Solutions</a></li>

			        </ul>
			    </div><!-- /.navbar-collapse -->
			</nav>
			    
			    </div>

			    <!-- Main Content -->
			<!--     <div class="container-fluid">
			        <div class="side-body">
			           <h1> Main Content here </h1>
			          
			           
			         
			        </div>
			    </div> -->
			</div>

	@endif
	@endif
	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="js/admin.js"></script>
</body>
</html>
