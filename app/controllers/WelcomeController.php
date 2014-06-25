<?php
	
class WelcomeController extends BaseController {

	public function welcome(){
		return View::make('welcome');
	}
}	