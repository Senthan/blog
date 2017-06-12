@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="ui pointing menu">
          <a class="active item">
            Home
          </a>
          <a class="item">
            Messages
          </a>
          <a class="item">
            Friends
          </a>
          <div class="right menu">
            <div class="item">
              <div class="ui transparent icon input">
                <input type="text" placeholder="Search...">
                <i class="search link icon"></i>
              </div>
            </div>
          </div>
        </div>
        <section class="content">
            <div class="ui segments">
            
                <div class="ui segment clearfix">

                </div>
                <div class="ui segment blue">
                    <div class="ui three stackable cards">
                      <div class="card">
                        <div class="image">
                          <img src="/images/avatar/large/elliot.jpg">
                        </div>
                      </div>
                      <div class="card">
                        <div class="image">
                          <img src="/images/avatar/large/helen.jpg">
                        </div>
                      </div>
                      <div class="card">
                        <div class="image">
                          <img src="/images/avatar/large/jenny.jpg">
                        </div>
                      </div>
                      <div class="card">
                        <div class="image">
                          <img src="/images/avatar/large/veronika.jpg">
                        </div>
                      </div>
                      <div class="card">
                        <div class="image">
                          <img src="/images/avatar/large/stevie.jpg">
                        </div>
                      </div>
                      <div class="card">
                        <div class="image">
                          <img src="/images/avatar/large/steve.jpg">
                        </div>
                      </div>
                    </div>
                </div>
                
                <div class="ui green segment clearfix">
                    <div class="col-md-6 clearfix">
                        <div class="ui card">
                          <div class="ui slide masked reveal image">
                            <img src="/images/avatar/large/jenny.jpg" class="visible content">
                            <img src="/images/avatar/large/elliot.jpg" class="hidden content">
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
                            <img class="ui avatar image" src="/images/avatar/small/daniel.jpg">
                            <div class="content">
                              <a class="header">Daniel Louise</a>
                              <div class="description">Last seen watching <a><b>Arrested Development</b></a> just now.</div>
                            </div>
                          </div>
                          <div class="item">
                            <img class="ui avatar image" src="/images/avatar/small/stevie.jpg">
                            <div class="content">
                              <a class="header">Stevie Feliciano</a>
                              <div class="description">Last seen watching <a><b>Bob's Burgers</b></a> 10 hours ago.</div>
                            </div>
                          </div>
                          <div class="item">
                            <img class="ui avatar image" src="/images/avatar/small/elliot.jpg">
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
                        <div class="item">            
                            <div class="clearfix" style="max-width:474px;">
                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    <li data-thumb="img/thumb/cS-1.jpg"> 
                                        <img src="img/cS-1.jpg" />
                                         </li>
                                    <li data-thumb="img/thumb/cS-2.jpg"> 
                                        <img src="img/cS-2.jpg" />
                                         </li>
                                    <li data-thumb="img/thumb/cS-3.jpg"> 
                                        <img src="img/cS-3.jpg" />
                                         </li>
                                    <li data-thumb="img/thumb/cS-4.jpg"> 
                                        <img src="img/cS-4.jpg" />
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
