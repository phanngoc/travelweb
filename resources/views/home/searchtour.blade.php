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
    <div class="inner-wrapper-content">
      <div class="col-md-3 sidebar-left">
        <div class="inner-sidebar-left">
          
        </div>
      </div>
      <div class="page-content col-md-9">
        <div class="inner-page-content">
          
          
          
        </div> <!-- .inner-page-content -->
      </div> <!-- .page-content -->
    </div>
  </div>
@stop