@extends ('home.master')
@section ('head.title')
  Trang web du lịch chính thức Việt Nam.
@stop
@section ('body.content')
  <link rel="stylesheet" href="{{Asset('lesscss/css/post-detail.css')}}" />
  
  <div class="wrapper-content">
    <div class="inner-wrapper-content">
      <div class="page-content col-md-9">
        <div class="inner-page-content">
          <div class="post-detail">
            <header>
              <h3>{{$post->title}}</h3>
            </header>
            <div class="info">
              <p class="post-menu">
                <span class="post-cate">Trong mục :<a href="javascript:">{{$post->category->name}}</a></span>
                <span class="post-date"><i class="fa fa-calendar-times-o"></i>{{$post->date}}</span>
                <span class="post-comment"></span>
              
              </p>
            </div>
            <div class="content">
                <div class="inner-content">
                  {{$post->content}}
                </div>
            </div>
            <div class="wrap-tag">
              <span class="item-tag"></span>
            </div>
            <div class="wrap-comment">
              <div class="inner-wrap-comment">
                <div class="form-comment">
                  <div class="wrap-head">
                    <h3>Bình luận</h3>
                  </div>
                  <?php
                    // $path = parse_url($url, PHP_URL_PATH);
                    // $pathFragments = explode('/', $path);
                    // $end = end($pathFragments);
                  ?>
                  <form action="{{route('submitCommentPost',array('id'=>$post->id,'more'=>Request::segment(3)))}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                      <label for="fullname">Fullname <span style="color:red;">(*)</span></label>
                      <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" />
                      {{ $errors->post->first('fullname') }}
                    </div>
                    <div class="form-group">
                      <label for="email">Email <span style="color:red;">(*)</span></label>
                      <input type="text" class="form-control" name="email" value="{{ old('email') }}"/>
                      {{ $errors->post->first('email') }}
                    </div>
                    <div class="form-group">
                      <label for="comment">Comment <span style="color:red;">(*)</span></label>
                      <textarea type="text" class="form-control" name="comment">{{ old('comment') }}</textarea>
                      {{ $errors->post->first('comment') }}
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                  </form>
               
                  <div class="list-comment">
                    <div class="inner-list-comment">
                      <ul>
                        <?php
                          foreach ($commentposts as $key => $value) {
                            ?>  
                            <li>
                              <div class="item-comment">
                                <div class="wrap-avatar">
                                  <img src="{{ Asset('avatars/'.$value->user->avatar)}}" alt="">
                                </div>
                                <div class="info">
                                  <span class="post-date"><i class="fa fa-calendar-times-o"></i>{{$value->date}}</span>
                                </div>
                                <div class="comment">
                                  {{ $value->comment }}
                                </div>
                              </div>
                            </li>
                            <?php
                          }
                        ?>  
                      </ul>
                      
                    </div>
                  </div>
                </div> <!-- .form-comment -->
              </div> <!-- .inner-wrap-comment -->
            </div>  <!-- .wrap-comment -->
           </div> <!-- .post-detail --> 
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
                                <a href="javascript:"><img src="{{Asset('posts/'.$value->image)}}" alt=""/></a>
                              </div>
                              <div class="title"><a href="javascript:">{{$value->title}}</a></div>
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
                                <a href="javascript:"><img src="{{Asset('posts/'.$value->image)}}" alt=""/></a>
                              </div>
                              <div class="title"><a href="javascript:">{{$value->title}}</a></div>
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
            </div> <!-- .inner-random-post -->
          </div> <!-- .random-post-->
        </div>
      </div>
    </div>
  </div>
@stop