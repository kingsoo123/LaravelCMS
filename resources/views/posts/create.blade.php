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
          <div class="card-header">{{isset($post) ? 'Edit post' : 'Create post'}}</div>
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
          <form action="{{isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          @if(isset($post))
          @method('PUT')
          @endif
         
          <label for="name">Title</label>
          <div class="form-group">
          <input type="text" class="form-control" name="title" value="{{isset($post) ? $post->title : ''}}">
          </div>
          <label for="description">Description</label>
          <div class="form-group">
          <textarea name="description" id="description" cols="30" rows="10">{{isset($post) ? $post->description : ''}}</textarea>
          </div>

          <label for="content">Content</label>
          <div class="form-group">
          <textarea name="content" id="content" cols="30" rows="10">{{isset($post) ? $post->content : ''}}</textarea>
          </div>

          <label for="published_at">Published at</label>
          <div class="form-group">
          <input type="date" class="form-control" name="published_at" id="published_at" value="{{isset($post) ? $post->published_at : ''}}">
          </div>

          <div class="form-group">
          <label for="category">Category</label>
          <select name="category" id="category">
          @foreach($categories as $category)
          <option value="{{$category->id}}" 
          @if(isset($post))
            @if($category->id ===$post->category->id)
            selected
            @endif

          @endif
          >
          {{$category->name}}
          </option>
          @endforeach
          </select>
          </div>

@if($tags->count()>0)
            <div class="form-group">
            <label for="tags">Tag</label>
            <select name="tags[]" id="tags" multiple>
            @foreach($tags as $tag)
            <option value="{{$tag->id}}" 
            @if(isset($post))
            @if($post->hasTag($tag->id))
                selected
            @endif
            @endif>
            {{$tag->name}}
            </option>
            @endforeach
            </select>
            </div>
@endif

          @if(isset($post))
          <div class="form-group">
          <img src="{{asset($post->image)}}"/>
          </div>
          @endif

          <label for="image">Image</label>
          <div class="form-group">
          <input type="file" class="form-control" name="image" id="image">
          </div>
          <div class="form-group">
          
          <button type="submit" class="form-control btn btn-success">Create post</button>
          </div>
          </form>
          </div>
          </div>
        </div>
    </body>
</html>
