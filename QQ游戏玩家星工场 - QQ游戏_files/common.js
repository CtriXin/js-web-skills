/**
 * Created by kaidiyang on 2016/05/17.
 */

var g_ISHOW_Upload_Object = {};
var g_currentPage = 0;
var g_totalPage = 1;
var g_perPageGirlNum = 12;
var g_girlsPageCache = [];
var g_myPageData = null;
var g_voteNum = 0;
var g_lotteryNum = 0;
var g_racePeriod = 1;
var g_currentLottoName = "";
var g_isUploadPage = 0;

var $girlsContainer = $("#Work_List_Container_256367");
var $girlsPageNav = $("#girlsPageNav");


function openDialog(e) {
    need("biz.dialog", function (Dialog) {
        Dialog.show({
            id: e,
            bgcolor: '#000', //弹出“遮罩”的颜色，格式为"#FF6600"，可修改，默认为"#fff"
            opacity: 70      //弹出“遮罩”的透明度，格式为｛10-100｝，可选
        });
    });
}
//关闭弹框
function closeDialog() {
    need("biz.dialog", function (Dialog) {
        Dialog.hide();
    });
}

//上传作品配置
var amsCfg_256364 = {
    "iAMSActivityId": "49335", // AMS活动号
    "activityId": "2681", // 模块实例号
    "sFormName": "UploadWorkForm_256364",
    "bAutoRole": false,//自动加载角色查询
    "errorInfo": {
        "0": "作品提交成功！",
        "101001": "每天上传作品限制<#iLimitNum#>个",
        "101002": "每周上传作品限制<#iLimitNum#>个",
        "101003": "每月上传作品限制<#iLimitNum#>个",
        "101004": "每年上传作品限制<#iLimitNum#>个",
        "101005": "活动期间上传作品限制<#iLimitNum#>个",
        "101006": "您的作品已审核过，不可修改",
        "101007": "作品信息不存在或已删除",
        "101008": "验证码输入错误，请重新输入！",
        "101009": "请提交正确的角色名称！",
        "101010": "上传的作品不能小于<#iLimitNum#>K，请重新上传！",
        "101011": "上传的作品不能大于<#iLimitNum#>K，请重新上传！",
        "101012": "上传的作品格式不正确，请重新上传！",
        "101013": "您必须上传一张图片！",
        "101014": "您不满足参与本次活动的条件！",
        "101015": "您已经超过修改时限，不能修改作品信息！",
        "101016": "作品信息不存在！",
        "101017": "您的作品信息已经审核通过，不允许修改！",
        "101018": "您还没有报名参加活动，不能上传作品！",
        "101019": "您的QQ号码受限，不能上传作品！",
        "101020": "您的QQ号码受限，不能上传作品！",
        "101021": "您输入的作品名称已经存在，请重新输入！",
        "101022": "您的角色等级未达到活动要求！",
        "101023": "上传的作品格式不正确，请重新上传！"
    },
    "callback": function (data) {
        /*if (data.iRet == 0) {
            $("#promptPop .con-tit").html("恭喜您");
            $("#promptPop .con-txt").html(data.sMsg);
            openDialog("promptPop");
        } else {
            $("#promptPop .con-tit").html("很抱歉");
            $("#promptPop .con-txt").html(data.sMsg);
            openDialog("promptPop");
        }*/
    }
};

//我的作品
var amsCfg_258112 = {
    "iAMSActivityId" : "49335", // AMS活动号
    "activityId" : "2681",
    "sVerifyCode" : "ABCD",
    "sDataType" : "JSON",
    "_everyRead" : true,
    "iListNum" : 12,
    //"iTypeId" : 0,
    //"iStatus" : 0,
    "iOrder" : 0,//排序方式 0:时间倒序 1:人气倒序 11:下载数排序
    "page" : 0,
    "sNickName" : '',//encodeURIComponent编码
    "sProdName" : '',//encodeURIComponent编码
    "SearchKey" : '',
    "SearchValue" : '',//encodeURIComponent编码
    "iSortNumClose" : 1,
    "sListDomId" : "MyWork_List_Container_258112",
    "sFillTpl" : "",
    "sPageDomId" : ["MyWork_Page_Container_258112"],
    "iPageType" : 2, //1:普通分页 2:十页分页模式
    "callback" : function(data) {
        if (data.iRet == 0) {
            g_myPageData = data;
            myPage(data);
        }
    }
};

//作品列表配置
var amsCfg_256367 = {
    "iAMSActivityId": "49335", // AMS活动号
    "activityId": "2681",
    "sVerifyCode": "ABCD",
    "sDataType": "JSON",
    "_everyRead": true,
    "iListNum": g_perPageGirlNum,
    //"iTypeId" : 0,
    //"iStatus" : 0,
    "iOrder": 0,//排序方式 0:时间倒序 1:人气倒序 11:下载数排序
    "page": 0,
    "iAreaId": 0,
    "iUin": 0,
    "iGender": 0,//性别：1:男2:女
    "iRoleSex": 0,//性别：1:男2:女
    "sNickName": '',//encodeURIComponent编码
    "sProdName": '',//encodeURIComponent编码
    "SearchKey": '',
    "SearchValue": '',//encodeURIComponent编码
    "iSortNumClose": 1,
    "sListDomId": "Work_List_Container_256367",
    "sFillTpl": "",
    "sPageDomId": ["Page_Container_256367"],
    "iPageType": 2, //1:普通分页 2:十页分页模式
    "callback": function(data) {
        loadAllGirls(data);
    }
};

//投票配置
var amsCfg_256365 = {
    "iAMSActivityId": "49335", // AMS活动号
    "activityId": "2681", // 模块实例号
    "sVerifyCode": "ABCD",
    "_everyRead": true,
    "iSuppType": 0,
    "iExtendInt": 0,
    "sShowId": "show_vote_256365_<#iProdId#>",
    "errorInfo": {
        //有配置QQ号投票限制的提示，默认
        "0": "投票成功，感谢您的参与！您今天还有剩余票数<#iRemainNum#>票。",
        //无QQ号投票限制的提示
        //"0" : "投票成功，感谢您的参与！",
        "101201": "作品信息不存在或已删除！",
        "101202": "您不满足参与本次活动的条件！",
        "101203": "您今天的投票机会已经用完了，可以明天再来哦！",  //每个QQ号码可投票数已达上限：<#sLimitNum#>票。
        "101204": "每个QQ号码对同一作品可投票数已达上限：<#sLimitNum#>票。",
        "101205": "每个作品可得票数已达上限：<#sLimitNum#>票。",
        "101206": "每个IP可投票数已达上限：<#sLimitNum#>票。",
        "101207": "该作品还未审核通过不能投票！",
        "101208": "您还未报名不能参与投票！",
        "101209": "您还未上传作品不能参与投票！",
        "101230": "您不能为自己的作品投票！"
    },
    objCustomFun:{
        700:function(sMsg){
            if(sMsg.indexOf("用完") != -1 &&  g_racePeriod == 2){
                $("#promptPop .con-tit").html("很遗憾");
                $("#promptPop .con-txt").html("非常抱歉，您目前还没有投票机会，可以进入美女找茬体验游戏获得投票机会哦！");
            } else{
                $("#promptPop .con-tit").html("很遗憾");
                $("#promptPop .con-txt").html(sMsg);
            }
            openDialog("promptPop");
        }
    },
    "callback": function (modRet) {
        if (modRet.iRet == 0) {
            g_voteNum--;
            g_lotteryNum++;

            var $thisVote = $("#show_vote_256365_" + modRet.iProdId);
            var thisVoteNum = parseInt($thisVote.html());  //修改人气
            $thisVote.html(thisVoteNum);

            $("#lotteryRemainNum").html(g_lotteryNum);
            $("#voteRemainNum").html(g_voteNum);

            $("#promptPop .con-tit").html("恭喜您");
            $("#promptPop .con-txt").html("成功为女神的人气增加了1，明天记得再来支持女神哦！");
        } else if (modRet.iRet == 101204) {
            $("#promptPop .con-tit").html("很抱歉");
            $("#promptPop .con-txt").html("亲，您今天已经支持过该女神了，可以明天再来哦！");
        } else {
            $("#promptPop .con-tit").html("很抱歉");
            $("#promptPop .con-txt").html(modRet.sMsg);
        }
        openDialog("promptPop");
    }
};

// 抽奖领取主功能初始化
amsCfg_257809 = {
    'iAMSActivityId' : '49335', // AMS活动号
    'activityId' : '144852', // 模块实例号
    'onBeginGetGiftEvent' : function(){
        return 0; // 抽奖前事件，返回0表示成功
    },
    'onGetGiftFailureEvent' : function(callbackObj){// 抽奖失败事件
        $("#lottery1content_start").removeClass("lottery1content_disable");
        $("#promptPop .con-tit").html("很遗憾");
        $("#promptPop .con-txt").html(callbackObj.sMsg);
        openDialog("promptPop");
    },
    'onGetGiftSuccessEvent' : function(callbackObj){// 抽奖成功事件
        $("#lottery1content_start").removeClass("lottery1content_disable");
        if(g_lotteryNum > 1){
            g_lotteryNum--;
        } else{
            g_lotteryNum = 0;
        }
        $("#lotteryRemainNum").html(g_lotteryNum);
        g_currentLottoName = callbackObj.sPackageName;
        if (callbackObj.sPackageName.indexOf("Apple") != -1) {
            callFlashToRoll1(0);
            return;
        }
        else if (callbackObj.sPackageName.indexOf("iPhone") != -1) {
            callFlashToRoll1(1);
            return;
        }
        else if (callbackObj.sPackageName.indexOf("QQ企天大圣抱枕") != -1) {
            callFlashToRoll1(2);
            return;
        }
        else if (callbackObj.sPackageName.indexOf("7天体验蓝钻") != -1) {
            callFlashToRoll1(3);
            return;
        }
        else if (callbackObj.sPackageName.indexOf("大厅金币") != -1) {
            callFlashToRoll1(4);
            return;
        }
        else if (callbackObj.sPackageName.indexOf("3小时双倍积分") != -1) {
            callFlashToRoll1(5);
            return;
        }
        else if (callbackObj.sPackageName.indexOf("负分清零卡") != -1) {
            callFlashToRoll1(6);
            return;
        }
        else if (callbackObj.sPackageName.indexOf("QQ企天大圣公仔") != -1) {
            callFlashToRoll1(7);
            return;
        }
        else {
            $("#promptPop .con-tit").html("恭喜您");
            $("#promptPop .con-txt").html(callbackObj.sMsg);
            openDialog("promptPop");
        }
    }
};

// 抽奖轮播功能初始化
amsCfg_258263 = {
    'activityId' : '49335', // 模块实例号
    'contentId' : 'broadcastContent_258263',
    'showLiNum' : 9,//容器ID
    'templateId' : 'broadcastTemplate_258263' //模板ID
};

// 个人获奖记录初始化
amsCfg_258093 = {
    'iAMSActivityId' : '49335', // AMS活动号
    'iLotteryFlowId' : '258093', //  查询获奖轮播的流程号
    'activityId' : '144852', // 模块实例号
    'contentId' : 'getGiftContent_258093', //容器ID
    'templateId' : 'getGiftTemplate_258093', //模板ID
    'contentPageId' : 'getGiftPageContent_258093',	//分页容器ID
    'showContentId' : 'showMyGiftContent_258093' //弹出层ID
};

//复赛投票机会
amsCfg_260122 = {
    "iActivityId": 49335, //活动id
    "iFlowId":    260122, //流程id
    "fFlowSubmitEnd": function(res){
        //$("#get-vote-title").html("恭喜您");
        if(typeof(res.ticket) != "undefined"){
            g_voteNum = res.ticket;
            $("#voteRemainNum").html(g_voteNum);

            $("#promptPop .con-tit").html("恭喜您");
            $("#promptPop .con-txt").html("成功领取投票机会，赶紧去支持女神吧！");
            openDialog("promptPop");
            return;
        }
        if(typeof(res.sOutValue1) != "undefined" && parseInt(res.sOutValue1) >= 3){
            $("#promptPop .con-tit").html("很遗憾");
            $("#promptPop .con-txt").html("亲，您今天已经领取完所有投票机会啦，可以明天再来哦！");
            openDialog("promptPop");
            return;
        }
    },
    "fFlowSubmitFailed":function(res){
        $("#promptPop .con-tit").html("很遗憾");
        $("#promptPop .con-txt").html(res.sMsg);
        openDialog("promptPop");
        //失败会走到这个函数
        //条件不满足，ame返回大于0是后走到这里
    }
};

//页面初始化
amsCfg_257891 = {
    "iActivityId": 49335, //活动id
    "iFlowId":    259506, //流程id
    "fFlowSubmitEnd": function(res){
        var userEventType = window.supportTouch ? "touchend" : "click";
        g_voteNum = parseInt(res.sOutValue2);
        g_lotteryNum = parseInt(res.sOutValue3);

        //初赛
        if(parseInt(res.sOutValue1) == 0){
            g_racePeriod = 1;
        }
        if(parseInt(res.sOutValue1) == 1){
            g_racePeriod = 2;
        }

        $("#lotteryRemainNum").html(g_lotteryNum);
        $("#voteRemainNum").html(g_voteNum);

        //g_racePeriod = 2;

        if(g_racePeriod == 2) {   //复赛阶段
            $("#censorBtn").html("领取机会").off(userEventType).on(userEventType, function() {
                amsSubmit(49335,260122);  //复赛领取投票机会
            });
            $("#openUploadPage").hide();
            $("#confirmUploadBtn").hide();
            if (g_isUploadPage == 1) {  //如果是在上传页面
                $("#promptPop a").hide();
                openDialog("promptPop");
            } else {
                g_perPageGirlNum = 10;
                amsCfg_256367.iListNum = g_perPageGirlNum;
                amsCfg_256367.iOrder = 1;
                amsCfg_256367.page = 0;
                $("#n1").removeClass("on").attr("href","javascript:alert('已结束~')").html("(已结束)");
                $("#n2").addClass("on").attr("href","javascript:void(0)").html("复选阶段(进行中) 6.1-6.6");
                amsInit(49335,256367);   //作品列表
            }
        } else if (g_racePeriod == 1) {
            if (g_isUploadPage == 1) {  //如果是在上传页面
                amsInit(49335, 256364); //上传作品
            } else {
                amsCfg_256367.iListNum = g_perPageGirlNum;
                amsCfg_256367.iOrder = 1;
                amsCfg_256367.page = 0;
                amsInit(49335,256367);   //作品列表
            }
        }
    }
};

function WorkListOrder(iOrder) {
    amsCfg_256367.iOrder = iOrder;
    amsInit(49335, 256367);
}

function WorkListSearch(iFlowId) {
    amsCfg_256367.sNickName = "";
    amsCfg_256367.iUin = "";
    amsCfg_256367.SearchKey = "";
    amsCfg_256367.SearchValue = "";
    if (jQuery("#SearchKey_" + iFlowId).val() == "iUin") {
        amsCfg_256367.iUin = jQuery("#SearchValue_" + iFlowId).val();
    }
    else if (jQuery("#SearchKey_" + iFlowId).val() == "sNickName") {
        amsCfg_256367.sNickName = encodeURIComponent(jQuery("#SearchValue_" + iFlowId).val());
    }
    else {
        amsCfg_256367.SearchKey = jQuery("#SearchKey_" + iFlowId).val();
        amsCfg_256367.SearchValue = encodeURIComponent(jQuery("#SearchValue_" + iFlowId).val());
    }
    amsInit(49335, 256367);
}

function loadAllGirls(data) {
    if (data.iRet == 0) {
        var totalLines = data.iTotalLines;
        var totalPages = data.iTotalPages;

        var lists = data.List;
        var sFillTplHTMLs = [];
        for (var i = 0; i < lists.length; i++) {
            var rank = i + g_currentPage * g_perPageGirlNum + 1;
            var girlId = lists[i].iProdId;
            if (g_currentPage == 0) {
                sFillTplHTMLs.push('<li' + (i <= 2 ? ' class="no' + (i+1) + '">' : '>'));
            } else {
                sFillTplHTMLs.push('<li>');
            }
            sFillTplHTMLs.push('<div class="list-item">');
            sFillTplHTMLs.push('<p class="list-hd">');
            sFillTplHTMLs.push('<span class="s-rank">' + (rank<=9?'0'+rank:rank) + '</span><span class="s-like"><i class="spr icon-like"></i><span id="show_vote_256365_' + lists[i].iProdId + '">' + lists[i].iBallotNum + '</span>人气</span>');
            sFillTplHTMLs.push('</p>');
            sFillTplHTMLs.push('<div class="item-img">');
            sFillTplHTMLs.push('<img src="' + decodeURIComponent(lists[i].sThumbURL) + '" alt="">');
            sFillTplHTMLs.push('<div class="img-dec">' + decodeURIComponent(lists[i].sNickName) + '</div>');
            sFillTplHTMLs.push('</div>');
            sFillTplHTMLs.push('</div>');
            sFillTplHTMLs.push('<div class="btn-zhichi spr hid" onclick="amsSubmit(49335, 256365)" action-data="{iProdId:' + lists[i].iProdId + '}">支持她</div>');
            sFillTplHTMLs.push('</li>');
        }
        var sFillTpl = sFillTplHTMLs.join("\n");
        $girlsContainer.append(sFillTpl);

        g_totalPage = totalPages;
        g_girlsPageCache["page" + g_currentPage] = sFillTpl;

        if (totalPages > 1 && g_racePeriod == 1) {
            $girlsPageNav.show();
            $("#girlsPageNav .page-cur").html((g_currentPage+1) + "/" + g_totalPage);
        }
    }
}

function girlsPrePage() {
    if (g_currentPage > 0) {   //因为currentPage是从0开始计数的
        g_currentPage--;
        var newPageContent = g_girlsPageCache["page" + g_currentPage];
        if (newPageContent) {
            $girlsContainer.empty().append(newPageContent);
        } else {
            amsCfg_256367.page = g_currentPage;
            amsInit(49335, 256367); //作品列表
        }
        $("#girlsPageNav .page-cur").html((g_currentPage+1) + "/" + g_totalPage);
    }
}

function girlsNextPage() {
    if (g_totalPage > g_currentPage + 1) {   //因为currentPage是从0开始计数的
        g_currentPage++;
        var newPageContent = g_girlsPageCache["page" + g_currentPage];
        if (newPageContent) {
            $girlsContainer.empty().append(newPageContent);
        } else {
            amsCfg_256367.page = g_currentPage;
            amsInit(49335, 256367); //作品列表
        }
        $("#girlsPageNav .page-cur").html((g_currentPage+1) + "/" + g_totalPage);
    }
}

function showMyPage() {
    if (g_myPageData) {
        myPage(g_myPageData);
    } else {
        amsInit(49335,258112);
    }
}
function myPage(data) {
    var lists = data.List;
    if (lists.length > 0) {
        var mywork = lists[0];
        var censorStatus = decodeURIComponent(mywork.iStatus);  //1表示已通过，0表示在审核，-1表示没有通过
        if (censorStatus == 1) {  //censor done
            $("#myPageCensorUL li:nth-child(2)").attr("class", "l2 on");
            $("#myPageCensorUL li:nth-child(3)").attr("class", "on");
        } else if (censorStatus == 0) {
            $("#myPageCensorUL li:nth-child(2)").attr("class", "l2 on");
            $("#myPageCensorUL li:nth-child(3)").attr("class", "");
        } else {
            $("#myPageContainer .photo-list").hide();
            $("#myPageContainer .userinfo-list").hide();
            openDialog("censorPop");
            return;
        }
        $("#myPageCensorUL li:nth-child(1)").html("<span>1</span><p>上传中</p>");
        $("#myPagePhotoUL li:nth-child(1) img").attr("src", decodeURIComponent(mywork.sProdURL));

        $("#myPageUserInfoUL li:nth-child(1)").html("<span>昵称：</span>" + decodeURIComponent(mywork.sNickName));
        $("#myPageUserInfoUL li:nth-child(2)").html("<span>封面标签1：</span>" + decodeURIComponent(mywork.sExtCharSix));
        $("#myPageUserInfoUL li:nth-child(3)").html("<span>封面标签2：</span>" + decodeURIComponent(mywork.sExtCharSeven));
        $("#myPageUserInfoUL li:nth-child(4)").html("<span>个人简介：</span>" + decodeURIComponent(mywork.sExtCharEight));
    } else {
        $("#myPageContainer .photo-list").hide();
        $("#myPageContainer .userinfo-list").hide();
    }

    openDialog("censorPop");
}

//控制输入最大长度，必须要有“_max”属性。
function ISHOW_CheckMaxlength(oInObj) {
    //onkeyup="return ISHOW_CheckMaxlength(this);"
    var iMaxLen = parseInt(oInObj.getAttribute('_max'));
    var iCurLen = milo.getByteLength(oInObj.value);
    if (oInObj.getAttribute && iCurLen > iMaxLen) {
        oInObj.value = milo.cutChinese(oInObj.value, iMaxLen, "");
    }
}

function ISHOW_ChangeVerifyImg(VerifyImgId) {
    var img = document.getElementById(VerifyImgId);
    if (img) {
        img.src = "http://ptlogin2.qq.com/getimage?" + Math.random();
    }
}


function uploadStart(evt) {
    var $this = $(this);

    need("biz.login", function (LoginManager) {
        LoginManager.checkLogin(function () {

            var thumb = $this.data("thumb");
            var source = $this.data("source");
            var img = $this.data("img");

            //每次都重新读取
            g_ISHOW_Upload_Object.thumb = thumb;
            g_ISHOW_Upload_Object.source = source;
            g_ISHOW_Upload_Object.img = img;
            g_ISHOW_Upload_Object.uploadedCallback = uploadedCallback;

            var $uploadInput = $("#File_1");
            $uploadInput.val("").on("change", function () {
                if (this.files.length <= 0) {
                    return false;
                }
                if (this.files[0].size/1024 >= 1024) {
                    $("#promptPop .con-tit").html("很遗憾");
                    $("#promptPop .con-txt").html("很抱歉，图片大小不能超过1024KB");
                    openDialog("promptPop");
                    return false;
                }
                /*if(!check_file_type())
                 {
                 return false;
                 } */
                document.forms["__ISHOW_UploadForm__"].submit();
                return true;
            });
            $uploadInput.trigger("click");

            return true;
        }, function () {
            LoginManager.reloadLogin(function () {
                location.reload();
            });
        });
    });
}

function uploadedCallback(_IFRAME_JSON_DATA_) {
    if (g_ISHOW_Upload_Object.thumb) {
        document.getElementById(g_ISHOW_Upload_Object.thumb).value = unescape(_IFRAME_JSON_DATA_.List[0].sThumbURL);
    }
    if (g_ISHOW_Upload_Object.source) {
        document.getElementById(g_ISHOW_Upload_Object.source).value = unescape(_IFRAME_JSON_DATA_.List[0].sFileURL);
    }
    if (g_ISHOW_Upload_Object.img) {
        document.getElementById(g_ISHOW_Upload_Object.img).src = unescape(_IFRAME_JSON_DATA_.List[0].sThumbURL);
    }
}

function confirmUpload() {
    amsSubmit(49335, 256364);  //确认上传
}

function startToLottery() {
    amsSubmit(49335,257809);
}

function myGift() {
    amsSubmit(49335,258093);
}

milo.addEvent(g("dologin"), "click", function() {
    need("biz.login",function(LoginManager){
        LoginManager.init({
            needReloadPage:true
        });
        LoginManager.login();
    });
    return false;
});

milo.addEvent(g("dologout"), "click", function() {
    need("biz.login",function(LoginManager){
        LoginManager.logout();
    });
    return false;
});

milo.ready(function () {
    if (window.location.href.indexOf("upload") != -1) {
        g_isUploadPage = 1;
    }
    var userEventType = window.supportTouch ? "touchend" : "click";
    need("biz.login", function (LoginManager) {
        function loginCheckedCallback() {
            $("#logined").show();
            $("#unlogin").hide();
            g("login_qq_span").innerHTML = LoginManager.getUserUin();//获取QQ号
        }
        function unloginCheckCallback() {
            LoginManager.reloadLogin(function () {
                location.reload();
            });
        }
        LoginManager.checkLogin(loginCheckedCallback, unloginCheckCallback);
    });

    $("#myGiftBtn").on(userEventType, myGift);
    $("#censorBtn").on(userEventType, showMyPage);
    $("#actRuleBtn").on(userEventType, function() {openDialog("rulePop")});
    $("#voteRuleBtn").on(userEventType, function() {openDialog("votePop")});
    $(".btn-upload-mask").on(userEventType, uploadStart);
    $("#confirmUploadBtn").on(userEventType, confirmUpload);
    $("#girlsPageNav .pager-prev").on(userEventType, girlsPrePage);
    $("#girlsPageNav .pager-next").on(userEventType, girlsNextPage);

    $("#openUploadPage").on(userEventType, function() {
        window.location.href = "upload.html";
    });

    amsSubmit(49335,257891); //页面初始化

    if (g_isUploadPage == 0) {  //只有首页面才展示轮播
        amsInit(49335,258263); //获奖信息轮播
    } else if (g_isUploadPage == 1) {

    }
});
/*  |xGv00|0f616b0fd8269eb1cc623d91c5ebc9b6 */