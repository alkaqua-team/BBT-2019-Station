var Reg = /^(?:[\u4e00-\u9fa5]+)(?:·[\u4e00-\u9fa5]+)*$|^[a-zA-Z]+\s?[\.·\-()a-zA-Z]*[a-zA-Z]+$/;
function Is(style, str) {
    switch (style) {
        case 'passenger1':
            if (str.length != 0) {
                if (!Reg.test(str)) {
                    $("#errmsg_passenger1").text("只能包含中文或英文，中文中可以包含 · ，英文中可以包含 . · -");
                    $('#passager-name1').val(str);
                    return false;
                }
                else return true;
            }
            else {
                $("#errmsg_passenger1").text("填写完才能提交噢");
                $('#passager-name1').val(str);
                return false;
            }
            break;
        case 'passenger2':
            if (str.length != 0) {
                if (!Reg.test(str)) {
                    $("#errmsg_passenger2").text("只能包含中文或英文，中文中可以包含 · ，英文中可以包含 . · -");
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
                    $("#errmsg_passenger3").text("只能包含中文或英文，中文中可以包含 · ，英文中可以包含 . · -");
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
                    $("#errmsg_destination").text("只能包含中文或英文，中文中可以包含 · ，英文中可以包含 . · -");
                    $('#destination').val(str);
                    return false;
                }
                else return true;
            } else {
                $("#errmsg_destination").text("填写完才能提交噢");
                $('#destination').val(str);
                return false;
            }
            break;
        case 'comment':
            if (str.length != 0) {
                return true;
            } else {
                $("#errmsg_comment").text("填写完才能提交噢");
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
