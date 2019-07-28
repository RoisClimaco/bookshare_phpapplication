				<div class="col-md-5">
 					<form role="form" method="post" action="login.php">
						<fieldset>
              <br>

							<p class="text-uppercase pull-center"> SIGN UP.</p>
 							<div class="form-group">
								<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username">
							</div>

							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
							</div>
								<div class="form-group">
								<input type="password" name="confirmPassword" id="confirmPassword" class="form-control input-lg" placeholder="Confirm Password">
							</div>
              <div class="form-group">
								<input type="text" name="firstname" id="firstname" class="form-control input-lg" placeholder="First Name">
							</div>
              <div class="form-group">
								<input type="text" name="lastname" id="lastname" class="form-control input-lg" placeholder="Last Name">
							</div>
							<div class="form-check">
								  By Signing up, I am agreeing to Bookshare's policy & terms
 							<div>
                <br>
 									  <input type="submit" class="btn btn-lg btn-primary" value="Register">
 							</div>
						</fieldset>
					</form>
				</div>

				<div class="col-md-2">
					<!-------null------>
				</div>

				<div class="col-md-5">
 				 		<form role="form" method ="post" action="login.php">
						<fieldset>
              <br>
							<p class="text-uppercase"> Login using your account: </p>

							<div class="form-group">
								<input type="username" name="log_username" id="reg_username" class="form-control input-lg" placeholder="username">
							</div>
							<div class="form-group">
								<input type="password" name="log_password" id="reg_password" class="form-control input-lg" placeholder="Password">
							</div>
							<div>
								<input type="submit" class="btn btn-primary" value="Sign In">
							</div>

 						</fieldset>
				</form>
        <br><br>
        <div style="color:red; font-weight:bold">
          <?php
            if (!empty($validationErrors)) {
            foreach ($validationErrors as $key => $value) {
              print $value . '<br>';
            }
            }

          ?>
        </div>
				</div>
