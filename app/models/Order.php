<?php


class Order extends Eloquent {

	protected $fillable = ['member_id','address','total'];

  function orderItems(){
    return $this->belongsToMany('Book')->withPivot('amount','total');

  }



}
