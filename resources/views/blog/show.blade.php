@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <section class="content">
            <div class="ui segments">
                <div class="ui segment blue">
                    <div class="ui card">
                        <div class="ui slide masked reveal image">
                          <img src="http://4.bp.blogspot.com/-ryRH20iz2v0/VZFHplQaqJI/AAAAAAAAKu0/dQb85VCObms/w728/slider_05.jpg" class="visible content">
                          <img src="http://3.bp.blogspot.com/-QJ-eHpxCO5E/VZDN37k1sYI/AAAAAAAAKqs/ldaMKhg9mY8/s450/fasion_summer-trend_235K.jpg" class="hidden content">
                        </div>
                        <div class="content">
                          <a class="header">{!! $blog->name or '' !!}</a>
                          <div class="meta">
                            <span class="date">{!! $blog->created_at or '' !!}</span>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection