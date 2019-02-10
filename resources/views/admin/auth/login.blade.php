<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="assets/images/favicon.ico">

	<title>Neon | Login</title>

	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="{{asset('public/admin/vandor/entypo/css/entypo.css')}}">

	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="{{asset('public/admin/vandor/bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/dist/css/custom.css')}}">
	<!-- jQuery 3 -->
	<script src="{{asset('public/admin/vandor/jquery/jquery.min.js')}}"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body login-page login-form-fall">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>

<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="index.html" class="logo">
				<h2>E-shop</h2>
				<img src="assets/images/logo@2x.png" width="120" alt="" />
			</a>
			
			<p class="description">Dear user, log in to access the admin area!</p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<div class="form-login-error">
				<h3>Invalid login</h3>
				<ul>
					@if($errors->any())
					@foreach($errors as $error)
					<li>{{ $error }}</li>
					@endforeach
					@endif
				</ul>
				<p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
			</div>
			
			<form method="post" role="form" id="form_loginOff" action="{{ route('admin-login') }}">
				{{ csrf_field() }}
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="text" class="form-control" name="email" id="email" placeholder="Email" />
					</div>
					@if ($errors->has('email'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('email') }}</strong>
	                    </span>
	                @endif
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="passwd" id="password" placeholder="Password" autocomplete="off" />
					</div>
					@if ($errors->has('passwd'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('passwd') }}</strong>
	                    </span>
	                @endif
				
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						Login In
					</button>
				</div>
				
				<!-- Implemented in v1.1.4 -->
				<div class="form-group">
					<em>- or -</em>
				</div>
				
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left facebook-button">
						Login with Facebook
						<i class="entypo-facebook"></i>
					</button>
					
				</div>
				
				<!-- 
				
				You can also use other social network buttons
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left twitter-button">
						Login with Twitter
						<i class="entypo-twitter"></i>
					</button>
					
				</div>
				
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left google-button">
						Login with Google+
						<i class="entypo-gplus"></i>
					</button>
					
				</div> -->
				
			</form>
			
			
			<div class="login-bottom-links">
				
				<a href="extra-forgot-password.html" class="link">Forgot your password?</a>
				
				<br />
				
				<a href="#">ToS</a>  - <a href="#">Privacy Policy</a>
				
			</div>
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom scripts (common) -->
	<script src="{{asset('public/admin/vandor/bootstrap/js/bootstrap.min.js')}}"></script> 
	<script src="{{asset('public/admin/dist/js/jquery.validate.min.js')}}"></script>
	<script src="{{asset('public/admin/dist/js/login-page.js')}}"></script>




	<!-- Demo Settings -->
	<script src="{{asset('public/admin/dist/js/login-demo.js')}}"></script>

</body>
</html>