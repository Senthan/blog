@extends('layouts.app')
@section('content')
    <section class="content">
        {!! Form::open(['url' => route('blog.store'), 'role' => 'form', 'class' => 'form-horizontal ui form', 'files' => true]) !!}
            <div class="ui segments">
                <div class="ui segment clearfix">
                    <h2 class="pull-left">Create blog</h2>
                    <div class="pull-right">
                        <a class="ui small button" href="{{ route('category.create') }}">Create category</a>
                    </div>
                </div>
                <div class="ui green segment">
                    @include('blog.form')
                </div>
                <div class="ui segment">
                    <button class="ui small button green" type="submit">Create</button>
                    <a class="ui small button" href="{{ route('blog.index') }}">Cancel</a>
                </div>
            </div>
        {!! Form::close() !!}
    </section>
@endsection
