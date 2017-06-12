@extends('layouts.app')
@section('content')
    <section class="content">
        {!! Form::model($blog, ['url' => route('blog.update', ['blog' => $blog]), 'role' => 'form', 'class' => 'form-horizontal ui form', 'method' => 'PATCH']) !!}

            <div class="ui segments">
                <div class="ui segment clearfix">
                    <h2 class="pull-left">Edit blog</h2>
                    <div class="pull-right">
                        <a class="ui small button" href="{{ route('category.create') }}">Create category</a>
                    </div>
                </div>
                <div class="ui green segment">
                    @include('blog.form')
                </div>
                <div class="ui segment">
                    <button class="ui small button blue" type="submit">Update</button>
                    <a class="ui small button" href="{{ route('blog.index') }}">Cancel</a>
                </div>
            </div>
        {!! Form::close() !!}
    </section>
@endsection
