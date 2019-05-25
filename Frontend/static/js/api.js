const host = " http://182.254.161.213/BBT-2019-Station/Backend/public/station";
const save = "/save/";
const modify = "/modify/";
const ticket = "/ticket/";
const update = "/update/";
const checktime = "/checkTime/";
const checkid = "/checkOpenid/";
const savename = "/getStationName/";
const returnName = "/returnStationName/";
const state = "bug867675fyvgyv";

//post 带参数请求
function ticketShow(method, data, fn) {
    $.ajax({
        type: "POST",
        url: host + method,
        data: data,
        dataType: 'JSON',
        // xhrFields: {
        withCredentials: true,
        // },
        crossDomain: true,
        // withCredentials: true,
        contentType: "application/x-www-form-urlencoded",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        // statusCode:{
        //     401: function(){
        //         window.location.href="https://hemc.100steps.net/2018/fireman/auth.php?redirect=" + redirect + "&state=" + state
        //     }
        // },
        success: fn,
    })
}

//post 不带参数请求
function show(method, fn) {
    $.ajax({
        type: "POST",
        url: host + method,
        // xhrFields: {
        withCredentials: true,
        // },
        crossDomain: true,
        contentType: "application/x-www-form-urlencoded",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        // statusCode:{
        //     401: function(){
        //         window.location.href="https://hemc.100steps.net/2018/fireman/auth.php?redirect=" + redirect + "&state=" + state
        //     }
        // },
        success: fn,
    })
}

// //微信授权接口跳转（redirect由后端提供）
// function weixin(redirect, state) {
//     $.ajax({
//         type: "GET",
//         url: "https://hemc.100steps.net/2018/fireman/auth.php?redirect=" + redirect + "&state=" + state,
//     })
// }

//检查是否在活动时间
function checkTime() {
    show(checktime, function (res) {
        var res1;
        if ((typeof res == 'object') && res.constructor == Object) {
            res1 = res;
        } else {
            res1 = eval("(" + res + ")");
        }
        return res1.errcode;
    })
}

// //检查是否有openid
// function checkId() {
//     show(checkid, function (res) {
//         var res1;
//         if ((typeof res == 'object') && res.constructor == Object) {
//             res1 = res;
//         } else {
//             res1 = eval("(" + res + ")");
//         }
//         if (res1.errcode == 540) {
//             // 未授权 引导用户到认证页面
//             //weixin(host + checkid, state)
//             alert("未授权");
//         }
//         if (res1.errcode == 0) {
//             return true;
//         }
//     })
// }