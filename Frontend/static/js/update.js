var input = new Array();
var judge = new Array();
var inputbox = [
    "passager-name1", "passager-name2", "passager-name3", "destination", "message"
];
var errmsg = [
    "errmsg_passenger1", "errmsg_passenger2", "errmsg_passenger3", "errmsg_destination", "errmsg_comment"
];
var checkdisplay = [
    "passager1", "passager2", "passager3", "destination", "message"
]


$(function () {
    show(update, function (res) {
        var res1 = typechange(res);
        if (res1.errcode == 0) {
            $("#passager-name1").val(res1.passenger1);
            $("#passager-name2").val(res1.passenger2);
            $("#passager-name3").val(res1.passenger3);
            $("#destination").val(res1.destination);
            $("#message").val(res1.comment);
        } else {
            console.log("fails to get data.");
        }
    })
    $("#update-ticket").click(function () {
        //乘客信息填写
        for (var i = 0; i < 5; i++) {
            input[i] = getval(inputbox[i]);
            console.log("loop")
        }
        for (var i = 0; i < 5; i++) {
            judge[i] = checkinput(checkdisplay[i], inputbox[i], errmsg[i], input[i]);
            console.log(judge[i])
            console.log("loop again")
        }

        //向后台传数据
        if (judge[0] && judge[1] && judge[2] && judge[3] && judge[4]) {
            var data = {
                "passenger1": input[0],
                "passenger2": input[1],
                "passenger3": input[2],
                "destination": input[3],
                "comment": input[4],
            }
            ticket(modify, data, function (res) {
                if (!res.errcode) {
                    window.location.href = 'ticket.html';
                } else {
                    $('#errmsg_back').html(res.errmsg);
                }
            })
        }
    })

})