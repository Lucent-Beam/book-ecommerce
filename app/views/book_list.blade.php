<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Awesome Book Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript"></script>
  </head>
  <body>
    <div class="container">
      <div class="col-md-3">

      </div>

      <div class="col-md-6">
        @if(!Auth::check())
          {{var_dump('not login')}}

          <h3>Please Login</h3>
          {{Form::open(array('url'=>'/user/login'))}}
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" class="form-control input-sm" name="email" value="">
                </div>

                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control input-sm" name="password" value="">
                </div>

                <button class="btn btn-primary" name="button">Sign in</button>

          {{Form::close()}}

        @else
          {{var_dump('Logged in')}}
          <h3>Welcome, {{Auth::user()->name}}</h3>
          <ul>
            <li><a href="/user/orders">My orders</a></li>
            <li><a href="/user/logout">Logout</a></li>
          </ul>

        @endif

        <hr>

    <!--  {{var_dump($books->toArray())}}-->

        <ul>
                  @foreach($books as $book)
                    <li>
                        <h3>{{$book->title}}</h3>
                        <p>Autor id: {{$book->author_id}}</p>
                        <p>Price {{$book->price}}</p>

                        <form class="" action="/cart/add" method="post">
                            <input type="hidden" name="book" value='{{$book->id}}'>
                            <label for="">Amount</label>
                            <select class="" name="amount">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                            <button class="btn btn-danger">Add to cart</button>
                        </form>

                    </li>

                  @endforeach
        </ul>

      </div>

      <div class="col-md-3">

      </div>


    </div>
    <script type="text/javascript">

    @if(Session::has('error'))
      alert("{{Session::get('error')}}");
    @endif 

    </script>



  </body>
</html>
