<div id="new-message">
<p class="m-head">  new message </p>
<p class="m-body">
<form align="center" method="post">
<input type="text" onkeyup="check_in_db()" 
class="message-input"  placeholder="username" 
name="username" id="username"/><br><br>
<!-- here we have datalist to show available users-->
<datalist id="user"></datalist>


<textarea placeholder="write the new message here"></textarea>
<input type="submit" value="send" id="send" name="send"/>
<button>cancel</button>
</form>


</p>
<p class="m-foot">click send  </p>
<!--end of new message-->
</div>

<script src="jssquery.js"></script>
<script>
       //dissable send button
       // if user doesnt exist
       function check_in_db(){
    var username = document.getElementById('username').value;
    // send username to another file in  check_in_db.php
$.post("check_in_db.php",
{
      user: username
},
//receives data from check in db
function (data, status) {
   //alert(data);
   if(data=='< option value="no user">'){

       //if user is registered send button works
       document.getElementById("user").disabled =true;
     
   } else{
 document.getElementById("user").disabled =false; 
 //send works
   }
   document.getElementById('username').innerHTML=data;
}
       );

       }

</script>