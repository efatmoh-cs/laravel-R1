<div class="form-group">
    <label for="category"> select</label>
<select name=" category_id" id="">

    @foreach ($categories as $category)

    <option value="{{ $category->id }}"> {{$category->categoryName}}
        @if (isset($request))
            @if($category->id == $request->category_id)
            selected
            @endif
        @endif
     >
         {{ $category->categoryName }}
     </option>

    @endforeach
</select>
@error('category_id')
{{ $message }}
@enderror
</div>
