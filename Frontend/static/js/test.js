$(function(){
// alert("welcome")    
$.ajax({
    type:"GET",
    url:"https://hemc.100steps.net/2018/fireman/auth.php?redirect=http://localhost/BBT-2019-Station2/Frontend/html/test.html&state=test",
    function(res){
        console.log(res)
    }
})
})
