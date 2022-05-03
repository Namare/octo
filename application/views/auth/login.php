

<style>
	.sltags{
		margin: 3px;
	}
</style>


<body class="bg-dark">

<div class="container">
	<div class="card card-login mx-auto mt-5">
		<div class="card-header">Login</div>
		<div class="card-body">
			<span class="text-danger"></span>
			<form action="<?=base_url()?>auth/login" method="post" accept-charset="utf-8">

				<div class="form-group">
					<div class="form-label-group">
						<input type="email" name="identity" value="" class="form-control" id="inputEmail" placeholder="Email address" autofocus="autofocus" required="required"  />
						<label for="inputEmail">Email address</label>
					</div>
				</div>
				<div class="form-group">
					<div class="form-label-group">

						<input type="password" name="password" value="" class="form-control" id="inputPassword" placeholder="password" required="required"  />
						<label for="inputPassword">Password</label>
					</div>
				</div>
				<div class="form-group">
					<div class="checkbox">
						<label>
							<label for="remember">Remember Me:</label>                            <input type="checkbox" name="remember" value="1"  id="remember" />

						</label>
					</div>
				</div>
				<input type="submit" class="btn btn-primary btn-block" value="Login" >
			</form>            <div class="text-center">
				<a class="d-block small mt-3" href="/panel/create_user">Register an Account</a>
				<a class="d-block small mt-3" href='<?=base_url()?>'>Go to site</a>
			</div>
		</div>
	</div>
</div>

<script>

</script>


<!-- Bootstrap core JavaScript-->
<script src="<?=base_url()?>admin/vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=base_url()?>admin/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
