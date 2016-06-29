@extends('main')

@section('css')
  <link rel="stylesheet" href="{{asset('/')}}vendor/iCheck/all.css">
  <link rel="stylesheet" href="{{asset('/')}}vendor/buttons/buttons.css">
  <link rel="stylesheet" href="{{asset('/')}}vendor/swiper/swiper-3.3.0.min.css">
  <style>
    body {
      font-family: "Microsoft YaHei UI", "Helvetica Neue", Helvetica, Arial, sans-serif;
      position: relative;
      height: 100%;
    }

    .container {
      max-width: 750px;
    }

    .mainImg {
      max-width: 400px;
    }

    form {
      font-size: 20px;
    }

    form .icheckbox_flat-blue, .iradio_flat-blue {
      height: 24px;
    }

    .swiper-container {
      width: 100%;
      height: 100%;
    }

    .required {
      color: red;
    }

    .button {
      font-family: "Microsoft YaHei UI", "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    .radio-adjust {
      margin-top: 20px;
      margin-bottom: 20px;
    }

  </style>
@endsection

@section('content')
  <div class="container">
    <form action="localhost">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide swiper-no-swiping">
            <h3 class="text-primary">1、糖尿病治疗方式</h3>

            <div class="mainImg">
              <img class="img-responsive" src="{{url('/')}}image/questionnaire/q1.jpg" alt="q1">
            </div>
            <div class="radio radio-adjust">
              <input required name="q1" id="q1_c1" value="A" type="radio">
              <label for="q1_c1">
                <span class="text-warning">A</span>、注射胰岛素
              </label>
            </div>
            <div class="radio radio-adjust">
              <input required name="q1" id="q1_c2" value="B" type="radio">
              <label for="q1_c2">
                <span class="text-warning">B</span>、单纯使用口服药
              </label>
            </div>
            <p class="hidden required small">请选择一个选项!</p>
            <button type="button" id="button1" style="float: right"
                    class="button button-block button-large button-rounded button-primary">
              确&emsp;认
            </button>
            <br>
          </div>
          <div class="swiper-slide swiper-no-swiping">
            <h3 class="text-primary">2、注射起始时间</h3>

            <div class="mainImg">
              <img class="img-responsive" src="{{url('/')}}image/questionnaire/q2.jpg" alt="q2">
            </div>
            <div class="radio radio-adjust">
              <input name="q2" id="q2_c1" value="A" type="radio">
              <label for="q2_c1">
                <span class="text-warning">A</span>、本月开始
              </label>
            </div>
            <div class="radio radio-adjust">
              <input name="q2" id="q2_c2" value="B" type="radio">
              <label for="q2_c2">
                <span class="text-warning">B</span>、以前
              </label>
            </div>
            <p class="hidden required small">请选择一个选项!</p>
            <button type="button" id="button2" style="float: right"
                    class="button button-block button-large button-rounded button-primary">
              确&emsp;认
            </button>
            <br>
          </div>
          <div class="swiper-slide swiper-no-swiping">
            <h3 class="text-primary">3、使用的注射药物</h3>

            <!--<div class="mainImg">-->
            <!--<img class="img-responsive" src="image/q3.jpg" alt="q3">-->
            <!--</div>-->
            <div class="checkbox">
              <input name="q3[]" id="q3_c1" value="A" type="checkbox">
              <label for="q3_c1">
                <span class="text-warning">A</span>、诺和灵
              </label>
              <button type="button" class="small btn-link show-picture"><i class="glyphicon glyphicon-picture"></i>
              </button>
              <label class="" for="q3_c1">
                <img class="img-responsive" src="{{url('/')}}image/questionnaire/q3_1.jpg" alt="q3_1">
              </label>
            </div>
            <div class="checkbox">
              <input name="q3[]" id="q3_c2" value="B" type="checkbox">
              <label for="q3_c2">
                <span class="text-warning">B</span>、诺和锐&诺和平
              </label>
              <button type="button" class="small btn-link show-picture"><i class="glyphicon glyphicon-picture"></i>
              </button>
              <label class="hide" for="q3_c2">
                <img class="img-responsive" src="{{url('/')}}image/questionnaire/q3_2.jpg" alt="q3_2">
              </label>
            </div>
            <div class="checkbox">
              <input name="q3[]" id="q3_c3" value="C" type="checkbox">
              <label for="q3_c3">
                <span class="text-warning">C</span>、诺和力
              </label>
              <button type="button" class="small btn-link show-picture"><i class="glyphicon glyphicon-picture"></i>
              </button>
              <label class="hide" for="q3_c3">
                <img class="img-responsive" src="{{url('/')}}image/questionnaire/q3_3.jpg" alt="q3_3">
              </label>
            </div>
            <div class="checkbox">
              <input name="q3[]" id="q3_c4" value="D" type="checkbox">
              <label for="q3_c4">
                <span class="text-warning">D</span>、来得时
              </label>
              <button type="button" class="small btn-link show-picture"><i class="glyphicon glyphicon-picture"></i>
              </button>
              <label class="hide" for="q3_c4">
                <img class="img-responsive" src="{{url('/')}}image/questionnaire/q3_4.jpg" alt="q3_4">
              </label>
            </div>
            <div class="checkbox">
              <input name="q3[]" id="q3_c5" value="E" type="checkbox">
              <label for="q3_c5">
                <span class="text-warning">E</span>、优泌林￥&优泌乐
              </label>
              <button type="button" class="small btn-link show-picture"><i class="glyphicon glyphicon-picture"></i>
              </button>
              <label class="hide" for="q3_c5">
                <img class="img-responsive" src="{{url('/')}}image/questionnaire/q3_5.jpg" alt="q3_5">
              </label>
            </div>
            <div class="checkbox">
              <input name="q3[]" id="q3_c6" value="F" type="checkbox">
              <label for="q3_c6">
                <span class="text-warning">F</span>、其他
              </label>
              <button type="button" class="small btn-link show-picture"><i class="glyphicon glyphicon-picture"></i>
              </button>
              <label class="hide" for="q3_c6">
                <img class="img-responsive" src="{{url('/')}}image/questionnaire/q3_6.jpg" alt="q3_6">
              </label>
            </div>
            <p class="hidden required small">请选择一个选项!</p>
            <button type="button" id="button3" style="float: right"
                    class="button button-block button-large button-rounded button-primary">
              确&emsp;认
            </button>
            <br>
          </div>
          <div class="swiper-slide swiper-no-swiping">
            <h3 class="text-primary">4、您多久更换一次胰岛素针头</h3>

            <div class="mainImg">
              <img class="img-responsive" src="{{url('/')}}image/questionnaire/q3.jpg" alt="testImg">
            </div>
            <div class="radio">
              <input name="q4" id="q4_c1" value="A" type="radio">
              <label for="q4_c1">
                <span class="text-warning">A</span>、每次更换
              </label>
            </div>
            <div class="radio">
              <input name="q4" id="q4_c2" value="B" type="radio">
              <label for="q4_c2">
                <span class="text-warning">B</span>、每天更换
              </label>
            </div>
            <div class="radio">
              <input name="q4" id="q4_c3" value="C" type="radio">
              <label for="q4_c3">
                <span class="text-warning">C</span>、1-3天更换
              </label>
            </div>
            <div class="radio">
              <input name="q4" id="q4_c4" value="D" type="radio">
              <label for="q4_c4">
                <span class="text-warning">D</span>、超过3天
              </label>
            </div>
            <div class="radio">
              <input name="q4" id="q4_c5" value="E" type="radio">
              <label for="q4_c5">
                <span class="text-warning">E</span>、更换胰岛素笔芯时更换
              </label>
            </div>
            <p class="hidden required small">请选择一个选项!</p>
            <button type="button" id="button4" style="float: right"
                    class="button button-block button-large button-rounded button-primary">
              确&emsp;认
            </button>
            <br>
          </div>
        </div>
      </div>
    </form>


  </div>

  <script src="{{asset('/')}}vendor/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="{{asset('/')}}vendor/iCheck/icheck.js"></script>
  <script src="{{asset('/')}}vendor/swiper/swiper-3.3.0.min.js"></script>

  <script>
    $(document).ready(function () {

      $('input').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue',
        increaseArea: '20%' // optional
      });

      var swiper = new Swiper('.swiper-container', {
        autoHeight: true
      });

      $('button[class*="show-picture"]').click(function () {
        $('button[class*="show-picture"]').next().addClass('hide');
        $(this).next().removeClass('hide');
        swiper.update();
      });

      $('#button1').click(function () {
        check1 = $('#q1_c1').parent().attr('aria-checked');
        check2 = $('#q1_c2').parent().attr('aria-checked');
        if (check1 === 'true') {
          $(this).siblings('p').addClass('hidden');
          swiper.slideNext()
        } else if (check2 === 'true') {
          $('form').submit();
        } else {
          $(this).siblings('p').removeClass('hidden');
          swiper.update();
        }
      });

      $('#button2').click(function () {
        check1 = $('#q2_c1').parent().attr('aria-checked');
        check2 = $('#q2_c2').parent().attr('aria-checked');
        if (check1 === 'true') {
          $(this).siblings('p').addClass('hidden');
          swiper.slideNext()
        } else if (check2 === 'true') {
          $('form').submit();
        } else {
          $(this).siblings('p').removeClass('hidden');
          swiper.update();
        }
      });

      $('#button3').click(function () {
        var checked = false;
        $(this).siblings('.checkbox').children('div').each(function () {
          if ($(this).attr('aria-checked') === 'true') {
            checked = true;
          }
        });
        if (checked) {
          $(this).siblings('p').addClass('hidden');
          swiper.slideNext()
        } else {
          $(this).siblings('p').removeClass('hidden');
          swiper.update();
        }
      });

      $('#button4').click(function () {
        var checked = false;
        $(this).siblings('.radio').children('div').each(function () {
          if ($(this).attr('aria-checked') === 'true') {
            checked = true;
          }
        });
        if (checked) {
          $(this).siblings('p').addClass('hidden');
          $('form').submit();
        } else {
          $(this).siblings('p').removeClass('hidden');
          swiper.update();
        }
      })
    });


  </script>
@endsection