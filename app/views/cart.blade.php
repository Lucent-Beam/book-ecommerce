<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cart</title>
  </head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  <body>
      <div class="container">
        <h1>Your cart</h1>

            <table class="table">
              <tr>
                <td>Title</td>
                <td>Amount</td>
                <td>Price</td>
                <td>Total</td>
                <td>Delete</td>
              </tr>
              @foreach($cart_books as $cart_item)
            <tr>
              <td>{{$cart_item->Books->title}}</td>
              <td>{{$cart_item->amount}}</td>
              <td>{{$cart_item->Books->price}}</td>
              <td>{{$cart_item->total}}</td>
              <td><a href="" class="btn btn-danger">Delete</a></td>
            </tr>
              @endforeach
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>{{$cart_total}}</td>
              <td><button type="button" clas="btn btn-success" name="button">Pay</button></td>

            </tr>


          </table>



      <form class="" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_cart">
				<input type="hidden" name="upload" value="2">
				<input type="hidden" name="business" value="iluis.06@outlook.com">

        <?php
        $num = 1;
        ?>

        @foreach($cart_books as $cart_item)

        <input type="hidden" name="item_name_{{$num}}" value="{{$cart_item->Books->title}}">
				<input type="hidden" name="quantity_{{$num}}" value="{{$cart_item->amount}}">
				<input type="hidden" name="amount_{{$num}}" value="{{$cart_item->Books->price}}">
				<input type="hidden" name="shipping_{{$num}}" value="1.75">
        <?php
        $num = $num + 1;
        ?>
        @endforeach

				<input type="submit" value="Paypal">

		</form>



      </div>







  </body>
</html>
