<?php include_once './helpers/session_helper.php'; ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Login &amp; Register Templates</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="public/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="public/assets/css/form-elements.css">
        <link rel="stylesheet" href="public/assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="public/assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="public/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="public/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="public/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="public/assets/ico/apple-touch-icon-57-precomposed.png">
			<style>
				.form-message {
					padding: 10px;
					margin-bottom: 10px;
					border-radius: 5px;
					font-size: 14px;
				}

				.form-message-red {
					background-color: #ffcccc; /* Màu nền đỏ */
					color: #cc0000; /* Màu chữ đỏ */
					border: 1px solid #cc0000; /* Viền đỏ */
				}
				.form-message-green {
					padding: 10px;
					margin-bottom: 10px;
					border-radius: 5px;
					font-size: 14px;
					background-color: #d4edda; /* Màu nền xanh lá */
					color: #155724; /* Màu chữ xanh lá */
					border: 1px solid #c3e6cb; /* Viền xanh lá */
				}

			</style>
    </head>

    <body style="background-image: url('public/assets/img/backgrounds/1.jpg')">

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong></strong> Đăng nhập &amp; Đăng ký tài khoản</h1>
                            <div class="description">
                            	<p>
	                            	<!-- This is a free responsive <strong>"login and register forms"</strong> template made with Bootstrap. 
	                            	Download it on <a href="http://azmind.com" target="_blank"><strong>AZMIND</strong></a>, 
	                            	customize and use it as you like! -->
                            	</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Đăng nhập vào chúng tôi</h3>
	                            		<p>Nhập tài khoản và mật khẩu vào bên dưới:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
									<?php flash('login'); ?>
				                    <form role="form" action="./controllers/UserController.php" method="post" class="login-form">
										<input type="hidden" name="type" value="login">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="username">Tài khoản</label>
				                        	<input type="text" name="username" placeholder="Tài khoản..." class="form-username form-control" id="username">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="password">Mật khẩu</label>
				                        	<input type="password" name="password" placeholder="Mật khẩu..." class="form-password form-control" id="password">
				                        </div>
				                        <button type="submit" class="btn">Đăng nhập!</button>
				                    </form>
			                    </div>
		                    </div>
		                
		                	<div class="social-login">
	                        	<h3>...hoặc đăng nhập với:</h3>
	                        	<div class="social-login-buttons">
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-facebook"></i> Facebook
		                        	</a>
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-twitter"></i> Twitter
		                        	</a>
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-google-plus"></i> Google Plus
		                        	</a>
	                        	</div>
	                        </div>
	                        
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Đăng ký ngay bây giờ</h3>
	                            		<p>Điền thông tin bạn vào bên dưới:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
								
	                            <div class="form-bottom">
								<?php flash('register'); ?>
				                    <form role="form" action="./controllers/UserController.php" method="post" class="registration-form">
                                        <input type="hidden" name="type" value="register">
										<input type="hidden" name="role" value="CUSTOMER">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="fullname">Họ tên</label>
				                        	<input type="text" name="fullname" placeholder="Họ tên..." class=" form-control" id="fullname" required>
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="email">Email</label>
				                        	<input type="text" name="email" placeholder="Email..." class="form-control" id="email" required>
				                        </div>
                                        <div class="form-group">
				                        	<label class="sr-only" for="username">Tài khoản</label>
											<input type="text" name="username" placeholder="Tài khoản..." class=" form-control" id="username" required>
				                        </div>
                                        <div class="form-group">
				                        	<label class="sr-only" for="password">Mật khẩu</label>
				                        	<input type="password" name="password" placeholder="Mật khẩu..." class=" form-control" id="password" required>
				                        </div>
                                        <div class="form-group">
				                        	<label class="sr-only" for="password2">Xác thực mật khẩu</label>
				                        	<input type="password" name="password2" placeholder="Mật khẩu lần 2..." class="form-control" id="password2" required>
				                        </div>
				                        
				                        <button type="submit" class="btn">Đăng ký!</button>
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Sự hài lòng của bạn là <a href="http://azmind.com" target="_blank"><strong>niềm vui</strong></a> 
                        của chúng tôi <i class="fa fa-smile-o"></i></p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="public/assets/js/jquery-1.11.1.min.js"></script>
        <script src="public/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="public/assets/js/jquery.backstretch.min.js"></script>
        <script src="public/assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>