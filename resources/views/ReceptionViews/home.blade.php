<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="js/publicVar.js"></script>
  <!-- bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js"
    integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous">
  </script>
  <!-- jquery and bootstrap js-->
  <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!-- side bar work area -->
  <link rel="stylesheet" href="css/navbarside.css">
  <script src="js/sidebar.js"> </script>

  <!-- DataTable -->
  <link rel="stylesheet" href="css/DataTable.min.css">
  <script src="js/DataTable.min.js"></script>

  <!-- reception js work -->
  <script src="js/bassel.js"></script>
  <script src="js/swl.js"></script>




</head>

<body>
  <!--navbar-->


  <nav id="myNavbar" class="navbar navbar-expand navbar-light" style="height:60px;z-index:10">
    <a class="navbar-brand inherit" href="#">
      <span class="inherit"><img src="images/logo.png" class="inherit"></span>
      <!--<img  src="images/logo.png" width="150" height="70" alt="">-->
    </a>
    <div class="navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto navbar-right">
        <!--<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#mymodal">Login</a></li>-->
        <li class="nav-item"><button id="checkin_savebtn" class="btn btn-success" style="margin-right:5px">Check
            in</button></li>
        <li class="nav-item"><input type="text" class="form-control" id="id_player"></li>
      </ul>
    </div>
  </nav>

  <!-- end nav-->

  <br>
  <!--add new player modal -->
  <div class="modal fade" id="add_player_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add new player</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6 form-group">
              <label for="first_name">First name</label>
              <input type="text" id="first_name" class="form-control">
            </div>
            <div class="col-6 form-group">
              <label for="last_name">Last name</label>
              <input type="text" id="last_name" class="form-control">
            </div>
            <div class="col-6 form-group">
              <label for="father_name">Father name</label>
              <input type="text" id="father_name" class="form-control">
            </div>
            <div class="col-6 form-group">
              <label for="national_id">National id</label>
              <input type="text" id="national_id" class="form-control">
            </div>
            <div class="col-6 form-group">
              <label for="phone_number">Phone number</label>
              <input type="text" id="phone_number" class="form-control">
            </div>
            <div class="col-6 form-group">
              <label for="user_name">User name</label>
              <input type="text" id="user_name" class="form-control">
            </div>
            <div class="col-6 form-group">
              <label for="password">Password </label>
              <input type="text" id="password" class="form-control">
            </div>
            <div class="col-6 form-group">
              <label for="email">Email </label>
              <input type="email" id="email" class="form-control">
            </div>
            <div class="col-6 form-group">
              <label for="gender">Gender</label> <!-- select male female-->
              <select class="select" name="" id="gender">
                <option value="male" selected>Male</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="add_player_savebtn" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--</add new player>-->

  <!-- add player subscription -->
  <div class="modal fade" id="add_player_subscription_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add new player subscription</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6 form-group">
              <label for="id">Id Player</label>
              <input type="text" id="id" class="form-control">
            </div>
            <div class="col-6 form-group">
              <label for="subscription_type">Subscription type</label>
              <select id="subscription_type" class="custom-select">
                <option disabled selected value="0"></option>
                <option value="1">Gym</option>
                <option value="2">Special</option>
              </select>
            </div>
            <div class="col-6 form-group">
              <label for="start_date">Starting date </label>
              <input type="date" id="start_date" class="form-control">
            </div>
            <div class="col-6 form-group">
              <label for="subscription">Subscription</label>
              <select id="subscription" class="custom-select">
                <option disabled selected value="0"></option>
              </select>
            </div>
            <div class="col-6 form-group">
              <label for="discount">Discount</label>
              <input id="discount" class="form-control" />
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="add_player_subscription_savebtn" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--</add player subscription>-->
  <!--check in modal-->
  <div class="modal fade" id="checkin_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Check In</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6 form-group">
              <label for="id_player">Id Player</label>
              <input type="text" id="id_player" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="checkin_savebtn" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- </check in modal> -->

  <!-- Add vacation request modal -->
  <div class="modal fade" id="add_vacation_request_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Vacation Request</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6 form-group">
              <label for="description">Description</label>
              <input type="text" id="description" class="form-control">
            </div>
            <div class="col-6 form-group">
              <label for="v_start_date">Start date</label>
              <input type="date" id="v_start_date" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="add_vacation_request_savebtn" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Get player Info  modal-->
  <div class="modal fade" id="get_player_info_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="pi_title" class="modal-title">Get Player Info</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6 form-group">
              <label for="gpi_id_player">Player ID</label>
              <input type="text" id="gpi_id_player" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="get_player_info_savebtn" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- </Get player info modal>-->


  <!-- sidebar -->
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
          <div class="user-info">
            <span class="user-name"></span>
            <span class="user-role">Reception</span>
          </div>
        </div>
        <div class="sidebar-menu">
          <ul>
            <li class="header-menu">
              <span>Players Mangement</span>
            </li>
            <li>
              <a id="today_check_in" href="#">
                <i class="fas fa-tasks"></i>
                <span>Today Checked In</span>
              </a>
            </li>
            <li>
              <a data-toggle="modal" data-target="#add_player_modal" href="#">
                <i class="fas fa-user-plus"></i>
                <span>Add player</span>
              </a>
            </li>
            <li>
              <a id="add_player_subscription" data-toggle="modal" data-target="#add_player_subscription_modal" href="#">
                <i class="fas fa-scroll"></i>
                <span>Add player subscription</span>
              </a>
            </li>
            <!--<li>
              <a id="checkin" data-toggle="modal" data-target="#checkin_modal" href="#">
                <i class="fas fa-check"></i>
                <span>Check in</span>
              </a>
            </li>-->
            <li>
              <a data-toggle="modal" data-target="#add_vacation_request_modal" href="#">
                <i class="fas fa-plane"></i>
                <span>Request vacation</span>
              </a>
            </li>
            <li>
              <a id="get_player_info" data-toggle="modal" data-target="#get_player_info_modal" href="#">
                <i class="fas fa-user"></i>
                <span>Get player info</span>
              </a>
            </li>
            <li>
              <a id="get_player_subscriptions" href="#">
                <i class="fas fa-user"></i>
                <span>Get player subscriptions</span>
              </a>
            </li>
              <li>
                  <a onclick="logout()">
                      <i class="fas fa-sign-out-alt"></i>
                      <span>Log out</span>
                  </a>
              </li>
              <script>
                  function logout() {
                      sessionStorage.removeItem('token');
                      window.location = '/'
                  }
              </script>
          </ul>
        </div>
        <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
      <div class="sidebar-footer">

      </div>
    </nav>



    <!-- sidebar-wrapper  -->
    <main class="page-content">

      <!--- start body ---->
      <div class="container">

        <!--</alert>-->

        <div id="filling">
          <!-- Check in Table for today Players -->
          <div id="check_in_div" hidden>
            <table id="check_in_table" class="table table-striped text-center" style="border:none">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Player Name</th>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                </tr>
              </thead>
            </table>
          </div>
          <!--  Subscriptions Deadline  -->
          <div id="subscriptions_deadline_div" hidden>
            <table id="subscriptions_deadline_table" class="table table-striped text-center" style="border:none">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Player Name</th>
                  <th scope="col">Days Left</th>
                  <th scope="col">Renew</th>
                </tr>
              </thead>
            </table>
          </div>

          <!-- Player subscription -->
          <div id="player_subscriptions_div" hidden>


            <table id="player_subscriptions" class="table table-striped text-center" style="border:none">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Starting date</th>
                  <th scope="col">Subscription Type</th>
                  <th scope="col">Name/Description</th>
                  <th scope="col">Duration</th>
                  <th scope="col">Price</th>

                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>

          </div>


          <!-- Player Info -->
          <div id="player_info_div" hidden class="card text-center">
            <h5 class="card-header">
              Player Information
            </h5>
            <div class="card-body">
              <div class="row">
                <!--critical info-->
                <h3 class="card-title col-12 text-left">Civil Info :</h5>
                  <h6 class="card-text col-lg-4">First name :</h6>
                  <p id="pi_first_name" class="card-text col-lg-5"></p>
                  <h6 class="card-text col-lg-4">Last name :</h6>
                  <p id="pi_last_name" class="card-text col-lg-5"></p>
                  <h6 class="card-text col-lg-4">Father name :</h6>
                  <p id="pi_father_name" class="card-text col-lg-5"></p>
                  <h6 class="card-text col-lg-4">National ID :</h6>
                  <p id="pi_national_id" class="card-text col-lg-5"></p>
                  <!--more info-->
                  <h6 class="card-text col-4">Phone number :</h6>
                  <p id="pi_phone_number" class="card-text col-5"></p>
                  <h6 class="card-text col-4">Second phone number :</h6>
                  <p id="pi_s_phone_number" class="card-text col-5"></p>
                  <!--subscriptions info-->
                  <h3 class="card-title col-12 text-left">Subscription Info :</h5>
                    <h6 class="card-text col-4">Start date :</h6>
                    <p id="pi_start_date" class="card-text col-5"></p>
                    <h6 class="card-text col-4">Duration :</h6>
                    <p id="pi_duration" class="card-text col-5"></p>

                    <!-- account info-->
                    <h3 class="card-title col-12 text-left">Account Info :</h5>
                      <h6 class="card-text col-4">User name :</h6>
                      <p id="pi_user_name" class="card-text col-5"></p>
                      <h6 class="card-text col-4">Password :</h6>
                      <p type="password" id="pi_password" class="card-text col-5"></p>
                      <h6 class="card-text col-4">Email :</h6>
                      <p id="pi_email" class="card-text col-5"></p>

              </div>
            </div>
          </div>


        </div>
        <!-- <button class="btn btn-dark" data-toggle="modal" data-target="#add_player_modal">Add new player</button>
        <button class="btn btn-dark" data-toggle="modal" id="add_player_subscription"data-target="#add_player_subscription_modal">Add new Subscription
          for player</button>
        <button class="btn btn-dark" id="checkin" data-toggle="modal" data-target="#checkin_modal">Check in </button>
        <button class="btn btn-dark"   data-toggle="modal"data-target="#add_vacation_request_modal">Add
          Vacation
          request </button>
        <button class="btn btn-dark" id="get_player_info"  data-toggle="modal" data-target="#get_player_info_modal">Get
          Player Info</button>-->


      </div>
      <!-- end body-->

    </main>

    <!-- page-content" -->
  </div>
  <!-- <!page-wrapper> -->



</body>

</html>
