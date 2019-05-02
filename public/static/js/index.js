var i = 2;
var passagers = new Array();
$(function () {
    $("#add").click(function () {
        var add = "<div class='input-box' id='passager" + i + "'>乘客</br><input type='text' id='passager-name" +
            i + "name='Station[passenger" + i + "]><div class='create-ticket add' id='reduce" + i + "' onclick='reduce(" + i + ")'>-</div></div>";
        if (i < 4) {
            $("#passager" + (i - 1)).after(add)
            i++;
        } else {
            alert("最多只能有三位乘客噢~")
        }
    })

    $("#create-ticket").click(function () {
        //乘客信息填写   
        passagers = [];
        /* for (m = 1; m < i; m++) {
            passagers[m - 1] = $("#passager-name" + m).val();
        } */
         passagers[0]=$('#passager-name1').val();
         if($('#passager-name2').val()){
            passagers[1]=$('#passager-name2').val();
         }
         else passagers[1]=null;
         if($('#passager-name3').val()){
            passagers[2]=$('#passager-name3').val();
         }
         else passagers[2]=null;
        //目的地和想说的话填写
        var destination = $("#destination").val();
        var message = $("#message").val();

        //向后台传数据
        /* $.ajax({

            type: "POST",

            url: 'save',

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
            success: function () { window.location.href = "success"; },
           error:function(){window.location.href = "success";}
        }) */
    })
})

function reduce(j) {
    if (j == 2) {
        if ($("#passager3").attr("id")) {
            $("#passager3").remove();
            i--;
        } else {
            $("#passager2").remove();
            i--;
        }
    } else {
        $("#passager3").remove();
        i--
    }
}