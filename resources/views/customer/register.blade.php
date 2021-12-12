@extends('customer.shared.master')
@section('content')
	<div class="container pb-4">
		<div class="row">
		<div class="border bg-white" style="width: 90%;margin: auto;top: 20px;padding: 30px 10px;">
			<div class="card-header bg-white text-center"><h3>Sign up account and profile</h3></div>
			<div class="card-body">
				<form method="post" action="{{ route('postRegister') }}">
					@csrf
					<div class="row mb-3">
						<div class="col-md-5">
							<h6 class="mb-3 text-center card-header">Account</h6>
							<div class="form-group row">
								<label for="use_name" class="col-md-6">User name <b style="color: red">*</b></label>
								<input id="user_name" class="col-md-6 form-control" type="text" name="user_name" placeholder="vd: customertest2" required>
							</div>
							<div class="form-group row">
								<label for="password" class="col-md-6">Password <b style="color: red">*</b></label>
								<input id="password" class="col-md-6 form-control" type="password" name="password" placeholder="ex: 12345" required>
							</div>
							<div class="form-group row">
								<label for="repassword" class="col-md-6">Confrim password <b style="color: red">*</b></label>
								<input id=" repassword" class="col-md-6 form-control" type="password" name="repassword" placeholder="ex: 12345" required>
							</div>
						</div>
						<!-- chia đôi -->
						<div class="col-md" style="border-right:1px solid #dddddd;max-width: 20px;margin-right: 20px"></div>
						<div class="col-md-6">
							<h6 class="mb-3 text-center card-header">Profile</h6>
							<div class="form-group row">
								<label for="FullName" class="col-md-5">Full name <b style="color: red">*</b></label>
								<input class="col-md-7 form-control" id="fullname" type="text" name="fullname" placeholder="ex: Lung Thị Linh" required>
							</div>
							<div class="form-group row">
								<div class="col-md-5">Gender</div>
								<div class="col-md-7">
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="male" name="gender" value="1" checked class="custom-control-input" required>
									  <label class="custom-control-label" for="male">Male</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="female" name="gender" value="0" class="custom-control-input" required>
									  <label class="custom-control-label" for="female">Female</label>
									</div>
								</div>	
							</div>
							<div class="form-group row">
								<label for="Address" class="col-md-5">Address <b style="color: red">*</b></label>
								<input class="col-md-7 form-control" id="address" type="text" name="address" placeholder="ex: Hà Nam" required>
							</div>
							<div class="form-group row">
								<label for="dateOfBirth" class="col-md-5">Date <b style="color: red">*</b></label>
								<input class="col-md-7 form-control" id="date" type="date" name="date" min="1920-01-01" max="2010-12-31" required>
							</div>
							<div class="form-group row">
								<label for="Phone" class="col-md-5">Phone <b style="color: red">*</b></label>
								<input class="col-md-7 form-control" id="phone" type="tel" name="phone" placeholder="ex: 0843330889" required>
							</div>
							<div class="form-group row">
								<label for="Email" class="col-md-5">Email</label>
								<input class="col-md-7 form-control" id="email" type="email" name="email" placeholder="ex: lunglinh@mail.com" required>
							</div>
						</div>
					</div>
					<input type="submit" name="" class="btn btn-primary btn-user btn-block" value="Sign up"> 
				</form>
			</div>
		</div>
		</div>
	</div>
@endsection