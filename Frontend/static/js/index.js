var input = new Array();
var judge = new Array();
var inputbox = [
    "passager-name1","passager-name2","passager-name3","destination","message"
];
var errmsg = [
    "errmsg_passenger1","errmsg_passenger2","errmsg_passenger3","errmsg_destination","errmsg_comment"
];
const height = document.documentElement.clientHeight;
const width = document.documentElement.clientWidth;
$(".background").css("height", height);
$(function () {
    // if(checkTime()==true){
    // console.log("正在活动期间")
    $("#add1").click(function () {
            if(block("passager2")==true){
            $("#passager3").show();
            $("#add1").hide();
            $(".tip").hide();
            $(".arrow").hide();
    }else{
            $("#passager2").show();
    }
    })
    $("#reduce2").click(function () {
        $("#add1").show();
        $("#add2").show();
        $(".tip").show();
        $(".arrow").show();
        $("#passager2").hide();
        $("#passager-name2").val("");
    });
    $("#reduce3").click(function () {
        $("#passager3").hide();
        $("#passager-name3").val("");
        $("#add1").show();
        $("#add2").show();
        $(".tip").show();
        $(".arrow").show();
    })
    $("#create-ticket").click(function () {

        //乘客信息填写
        for (var i=0;i<5;i++){
            input[i] = getval(inputbox[i]);
        }
        for (var i=0;i<5;i++){
            judge[i]=checkinput(inputbox[i],errmsg[i],input[i]);
        }
        // passagers[0] = getval('passager-name1');
        // judge[0] = Is('passenger1', passagers[0]);
        // passagers[1] = getval('passager-name2');
        // judge[1] = Is('passenger2', passagers[1]);
        // passagers[2] = getval('passager-name3');
        // judge[2] = Is('passenger3', passagers[2]);
        // //目的地和想说的话填写
        // var destination = getval('destination');
        // judge[3] = Is('destination', destination);
        // var message = getval('message');
        // judge[4] = Is('comment', message);

        //向后台传数据
        if (judge[0] && judge[1] && judge[2] && judge[3] && judge[4]) {
            var data = {
                "passenger1": input[0],
                "passenger2": input[1],
                "passenger3": input[2],
                "destination": input[3],
                "comment": input[4]
            }
            ticketShow(save, data, function (res) {
                if (!res.errcode) {
                    window.location.href = 'ticket.html';
                } else {
                    $('#errmsg_back').html(res.errmsg);
                }
            });
        }
    })   
// }

})

//待改
var i=2;
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