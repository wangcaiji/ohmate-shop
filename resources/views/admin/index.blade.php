<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
  <title>易康伴侣管理后台</title>
  <link rel="stylesheet" href="{{asset('/css/admin.css')}}">
</head>
<body id="index">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
              aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand active" href="#">易康伴侣</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">用户管理</a></li>
        <li><a href="#">商城管理</a></li>
        <li><a href="#">文章管理</a></li>
        <li><a href="#">系统管理</a></li>
      </ul>
      <form class="navbar-form navbar-right" @submit.prevent="search">
        <div class="has-feedback">
          <input v-on:keyup.enter="submit" type="text" class="form-control" placeholder="Search..."
                 v-model="searching.detail">
          <button type="submit" class="btn btn-link form-control-feedback fa fa-search"></button>
        </div>
      </form>
    </div>
  </div>
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <ul class="nav nav-sidebar">
        <li :class="(searching.user_type == '医生')?'active':''" @click="choose_data" id="doctor"><a href="#doctor">医生</a></li>
        <li :class="(searching.user_type == '志愿者')?'active':''" @click="choose_data" id="volunteer"><a href="#volunteer">志愿者</a></li>
        <li :class="(searching.user_type == '所有用户')?'active':''" @click="choose_data" id="users"><a href="#users">所有用户</a></li>
      </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" v-cloak>
      <h2 class="sub-header">@{{searching.user_type}}<span v-if="search" class="small">(@{{searched}})</span></h2>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th v-if="data_head.id">@{{data_head.id}}</th>
            <th v-if="data_head.name">@{{data_head.name}}</th>
            <th v-if="data_head.phone">@{{data_head.phone}}</th>
            <th v-if="data_head.hospital">@{{data_head.hospital}}</th>
            <th v-if="data_head.address">@{{data_head.address}}</th>
            <th v-if="data_head.invited">@{{data_head.invited}}</th>
            <th v-if="data_head.beans">@{{data_head.beans}}</th>
            <th v-if="data_head.qrcode">@{{data_head.qrcode}}</th>
          </tr>
          </thead>
          <tbody>
          <tr v-cloak v-for="person in page_data" @click="person_detail(person)">
          <td v-if="data_head.id">@{{person.id}}</td>
          <td v-if="data_head.name">@{{person.name}}</td>
          <td v-if="data_head.phone">@{{person.phone}}</td>
          <td v-if="data_head.hospital">@{{person.hospital.name}}</td>
          <td v-if="data_head.address">@{{person.hospital.province}}-@{{person.hospital.city}}-@{{person.hospital.area}}-@{{person.hospital.location}}</td>
          <td v-if="data_head.invited">
            @{{person.invited.count}}(@{{person.invited.this_month}})
          </td>
          <td v-if="data_head.beans">
            @{{person.beans.count}}(@{{person.beans.this_month}})
          </td>
          <td v-if="data_head.qrcode">
            <a id="qrcode_btn" class="disabled"
               tabindex="0" role="button"
               data-container="body"
               data-toggle="popover"
               data-placement="bottom"
               data-content="<img class='img-responsive' src='@{{person.qrcode}}'>"
            >
              显示
            </a>
          </td>
          </tr>
          </tbody>
        </table>
      </div>
      <nav class="text-center col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 col-xs-12" id="pagination">
        <ul class="pagination" @click="choose_page">
        <li v-if="page_active > 1">
          <a href="#" aria-label="Previous" name="pre">
            &laquo;
          </a>
        </li>
        <li v-if="page_show > 1">
          <a href="#" aria-label="Previous5" name="pre5">
            &hellip;
          </a>
        </li>
        <li :class="(page_active == page_show)?'active':''"><a href="#">@{{page_show}}</a></li>
        <li :class="(page_active == page_show+1)?'active':''" v-if="(page_show+1)<=page_all"><a
            href="#">@{{ page_show+1 }}</a></li>
        <li :class="(page_active == page_show+2)?'active':''" v-if="(page_show+2)<=page_all"><a
            href="#">@{{ page_show+2 }}</a></li>
        <li :class="(page_active == page_show+3)?'active':''" v-if="(page_show+3)<=page_all"><a
            href="#">@{{ page_show+3 }}</a></li>
        <li :class="(page_active == page_show+4)?'active':''" v-if="(page_show+4)<=page_all"><a
            href="#">@{{ page_show+4 }}</a></li>
        <li v-if="(page_show+5)<=page_all">
          <a href="#" name="next5" aria-label="Next5">
            &hellip;
          </a>
        </li>
        <li v-if="page_active < page_all">
          <a href="#" aria-label="Next" name="next">
            &raquo;
          </a>
        </li>
        </ul>
      </nav>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="col-sm-8">
      <div class="modal-content" id="user_card">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel1">@{{ searching.user_type }}名片</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal">
            <br>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">姓名</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control sr-only" id="inputEmail3" placeholder="请输入姓名"
                         v-model="this_person.name">

                  <p class="form-control-static">@{{ this_person.name }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="user_type" class="col-sm-3 control-label">用户类型</label>
                <div class="col-sm-8">
                  <select id="user_type" class="form-control sr-only" v-model="this_person.user_type">
                    <option value="医生">医生</option>
                    <option value="志愿者">志愿者</option>
                    <option value="普通用户">普通用户</option>
                  </select>

                  <p class="form-control-static">@{{ this_person.user_type }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="phone" class="col-sm-3 control-label">电话</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control sr-only" id="phone" placeholder="请输入电话"
                         v-model="this_person.phone">

                  <p class="form-control-static">@{{ this_person.phone }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-3 control-label">邮箱</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control sr-only" id="email" placeholder="请输入邮箱"
                         v-model="this_person.email">

                  <p class="form-control-static">@{{ this_person.email }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="nickname" class="col-sm-3 control-label">微信昵称</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control sr-only" id="nickname" placeholder="请输入微信昵称" disabled
                         v-model="this_person.nickname">

                  <p class="form-control-static">@{{ this_person.nickname }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="hospital" class="col-sm-3 control-label">医院名称</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control sr-only" id="hospital" placeholder="请输入医院名称"
                         v-model="this_person.hospital.name">

                  <p class="form-control-static">@{{ this_person.hospital.name }}</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="province">医院地址</label>
                <div class="col-sm-8">
                  <p class="form-control-static">@{{ this_person.hospital.province }}-@{{ this_person.hospital.city }}-@{{ this_person.hospital.area }}-@{{ this_person.hospital.location}}</p>
                  <select class="form-control sr-only" name="province" id="province"
                          v-model="this_person.hospital.province"></select>
                </div>
                <label class="col-sm-3 control-label" for="city"></label>
                <div class="col-sm-8">
                  <select class="form-control sr-only" name="city" id="city"
                          v-model="this_person.hospital.city"></select>
                </div>
                <label class="col-sm-3 control-label" for="area"></label>
                <div class="col-sm-8">
                  <select class="form-control sr-only" name="area" id="area"
                          v-model="this_person.hospital.area"></select>
                </div>
                <label class="col-sm-3 control-label" for="address"></label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control sr-only" id="address" placeholder="街道地址"
                            v-model="this_person.hospital.location"></textarea>
                </div>

              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="invited" class="col-sm-3 control-label">糖友数</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control sr-only disabled" id="invited" placeholder="邀请糖友数" disabled
                         v-model="this_person.invited.count">

                  <p class="form-control-static">@{{ this_person.invited.count }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="beans" class="col-sm-3 control-label">迈豆数</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control sr-only" id="beans" placeholder="请输入迈豆数"
                         v-model="this_person.beans.count">

                  <p class="form-control-static">@{{ this_person.beans.count }}</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">二维码</label>
                <div class="col-sm-8">
                  <img class="form-control-static img-responsive" :src="this_person.qrcode">
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          <button type="button" class="btn btn-primary" @click="edit_btn">编辑</button>
          <button type="button" class="btn btn-default hide" @click="cancel_edit">取消</button>
          <button type="button" class="btn btn-warning hide" @click="submit_edit">确认</button>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="modal-content col-xs-6 col-sm-12">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel2">邀请总数&emsp;@{{ this_person.invited.count }}</h4>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <th>#</th>
              <th>电话</th>
              <th>邀请时间</th>
            </tr>
            <tr v-for="person in this_person.invited.page_data">
              <td>@{{ person.id }}</td>
              <td>@{{ person.phone }}</td>
              <td>@{{ person.time }}</td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <ul class="pagination" @click="choose_page">
          <li v-if="page_active > 1">
            <a href="#" aria-label="Previous" name="pre">
              &laquo;
            </a>
          </li>
          <li v-if="page_show > 1">
            <a href="#" aria-label="Previous5" name="pre5">
              &hellip;
            </a>
          </li>
          <li :class="(page_active == page_show)?'active':''"><a href="#">@{{page_show}}</a></li>
          <li :class="(page_active == page_show+1)?'active':''" v-if="(page_show+1)<=page_all"><a
              href="#">@{{ page_show+1 }}</a></li>
          <li :class="(page_active == page_show+2)?'active':''" v-if="(page_show+2)<=page_all"><a
              href="#">@{{ page_show+2 }}</a></li>
          <li :class="(page_active == page_show+3)?'active':''" v-if="(page_show+3)<=page_all"><a
              href="#">@{{ page_show+3 }}</a></li>
          <li :class="(page_active == page_show+4)?'active':''" v-if="(page_show+4)<=page_all"><a
              href="#">@{{ page_show+4 }}</a></li>
          <li v-if="(page_show+5)<=page_all">
            <a href="#" name="next5" aria-label="Next5">
              &hellip;
            </a>
          </li>
          <li v-if="page_active < page_all">
            <a href="#" aria-label="Next" name="next">
              &raquo;
            </a>
          </li>
          </ul>
        </div>
      </div>
      <div class="modal-content col-xs-6 col-sm-12">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel3">总迈豆&emsp;@{{ this_person.beans.count }}</h4>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <th>操作</th>
              <th>迈豆变化</th>
              <th>操作时间</th>
            </tr>
            <tr v-for="action in this_person.beans.page_data">
              <td>@{{ action.action }}</td>
              <td>@{{ action.result }}</td>
              <td>@{{ action.time }}</td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <ul class="pagination" @click="choose_page">
          <li v-if="page_active > 1">
            <a href="#" aria-label="Previous" name="pre">
              &laquo;
            </a>
          </li>
          <li v-if="page_show > 1">
            <a href="#" aria-label="Previous5" name="pre5">
              &hellip;
            </a>
          </li>
          <li :class="(page_active == page_show)?'active':''"><a href="#">@{{page_show}}</a></li>
          <li :class="(page_active == page_show+1)?'active':''" v-if="(page_show+1)<=page_all"><a
              href="#">@{{ page_show+1 }}</a></li>
          <li :class="(page_active == page_show+2)?'active':''" v-if="(page_show+2)<=page_all"><a
              href="#">@{{ page_show+2 }}</a></li>
          <li :class="(page_active == page_show+3)?'active':''" v-if="(page_show+3)<=page_all"><a
              href="#">@{{ page_show+3 }}</a></li>
          <li :class="(page_active == page_show+4)?'active':''" v-if="(page_show+4)<=page_all"><a
              href="#">@{{ page_show+4 }}</a></li>
          <li v-if="(page_show+5)<=page_all">
            <a href="#" name="next5" aria-label="Next5">
              &hellip;
            </a>
          </li>
          <li v-if="page_active < page_all">
            <a href="#" aria-label="Next" name="next">
              &raquo;
            </a>
          </li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>

<script src="{{asset('/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/vendor/vue.js')}}"></script>
<script src="{{asset('/js/vendor/city.js')}}"></script>
<script src="{{asset('/js/admin.js')}}"></script>
</body>
</html>