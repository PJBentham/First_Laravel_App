<?php
	
class HomeController extends BaseController {

	public function home(){
		return View::make('index');
	}

	public function registerInterest(){
		// require('assets/php/phpmailer/class.phpmailer.php'); //Not working
		// $emailAddress = Input::get('email');
		// $mail = new PHPMailer();
		// $mail->AddReplyTo("noreply@paulbentham.com","Paul Bentham");
		// $mail->SetFrom('noreply@paulbentham.com', 'Paul Bentham');
		// $mail->AddReplyTo("noreply@paulbentham.com","Paul Bentham");
		// $address = "pjbentham@gmail.com";
		// $mail->AddAddress($address, "Paul Bentham");
		// $mail->Subject = "Interest from mysignoff";
		// $mail->MsgHTML("Interest registered from ".htmlspecialchars($email));
		// if(!$mail->Send()) {
		// 	return View::make('index')->with('message', 'There was a problem registering your interest, please try again.');		
		// } 
		// else {
		// 	return View::make('index')->with('message', 'Thanks for your interest, we will be in touch soon!');		
		// }
		return View::make('index')->with('interest', 'Thanks for your interest, we will be in touch soon!');	
	}	

	public function processLogin(){
		$user = 
		array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
			);

		if(Auth::attempt($user)){
			return View::make('welcome');
			}
		else {
			return View::make('index')->with('message', 'Invalid Username or Password');
		}	
		//if not return to index with below:
		//dd($password);
		//
	}		
}	