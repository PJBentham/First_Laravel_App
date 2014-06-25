<?php
function checkMail($test){
  	if(isset($test)){
		if(filter_var(htmlspecialchars($test), FILTER_VALIDATE_EMAIL)){
			$mail = new PHPMailer();
			$mail->AddReplyTo("noreply@paulbentham.com","Paul Bentham");
			$mail->SetFrom('noreply@paulbentham.com', 'Paul Bentham');
			$mail->AddReplyTo("noreply@paulbentham.com","Paul Bentham");
			$address = "pjbentham@gmail.com";
			$mail->AddAddress($address, "Paul Bentham");
			$mail->Subject = "Interest from mysignoff";
			$mail->MsgHTML("Interest registered from ".htmlspecialchars($test));
			if(!$mail->Send()) {
				echo "<h5>Mailer Error: " . $mail->ErrorInfo."</h5>";
			} 
			else {
				echo "<h5>Thanks, your interest has been registered. We will be in touch asap!</h5>";
			}															}		
		else {
			echo "<h5>Invalid email address entered, please try again...</h5>";
		}
	}
}	
// function checkSignIn($username, $password){
// 	if(isset($_POST["username"], $_POST["username"])!=false){
//     	if(htmlspecialchars($_POST["username"]) != "Paul" || htmlspecialchars($_POST["password"]) != "Cloud6six"){
//       		echo "<p>incorrect username or password</p>";
//     	}
//   	} 
// }
?>