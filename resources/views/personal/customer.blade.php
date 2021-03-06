<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
  <title>个人统计</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/count.css">
</head>
<body>
<div class="container" id="costomer_count">
  <br>

  <div class="panel panel-success">
    <div class="panel-heading">基本统计</div>
    <ul class="list-group" v-cloak>
      <li class="list-group-item">
        <span class="badge">@{{ doctor_type }}</span>
        用户类型
      </li>
      <li class="list-group-item">
        <span class="badge">@{{ monthly_invite_count }}</span>
        当月邀请数
      </li>
      <li class="list-group-item">
        <span class="badge">@{{ customer_statistics[0].friend_count }}</span>
        好友数
      </li>
      {{--<li class="list-group-item">--}}
        {{--<span class="badge">@{{ customer_statistics[0].article_count }}</span>--}}
        {{--阅读文章数--}}
      {{--</li>--}}
      <li class="list-group-item">
        <span class="badge">@{{ customer_statistics[0].order_count }}</span>
        交易订单数
      </li>
      <li class="list-group-item">
        <span class="badge">@{{ customer_statistics[0].commodity_count }}</span>
        购买商品数
      </li>
      <li class="list-group-item">
        <span class="badge">@{{ customer_statistics[0].money_cost | currency '￥'  }}</span>
        总消费金额
      </li>
    </ul>
  </div>
  {{--<div class="panel panel-info" v-show=" customer_article_statistics.length != 0">--}}
    {{--<div class="panel-heading">学习统计</div>--}}
    {{--<div class="panel-body" v-cloak>--}}
      {{--<div>--}}
        {{--<canvas id="study"></canvas>--}}
      {{--</div>--}}
      {{--<br>--}}

      {{--<div>--}}
        {{--<ul class="list-unstyled data1">--}}
          {{--<li v-for=" article in customer_article_statistics"><span>&emsp;&emsp;&emsp;&emsp;</span>--}}
            {{--@{{ article.article_type.type_ch }}：阅读@{{ article.count }}次--}}
          {{--</li>--}}
        {{--</ul>--}}
      {{--</div>--}}

    {{--</div>--}}

  {{--</div>--}}
  <div class="panel panel-warning" v-show=" customer_commodity_statistics.length != 0">
    <div class="panel-heading">消费统计</div>
    <div class="panel-body" v-cloak>
      <div>
        <canvas id="consume"></canvas>
      </div>
      <br>

      <div>
        <ul class="list-unstyled data2">
          <li v-for=" item in customer_commodity_statistics"><span>&emsp;&emsp;&emsp;&emsp;</span>
            @{{ item.commodity.name }}：@{{ item.count }}件
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<script src="/js/vendor/jquery-2.1.4.min.js"></script>
<script src="/js/vendor/Chart.min.js"></script>
<script src="/js/vendor/vue.js"></script>
<script>
  var count = new Vue({
    el: '#costomer_count',
    data: JSON.parse('{!! json_encode($data) !!}')
  });


  var data1 = [];
  var data2 = [];
  var color_list = ["#A6CEE3", "#1F78B4", "#B2DF8A", "#33A02C", "#FB9A99", "#E31A1C", "#FDBF6F", "#FF7F00", "#CAB2D6", "#6A3D9A", "#B4B482", "#B15928"];
  var highlight_list = ["#CEF6FF", "#47A0DC", "#DAFFB2", "#5BC854", "#FFC2C1", "#FF4244", "#FFE797", "#FFA728", "#F2DAFE", "#9265C2", "#DCDCAA", "#D98150"];

  for (i = 0; i < count.customer_article_statistics.length; i++) {
    data1.push({
      value: count.customer_article_statistics[i].count,
      color: color_list[i % 12],
      highlight: highlight_list[i % 12],
      label: count.customer_article_statistics[i].article_type.type_ch
    });
    $('.data1').children().eq(i).children('span').css("background-color", color_list[i % 12]);
  }

  for (i = 0; i < count.customer_commodity_statistics.length; i++) {
    data2.push({
      value: count.customer_commodity_statistics[i].count,
      color: color_list[i % 12],
      highlight: highlight_list[i % 12],
      label: count.customer_commodity_statistics[i].commodity.name
    });
    $('.data2').children().eq(i).children('span').css("background-color", color_list[i % 12]);
  }

  if (data1.length == 1) {
    data1.push({
      value: .00001,
      color: "#fff"
    });
  }

  if (data2.length == 1) {
    data2.push({
      value: .00001,
      color: "#fff"
    });
  }


  Chart.defaults.global.responsive = true;
//  var ctx = document.getElementById("study").getContext("2d");
//  var myStudy = new Chart(ctx).Pie(data1);
  var ct2 = document.getElementById("consume").getContext("2d");
  var myConsume = new Chart(ct2).Pie(data2);


</script>


</body>
</html>