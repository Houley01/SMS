<div class="jumbotron">
		<div class="container">
			<h1>Please Login To View This Page</h1>
			<h2>Stocktake Managment System</h2>
			<p>Current Time:
				<span class="clock" id="time"></span>
			</p>
		</div>
		<div class="container">

		</div>

		<!-- Modal -->
		<div class="modal fade" id="loginModal" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header" style="padding:35px 50px;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
					</div>
					<div class="modal-body" style="padding:40px 50px;">
						<form role="form" class="" action="../Model/login_process.php" method="POST">
							<div class="form-group">
								<label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
								<input type="text" class="form-control" name="username" id="username" placeholder="Username" value="Admin">
							</div>
							<div class="form-group">
								<label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
								<input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Enter password" value="password">
							</div>
							<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
						</form>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

					</div>
				</div>

			</div>
		</div>
		<hr>
