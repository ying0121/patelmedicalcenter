<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('header.php'); ?>

	<style>
		.password-container {
			position: relative;
		}
		.password-container .toggle-password {
			position: absolute;
			right: 10px;
			top: 50%;
			transform: translateY(-50%);
			cursor: pointer;
		}
		.password-container .toggle-answer {
			position: absolute;
			right: 10px;
			top: 50%;
			transform: translateY(-50%);
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="wrapper border">
		<div class="main">
			<div class="content">
				<div class="container-fluid">
					<div class = 'container' style = 'max-width:500px!important;margin-top: 50px;'>
						<div class="text-center mb-10">
							<a href="" class="brand-logo">
								<img class="logo-img" alt="Logo" src="<?php echo base_url() ?>assets/images/logo.png" style="width:90%;"/>
							</a>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header card-header-primary">
										<h1 class="card-title text-center">LOGIN</h1>
										<?php if ($this->session->userdata('status') == 'login'): ?>
											<p class="card-category">Please Enter your Credential</p>
										<?php endif ?>
									</div>
									<div class="card-body">
										<?php if ($this->session->userdata('status') == 'login'): ?>
											<form action="<?php echo base_url(),"admin/login"; ?>" method="POST">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="bmd-label-floating">Email address</label>
															<input type="email" class="form-control" name="email" id="inputEmail" required>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="bmd-label-floating">Password</label>
															<div class="password-container">
																<input type="password" class="form-control" name="password" id="inputPassword" required data-eye />
																<i class="fas fa-eye toggle-password"></i>
															</div>
														</div>
													</div>
												</div>
												<button type="submit" class="btn btn-light-primary pull-right" style = 'width:100%;'>LOGIN</button>
												<div class="clearfix"></div>
												<div class="text-center mt-6 text-danger d-none" id="alert">
													<h1>Please Login Again</h1>
												</div>
											</form>
										<?php elseif ($this->session->userdata('status') == 'security'): ?>
											<form action="<?php echo base_url(),"admin/submitSecurity"; ?>" method="POST">
												<div class="row">
													<div class="col-md-12 mb-7">
														<h4 class="card-category" id="question"><?php echo $this->session->userdata('question')['en'] ?></h4>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<div class="password-container">
																<input type="password" class="form-control" name="answer" id="answer" placeholder="Input your answer" required data-eye />
																<i class="fas fa-eye toggle-answer"></i>
															</div>
														</div>
													</div>
												</div>
												<button type="submit" class="btn btn-light-primary pull-right" style = 'width:100%;'>LOGIN</button>
												<div class="clearfix"></div>
												<div class="text-center mt-6 text-danger d-none" id="alert">
													<h1>Please Login Again</h1>
												</div>
											</form>
										<?php endif ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if($this->session->userdata('loginresult')): ?>
		<script>
			mynotify('danger', '<?php echo $this->session->userdata('loginresult') ?>');
		</script>
	<?php $this->session->unset_userdata('loginresult'); ?>
	<?php endif ?>
	<script>	
		$(document).ready(function(){
			$('.toggle-password').on('click', function () {
				const passwordInput = $('#inputPassword');
				const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
				passwordInput.attr('type', type);
				$(this).toggleClass('fa-eye fa-eye-slash');
			});

			$('.toggle-answer').on('click', function () {
				const answerInput = $('#answer');
				const type = answerInput.attr('type') === 'password' ? 'text' : 'password';
				answerInput.attr('type', type);
				$(this).toggleClass('fa-eye fa-eye-slash');
			});
			
			if(localStorage.getItem("once_logged_in") === 'true')
				$("#alert").addClass("d-block");
			localStorage.setItem("once_logged_in",'false');
		});
	</script>
</body>
</html>
