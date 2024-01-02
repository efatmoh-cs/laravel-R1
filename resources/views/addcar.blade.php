<!DOCTYPE html>
<html lang="{{app()->getLocale()}}"
data.textdirection="{{app()->getLocale()=="ar" ? 'rtl' : 'ltr'}}">
<head>

    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container"> <div>

        <div>
        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a>
        <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">Arabic</a>
    </div>
    <h2>{{ __('messages.contactF') }}</h2>
    <form action="{{route('storecar')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">{{ __('messages.contactt') }}</label>
            <input type="text" class="form-control" id="title" placeholder="{{ __('messages.contact') }}" name="cartitle" value="{{ old('cartitle') }}">
            @error('cartitle')
            <div class="alert alert-warning">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">{{ __('messages.contacts') }}</label>
            <input type="number" class="form-control" id="price" placeholder="{{ __('messages.contactss') }}" name="price" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <label for="description">{{ __('messages.contactsss') }}</label>
            <textarea class="form-control" rows="5" id="description" name="desciption">{{ old('desciption') }}</textarea>
            @error('desciption')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="image">{{ __('messages.contactssss') }}</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
            @error('image')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="category">{{ __('messages.contactsssss') }}</label>
        <select name=" category_id" id="">
            <option value="">{{ __('messages.form') }}</option>

            @foreach ($categories as $category )

            <option value="{{$category->id }}"> {{$category->categoryName}}</option>
            @endforeach
        </select>
        @error('category_id')
        {{ $message }}
    @enderror
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="published">{{ __('messages.pup') }}</label>
        </div>
        <button type="submit" class="btn btn-default">{{ __('messages.ADD') }}</button>
    </form>
</div>

</body>
</html>
