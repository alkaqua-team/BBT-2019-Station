var i = 2;
var passagers = new Array();
var judge = new Array();
$(function () {
    $("#add").click(function () {
        var add = "<div class='input-box' id='passager" + i + "'>乘客</br><input type='text' id='passager-name" +
            i + "name='Station[passenger" + i + "]><div class='create-ticket reduce' id='reduce" + i + "' onclick='reduce(" + i + ")'></div></div><div class='errmsg' id='errmsg_passenger" + i + "'></div>";
        if (i < 4) {
            $("#errmsg" + (i - 1)).after(add)
            i++;
        } else {
            // alert("最多只能有三位乘客噢~")
        }
    })

    $("#create-ticket").click(function () {
        //乘客信息填写   
        //passagers = [];
        /* for (m = 1; m < i; m++) {
            passagers[m - 1] = $("#passager-name" + m).val();
        } */
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
            $.ajax({

                type: "POST",

                url: '../../Backend/public/station/save',

                data: {
                    "passenger1": passagers[0],
                    "passenger2": passagers[1],
                    "passenger3": passagers[2],
                    "destination": destination,
                    "comment": message,
                },

                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    if (!errcode) {
                        window.location.href = 'ticket.html';
                    }
                    else {
                        $('#errmsg_back').html(res.errmsg);
                    }
                },
                error: function () { if (!errcode) {
                    window.location.href = 'ticket.html';
                }
                else {
                    $('#errmsg_back').html(res.errmsg);
                } }
            })
        }
    })
    $("#update-ticket").click(function () {
        //乘客信息填写   
        //passagers = [];
        /* for (m = 1; m < i; m++) {
            passagers[m - 1] = $("#passager-name" + m).val();
        } */
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
            $.ajax({

                type: "POST",

                url: '../../Backend/public/station/modify',

                data: {
                    "passenger1": passagers[0],
                    "passenger2": passagers[1],
                    "passenger3": passagers[2],
                    "destination": destination,
                    "comment": message,
                },

                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    if (!errcode) {
                        window.location.href = 'ticket.html';
                    }
                    else {
                        $('#errmsg_back').html(res.errmsg);
                    }
                },
                error: function () { if (!errcode) {
                    window.location.href = 'ticket.html';
                }
                else {
                    $('#errmsg_back').html(res.errmsg);
                } }
            })
        }
    })
})
function reduce(j) {
    if (j == 2) {
        if ($("#passager3").attr("id")) {
            $("#passager3").remove();
            $("#errmsg3").remove();
            i--;
        } else {
            $("#passager2").remove();
            $("#errmsg2").remove();
            i--;
        }
    } else {
        $("#passager3").remove();
        $("#errmsg3").remove();
        i--
    }
}