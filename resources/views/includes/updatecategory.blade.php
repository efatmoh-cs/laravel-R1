<div class="form-group">
    <label for="category"> select</label>
<select name=" category_id" id="">
    <option value="">Select category</option>

    @foreach ($categories as $category)

    <option value="{{ $category->id }}"@selected( $category->id == $cars->category_id)> {{$category->categoryName}}

     </option>

    @endforeach
</select>
@error('category_id')
{{ $message }}
@enderror
</div>
