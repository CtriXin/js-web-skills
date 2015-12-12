<?php
include_once '_layouts/header.php';
echo $head;
?>

<style>
    #myModal
    {
        top:35%;
    }
</style>
<br/>
<br/>
<br/>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <div  style="padding:3px" class="col-xs-12 col-sm-6 col-md-8">
        <div class="panel panel-primary">
         <div class="panel-heading">
          <h3 class="panel-title">委托录入</h3>
        </div>
        <div class="panel-body">
          <div class="inputs">
           <div>
             <input type="text" class="form-control floating-label" placeholder="残疾证号" id="cid"> </div> <br/>
             <div>
               <input type="text" class="form-control floating-label" placeholder="姓名" id="users_name" ></div>
               <div>
                <select class="form-control" id="sex">
                  <option value="1" selected="true">男</option>
                  <option value="0">女</option>
                </select>
              </div><br/>
              <div>
               <input type="text" class="form-control floating-label " placeholder="现住址小区" id="address"></div> <br/>
               <div>
                 <input type="text" class="form-control floating-label " placeholder="门牌号之类的" id="address_num"> </div> <br/>
                 <div>
                   <input type="text" class="form-control floating-label" placeholder="联系电话" id="phone"> </div>


                   <div> <!-- hh显示24小时，HH12小时制度 -->
                     <div class="input-group date form_datetime col-md-5" data-date-format="yyyy-mm-dd hh:ii " data-link-field="dtp_input1">
                       <input placeholder="服务时间" id="dtp_input" class="form-control" size="16" type="text" value="" readonly>
                       <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                       <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                     </div>
                     <br/>

                     <div class="form-group">
                      <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-4">
                        <select class="form-control"  id="action_type" >
                            <option value="1">代购</option>
                            <option value="2">理发</option>
                            <option value="3">陪护</option>
                            <option value="4">清洁</option>
                          </select>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-8">
                          <input type="text" class="form-control floating-label" placeholder="简略内容" id="simply_con"> 

                        </div>
                      </div>
                    </div>

                    <div><textarea class="form-control floating-label" rows="3" id="detial_con"  placeholder="详细委托内容"></textarea></div><br/>

                    <button id="send1" type="button" class="btn btn-primary btn-sm" >
                      <span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;提&nbsp;交
                    </button>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="myModalLabel" style="text-align: center;color: #000000"><strong>温馨提示</strong></h5>
      <hr style="margin-bottom: 0px;margin-top: 6px" />
      </div>
      <div class="modal-body"  style="text-align: center" id="alertValue">
        ...
      </div>
      <hr style="margin-bottom: 0px;margin-top: 2px" />
      <!-- <div style="border: 0.5 solid #D2D2D2;width: 100%"></div> -->
      <div class="modal-footer"  style="text-align: center">
        <button style="width: 100%;color: #007aff" type="button" class="btn btn-default" data-dismiss="modal"><strong>&nbsp;确&nbsp;&nbsp;定&nbsp;</strong></button>
      </div>
    </div>
  </div>
</div>

      <link href="http://7xkaou.com2.z0.glb.qiniucdn.com/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
      <script src="http://7xkaou.com2.z0.glb.qiniucdn.com/ripples.min.js"></script>
      <script src="http://7xkaou.com2.z0.glb.qiniucdn.com/material.min.js"></script>
      <script>
      /*
      * 封装一个bootstrap模态窗口 
      *backdrop 为 static 时，点击模态对话框的外部区域不会将其关闭。  keyboard 为 false 时，按下 Esc 键不会关闭 Modal。
      */
      function myAlert(val){
        $('#alertValue').html(val);
        $('#myModal').modal({backdrop: 'static', keyboard: false});

      }

        $(document).ready(function() {
          // $('#myModal').modal({backdrop: 'static', keyboard: false});
                // This command is used to initialize some elements and make them work properly
                $.material.init();
              });
      </script>

      <script type="text/javascript">

        $('#cid').bind('input propertychange' ,function(){
          var cid=$("#cid").val();
          console.log(cid);
          if (cid.length==20) {
            checkCid(cid);}
          });

        $('#simply_con').bind('input propertychange' ,function(){
          var cid=$("#simply_con").val();
          console.log(cid);
          if (cid.length>=20) {
            myAlert("字数已经到达20个");
          }
        });

        function checkCid(cid){
          $.ajax({
            url: "/checkCid?r="+Math.random()+"&cid="+cid,
            type: "GET",
            dataType: "json"
          })
          .done(function(data) {
      //{"state":"0","msg":"不存在此残疾证","data":""}
      if (data.msg!="") {
        myAlert(data.msg);
      }else{
        $.each(data.data, function(i, item) {

            // {"state":"1","msg":"","data":[{"id":"1","name":"黄桂旋","sex":"0","update_time":"2015-08-15 11:56:32","cid":"123","address":"深圳市xxx","guarder":"hgx","guarder_phone":"13714876874"}]}

            // $('#users_name').attr("placeholder"," ");
            $('#users_name').attr('class','form-control');
            $('#users_name').val(item.name);
            $('#address').attr('class','form-control');
            $("#address").val(item.address);
            $('#address_num').attr('class','form-control');
            $("#address_num").val(item.address_num);
            $('#phone').attr('class','form-control');
            $("#phone").val(item.guarder_phone);
            if (item.sex=="1") {
              // $("#sex").find("option[text='女']").attr("selected",true);
              $("#sex option").eq(1).attr('selected', 'true');
            }else{
              $("#sex option").eq(0).attr('selected', 'true');
              // $("#sex").find("option[text='男']").attr("selected",true);
            }
            
          });
}
console.log("success");
})
.fail(function() {
  myAlert("请求失败");
  console.log("error");
})
}

  // $("[data-toggle=\'tooltip\']").tooltip();//初始化
  $("#send1").click(function(){
    var users_name=$("#users_name").val().trim();
    var sex=$("#sex").val().trim();
    var dtp_input=$("#dtp_input").val().trim();
    var simply_con=$("#simply_con").val().trim();
    var detial_con=$("#detial_con").val().trim();
    var address=$("#address").val().trim();
    var address_num=$("#address_num").val().trim();
    var phone=$("#phone").val().trim();
    var cid=$("#cid").val().trim();
    var action_type=$("#action_type").val().trim();
    

    if (address_num!="" && action_type!="" && users_name!="" && dtp_input!="" && simply_con!="" && detial_con!="" && cid!="" && address!="" && phone!="") {
      submithandle(users_name,sex,dtp_input,simply_con,detial_con,address,phone,cid,action_type,address_num);
    }else{
      myAlert("还没填完啊，亲");
    }
  });

  function submithandle(users_name,sex,dtp_input,simply_con,detial_con,address,phone,cid,action_type,address_num) {

    $.ajax({
      url: "/postHelp?r="+Math.random(),
      type: "POST",
      dataType: "json",
      data: {UsersName: users_name,Sex:sex,DtpInput:dtp_input,SimplyCon:simply_con,DetialCon:detial_con,Address:address,Phone:phone,Cid:cid,ActionType:action_type,AddressNum:address_num}
    })
    .done(function(data) {
      myAlert(data.msg);

      console.log("success");
    })
    .fail(function() {
      myAlert("请求失败");
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  }

</script>
<script type="text/javascript" src="http://7xkaou.com2.z0.glb.qiniucdn.com/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://7xkaou.com2.z0.glb.qiniucdn.com/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

<script type="text/javascript">
  $('.form_datetime').datetimepicker({
    language:  'zh-CN',
    autoclose: true
  });

</script>
<?php include_once '_layouts/footer.php';?>
