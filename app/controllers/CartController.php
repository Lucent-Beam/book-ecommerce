<?php

  class CartController extends BaseController{

      public function __construct(){}

      public function getIndex(){

        //var_dump('book was added to cart');
        $member_id = Auth::user()->id;
        $cart_books = Cart::with('Books')->where('member_id','=',$member_id)->get();
        $cart_total = Cart::with('Books')->where('member_id','=',$member_id)->sum('total');

        return View::make('cart', compact(['cart_books', 'cart_total']));

                    //->with('cart_books',$cart_books)
                    //->with('cart_total',$cart_total);





      }

      public function postIndex(){

      }

      public function postAddToCart(){

          $rules =[
            'amount' => 'required|numeric',
            'book' => 'required|numeric|exists:books,id'

          ];
          $validator = Validator::make(Input::all(),$rules);

          if($validator->fails()){
              return Redirect::route('index')->with('error','The book could not  be added to your cart');


          }

          //var_dump('Adding to cart');

          //var_dump(Input::get('book'));
          //var_dump(Input::get('amount'));
          $member_id = Auth::user()->id;
          $book_id = Input::get('book');
          $amount = Input::get('amount');

          $book = Book::find($book_id);
          $total = $amount * $book->price;


          $count = Cart::where('book_id','=',$book_id)->where('member_id','=',$member_id)->count();

          if($count){
            return Redirect::route('index')->with('error','The book already exists in your cart');

          }
          //var_dump($book->price);
        //  var_dump($total);
          Cart::create([
              'member_id' => $member_id,
              'book_id' => $book_id,
              'amount' => $amount,
              'total' => $total


          ]);

          return Redirect::route('cart');


      }

  }
