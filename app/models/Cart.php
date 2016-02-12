<?php


class Cart extends Eloquent {

	protected $fillable = ['member_id','book_id','amount','total'];

  function Books(){
    return $this->belongsTo('Book','book_id');

  }



}
