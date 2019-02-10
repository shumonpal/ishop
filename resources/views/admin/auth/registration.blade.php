<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="assets/images/favicon.ico">

    <title>Neon | Register</title>

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
            
            <p class="description">Create an account, it's free and takes few moments only!</p>
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
            
            <form method="post" role="form" id="form_registerOff" action="{{ route('admin-register') }}">
                {{ csrf_field() }}
                <div class="form-register-success">
                    <i class="entypo-check"></i>
                    <h3>You have been successfully registered.</h3>
                    <p>We have emailed you the confirmation link for your account.</p>
                </div>
                
                <div class="form-steps">
                    
                    <div class="step current" id="step-1">
                    
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>
                                
                                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" />
                                 
                            </div>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-mail"></i>
                                </div>
                                
                                <input type="text" class="form-control" name="email" id="email" data-mask="email" placeholder="E-mail"  />
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
                                    <i class="entypo-calendar"></i>
                                </div>
                                
                                <input type="text" class="form-control" name="address" id="birthdate" placeholder="Address" />
                            </div>
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>                        
                    
                        
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-lock"></i>
                                </div>
                                
                                <input type="password" class="form-control" name="password" id="password" placeholder="Choose Password" autocomplete="off" />
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-lock"></i>
                                </div>
                                
                                <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Confirm Password" autocomplete="off" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block btn-login">
                                <i class="entypo-right-open-mini"></i>
                                Complete Registration
                            </button>
                        </div>
                        
                    </div>
                    
                </div>
                
            </form>
            
            
            <div class="login-bottom-links">
                
                <a href="#">ToS</a>  - <a href="#">Privacy Policy</a>
                
            </div>
            
        </div>
        
    </div>
    
</div>


    <!-- Bottom scripts (common) -->
    <script src="{{asset('public/admin/vandor/bootstrap/js/bootstrap.min.js')}}"></script> 
    <script src="{{asset('public/admin/dist/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('public/admin/dist/js/regi-page.js')}}"></script>

</body>
</html>