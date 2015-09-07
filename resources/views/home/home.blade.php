@extends ('home.master')
@section ('head.title')
  Trang web du lịch chính thức Việt Nam.
@stop
@section ('body.content')
  <link rel="stylesheet" href="{{Asset('lesscss/css/home.css')}}" />
  <div class="wrapper-content">
    <div class="inner-wrapper-content">
      <div class="page-content col-md-9">
        <div class="inner-page-content">
          <div class="feature-post">
            <header>
              <h3>Tin nổi bật</h3>
              <div class="wrap-read-more">
                <a href="javascript:">Xem tất cả</a>
              </div>  
            </header>
            
            <div class="list-item">
              <?php
                foreach ($postfeatures as $kpf => $vpf) {
                 ?>
                    <div class="wrap-article">
                      <article>
                          <div class="image-wrapper">
                            <img src="{{Asset('posts/'.$vpf->image)}}" alt="">
                          </div>
                          <h4><?php echo $vpf->title; ?></h4>
                          <div class="description">
                            <?php echo substr($vpf->content,0,80)."...";?>
                          </div>
                          <div class="wrap-footer-post">
                            <a href="#" class="read-more">Đọc tiếp</a>  
                          </div>
                      </article>
                    </div>
                 <?php
                }
              ?>
            </div>
          </div> <!-- .feature-post -->
          <div class="food-post">
            <header>
              <h3>Tin ẩm thực</h3>
              <div class="wrap-read-more">
                <a href="javascript:">Xem tất cả</a>
              </div>  
            </header>
            
            <div class="list-item">
              <?php
                foreach ($postfoods as $kpf => $vpf) {
                 ?>
                  <div class="wrap-article">
                    <article>
                        <div class="image-wrapper">
                          <img src="{{Asset('posts/'.$vpf->image)}}" alt="">
                        </div>
                        <h4><?php echo $vpf->title; ?></h4>
                        <div class="description">
                          <?php echo substr($vpf->content,0,80)."...";?>
                        </div>
                        <div class="wrap-footer-post">
                          <a href="#" class="read-more">Đọc tiếp</a>  
                        </div>
                    </article>
                  </div>  
                 <?php
                }
              ?>
            </div>
          </div> <!-- .food-post -->
          <div class="landscape-post">
            <header>
              <h3>Tin cảnh đẹp</h3>
              <div class="wrap-read-more">
                <a href="javascript:">Xem tất cả</a>
              </div>  
            </header>
            
            <div class="list-item">
              <?php
                foreach ($postlandscapes as $kpf => $vpf) {
                 ?>
                  <div class="wrap-article">
                    <article>
                        <div class="image-wrapper">
                          <img src="{{Asset('posts/'.$vpf->image)}}" alt="">
                        </div>
                        <h4><?php echo $vpf->title; ?></h4>
                        <div class="description">
                          <?php echo substr($vpf->content,0,80)."...";?>
                        </div>
                        <div class="wrap-footer-post">
                          <a href="#" class="read-more">Đọc tiếp</a>  
                        </div>
                    </article>
                  </div>  
                 <?php
                }
              ?>
            </div>
          </div> <!-- .landscape-post -->
        </div> <!-- .inner-page-content -->
      </div> <!-- .page-content -->
      <div class="sidebar col-md-3">
        <div class="inner-sidebar">
          <div class="recent-comment">
            <div class="inner-recent-comment">
              <div class="wrap-head">
                <h4>Các bình luận gần đây</h4>
              </div>
              <div class="wrap-list">
                <ul>
                  <?php
                    foreach ($comments as $key => $value) {
                      ?>
                        <li>
                          <div class="inner-item">
                              <div class="wrap-avatar">
                                <img src="{{Asset('avatars/'.$value->avatar)}}" alt="">
                              </div>
                              {{$value->comment}}
                              <a href="javascript:" class="link">{{$value->title}}</a>
                          </div>
                        </li>
                      <?php
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div> <!-- .recent-comment-->
          <div class="feature-tour">
            <div class="inner-feature-tour">
              <div class="wrap-head">
                <h4>Các tour nổi bật</h4>
              </div>
              <div class="wrap-list">
                <ul>
                  <?php
                    foreach ($tours as $key => $value) {
                      // dd($value->image->link);
                      ?>
                        <li>
                          <div class="inner-item">
                              <div class="wrap-avatar">
                                <img src="{{Asset('tours/'.$value->image->link)}}" alt="">
                              </div>
                              <div class="title">
                                <a href="javascript:">{{$value->title}}</a>
                              </div>
                              <p class="price">{{$value->price}}</p>  
                          </div>
                        </li>
                      <?php
                    }
                  ?>
                </ul>
              </div>
            </div> <!-- .inner-feature-tour -->
          </div> <!-- .feature-tour -->
        </div>
      </div>
    </div>
  </div>
@stop