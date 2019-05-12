const method1 = "/update/";
const method2 = "/modify/";

$(function(){
show(method1,function(res){
    if(res.errcode == 0){
    $("#passager-name1").val(res.passenger1);
    $("#passager-name2").val(res.passenger2);
    $("#passager-name3").val(res.passenger3);
    $("#destination").val(res.destination);
    $("#message").val(res.comment);
    }else{
        console.log("fails to get data.");
    }
})
$("#update-ticket").click(function () {
    passagers[0] = getval('passager-name1');
    judge[0] = Is('passenger1', passagers[0]);
    passagers[1] = getval('passager-name2');
    judge[1] = Is('passenger2', passagers[1]);
    passagers[2] = getval('passager-name3');
    judge[2] = Is('passenger3', passagers[2]);
    var destination = getval('destination');
    judge[3] = Is('destination', destination);
    var message = getval('message');
    judge[4] = Is('comment', message);
    //向后台传数据
    if (judge[0] && judge[1] && judge[2] && judge[3] && judge[4]) {
        var data ={
                "passenger1": passagers[0],
                "passenger2": passagers[1],
                "passenger3": passagers[2],
                "destination": destination,
                "comment": message,
        }
        ticket(method2,data,function (res) {
                if (!res.errcode) {
                    window.location.href = 'ticket.html';
                }
                else {
                    $('#errmsg_back').html(res.errmsg);
                }
            })
    }
})

})
    
