<style>
  hr{
    background-color:white;
  }
</style>

<footer class="footer">
	<div class="container-fluid px-lg-5">
		<div class="row">
			<div class="col-md-9 py-5">
				<div class="row">
					<div class="col-md-4 mb-md-0 mb-4">
						<h2 class="footer-heading">About us</h2><hr>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
						<!-- <ul class="ftco-footer-social p-0">
							<li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="ion-logo-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="ion-logo-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="ion-logo-instagram"></span></a></li>
						</ul> -->
					</div>
					<div class="col-md-8">
						<div class="row justify-content-center">
							<div class="col-md-12 col-lg-10">
								<div class="row">
									<div class="col-md-4 mb-md-0 mb-4">
										<h2 class="footer-heading">Services</h2><hr>
										<ul class="list-unstyled">
											<li><a href="#" class="py-1 d-block">Car Repairs</a></li>
											<li><a href="#" class="py-1 d-block">Car Sales</a></li>
											<li><a href="#" class="py-1 d-block">Mechanical Tips</a></li>
											<li><a href="#" class="py-1 d-block">Automobile Design</a></li>
										</ul>
									</div>
									<div class="col-md-4 mb-md-0 mb-4">
										<h2 class="footer-heading">About</h2><hr>
										<ul class="list-unstyled">
											<li><a href="#" class="py-1 d-block">Staff</a></li>
											<li><a href="#" class="py-1 d-block">Team</a></li>
											<!-- <li><a href="#" class="py-1 d-block">Careers</a></li> -->
											<li><a href="#" class="py-1 d-block">Blog</a></li>
										</ul>
									</div>
									<div class="col-md-4 mb-md-0 mb-4">
										<h2 class="footer-heading">Resources</h2><hr>
										<ul class="list-unstyled">
											<li><a href="#" class="py-1 d-block">Security</a></li>
											<li><a href="#" class="py-1 d-block">Global</a></li>
											<li><a href="#" class="py-1 d-block">Charts</a></li>
											<li><a href="#" class="py-1 d-block">Privacy</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-md-5">
					<div class="col-md-12">
						<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This was made by Exceptional  VASS <i class="ion-ios-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">ROCKETWARES.com</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5">
				<h2 class="footer-heading">SEND A MESSAGE</h2><hr>
				<form action="index.php" method="POST" class="contact-form">
					<div class="form-group">
						<input type="text" class="form-control" name="txt_name" placeholder="Your Name">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Your Email">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="subject" placeholder="Subject">
					</div>
					<div class="form-group">
						<textarea id="" cols="30" name="body" rows="3" class="form-control" placeholder="Message"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" onclick="sendEmail()" name="btnSend" class="form-control submit px-3">Send</button>
					</div>
				</form>
			</div> -->
		</div>
	</div>
</footer>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/typed.js"></script>
          

  <script src="js/main.js"></script>




  
  <script src="jsc/jquery.min.js"></script>
  <script src="jsc/jquery-migrate-3.0.1.min.js"></script>
  <script src="jsc/popper.min.js"></script>
  <script src="jsc/bootstrap.min.js"></script>
  <script src="jsc/jquery.easing.1.3.js"></script>
  <script src="jsc/jquery.waypoints.min.js"></script>
  <script src="jsc/jquery.stellar.min.js"></script>
  <script src="jsc/jquery.animateNumber.min.js"></script>
  <script src="jsc/owl.carousel.min.js"></script>
  <script src="jsc/jquery.magnific-popup.min.js"></script>
  <script src="jsc/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="jsc/google-map.js"></script>
  <script src="jsc/main.js"></script>

  <script type="text/javascript">
	function sendEmail() {
		console.log('sending ...');
		var name = $("name");
		var email = $("email");
		var subject = $("subject");
		var body = $("body");

		if (isNotEmpty(name) ** isNotEmpty(email) && isNotEmpty($subject) && isNotEmpty(body)){
			// console.log('passing condition');

			$.ajax ({
				url: 'sendmail.php',
				method: 'POST',
				dataType: 'json',
				data: {
					name: name.val(),
					email: email.val(),
					subject: subject.val(),
					body: body.val(),
				}, success: function (response){
					console.log(response);
				}
			});
		}

		function isNotEmpty(caller){
			if  (caller.val() == "") {
				caller.css('border', '1px solid red');
				return false;
			}else {
				caller.css ('border', '1px solid green');
				return true;
			}  
		} 
	}
  </script>
    
  </body> 
</html>