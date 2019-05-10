var Reg = /^(?:[\u4e00-\u9fa5]+)(?:·[\u4e00-\u9fa5]+)*$|^[a-zA-Z]+\s?[\.·\-()a-zA-Z]*[a-zA-Z]+$/;
function Is(style, str) {
    switch (style) {
        case 'passenger1':
            if (str.length != 0) {
                if (!Reg.test(str)) {
                    $("#errmsg_passenger1").html("乘客格式不正确（注：只能包含中文或英文，中文中可以包含 · ，英文中可以包含 . · - ）");
                    $('#passager-name1').val(str);
                    return false;
                }
                else return true;
            }
            else {
                $("#errmsg_passenger1").html("信息未完善，请填完!");
                $('#passager-name1').val(str);
                return false;
            }
            break;
        case 'passenger2':
            if (str.length != 0) {
                if (!Reg.test(str)) {
                    $("#errmsg_passenger2").html("乘客格式不正确（注：只能包含中文或英文，中文中可以包含 · ，英文中可以包含 . · - ）");
                    $('#passager-name2').val(str);
                    return false;
                }
                else return true;
            }
            else { return true; }
            break;
        case 'passenger3':
            if (str.length != 0) {
                if (!Reg.test(str)) {
                    $("#errmsg_passenger3").html("乘客格式不正确（注：只能包含中文或英文，中文中可以包含 · ，英文中可以包含 . · - ）");
                    $('#passager-name3').val(str);
                    return false;
                }
                else return true;
            }
            else { return true; }
            break;
        case 'destination':
            if (str.length != 0) {
                if (!Reg.test(str)) {
                    $("#errmsg_destination").html("目的地格式不正确（注：只能包含中文或英文，中文中可以包含 · ，英文中可以包含 . · - ）");
                    $('#destination').val(str);
                    return false;
                }
                else return true;
            } else {
                $("#errmsg_destination").html("信息未完善，请填完!");
                $('#destination').val(str);
                return false;
            }
            break;
        case 'comment':
            if (str.length != 0) {
                return true;
            } else {
                $("#errmsg_comment").html("信息未完善，请填完!");
                $('#message').html(str);
                return false;
            }
            break;
    }
}
function getval(str) {
    var string = document.getElementById(str);
    if (string) {
        string = string.value.trim();
        return string;
    }
    else return '';
}
