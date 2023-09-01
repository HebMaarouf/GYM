<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
---- Include the above in your HEAD tag -------- -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <script src="js/publicVar.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Admin KeepFit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="css/Admin/normalize.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" /> -->
    <link rel="stylesheet" href="css/navbarside.css">
    <link rel="stylesheet" href="css/Admin/main.css">
    <!-- <link rel="stylesheet" href="css/bootstrap-rtl.css"> -->
    <!-- <link rel="stylesheet" href="dist/css/bootstrap-rtl.min.css" media="screen"> -->
</head>

<body>
<div class="page-wrapper chiller-theme toggled" id="side">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="#"><img src="images/logo.png" width="150" height="70" alt=""></a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    {{--                        <img class="img-responsive img-rounded" id="info-img" alt="User picture">--}}
                </div>
                <div class="user-info">
                        <span class="user-name">
                            <strong id="name1"></strong>
                        </span>
                    <span class="user-role">Administrator</span>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>Gym Mangement</span>
                    </li>
                    <li class="header-menu">
                        <span>Dashbord</span>
                    </li>
                    <li>
                        <a onclick='displayAdd_gym()'>
                            <i class="fab fa-google-plus"></i>
                            <span>Add Gym</span>
                        </a>
                    </li>
                    <li>
                        <a onclick='display_gym()'>
                            <i class="fas fa-heartbeat"></i>
                            <span>MY Gyms</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="logout()">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">

        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="myNavbar" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/logo.png" width="140" height="50" alt="">
            </a>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse"
                    data-target="#exCollapsingNavbar">
                &#9776;
            </button>
            <div class="collapse navbar-collapse" id="exCollapsingNavbar">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
                </ul>
                <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i
                                class="fa fa-cog fa-fw fa-lg"></i></a></li>
                    <li class="dropdown order-1">
                        <button type="button" id="dropdownMenu1" data-toggle="dropdown"
                                class="btn btn-outline-secondary dropdown-toggle">Profile<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right mt-2">
                            <li class="px-3 py-2">

                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">
            <div class="container " id="dis">
                <h1>View Summary</h1>
                <div id="view">

                </div>
                <hr>
                <div id="dataemp">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>logo</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody id="empdata">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container contact-form hidden" id="con">
                <div class="row">
                    <div class="col">
                        <h1>Add New Gym</h1>
                    </div>
                    <div class="col">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                    </div>
                </div>
                <hr>
                <form id="upload_form" class="row" onsubmit="add(event)">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>User Name</label>
                            <input required id="user_name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input required id="password" type="password" class="form-control">
                            <p id="passwordHelpBlock" class="form-text text-muted">
                                Your password must be more than 8 characters long, should contain at-least 1 Uppercase,
                                1 Lowercase, 1 Numeric and 1 special character.
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input required id="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input required id="phone" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input required id="email" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input required id="loc" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="avartar">
                                <img class="logogym" src="images/Antu.png" alt="" id="imgPath">
                                <div class="avartar-picker">
                                    <div class="custom-file">
                                        <input required type="file" name="data1" id="file1" class="custom-file-input"
                                               onchange="readURL(this);">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <input required type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Discraption</label>
                            <textarea id="des" style="height: 145px;" class="form-control" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Add gym</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- page-content" -->
</div>
<!-- page-wrapper -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="css/Admin/main.js"></script>
<script src="js/swl.js"></script>
<!-- <script src="dist/js/bootstrap.bundle.min.js"></script> -->

<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgPath')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function display_gym() {
        var space = document.getElementById('dis');
        var con = document.getElementById('con');

        space.classList.remove('hidden');
        con.className += " hidden";

        //space.className+= " hidden";
        //con.classList.remove('hidden');
    }

    function displayAdd_gym() {
        var space = document.getElementById('dis');
        var con = document.getElementById('con');

        con.classList.remove('hidden');
        space.className += " hidden";

    }


    function add($event) {
        $event.preventDefault();
        var user_name_gym = $('#user_name').val();
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var loc = $('#loc').val();
        var des = $('#des').val();
        var password = $('#password').val();
        var token = sessionStorage.getItem('token');
        var id = sessionStorage.getItem('id');
        var user_name = sessionStorage.getItem('user_name');
        var file = document.getElementById('file1').files[0];
        var data1 = new FormData();
        data1.append("file", file);
        data1.append("token", token);
        data1.append("user_name", user_name);
        data1.append("id", id);
        data1.append("name", name);
        data1.append("user_name_gym", user_name_gym);
        data1.append("email", email);
        data1.append("phone", phone);
        data1.append("loc", loc);
        data1.append("des", des);
        data1.append("password", password);
        $.ajax({
            method: "post",
            // headers: {'X-CSRF-TOKEN': token1},
            url: "http://" + host + "/addgym",
            contentType: false,
            cache: false,
            processData: false,
            data: data1,
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    swal('You Added new Gym!', '', 'success');
                    window.location.reload();
                } else {
                    swal(data.error, '', 'error');
                }
            },
            error: function (data) {
                console.log(data);
                swal('opps .. Error', '', 'info');
            }
        });
    }

    function printErrorMsg(msg) {
        var temp = "";
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display', 'block');
        $.each(msg, function (key, value) {
            temp += '- ' + value.match('\n');
            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
        });
        swal('have : ' + msg.length + ' Errors', '', 'error');
        // console.log(temp);
    }

</script>

<script>
    function logout() {
        sessionStorage.removeItem('token');
        window.location = '/'
    }

    function readGems() {
        var x = sessionStorage.getItem('token');
        var x1 = sessionStorage.getItem('id');
        var x2 = sessionStorage.getItem('user_name');
        var user_name = x2;
        var id = x1;
        var token = x;
        /* $.ajax({
             method: "get",
             url: "http://"+ host+"/getAdmin",
             data: {
                 id: id,
                 token: token,
                 user_name: user_name
             },
             success: function (data) {
                 // console.log(data);
                 //save the vital info
                 $('#info-img').attr("src", data.info[0].photo);
                 $('#name1').append(data.info[0].user_name);
             },
             error: function (error) {
                 alert("error");
             }
         });*/
        $.ajax({
            method: "get",
            url: "http://" + host + "/readGym",
            success: function (data) {
                var temp = "";

                console.log(data);
                for (let index = 0; index < data.info.length; index++) {
                    temp += '<tr>'
                        + '<td>' + '<img src="' + 'images/' + data.info[index].logo + '"' + 'class="img-responsive img-rounded" id="info-img1" width="150" height="60" alt="User picture">' + '</td>'
                        + '<td>' + data.info[index].name + '</td>'
                        + '<td>' + data.info[index].description + '</td>'
                        + '<td>' + data.info[index].Email + '</td>'
                        + '<td>' + data.info[index].phone_number + '</td>'
                        + '<td>' + '<button class="btn btn-danger" onClick="gotoNode(\'' + data.info[index].id + '\')">' + 'Delete' + '</button>' + '</td>'
                        + '</tr>';
                }
                $('#empdata').append(temp);
                $('#example').DataTable();
            },
            error: function (error) {
                swal('opps .. Error', '', 'info');
            }
        });
    }
    $(document).ready(function () {
       readGems()
    });
</script>
<script>

    function gotoNode(id_gym) {
        console.log("idddd" + id_gym);
        var token = sessionStorage.getItem('token');
        var id = sessionStorage.getItem('id');
        var user_name = sessionStorage.getItem('user_name');
        $.ajax({
            method: "post",
            url: "http://" + host + "/deletegym",
            data: {
                id: id,
                token: token,
                user_name: user_name,
                id_new: id_gym
            },
            success: function (data) {
                console.log(data);
                swal('You Delete Gym!', '', 'success');
                window.location.reload();
            },
            error: function (error) {
                swal('opps .. Error', '', 'info');
            }
        });
    }
</script>
</body>
</html>
