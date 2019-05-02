var HtmlUtil = {
    htmlEncode: function (html) {
        var temp = document.createElement("div");
        (temp.textContent != undefined) ? (temp.textContent = html) : (temp.innerText = html);
        var output = temp.innerHTML;
        temp = null;
        return output;
    },
    htmlDecode: function (text) {
        var temp = document.createElement("div");
        temp.innerHTML = text;
        var output = temp.innerText || temp.textContent;
        temp = null;
        return output;
    }
}

//检查是否为空以及html转义
/* function check(str) {
    if (str == "" || str == null) {
        alert("还有没填的信息")
    } else {
        return HtmlUtil.htmlEncode(str);
    }
} */

//随机生成0-3的数字（用于随机生成图片）
function randomNumber(max) {
    return Math.floor(Math.random() * Math.floor(max));
}
