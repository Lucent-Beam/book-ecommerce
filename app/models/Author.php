<?php


class Author extends Eloquent {

	protected $fillable = ['name','surname'];

	public function books(){
		return $this->hasMany('Book');


	}



}
