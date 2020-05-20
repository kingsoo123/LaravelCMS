<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="bootstrap.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

          <div class="card-default">
          <div class="card-header">{{isset($tag) ? 'Edit tag' : 'Create tag'}}</div>
          <div class="card-body">
          @if($errors->any())
            <div class="alert alert-danger">
            <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item text-danger">
            {{$error}}
            </li>
            @endforeach
            </ul>
            </div>
          @endif
          <form action="{{isset($tag) ? route('tags.update', $tag->id) : route('tags.store')}}" method="POST">
          @csrf
          @if(isset($tag))
          @method('PUT')
          @endif
          <label for="name">Name</label>
          <div class="form-group">
          <input type="text" class="form-control" name="name" value="{{isset($tag) ? $tag->name : ''}}">
          </div>

          <div class="form-group">
          <button type="submit" class="form-control btn btn-success">{{isset($tag) ? 'Update tag' : 'Create tag'}}</button>
          </div>
          </form>
          </div>
          </div>
        </div>
    </body>
</html>
