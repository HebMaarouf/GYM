<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>

</head>
<body>

  <div class="container">
    <div class="col-6" style="transform: translate(50%,60%)">
    <div class="form-group">
      <label for="user_name">Username</label>
      <input type="text" class="form-control"placeholder="Enter Username" id="name" name="user_name" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password"class="form-control" placeholder="Enter Password" id="password" name="password" required>
    </div>
    <label>
      <br>
    <input type="checkbox" checked="checked" name="remember"> Remember me
  </label>
    <button class="btn btn-outline-success" type="button" id="next">Login</button>
    </div>
  </div>

<script >
$(document).ready(function(){  
   $('#next').click(function(){
            var user_name=$('#name').val();
            var password=$('#password').val();
            $.ajax({
                method:"post",
                url: "http://localhost:8080/login",
                data:{
                    user_name:user_name,
                    password:password
                },
                success: function (data) {
                    console.log(data);
                    //save the vital info
                    sessionStorage.setItem("id",data.id);
                    sessionStorage.setItem("token",data.token);
                    sessionStorage.setItem("user_name",data.user_name);
                    //change the page
                     document.write(data.page);
                    
                },
                error:function(error){
                    alert("error");
                }
              });

        });
      });
</script>

</body>
</html>
