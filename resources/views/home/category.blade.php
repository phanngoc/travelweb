@extends ('home.master')
@section ('head.title')
  Trang web du lịch chính thức Việt Nam.
@stop
@section ('body.content')
  <link rel="stylesheet" href="{{Asset('lesscss/css/category.css')}}" />
  <div class="wrapper-content">
    <div class="inner-wrapper-content">
      <div class="page-content col-md-9">
        <div class="inner-page-content">
          <div class="category-post">
            <header>
              <h3>Tin nổi bật</h3>
            </header>
            <div class="list-item">
              <ul>
                <?php
                  foreach ($posts as $key => $value) {
                    ?>
                      <li>
                        <div class="inner-item">
                          <h4><a href="{{ route('detailpost',array('id'=>$value->id,'more'=> $value->title)) }}">{{$value->title}}</a></h4>
                          <div class="wrap-content">
                            <div class="wrap-image">
                              <img src="{{Asset('posts/'.$value->image)}}" alt="">
                            </div>
                            <div class="description">
                              {{ substr($value->content,0,250).'...'}}
                            </div>  
                          </div>
                          <div class="footer">
                              <div class="wrap-readmore">
                                <a href="{{ route('detailpost',array('id'=>$value->id,'more'=> $value->title)) }}">Đọc tiếp</a>
                              </div>
                          </div>
                        </div>  
                      </li>
                    <?php
                  }
                ?>
                
              </ul>
            </div>
            <div class="wrap-pagination">
              {!! $posts->render() !!}
            </div>
          </div>
        </div> <!-- .inner-page-content -->
      </div> <!-- .page-content -->
      <div class="sidebar col-md-3">
        <div class="inner-sidebar">
          <div class="feature-post">
            <div class="inner-feature-post">
              <div class="wrap-head">
                <h4>Các bài viết nổi bật</h4>
              </div>
              <div class="wrap-list">
                <ul>
                  <?php
                    foreach ($postfeatures as $key => $value) {
                      ?>
                        <li>
                          <div class="inner-item">
                              <div class="wrap-avatar">
                                <a href="{{ route('detailpost',array('id'=>$value->id,'more'=> $value->title)) }}"><img src="{{ Asset('posts/'.$value->image) }}" alt=""/></a>
                              </div>
                              <div class="title"><a href="{{ route('detailpost',array('id'=>$value->id,'more'=> $value->title)) }}">{{ $value->title }}</a></div>
                              <div class="content">
                              <?php 
                                $pos = strpos($value->content," ",50);
                                echo substr($value->content,0,$pos)."..."; 
                              ?>
                              </div>
                          </div>
                        </li>
                      <?php
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div> <!-- .feature-post-->
          <div class="random-post">
            <div class="inner-random-post">
              <div class="wrap-head">
                <h4>Các bài viết ngẫu nhiên</h4>
              </div>
              <div class="wrap-list">
                <ul>
                  <?php
                    foreach ($randomposts as $key => $value) {
                      ?>
                        <li>
                          <div class="inner-item">
                              <div class="wrap-avatar">
                                <a href="{{ route('detailpost',array('id'=>$value->id,'more'=> $value->title)) }}"><img src="{{Asset('posts/'.$value->image)}}" alt=""/></a>
                              </div>
                              <div class="title"><a href="{{ route('detailpost',array('id'=>$value->id,'more'=> $value->title)) }}">{{$value->title}}</a></div>
                              <div class="content">
                              <?php 
                                $pos = strpos($value->content," ",50);
                                echo substr($value->content,0,$pos)."..."; 
                              ?>
                              </div>
                          </div>
                        </li>
                      <?php
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div> <!-- .recent-comment-->
        </div>
      </div>
    </div>
  </div>
@stop