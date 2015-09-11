@extends ('home.master')
@section ('head.title')
  Trang web du lịch chính thức Việt Nam.
@stop
@section ('body.content')
 <!-- basic stylesheet -->
<link rel="stylesheet" href="{{ Asset('royalslider/royalslider.css') }}">

<!-- skin stylesheet (change it if you use another) -->
<link rel="stylesheet" href="{{ Asset('royalslider/skins/default/rs-default.css') }}"> 

<!-- Plugin requires jQuery 1.8+  -->
<!-- If you already have jQuery on your page, you shouldn't include it second time. -->
<!-- <script src='royalslider/jquery-1.8.3.min.js'></script> -->

<!-- Main slider JS script file --> 
<!-- Create it with slider online build tool for better performance. -->
<script src="{{ Asset('royalslider/jquery.royalslider.min.js') }}"></script>

<script>
    jQuery(document).ready(function($) {
        $(".royalSlider").royalSlider({
            // options go here
            // as an example, enable keyboard arrows nav
            keyboardNavEnabled: true,
            autoScaleSlider : true,
            imageScaleMode : "fill"
        });  
    });
</script>

<link rel="stylesheet" href="{{Asset('lesscss/css/tour.css')}}" />
  <div class="wrapper-content">
    <div class="royalSlider rsDefault">
              <!-- simple image slide -->
      <img class="rsImg" src="{{ Asset('images/beachstuff-1349x579.jpg') }}" />
         
      <img class="rsImg" src="{{ Asset('images/beachstuff-1349x579.jpg') }}" />

      <img class="rsImg" src="{{ Asset('images/beachstuff-1349x579.jpg') }}" />

    </div>  <!-- .royalSlider rsDefault -->
    <div class="inner-wrapper-content">
      <div class="page-content row">
        <div class="inner-page-content">
          <div class="feature-tour">
            <div class="inner-feature-tour">
              <header>
               <h3><i class="fa fa-fire"></i>Tour nổi bật</h3>
              </header>
              <div class="list-item">
                  <div class="inner-list-item">
                      <ul>
                        <?php
                          foreach ($featuretours as $key => $value) {
                            ?>
                              <li>
                                <div class="inner-item">
                                  <div class="image-wrapper">
                                    <img src="{{ Asset('tours/'.$value->image->link) }}" alt="">
                                  </div>
                                  <div class="wrap-title">
                                    <a href="javascript:"><h4>{{ $value->title }}</h4></a>
                                  </div>
                                  <div class="period">
                                     <span><i class="fa fa-calendar-times-o"></i>{{ $value->periodNature }}</span>
                                  </div>
                                  <div class="description">
                                     {{ substr($value->content,0,50) }}
                                  </div>
                                  <div class="more">
                                    <div class="price">
                                      Giá 1 khách:
                                      <b>{{ $value->price }}d</b>
                                    </div>
                                    <div class="detail"><a href="javascript:">Xem chi tiết</a></div>
                                  </div>
                                </div>
                              </li>
                            <?php
                          }
                        ?>
                      </ul>
                  </div> <!-- .inner-list-item -->
                </div> <!-- .list-item -->
                <div class="wrap-button-all">
                  <a href="javascript:" class="see-all">Xem tất cả tour</a>
                </div>
            </div>
          </div>
          <!-- ************************************* -->
          <div class="news-tour">
            <div class="inner-news-tour">
              <header>
               <h3><i class="fa fa-fire"></i>Tour mới nhất</h3>
              </header>
              <div class="list-item">
                  <div class="inner-list-item">
                      <ul>
                        <?php
                          foreach ($newtours as $key => $value) {
                            ?>
                              <li>
                                <div class="inner-item">
                                  <div class="image-wrapper">
                                    <img src="{{ Asset('tours/'.$value->image->link) }}" alt="">
                                  </div>
                                  <div class="wrap-title">
                                    <a href="javascript:"><h4>{{ $value->title }}</h4></a>
                                  </div>
                                  <div class="period">
                                     <span><i class="fa fa-calendar-times-o"></i>{{ $value->periodNature }}</span>
                                  </div>
                                  <div class="description">
                                     {{ substr($value->content,0,50) }}
                                  </div>
                                  <div class="more">
                                    <div class="price">
                                      Giá 1 khách:
                                      <b>{{ $value->price }}d</b>
                                    </div>
                                    <div class="detail"><a href="javascript:">Xem chi tiết</a></div>
                                  </div>
                                </div>
                              </li>
                            <?php
                          }
                        ?>
                      </ul>
                  </div> <!-- .inner-list-item -->
              </div> <!-- .list-item -->
              
              <div class="wrap-button-all">
                  <a href="javascript:" class="see-all">Xem tất cả tour</a>
              </div>

            </div>
          </div> <!-- .new tour -->
        </div> <!-- .inner-page-content -->
      </div> <!-- .page-content -->
    </div>
  </div>
@stop