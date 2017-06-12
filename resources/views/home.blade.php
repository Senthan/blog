@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <section class="content">
            <div class="ui segments">
                <div class="ui segment blue">
                    <div class="ui relaxed list clearfix">
                      <div class="ui link cards">
                      @foreach($blogs as $key => $blog)
                        <div class="card">
                          <div class="image">
                            <img src="http://1.bp.blogspot.com/-UHsmszF_7IM/VLuu0KDOQnI/AAAAAAAAJLs/5jiUmUsqFo8/s1600/photography_i-see-a-pink-sky_084K.jpg">
                          </div>
                          <div class="content">
                            <div class="header">{!! $blog->user->name or '' !!}</div>
                            <div class="meta">
                              <a>{!! $blog->name or '' !!}</a>
                            </div>
                            <div class="description">
                              {!! $blog->description or '' !!}
                            </div>
                          </div>
                        </div>
                      @endforeach
                      </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('script')
<script>

    $(document).ready(function ($) {
        $('#image-gallery').lightSlider({
            gallery:true,
            item:1,
            thumbItem:9,
            slideMargin: 0,
            speed:500,
            auto:true,
            loop:true,
            onSliderLoad: function() {
                $('#image-gallery').removeClass('cS-hidden');
            }  
        });
    });

</script>
@endsection