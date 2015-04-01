<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.1/jquery.xdomainrequest.min.js"></script>
 <link rel="stylesheet" href="files/style.css">
</head>
<body>

 
<script>
$(document).ready(function()
{
    var contentType ="application/x-www-form-urlencoded; charset=utf-8";
 
    if(window.XDomainRequest)
        contentType = "text/plain";
    //var s = $("#a1").val();
   
    $("#postdata").click(function()
    {   $.ajax({
         url:"http://festivalsinfo.com/index.php?route=account/responsea/yourfunction",
         data:"email=" + $("#email").val() + "&password=" + $("#password").val() + "",
         type:"POST",
         dataType:"json",   
         contentType:contentType,    
         


         success:function(data)
         {
              obj = JSON.parse(data["json"]);  
              var out = '<div class="row"><div class="container"><div class="maincont"><div class="twelve columns logo"><a href="#"><img src="files/logo2.png"></a></div><div style="border: 1px solid #3da9e3; padding: 0px; height: auto; overflow: hidden; background: #ffffff;"><div class="twelve "><li class="rowbox" style=" color: #000000; font-size: 20px;"><div class="imgwidth one columns">Book</div><div class="text ten columns">Title</div><div class="view one columns">sort</div></li></div></div>'; var i;

               for(i = 0; i < obj.json.length; i++) {
 out += '<li class="rowbox"><div class="imgwidth one columns"><img src="files/book.jpg"></div><div class="text ten columns">' + obj.json[i].bookname + '</div><div class="view one columns"><a href="'+ obj.json[i].href + '"><img src="files/download.png"></a></div></li>';
                 }
                //alert('success');
                out += '</div></div></div> ';
               document.getElementById("the-return").innerHTML = out; 
            },




         error:function(jqXHR,textStatus,errorThrown)
         {alert("You can not send Cross Domain AJAX requests: "+errorThrown);}
        });
    });
});
</script>




<div id="the-return">  
<p>use festivalsinfo@gmail.com and festivalsinfo to login</p>
<form action="" class="js-ajax-php-json" method="post" accept-charset="utf-8">
  <input id="email" type="text" value="festivalsinfo@gmail.com" />
  <input id="password" type="text" value="festivalsinfo" />
  <input id="postdata" type="button" value="Send Jsonp" />
</form>

</div>
</body>
</html>
</html>
