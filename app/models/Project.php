<?php

class User extends Eloquent{
	public function project(){
		return $this->belongsTo("User");
	}
}