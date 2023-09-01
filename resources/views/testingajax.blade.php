<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <!--<link rel="stylesheet" href="css/bootstrap.min.css"/>-->

    <title>Testing machines</title>
</head>

<body>
    <div class="container">

        <div class="form-group">
            <div class="col-5">
                <label for="username"> User Name</label>
                <input type="text" id="name" class="form-control">
                <input type="password" name="" id="pass" placeholder="password">
                <button type="button" id="start" class="btn btn-danger">Start</button>
                <button type="button" id="next" class="btn btn-dark">Next page with user name and password and token </button>
            </div>
        </div>

    </div>
</body>

<script>
    $(document).ready(function () {
        $('#start').on('click', function (data) {

           $.ajax({
                method:"post",
                url: "http://localhost:8080/addgym",
                data:{
                    id:"1",
                    token:"asd",
                    user_name:"asd",
                    name:"testing1",
                    location:"fu",
                    description:"testing",
                    user_name_new:"asd",
                    password:"asd"
                },
                success: function (data) {
                    alert("success"+data);
                    console.log(data);

                },
                error:function(error){
                    alert("error");
                }
            });

           /* $.ajax({
                method:"get",
                url: url,
                success: function (data) {
                    alert('success');
                    //token
                    sessionStorage.setItem("user_name","hebal-01");
                    sessionStorage.setItem("token",data);
                    console.log(data);
                },
                error:function(error){
                    alert("error");
                }
            });*/

        });
        $('#next').click(function(){
            var username=$('#name').val();
            var password=$('pass').val();
            $.ajax({
                method:"post",
                url: "http://localhost:8080/blog/public/login",
                data:{
                    username:username,
                    password:password
                },
                success: function (data) {
                    console.log(data);
                    //token
                   // sessionStorage.setItem("user_name","hebal-01");
                    //sessionStorage.setItem("token",data);
                    //console.log(data);
                },
                error:function(error){
                    alert("error");
                }
              });

        });


    });


</script>

</html>
