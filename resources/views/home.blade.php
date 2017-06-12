@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <section class="content">
            <div class="ui segments">
            
                <div class="ui segment clearfix">

                </div>
                <div class="ui segment blue">
                    
                    @foreach($blogs as $key => $blog)
                      @if($key == 0 || $key %3 == 0)
                        <div class="ui three stackable cards">
                      @endif
                      <div class="card">
                      @foreach($page->getMedia() as $media)
                        <div class="image">
                          <img src="{!! asset($media->disk.'/'.$media->id.'/'.$media->file_name) !!}">
                        </div>
                      @endforeach
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
                      @if($key == 0 || $key %3 == 0)
                        </div>
                      @endif
                    @endforeach
                </div>
                
                <div class="ui green segment clearfix">
                    <div class="col-md-6 clearfix">
                        <div class="ui card">
                          <div class="ui slide masked reveal image">
                            <img src="http://4.bp.blogspot.com/-ryRH20iz2v0/VZFHplQaqJI/AAAAAAAAKu0/dQb85VCObms/w728/slider_05.jpg" class="visible content">
                            <img src="http://3.bp.blogspot.com/-QJ-eHpxCO5E/VZDN37k1sYI/AAAAAAAAKqs/ldaMKhg9mY8/s450/fasion_summer-trend_235K.jpg" class="hidden content">
                          </div>
                          <div class="content">
                            <a class="header">Team Fu &amp; Hess</a>
                            <div class="meta">
                              <span class="date">Create in Sep 2014</span>
                            </div>
                          </div>
                          <div class="extra content">
                            <a>
                              <i class="users icon"></i>
                              2 Members
                            </a>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-6 clearfix">
                        <div class="ui relaxed list clearfix">
                          <div class="item">
                            <img class="ui avatar image" src="http://1.bp.blogspot.com/-UHsmszF_7IM/VLuu0KDOQnI/AAAAAAAAJLs/5jiUmUsqFo8/s1600/photography_i-see-a-pink-sky_084K.jpg">
                            <div class="content">
                              <a class="header">Daniel Louise</a>
                              <div class="description">Last seen watching <a><b>Arrested Development</b></a> just now.</div>
                            </div>
                          </div>
                          <div class="item">
                            <img class="ui avatar image" src="http://3.bp.blogspot.com/-teOCEZ9lnbc/VZDygUj6fmI/AAAAAAAAKrg/EdgzRANztyc/s1600/fasion_backstage-avantgarde_125K.jpg">
                            <div class="content">
                              <a class="header">Stevie Feliciano</a>
                              <div class="description">Last seen watching <a><b>Bob's Burgers</b></a> 10 hours ago.</div>
                            </div>
                          </div>
                          <div class="item">
                            <img class="ui avatar image" src="http://4.bp.blogspot.com/-tBFyDVB5ugs/VZFHkkqla6I/AAAAAAAAKus/6RBJq1eZ33o/w291/slider_04.jpg">
                            <div class="content">
                              <a class="header">Elliot Fu</a>
                              <div class="description">Last seen watching <a><b>The Godfather Part 2</b></a> yesterday.</div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                
                    
                <div class="ui segment blue">
                    <div class="demo">
                        <div class="item" style="text-align: -moz-center !important;text-align: center;">            
                            <div class="clearfix" style="max-width:474px;">
                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    <li data-thumb="http://3.bp.blogspot.com/-OfTnEDq22WM/VZDuM5yGGZI/AAAAAAAAKrE/2bgsYN5u9Gk/s450/fasion_hijab-collection_75K.jpg"> 
                                        <img style="width: 100%" src="http://3.bp.blogspot.com/-OfTnEDq22WM/VZDuM5yGGZI/AAAAAAAAKrE/2bgsYN5u9Gk/s450/fasion_hijab-collection_75K.jpg" />
                                         </li>
                                    <li data-thumb="http://4.bp.blogspot.com/-zRCFgtqAMII/VZDwf46SslI/AAAAAAAAKrQ/_-zS6cXR09U/s450/fasion_creature-concept_229K.jpg"> 
                                        <img style="width: 100%" src="http://4.bp.blogspot.com/-zRCFgtqAMII/VZDwf46SslI/AAAAAAAAKrQ/_-zS6cXR09U/s450/fasion_creature-concept_229K.jpg" />
                                         </li>
                                    <li data-thumb="http://4.bp.blogspot.com/-G8KpjvsQrUI/VZDtBxP9xxI/AAAAAAAAKq8/Fbfs8Kxrw_M/s450/fasion_autumn-fire_101K.jpg"> 
                                        <img style="width: 100%" src="http://4.bp.blogspot.com/-G8KpjvsQrUI/VZDtBxP9xxI/AAAAAAAAKq8/Fbfs8Kxrw_M/s450/fasion_autumn-fire_101K.jpg" />
                                         </li>
                                    <li data-thumb="http://3.bp.blogspot.com/-teOCEZ9lnbc/VZDygUj6fmI/AAAAAAAAKrg/EdgzRANztyc/s450/fasion_backstage-avantgarde_125K.jpg"> 
                                        <img style="width: 100%" src="http://3.bp.blogspot.com/-teOCEZ9lnbc/VZDygUj6fmI/AAAAAAAAKrg/EdgzRANztyc/s450/fasion_backstage-avantgarde_125K.jpg" />
                                         </li>
                                </ul>
                            </div>
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