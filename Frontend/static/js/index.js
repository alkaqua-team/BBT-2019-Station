var i = 2;
var passagers = new Array();
var judge = new Array();
const method1 = "/save/";
const height = document.documentElement.clientHeight;
const width = document.documentElement.clientWidth;
$(".background").css("height", height);
// $(".background").css("width", width);
$(function () {
    $("#add1").click(function () {
        if ($("#passager2").css("display") == "none") {
            $("#passager2").show();
        } else {
            $("#passager3").show();
            $("#add1").hide();
            $("#add2").hide();
            $(".tip").hide();
            $(".arrow").hide();
            $("#reduce2").toggleClass("reduce2");
        }
    })
    $("#add2").click(function () {
        if ($("#passager3").css("display") == "none") {
            $("#passager3").show();
            $("#add1").hide();
            $("#add2").hide();
            $(".tip").hide();
            $(".arrow").hide();
            $("#reduce2").toggleClass("reduce2");
        } else {
            $("#add1").hide();
            $("#add2").hide();
            $(".tip").hide();
            $(".arrow").hide();
            $("#reduce2").toggleClass("reduce2");
        }
    })
    $("#reduce2").click(function () {
        $("#reduce2").removeClass("reduce2");
        $("#add1").show();
        $("#add2").show();
        $(".tip").show();
        $(".arrow").show();
        $("#passager2").hide();
        $("#passager-name2").val("");
    });
    $("#reduce3").click(function () {
        $("#reduce2").removeClass("reduce2");
        $("#passager3").hide();
        $("#passager-name3").val(" ");
        $("#add1").show();
        $("#add2").show();
        $(".tip").show();
        $(".arrow").show();
    })
    $("#create-ticket").click(function () {
        //乘客信息填写
        passagers[0] = getval('passager-name1');
        judge[0] = Is('passenger1', passagers[0]);
        passagers[1] = getval('passager-name2');
        judge[1] = Is('passenger2', passagers[1]);
        passagers[2] = getval('passager-name3');
        judge[2] = Is('passenger3', passagers[2]);
        //目的地和想说的话填写
        var destination = getval('destination');
        judge[3] = Is('destination', destination);
        var message = getval('message');
        judge[4] = Is('comment', message);
        //向后台传数据
        if (judge[0] && judge[1] && judge[2] && judge[3] && judge[4]) {
            var data = {
                "passenger1": passagers[0],
                "passenger2": passagers[1],
                "passenger3": passagers[2],
                "destination": destination,
                "comment": message,
            }
            ticket(method1, data, function (res) {
                if (!res.errcode) {
                    window.location.href = 'ticket.html';
                } else {
                    $('#errmsg_back').html(res.errmsg);
                }
            });
        }
    })
})

function reduce(j) {
    if (j == 2) {
        if ($("#passager3").attr("id")) {
            $("#passager3").remove();
            $("#errmsg_passenger3").remove();
            i--;
        } else {
            $("#passager2").remove();
            $("#errmsg_passenger2").remove();
            i--;
        }
    } else {
        $("#passager3").remove();
        $("#errmsg_passenger3").remove();
        i--
    }
}