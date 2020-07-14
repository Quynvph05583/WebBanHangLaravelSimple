<!DOCTYPE html>
<html>
<head>
<base href="{{asset('public/layout/backend')}}/">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Đăng nhập</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<![endif]-->
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<div class="global-container">
    <div class="card login-form">
        <div class="card-body">
            <h3 class="card-title text-center">Log in to Laravel</h3>
            <div class="card-text">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div>
                @include('error.note')
                <form role="form" method="post">
                        <fieldset>
                        <!-- to error: add class "has-danger" -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1" value="{{old('email')}}" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
                        </div>
                        <label>
                            <input class="check" name="remember" type="checkbox" value="remember"> Remember
                        </label>
                        <a href="#" style="float:right;font-size:12px;">Forgot password?</a>

                        <input type="submit" class="btn btn-primary btn-block" value="Sign in" href="index.html"/>

                        <div class="sign-up">
                            Don't have an account? <a href="#">Create One</a>
                        </div>
                        </fieldset>
                        {{csrf_field()}}
                    </form>
            </div>
        </div>
    </div>
</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
</body>

</html>
