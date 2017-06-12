<div class="field">
    <label>Category</label>
    <select name="blog_category_id" class="ui search selection dropdown category-dropdown">
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option {{ isset($blog) && $category->id == $blog->blog_category_id  ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <p class="help-block"> {!! ($errors->has('blog_category_id') ? $errors->first('blog_category_id') : '') !!}</p>
</div>
<div class="field">
    <label>Name</label>
    {!! Form::text('name') !!}
    <p class="help-block">{!! ($errors->has('name') ? $errors->first('name') : '') !!}</p>
</div>
<div class="field">
    <label>Description</label>
    {!! Form::textarea('description') !!}
    <p class="help-block">{!! ($errors->has('description') ? $errors->first('description') : '') !!}</p>
</div>
<div class="field">
    <label>File</label>
    {!! Form::file('chooseFile', null, ['id' => 'chooseFile', 'class' => 'form-control', 'placeholder' => '']) !!}
    
    <p class="help-block">{!! ($errors->has('chooseFile') ? $errors->first('chooseFile') : '') !!}</p>
</div>

@section('script')
    <script>
        $(document).ready(function () {
            const categoryDropdown  = $('.category-dropdown');
            categoryDropdown.dropdown({forceSelection: false});
        });
    </script>
@endsection