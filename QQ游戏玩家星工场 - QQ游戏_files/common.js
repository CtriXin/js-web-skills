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
            bgcolor: '#000', //���������֡�����ɫ����ʽΪ"#FF6600"�����޸ģ�Ĭ��Ϊ"#fff"
            opacity: 70      //���������֡���͸���ȣ���ʽΪ��10-100������ѡ
        });
    });
}
//�رյ���
function closeDialog() {
    need("biz.dialog", function (Dialog) {
        Dialog.hide();
    });
}

//�ϴ���Ʒ����
var amsCfg_256364 = {
    "iAMSActivityId": "49335", // AMS���
    "activityId": "2681", // ģ��ʵ����
    "sFormName": "UploadWorkForm_256364",
    "bAutoRole": false,//�Զ����ؽ�ɫ��ѯ
    "errorInfo": {
        "0": "��Ʒ�ύ�ɹ���",
        "101001": "ÿ���ϴ���Ʒ����<#iLimitNum#>��",
        "101002": "ÿ���ϴ���Ʒ����<#iLimitNum#>��",
        "101003": "ÿ���ϴ���Ʒ����<#iLimitNum#>��",
        "101004": "ÿ���ϴ���Ʒ����<#iLimitNum#>��",
        "101005": "��ڼ��ϴ���Ʒ����<#iLimitNum#>��",
        "101006": "������Ʒ����˹��������޸�",
        "101007": "��Ʒ��Ϣ�����ڻ���ɾ��",
        "101008": "��֤������������������룡",
        "101009": "���ύ��ȷ�Ľ�ɫ���ƣ�",
        "101010": "�ϴ�����Ʒ����С��<#iLimitNum#>K���������ϴ���",
        "101011": "�ϴ�����Ʒ���ܴ���<#iLimitNum#>K���������ϴ���",
        "101012": "�ϴ�����Ʒ��ʽ����ȷ���������ϴ���",
        "101013": "�������ϴ�һ��ͼƬ��",
        "101014": "����������뱾�λ��������",
        "101015": "���Ѿ������޸�ʱ�ޣ������޸���Ʒ��Ϣ��",
        "101016": "��Ʒ��Ϣ�����ڣ�",
        "101017": "������Ʒ��Ϣ�Ѿ����ͨ�����������޸ģ�",
        "101018": "����û�б����μӻ�������ϴ���Ʒ��",
        "101019": "����QQ�������ޣ������ϴ���Ʒ��",
        "101020": "����QQ�������ޣ������ϴ���Ʒ��",
        "101021": "���������Ʒ�����Ѿ����ڣ����������룡",
        "101022": "���Ľ�ɫ�ȼ�δ�ﵽ�Ҫ��",
        "101023": "�ϴ�����Ʒ��ʽ����ȷ���������ϴ���"
    },
    "callback": function (data) {
        /*if (data.iRet == 0) {
            $("#promptPop .con-tit").html("��ϲ��");
            $("#promptPop .con-txt").html(data.sMsg);
            openDialog("promptPop");
        } else {
            $("#promptPop .con-tit").html("�ܱ�Ǹ");
            $("#promptPop .con-txt").html(data.sMsg);
            openDialog("promptPop");
        }*/
    }
};

//�ҵ���Ʒ
var amsCfg_258112 = {
    "iAMSActivityId" : "49335", // AMS���
    "activityId" : "2681",
    "sVerifyCode" : "ABCD",
    "sDataType" : "JSON",
    "_everyRead" : true,
    "iListNum" : 12,
    //"iTypeId" : 0,
    //"iStatus" : 0,
    "iOrder" : 0,//����ʽ 0:ʱ�䵹�� 1:�������� 11:����������
    "page" : 0,
    "sNickName" : '',//encodeURIComponent����
    "sProdName" : '',//encodeURIComponent����
    "SearchKey" : '',
    "SearchValue" : '',//encodeURIComponent����
    "iSortNumClose" : 1,
    "sListDomId" : "MyWork_List_Container_258112",
    "sFillTpl" : "",
    "sPageDomId" : ["MyWork_Page_Container_258112"],
    "iPageType" : 2, //1:��ͨ��ҳ 2:ʮҳ��ҳģʽ
    "callback" : function(data) {
        if (data.iRet == 0) {
            g_myPageData = data;
            myPage(data);
        }
    }
};

//��Ʒ�б�����
var amsCfg_256367 = {
    "iAMSActivityId": "49335", // AMS���
    "activityId": "2681",
    "sVerifyCode": "ABCD",
    "sDataType": "JSON",
    "_everyRead": true,
    "iListNum": g_perPageGirlNum,
    //"iTypeId" : 0,
    //"iStatus" : 0,
    "iOrder": 0,//����ʽ 0:ʱ�䵹�� 1:�������� 11:����������
    "page": 0,
    "iAreaId": 0,
    "iUin": 0,
    "iGender": 0,//�Ա�1:��2:Ů
    "iRoleSex": 0,//�Ա�1:��2:Ů
    "sNickName": '',//encodeURIComponent����
    "sProdName": '',//encodeURIComponent����
    "SearchKey": '',
    "SearchValue": '',//encodeURIComponent����
    "iSortNumClose": 1,
    "sListDomId": "Work_List_Container_256367",
    "sFillTpl": "",
    "sPageDomId": ["Page_Container_256367"],
    "iPageType": 2, //1:��ͨ��ҳ 2:ʮҳ��ҳģʽ
    "callback": function(data) {
        loadAllGirls(data);
    }
};

//ͶƱ����
var amsCfg_256365 = {
    "iAMSActivityId": "49335", // AMS���
    "activityId": "2681", // ģ��ʵ����
    "sVerifyCode": "ABCD",
    "_everyRead": true,
    "iSuppType": 0,
    "iExtendInt": 0,
    "sShowId": "show_vote_256365_<#iProdId#>",
    "errorInfo": {
        //������QQ��ͶƱ���Ƶ���ʾ��Ĭ��
        "0": "ͶƱ�ɹ�����л���Ĳ��룡�����컹��ʣ��Ʊ��<#iRemainNum#>Ʊ��",
        //��QQ��ͶƱ���Ƶ���ʾ
        //"0" : "ͶƱ�ɹ�����л���Ĳ��룡",
        "101201": "��Ʒ��Ϣ�����ڻ���ɾ����",
        "101202": "����������뱾�λ��������",
        "101203": "�������ͶƱ�����Ѿ������ˣ�������������Ŷ��",  //ÿ��QQ�����ͶƱ���Ѵ����ޣ�<#sLimitNum#>Ʊ��
        "101204": "ÿ��QQ�����ͬһ��Ʒ��ͶƱ���Ѵ����ޣ�<#sLimitNum#>Ʊ��",
        "101205": "ÿ����Ʒ�ɵ�Ʊ���Ѵ����ޣ�<#sLimitNum#>Ʊ��",
        "101206": "ÿ��IP��ͶƱ���Ѵ����ޣ�<#sLimitNum#>Ʊ��",
        "101207": "����Ʒ��δ���ͨ������ͶƱ��",
        "101208": "����δ�������ܲ���ͶƱ��",
        "101209": "����δ�ϴ���Ʒ���ܲ���ͶƱ��",
        "101230": "������Ϊ�Լ�����ƷͶƱ��"
    },
    objCustomFun:{
        700:function(sMsg){
            if(sMsg.indexOf("����") != -1 &&  g_racePeriod == 2){
                $("#promptPop .con-tit").html("���ź�");
                $("#promptPop .con-txt").html("�ǳ���Ǹ����Ŀǰ��û��ͶƱ���ᣬ���Խ�����Ů�Ҳ�������Ϸ���ͶƱ����Ŷ��");
            } else{
                $("#promptPop .con-tit").html("���ź�");
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
            var thisVoteNum = parseInt($thisVote.html());  //�޸�����
            $thisVote.html(thisVoteNum);

            $("#lotteryRemainNum").html(g_lotteryNum);
            $("#voteRemainNum").html(g_voteNum);

            $("#promptPop .con-tit").html("��ϲ��");
            $("#promptPop .con-txt").html("�ɹ�ΪŮ�������������1������ǵ�����֧��Ů��Ŷ��");
        } else if (modRet.iRet == 101204) {
            $("#promptPop .con-tit").html("�ܱ�Ǹ");
            $("#promptPop .con-txt").html("�ף��������Ѿ�֧�ֹ���Ů���ˣ�������������Ŷ��");
        } else {
            $("#promptPop .con-tit").html("�ܱ�Ǹ");
            $("#promptPop .con-txt").html(modRet.sMsg);
        }
        openDialog("promptPop");
    }
};

// �齱��ȡ�����ܳ�ʼ��
amsCfg_257809 = {
    'iAMSActivityId' : '49335', // AMS���
    'activityId' : '144852', // ģ��ʵ����
    'onBeginGetGiftEvent' : function(){
        return 0; // �齱ǰ�¼�������0��ʾ�ɹ�
    },
    'onGetGiftFailureEvent' : function(callbackObj){// �齱ʧ���¼�
        $("#lottery1content_start").removeClass("lottery1content_disable");
        $("#promptPop .con-tit").html("���ź�");
        $("#promptPop .con-txt").html(callbackObj.sMsg);
        openDialog("promptPop");
    },
    'onGetGiftSuccessEvent' : function(callbackObj){// �齱�ɹ��¼�
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
        else if (callbackObj.sPackageName.indexOf("QQ�����ʥ����") != -1) {
            callFlashToRoll1(2);
            return;
        }
        else if (callbackObj.sPackageName.indexOf("7����������") != -1) {
            callFlashToRoll1(3);
            return;
        }
        else if (callbackObj.sPackageName.indexOf("�������") != -1) {
            callFlashToRoll1(4);
            return;
        }
        else if (callbackObj.sPackageName.indexOf("3Сʱ˫������") != -1) {
            callFlashToRoll1(5);
            return;
        }
        else if (callbackObj.sPackageName.indexOf("�������㿨") != -1) {
            callFlashToRoll1(6);
            return;
        }
        else if (callbackObj.sPackageName.indexOf("QQ�����ʥ����") != -1) {
            callFlashToRoll1(7);
            return;
        }
        else {
            $("#promptPop .con-tit").html("��ϲ��");
            $("#promptPop .con-txt").html(callbackObj.sMsg);
            openDialog("promptPop");
        }
    }
};

// �齱�ֲ����ܳ�ʼ��
amsCfg_258263 = {
    'activityId' : '49335', // ģ��ʵ����
    'contentId' : 'broadcastContent_258263',
    'showLiNum' : 9,//����ID
    'templateId' : 'broadcastTemplate_258263' //ģ��ID
};

// ���˻񽱼�¼��ʼ��
amsCfg_258093 = {
    'iAMSActivityId' : '49335', // AMS���
    'iLotteryFlowId' : '258093', //  ��ѯ���ֲ������̺�
    'activityId' : '144852', // ģ��ʵ����
    'contentId' : 'getGiftContent_258093', //����ID
    'templateId' : 'getGiftTemplate_258093', //ģ��ID
    'contentPageId' : 'getGiftPageContent_258093',	//��ҳ����ID
    'showContentId' : 'showMyGiftContent_258093' //������ID
};

//����ͶƱ����
amsCfg_260122 = {
    "iActivityId": 49335, //�id
    "iFlowId":    260122, //����id
    "fFlowSubmitEnd": function(res){
        //$("#get-vote-title").html("��ϲ��");
        if(typeof(res.ticket) != "undefined"){
            g_voteNum = res.ticket;
            $("#voteRemainNum").html(g_voteNum);

            $("#promptPop .con-tit").html("��ϲ��");
            $("#promptPop .con-txt").html("�ɹ���ȡͶƱ���ᣬ�Ͻ�ȥ֧��Ů��ɣ�");
            openDialog("promptPop");
            return;
        }
        if(typeof(res.sOutValue1) != "undefined" && parseInt(res.sOutValue1) >= 3){
            $("#promptPop .con-tit").html("���ź�");
            $("#promptPop .con-txt").html("�ף��������Ѿ���ȡ������ͶƱ��������������������Ŷ��");
            openDialog("promptPop");
            return;
        }
    },
    "fFlowSubmitFailed":function(res){
        $("#promptPop .con-tit").html("���ź�");
        $("#promptPop .con-txt").html(res.sMsg);
        openDialog("promptPop");
        //ʧ�ܻ��ߵ��������
        //���������㣬ame���ش���0�Ǻ��ߵ�����
    }
};

//ҳ���ʼ��
amsCfg_257891 = {
    "iActivityId": 49335, //�id
    "iFlowId":    259506, //����id
    "fFlowSubmitEnd": function(res){
        var userEventType = window.supportTouch ? "touchend" : "click";
        g_voteNum = parseInt(res.sOutValue2);
        g_lotteryNum = parseInt(res.sOutValue3);

        //����
        if(parseInt(res.sOutValue1) == 0){
            g_racePeriod = 1;
        }
        if(parseInt(res.sOutValue1) == 1){
            g_racePeriod = 2;
        }

        $("#lotteryRemainNum").html(g_lotteryNum);
        $("#voteRemainNum").html(g_voteNum);

        //g_racePeriod = 2;

        if(g_racePeriod == 2) {   //�����׶�
            $("#censorBtn").html("��ȡ����").off(userEventType).on(userEventType, function() {
                amsSubmit(49335,260122);  //������ȡͶƱ����
            });
            $("#openUploadPage").hide();
            $("#confirmUploadBtn").hide();
            if (g_isUploadPage == 1) {  //��������ϴ�ҳ��
                $("#promptPop a").hide();
                openDialog("promptPop");
            } else {
                g_perPageGirlNum = 10;
                amsCfg_256367.iListNum = g_perPageGirlNum;
                amsCfg_256367.iOrder = 1;
                amsCfg_256367.page = 0;
                $("#n1").removeClass("on").attr("href","javascript:alert('�ѽ���~')").html("(�ѽ���)");
                $("#n2").addClass("on").attr("href","javascript:void(0)").html("��ѡ�׶�(������) 6.1-6.6");
                amsInit(49335,256367);   //��Ʒ�б�
            }
        } else if (g_racePeriod == 1) {
            if (g_isUploadPage == 1) {  //��������ϴ�ҳ��
                amsInit(49335, 256364); //�ϴ���Ʒ
            } else {
                amsCfg_256367.iListNum = g_perPageGirlNum;
                amsCfg_256367.iOrder = 1;
                amsCfg_256367.page = 0;
                amsInit(49335,256367);   //��Ʒ�б�
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
            sFillTplHTMLs.push('<span class="s-rank">' + (rank<=9?'0'+rank:rank) + '</span><span class="s-like"><i class="spr icon-like"></i><span id="show_vote_256365_' + lists[i].iProdId + '">' + lists[i].iBallotNum + '</span>����</span>');
            sFillTplHTMLs.push('</p>');
            sFillTplHTMLs.push('<div class="item-img">');
            sFillTplHTMLs.push('<img src="' + decodeURIComponent(lists[i].sThumbURL) + '" alt="">');
            sFillTplHTMLs.push('<div class="img-dec">' + decodeURIComponent(lists[i].sNickName) + '</div>');
            sFillTplHTMLs.push('</div>');
            sFillTplHTMLs.push('</div>');
            sFillTplHTMLs.push('<div class="btn-zhichi spr hid" onclick="amsSubmit(49335, 256365)" action-data="{iProdId:' + lists[i].iProdId + '}">֧����</div>');
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
    if (g_currentPage > 0) {   //��ΪcurrentPage�Ǵ�0��ʼ������
        g_currentPage--;
        var newPageContent = g_girlsPageCache["page" + g_currentPage];
        if (newPageContent) {
            $girlsContainer.empty().append(newPageContent);
        } else {
            amsCfg_256367.page = g_currentPage;
            amsInit(49335, 256367); //��Ʒ�б�
        }
        $("#girlsPageNav .page-cur").html((g_currentPage+1) + "/" + g_totalPage);
    }
}

function girlsNextPage() {
    if (g_totalPage > g_currentPage + 1) {   //��ΪcurrentPage�Ǵ�0��ʼ������
        g_currentPage++;
        var newPageContent = g_girlsPageCache["page" + g_currentPage];
        if (newPageContent) {
            $girlsContainer.empty().append(newPageContent);
        } else {
            amsCfg_256367.page = g_currentPage;
            amsInit(49335, 256367); //��Ʒ�б�
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
        var censorStatus = decodeURIComponent(mywork.iStatus);  //1��ʾ��ͨ����0��ʾ����ˣ�-1��ʾû��ͨ��
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
        $("#myPageCensorUL li:nth-child(1)").html("<span>1</span><p>�ϴ���</p>");
        $("#myPagePhotoUL li:nth-child(1) img").attr("src", decodeURIComponent(mywork.sProdURL));

        $("#myPageUserInfoUL li:nth-child(1)").html("<span>�ǳƣ�</span>" + decodeURIComponent(mywork.sNickName));
        $("#myPageUserInfoUL li:nth-child(2)").html("<span>�����ǩ1��</span>" + decodeURIComponent(mywork.sExtCharSix));
        $("#myPageUserInfoUL li:nth-child(3)").html("<span>�����ǩ2��</span>" + decodeURIComponent(mywork.sExtCharSeven));
        $("#myPageUserInfoUL li:nth-child(4)").html("<span>���˼�飺</span>" + decodeURIComponent(mywork.sExtCharEight));
    } else {
        $("#myPageContainer .photo-list").hide();
        $("#myPageContainer .userinfo-list").hide();
    }

    openDialog("censorPop");
}

//����������󳤶ȣ�����Ҫ�С�_max�����ԡ�
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

            //ÿ�ζ����¶�ȡ
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
                    $("#promptPop .con-tit").html("���ź�");
                    $("#promptPop .con-txt").html("�ܱ�Ǹ��ͼƬ��С���ܳ���1024KB");
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
    amsSubmit(49335, 256364);  //ȷ���ϴ�
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
            g("login_qq_span").innerHTML = LoginManager.getUserUin();//��ȡQQ��
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

    amsSubmit(49335,257891); //ҳ���ʼ��

    if (g_isUploadPage == 0) {  //ֻ����ҳ���չʾ�ֲ�
        amsInit(49335,258263); //����Ϣ�ֲ�
    } else if (g_isUploadPage == 1) {

    }
});
/*  |xGv00|0f616b0fd8269eb1cc623d91c5ebc9b6 */