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

<!-- select2 -->
<script src="{{ Asset('select2/select2.js') }}"></script>
<link rel="stylesheet" href="{{ Asset('select2/select2.css') }}" />

<script>
    jQuery(document).ready(function($) {
        $('#destinations').select2();
        $('#departures').select2();
        $('ul.abroad').hide();
        $('.control-land .in').click(function(){
          $('ul.abroad').hide();
          $('ul.notabroad').show();
        });
        $('.control-land .out').click(function(){
          $('ul.abroad').show();
          $('ul.notabroad').hide();
        });
    });
</script>

<link rel="stylesheet" href="{{Asset('lesscss/css/searchtour.css')}}" />
  <div class="wrapper-content">
    <div class="inner-wrapper-content">
      <div class="col-md-3 sidebar-left">
        <div class="inner-sidebar-left">
          <div class="search-tour">
            <div class="inner-search-tour">
              <header>
                <h4>Tìm tour du lịch</h4>
              </header>
              <div class="content">
                <div class="inner-content">
                  <form action="{{ route('searchtour') }}" method="GET">
                  <!-- <input type="hidden" name="_token" value="Ơ csrf_token() Ư"> -->
                      <div class="item">
                        <p>Bạn muốn đi du lịch đến:</p>
                          <select name="destinations" id="destinations">
                             <option value="0">All</option>
                             <?php
                              foreach ($destinationsData as $key => $value) {
                                ?>
                                  <option value="<?php echo $value->id ?>" <?php if(isset($_GET['destinations'])) { echo $_GET['destinations'] == $value->id ? 'selected' : ''; }?>>{{$value->city}}</option>
                                <?php
                              }
                             ?>
                          </select>
                      </div>
                    
                      <div class="item">
                        <p>Khởi hành từ</p>
                        <select name="departures" id="departures">
                           <option value="0">All</option>
                           <?php
                            foreach ($destinationsData as $key => $value) {
                              ?>
                                <option value="<?php echo $value->id ?>"  <?php if(isset($_GET['departures'])) { echo $_GET['departures'] == $value->id ? 'selected' : ''; }?>>{{$value->city}}</option>
                              <?php
                            }
                           ?>
                        </select>
                      </div>
                   
                      <div class="wrap-button">
                         <button type="submit" class="btn btn-primary">Tìm tour</button>
                      </div>
              
                  </form> 

                </div>
              </div>
            </div> <!-- .inner-search-tour -->
          </div> <!-- .search-tour -->
          
          <div class="tour-landscape">
            <div class="inner-tour-landscape">
              <header>
                <h4>Tour theo địa danh</h4>
              </header>
              <div class="content">
                <div class="inner-content">
                  <div class="control-land">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary in">Trong nước</button>
                      <button type="button" class="btn btn-primary out">Nước ngoài</button>
                    </div>
                  </div>
                  
                  <div class="wrap-list">
                    <ul class="abroad">
                      <?php
                        foreach ($landScapeAbroad as $key => $value) {
                          ?>
                            <li>
                              <a href="{{ route('landscape',$value->id) }}"><i class="fa fa-angle-right"></i>{{$value->city}}</a>
                            </li>
                          <?php
                        }
                      ?>
                    </ul>
                    <ul class="notabroad">
                      <?php
                        foreach ($landScapeNotAbroad as $key => $value) {
                          ?>
                            <li>
                              <a href="{{ route('landscape',$value->id) }}"><i class="fa fa-angle-right"></i>{{$value->city}}</a>
                            </li>
                          <?php
                        }
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div> <!-- .inner-tour-landscape -->
          </div> <!-- .tour-landscape-->


        </div>
      </div>
      <div class="page-content col-md-9">
        <div class="inner-page-content">
          <header><h3>Tour du lịch</h3></header>
          <div class="content">
            <div class="inner-content">
              <div class="wrap-header">
                
              </div>
              <div class="wrap-list">
                <div class="inner-wrap-list">
                  <ul>
                    <?php 
                      foreach ($tours as $key => $value) {
                        ?>
                          <li>
                            <div class="inner-item">
                              <div class="wrap-image">
                                <img src="{{ Asset('tours/'.$value->image->link) }}" alt="">
                              </div> 
                              <div class="wrap-row">
                                  <div class="item-content col-md-9">
                                    <h4><a href="javascript:">{{ $value->title }}</a></h4>
                                    <p>
                                      <span class="code">Mã tour:{{ $value->code }}</span> 
                                      <span class="calendar"><i class="fa fa-calendar-times-o"></i>{{ $value->periodNature }}</span> 
                                    </p>
                                    <div class="description">
                                      <?php 
                                        $pos = strpos($value->content," ",50);
                                        echo substr($value->content,0,$pos)."..."; 
                                      ?>
                                    </div>
                                  </div>  
                                  <div class="more col-md-3">
                                        <div class="price">
                                          Giá 1 khách:
                                          <b>{{ $value->price }}d</b>
                                        </div>
                                        <div class="detail"><a href="javascript:">Xem chi tiết</a></div>
                                  </div>
                              </div> <!-- .wrap-row -->
                            </div>
                          </li>
                        <?php
                      }
                    ?>
                  </ul>
                 
                </div> <!-- .inner-wrap-list -->
                <div class="wrap-pagination">
                    {!! $tours->appends(Input::except('page'))->render() !!}
                </div>
              </div>
            </div>
          </div>
          
        </div> <!-- .inner-page-content -->
      </div> <!-- .page-content -->
    </div>
  </div>
@stop