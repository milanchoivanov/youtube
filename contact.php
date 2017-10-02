<?php
	if (isset($_POST["submit"])) {
		$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$emailform = filter_var($_POST['emailform'], FILTER_SANITIZE_EMAIL);
		$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
		$human = intval($_POST['human']);
		$from = 'Demo Contact Form'; 
		$to = 'milanco_i@yahoo.com.com'; 
		$subject = 'Message from Contact Demo ';
	
		$body = "From: $name\n E-Mail: $emailform\n Message:\n $message";
 
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['emailform'] || !filter_var($_POST['emailform'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
 
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	
	require get_template_directory() . '/mockup.php';
	//Prati go emailot ako nema greski i mock up so thank you page.....
	//if (mail ($to, $subject, $body, $from)) {
	//	$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	}
}
?>
 <!-- Ova e div koj ke ja pomesti stranata nadolu -->
							<div id="contact" class="row nopadding">
								<div class="emptySpace row nopadding">
								
								</div>
							</div>	
   			<div  class="contact container-fluid bg-grey nopadding">
				<!-- Ova e div koj ke ja pomesti stranata nadolu -->
			  <h2 class="naslovCon text-center slideanim nopadding"><?php echo $title; ?></h2>
			  <div class="row nopadding">
				<div class=" conP col-sm-5 slideanim">
				  <p><b> <?php echo  __( 'Contact us and we\'ll get back to you within 24 hours.', 'text_domain' ); ?> </b></p>
				  </br>
				  <p><span class="glyphicon glyphicon-map-marker"></span><?php 

						  $newarr = explode("\n",$address);

						  foreach($newarr as $str) {

						  echo $str;

							}
							?> </p>
				  <p><span class="glyphicon glyphicon-phone"></span><?php echo $phone; ?></p>
				  <p><span class="glyphicon glyphicon-envelope"></span><?php echo $email; ?></p>
				</div>

				<form role="form" method="post" action="">
				<div class="col-sm-7">
					<div class="col-sm-6 form-group">
					  <input class="form-control" id="name" name="name" placeholder="Name" type="text" value="<?php echo $name; ?>">
					  <?php echo '<p class="text-danger">'.$errName.'</p>';?>
					</div>
					<div class="col-sm-6 form-group">
					  <input class="form-control" id="email" name="emailform" placeholder="Email" type="text" value="<?php echo $emailform; ?>">
					  <?php echo '<p class="text-danger">'.$errEmail.'</p>';?>
					</div>
				  <div class="form-group">
				  <textarea class="form-control" id="comments" name="message" placeholder="Comment" rows="5" value="<?php echo $message; ?>"><?php echo $message;?></textarea>
				  <?php echo "<p class='text-danger'>".$errMessage."</p>";?>
				  </div>
				  	<div class="form-group">
						<label for="human" class="col-sm-1 control-label">2 + 3 = </label>
							<div class="col-sm-2">
								<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer" value="<?php echo $human?>">
							</div>
					</div></br></br>
					<?php echo '<p class="text-danger">'.$errHuman.'</p>';?>
					<div class="col-sm-12 form-group">
						<input id="submit" name="submit" type="submit" value="Send" class="btn btn-default pull-right">
					</div>

				  	<div class="row form-group">
						<div class="col-sm-10 col-sm-offset-2">
						</div>
					</div>
				</div>
				</form>
			  </div>
			</div>