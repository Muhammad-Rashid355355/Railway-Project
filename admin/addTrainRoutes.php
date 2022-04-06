

<!doctype html>
<html lang="en">
  <head>
  	<title>Contact Form 06</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
<style>
#routeTrain{
	margin-right: 350px;
}
#containers{
	margin-left: 100px;
}

</style>
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section" id="routeTrain">Route Train</h2>
				</div>
			</div>
			<div class="row justify-content-center" id="containers">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters mb-5">
							<div class="col-md-7">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Route Train</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4">
				            Your Route was Add, thank you!
				      		</div>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm" method='post' action='../forms/addroute.php'>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Arrival:</label>
													<input  class="form-control" type='text' name='arrival'  id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<label class="label" for="email">Departure:</label>
													<input type="Text" class="form-control" name='departure'  id="email" placeholder="departure">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Ticket fare:</label>
													<input type="text" class="form-control" name='tfare' id="subject" placeholder="Subject">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Timings</label>
													<input type="time" class="form-control" name='tfrom' id="subject" placeholder="Subject">
													<br><br><b>To:</b><br>
													<input type="time" class="form-control" name='tto' id="subject" placeholder="Subject">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input  value="Send Message" class="btn btn-primary" type='submit' name='submit' value='Add route'>
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-5 d-flex align-items-stretch">
								<div id="map">
			          </div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>

	

	</body>
</html>

