<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
  <title>分类浏览</title>
  <link rel="stylesheet" href="{{asset('/css/shop.css')}}">

</head>
<body style="background-color: #EEEEEE;">

<div class="container category">

  <div class="col-xs-3">
    <ul class="list-unstyled">
      <li class="li-active">分类1</li>
      <li>分类2</li>
      <li>分类3</li>
      <li>分类4</li>
      <li>分类5</li>
    </ul>
  </div>

  <div class="col-xs-9">

    <div class="col-xs-6">
      <a href="">
        <h4>诺和针</h4>

        <p>一次性使用无菌注射针</p>
        <img class="img-responsive" src="{{url('/image/shop_goods/1.png')}}" alt="">

        <div>
          <span>￥22</span>

          <p>迈豆换购价2200</p>
        </div>
      </a>
    </div>

  </div>

</div>

<script src="{{asset('/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('/js/shop_category.js')}}"></script>
</body>
</html>