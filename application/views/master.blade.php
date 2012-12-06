<!DOCTYPE html>
<html>
<head>	
	<title>{{ Lang::line('imagebacon.imagebacon')->get(); }}</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	
 	<link href="http://fonts.googleapis.com/css?family=Open Sans" rel="stylesheet" type="text/css">
 	<link href="http://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" type="text/css">
	{{ Asset::container('bootstrapper')->styles() }}
	{{ HTML::style('css/master.css') }}
	
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->		
	
</head>
<body>

	<div class="container-narrow">

		<div class="masthead">
			<ul class="nav nav-pills pull-right">
				<li class="active"><a href="#">{{ Lang::line('imagebacon.home')->get() }}</a></li>
				<li><a href="#">{{ Lang::line('imagebacon.gallery')->get() }}</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
					<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
						<form method="post" action="login" accept-charset="UTF-8">
							<input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
							<input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
							<input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
							<label class="string optional" for="user_remember_me"> Remember me</label>
							<input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
							<label style="text-align:center;margin-top:5px">or</label>
					        <a class="btn btn-primary btn-block" type="button" href="/account/register">Register an account</a>
						</form>
					</div>
				</li>
			</ul>
			<h3>
				<a href="/" title="{{ Lang::line('imagebacon.randtitle')->get()[mt_rand(0, count(Lang::line('imagebacon.randtitle')->get()) - 1)]; }}">{{ Lang::line('imagebacon.imagebacon')->get(); }}</a>
			</h3>
		</div>

		<hr>

		@section('content')

		@yield_section

		<hr>

		<div class="footer">
			<p>&copy; Company 2012</p>
		</div>

	</div> <!-- /container -->


	{{ Asset::container('bootstrapper')->scripts() }}
	{{ HTML::script('js/upload.min.js') }}
	{{ HTML::script('js/bacon.js'); }}
</body>
</html>