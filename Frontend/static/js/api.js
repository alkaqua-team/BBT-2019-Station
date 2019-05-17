const host = " http://182.254.161.213/BBT-2019-Station/Backend/public/station";
const save = "/save/";
const modify = "/modify/";
const ticket = "/ticket/";
const update = "/update/";
const checktime = "/checkTime/";
const checkid = "/checkOpenid/";
const savename = "/getStationName/";
const returnName = "returnStationName/";

function ticketShow(method, data, fn) {
    $.ajax({
        type: "POST",
        url: host + method,
        data: data,
        dataType: 'JSON',
        xhrFields: {
            withCredentials: true
        },
        crossDomain: true,
        contentType: "application/x-www-form-urlencoded",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: fn,
    })
}

function show(method, fn) {
    $.ajax({
        type: "POST",
        url: host + method,
        xhrFields: {
            withCredentials: true
        },
        crossDomain: true,
        contentType: "application/x-www-form-urlencoded",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: fn,
    })
}

function weixin(redirect,state,fn){
    $.ajax({
        type:"GET",
        url:"https://hemc.100steps.net/2018/fireman/auth.php?redirect=" + redirect + "&state=" + state,
        success:fn,
    })
}

function checkTime(){
        show(checktime, function (res) {
        var res1;
        if ((typeof res == 'object') && res.constructor == Object) {
            res1 = res;
        } else {
            res1 = eval("(" + res + ")");
        }
        if (res1.errcode == 440) {
            //活动还未开始
            window.location.href = "../html/checktime.html";    
           // return false;
        }
        if(res1.errcode== 441){
            //活动已经结束
            window.location.href = "../html/checktime.html";
           // return false;
        }
        if (res1.errcode == 0) {
            return true;
        }
        })
}
function check(){
            show(checkid, function (res) {
                var res1;
                if ((typeof res == 'object') && res.constructor == Object) {
                    res1 = res;
                } else {
                    res1 = eval("(" + res + ")");
                }
                if (res1.errcode == 540) {
                    //未授权 引导用户到认证页面
                    // weixin(redirect,state,function(){
                    //     //这还没好
                    // })
                    alert("未授权");
                    return false;
                }
                if(res1.errcode == 0){
                    return true;
                }
            })
    }
