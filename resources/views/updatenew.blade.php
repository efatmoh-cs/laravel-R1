<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
{{-- value from db --}}
<div class="container">
  <h2>UpdateNews</h2>
  <form action="{{ route('news', $news->id) }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ $news->title}}">
    </div>
    <div class="form-group">
        <label for="title">Auth:</label>
        <input type="text" class="form-control" id="auth" placeholder="Enter title" name="auth" value="{{$news->auth}}">
      </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" rows="5" id="description" name="content">{{$news->description}}</textarea></textarea>
      </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"  @checked($news->published)> Published</label>
    </div>
    <button type="submit" class="btn btn-default">Add</button>
  </form>
</div>

</body>
</html>
