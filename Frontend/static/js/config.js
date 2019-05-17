var Reg = /^(?:[\u4e00-\u9fa5]+)(?:·[\u4e00-\u9fa5]+)*$|^[a-zA-Z]+\s?[\.·\-()a-zA-Z]*[a-zA-Z]+$/;

function checkinput(id, errid, str) {
    console.log("enter")
    if (block(id)) {
        console.log("block")
        if (str.length != 0) {
            console.log("length")
            if (!Reg.test(str)) {
                document.getElementById(errid).text("只能包含中文或英文，中文中可以包含 · ，英文中可以包含 . · -");
                document.getElementById(id).val(str);
                return false;
            }
            return true;
        } else {
            console.log("null")
            document.getElementById(errid).text("填写完才能提交噢");
            document.getElementById(id).val(str);
            return false;
        }
    } else {
        console.log("wmbl")
        return true;
    }
}

function block(id) {
    if ($("#" + id).css("display") != "none") {
        return true;
    } else {
        return false;
    }
}
function getval(str) {
    var string = document.getElementById(str);
    if (string) {
        string = string.value.trim();
        return string;
    } else return '';
}