<!DOCTYPE html>

<html>

<head>

     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="js/publicVar.js"></script>
    <title>Manger</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href= "https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/DataTable.min.css">
    <link rel="stylesheet" href="css/navbarside.css">
    <link rel="stylesheet" href="css/Admin/main.css">
    <script src="js/moment.js"></script>
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
            <img class="img-responsive img-rounded" src="../../a.jpg" alt="User picture">
          </div>
          <div class="user-info">
            <span class="user-name">
              <strong></strong>
            </span>
            <span class="user-role">Gyn Manager</span>
          </div>
        </div>
        <div class="sidebar-menu">
          <ul>
            <li class="header-menu">
              <span>Gym Mangement</span>
            </li>
            <li>
              <a href="#" onclick="fun0()">
                <i class="fa fa-book"></i>
                <span>Home</span>
              </a>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fa fa-tachometer-alt"></i>
                <span>Employee</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="#" onclick="fun()">show Employee</a>
                  </li>
                  <li>
                    <a href="#" onclick="fun1()">Add Employee</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fa fa-chart-line"></i>
                <span>Vacation</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="#" onclick="fun3()">show Vacation Type</a>
                  </li>
                  <li>
                    <a href="#">Vacation Request</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fa fa-globe"></i>
                <span>Subscription</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="#" onclick="fun6()">Subscription</a>
                  </li>
                  <li>
                    <a href="#" onclick="fun7()">Specific Subscription</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="header-menu">
              <span>Extra</span>
            </li>
            <li>
              <a href="#" onclick="fun10()">
                <i class="fa fa-book"></i>
                <span>Machines</span>
              </a>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fa fa-globe"></i>
                <span>Customer Satisfaction</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="#" onclick="fun12()">Questions</a>
                  </li>
                  <li>
                    <a href="#" onclick="">Show </a>
                  </li>
                </ul>
              </div>
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


    <nav id="myNavbar" class="navbar navbar-expand-lg navbar-darek bg-darek navbar navbar-default navbar-inverse">
      <div class="container">
        <a class="navbar-brand" href="#">
          <!-- <span>MY </span>
            <span>Gym</span> -->
          <!-- <img src="images/logo.png" width="150" height="65" alt=""> -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto navbar-right">
            <!-- <li class="nav-item active"><a class="nav-link" href="#header">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#services">services</a></li>
            <li class="nav-item "><a class="nav-link" href="#pricing">About</a></li>
            <li class="nav-item "><a class="nav-link" href="#contact">contact</a></li> -->
            <div class="imgCon">
              <img class="imgProgile" src="images/a.jpg" width="150" height="65" alt="">
            </div>
          </ul>
        </div>
      </div>
    </nav>

    <!-- sidebar-wrapper  -->
    <main class="page-content">
      <div class="container-fluid">

        <div class="row" id="set1">
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" id="numberemployee"></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="salary_count"></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1" id="count_sub"></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="price_sub"></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1" id="count_rep"></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="price_rep"></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <!--<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>-->
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- Content Row -->

        <div class="row" id="set2">

          <!-- Area Chart -->
          <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Gym Statistics</h6>
                <!-- <button onclick="clearchart()"> clear </button> -->
                <!-- <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div> -->
                <div class="input-group input-group-sm col-4 m-0 p-2 test">
                  <div class="input-group-addon p-1 test"> Date </div>
                  <input class="form-control" type="date" value="2024-01-01" id="datasta">
                </div>
                <div class="select">
                  <select name="slct" id="slct">
                    <option selected disabled>Choose an option</option>
                    <option value="1">All</option>
                    <option value="2">repairs</option>
                    <option value="3">randompayments</option>
                    <option value="4">income</option>
                  </select>
                </div>

              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-area" id="areaChart">
                  <canvas id="myAreaChart" style="height: 249px;"></canvas>
                </div>
              </div>
            </div>
          </div>

          <!-- Pie Chart -->
          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>

              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                  <canvas id="myPieChart" style="width: 288px; display: block; height: 224px;"></canvas>
                </div>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Sub Player
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> All Plyers
                  </span>

                </div>
              </div>
            </div>
          </div>

        </div>



        <div class="row hidden" id="dataemp">
          <!-- <div class="btn-group btn-toggle" id="sta-group">
    <button class="btn btn-primary active">Active</button>
    <button class="btn btn-default">NoActive</button> -->
          <!-- </div> -->

          <div class="col-xl-8 col-lg-7">
            <h2>The Employees Info : </h2>
             <hr>
            <div>
              <table id="example" class="table table-striped table-bordered hover" style="width:100%">
                <thead>
                  <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Type</th>
                    <th>Shift</th>
                    <th>Phone Number</th>
                    <th>Salary</th>
                    <th>State</th>
                    <th>Vacation</th>
                  </tr>
                </thead>
                <tbody id="empdata">
                </tbody>
              </table>
            </div>
          </div>

          <div class="col-xl-4 col-lg-5">

            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Employee State</h6>
                <button onclick="fun14()"><i class="icon-remove"></i></button>
              </div>
              <!-- Card Body -->
              <div class="card-body" id="empstate">
                <div class="chart-pie pt-4 pb-2" id="chartp">
                  <canvas id="pie-chart" style="width: 288px; display: block; height: 224px;"></canvas>
                </div>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Active
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Non Active
                  </span>

                </div>
              </div>
            </div>

            <div class="card border-left-primary shadow h-100 py-2" id="empstate1">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" id="numberemployee1"></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="salary_count1"></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container contact-form hidden" id="con">
          <div class="row">
            <div class="col">
              <h1>Add New Employee</h1>
            </div>
            <div class="col">
              <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
              </div>
            </div>
          </div>
          <hr>
          <form id="upload_form" class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>User Name</label>
                <input required id="user_name" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input required id="password" type="password" class="form-control">
              </div>
              <div class="form-group">
                <label>First Name</label>
                <input required id="first_name" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Last Name</label>
                <input required id="last_name" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Father Name</label>
                <input required id="father_name" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Birthday</label>
                <!-- <input id="birthday" type="text" class="form-control"> -->
                <input required class="form-control" type="date" value="1993-10-10" id="birthday">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input required id="email" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Phone Number</label>
                <input required id="phone_number" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>National ID</label>
                <input required id="national_id" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>state</label>
                <!-- <input id="state" type="text" class="form-control"> -->
                <div class="form-control">
                  <select required name="slct" style="width: 100%;" id="state">
                    <option selected disabled>Choose an option</option>
                    <option value="1">Active</option>
                    <option value="2">No Active</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Open Time</label>
                <input required id="open_time" type="time" class="form-control">
              </div>
              <div class="form-group">
                <label>Close Time</label>
                <input required id="close_time" type="time" class="form-control">
              </div>
              <div class="form-group">
                <label>Shift</label>
                <input required id="shift" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Type Employee</label>
                <!-- <input id="TypeEmp" type="text" class="form-control"> -->
                <div class="form-control">
                  <select required name="slct" style="width: 100%;" id="TypeEmp">
                    <option selected disabled>Choose an option</option>
                    <option value="1">Coach</option>
                    <option value="2">Reception</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Salary</label>
                <input required id="salary" type="text" class="form-control">
              </div>

              <div class="form-group">
                <button type="submit" id="addemployee" class="btn btn-primary btn-block">Add Employee</button>
              </div>
            </div>
          </form>
        </div>


        <div id="dataVacationType" class="hidden">
          <table id="tablevac1" class="table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>description</th>
                <th>period</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="vacationdata">
            </tbody>
          </table>
        </div>

        <div class="container contact-form hidden" id="addVacationT">
          <div class="row">
            <div class="col">
              <button class="btn btn-primary " id="addV" onclick="fun4()">Add New Vacation</button>
            </div>
            <div class="col">
              <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
              </div>
            </div>
          </div>
          <hr>
          <form id="form-vacation" class="row hidden">
            <div class="col-md-6">
              <div class="form-group">
                <label>description</label>
                <input id="description" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>period</label>
                <input id="period" type="text" class="form-control">
              </div>
              <div class="form-group">
                <button type="button" id="addVacationtype" class="btn btn-primary btn-block">Add Vacation Type</button>
              </div>
            </div>
            <div class="col-md-6">

            </div>
          </form>
        </div>
        <div id="EmpVacation" class="hidden">
          <table id="dataempvacation" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>description</th>
                <th>start Date</th>
                <th>period</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="vacationempdata">
            </tbody>
          </table>
        </div>
        <div class="container contact-form hidden" id="addVacationP">
          <div class="row">
            <div class="col">
              <button class="btn btn-primary " id="addV" onclick="fun5()">Add New Vacation</button>
            </div>
            <div class="col">
              <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
              </div>
            </div>
          </div>
          <hr>
          <form id="form-vacationemp" class="row hidden">
            <div class="col-md-6">
              <div class="form-group">
                <label>Id Vacationt Type</label>
                <input id="id_vacationt_type" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Start Date</label>
                <input id="start_date" type="text" class="form-control">
              </div>
              <div class="form-group">
                <button type="button" id="addVacationemp" class="btn btn-primary btn-block">Add Employee</button>
              </div>
            </div>
            <div class="col-md-6">

            </div>
          </form>
        </div>
        <div id="dataSubscriptionType" class="hidden">
          <table id="Subscriptiontable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Duration</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="SubscriptionTypedata">
            </tbody>
          </table>
        </div>

        <div class="container contact-form hidden" id="addSubscriptionType">
          <div class="row">
            <div class="col">
              <button class="btn btn-primary " id="addV" onclick="fun8()">Add New Subscription Type</button>
            </div>
            <div class="col">
              <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
              </div>
            </div>
          </div>
          <hr>
          <form id="form-SubscriptionType" class="row hidden">
            <div class="col-md-6">
              <div class="form-group">
                <label>Description</label>
                <input id="DescriptionS" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Duration</label>
                <input id="DurationS" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Price</label>
                <input id="PriceS" type="text" class="form-control">
              </div>
              <div class="form-group">
                <button type="button" id="addSubscriptionTypeS" class="btn btn-primary btn-block">Save Subscription</button>
              </div>
            </div>
            <div class="col-md-6">

            </div>
          </form>
        </div>

        <div id="dataSpecificSubscriptionType" class="hidden">
          <table id="SpecificSubscriptiontable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="SpecificSubscriptionTypedata">
            </tbody>
          </table>
        </div>
        <div class="container contact-form hidden" id="addSubscriptionTypeSS">
          <div class="row">
            <div class="col">
              <button class="btn btn-primary " id="addV" onclick="fun9()">Add New Specific Subscription Type</button>
            </div>
            <div class="col">
              <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
              </div>
            </div>
          </div>
          <hr>
          <form id="form-SubscriptionTypeSS" class="row hidden">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input id="Namess" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Duration</label>
                <input id="DurationSS" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Price</label>
                <input id="PriceSS" type="text" class="form-control">
              </div>
              <div class="form-group">
                <button type="button" id="addSubscriptionSS" class="btn btn-primary btn-block">Save Subscription</button>
              </div>
            </div>
            <div class="col-md-6">

            </div>
          </form>
        </div>

        <div id="datamachines" class="hidden">
          <table id="machinestable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Data</th>
                <th>Action</th>
                <th>Repair</th>
              </tr>
            </thead>
            <tbody id="machinesdata">
            </tbody>
          </table>
        </div>
        <div id="repair" class="hidden">
          <table id="machinesreptable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Data</th>
                <th>Cost</th>
                <th>Company</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="machinesrepdata">
            </tbody>
          </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img class="model-img-top" src="images/logo.png" alt="" />
                <form class="form-signin">
                  <input id="costmachineRepair" type="text" class="form-control mb-2 name" placeholder="Cost " required
                    autofocus>
                  <input id="companymachineRepair" type="text" class="form-control mb-2 name" placeholder="Company"
                    required>
                  <input id="datemachineRepair" type="Date" class="form-control mb-2 name" placeholder="Date" required>
                  <div class="row text-center">
                    <button type="button" id="AddmachinesRapeair"
                      class="col-sm-6 md-3 btn btn-lg btn-primary btn-block">Add</button>
                    <button type="button" class=" col-sm-6 md-3 btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  <!-- <a href="#" class="float-right">Need help?</a> -->
                </form>
                <!-- <a href="#" class="card-link">Read More</a> -->
              </div>
            </div>
          </div>
        </div>

        <div class="container contact-form hidden" id="addmachinesrepdata">
          <div class="row">
            <div class="col">
              <button class="btn btn-primary " id="addMR" data-toggle="modal" data-target="#exampleModal">Add New
                Repair</button>
            </div>
            <div class="col">
              <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
              </div>
            </div>
          </div>
</div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModaladdnewmachine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel">Add New Machine</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form-signin">
                    <input id="namemachine" type="text" class="form-control mb-2 name" placeholder="Name " required
                      autofocus>
                    <input id="pricemachine" type="text" class="form-control mb-2 name" placeholder="Price" required>
                    <input id="datemachine" class="form-control mb-2 name" type="date" placeholder="Date" required>
                    <div class="row text-center">
                      <button type="button" id="Addmachines"
                        class="col-sm-6 md-3 btn btn-lg btn-primary btn-block">Add</button>
                      <button type="button" class=" col-sm-6 md-3 btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    <!-- <a href="#" class="float-right">Need help?</a> -->
                  </form>
                  <!-- <a href="#" class="card-link">Read More</a> -->
                </div>
              </div>
            </div>
          </div>
          <div class="container contact-form hidden" id="addmachinesdata">
            <div class="row">
              <div class="col">
                <button class="btn btn-primary " id="addV" data-toggle="modal" data-target="#exampleModaladdnewmachine">Add New
                  machines</button>
              </div>
              <div class="col">
                <div class="alert alert-danger print-error-msg" style="display:none">
                  <ul></ul>
                </div>
              </div>
            </div>
          </div>
          <div id="Questions" class="hidden">
            <table id="Questionstable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>description</th>
                  <th>State</th>
                </tr>
              </thead>
              <tbody id="Questionsdata">
              </tbody>
            </table>
          </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Add New Question</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-signin">
                  <input id="Qdes" type="text" class="form-control mb-2 name" placeholder="Descreption" required
                    autofocus>
                   <select class="form-control mb-2 " id="Qstate">
                     <option>Active</option>
                     <option>Not Active</option>
                   </select>
                  <div class="row text-center">
                    <button type="button" id="AddQuastion"
                      class="col-sm-6 md-3 btn btn-lg btn-primary btn-block">Add</button>
                    <button type="button" class=" col-sm-6 md-3 btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  <!-- <a href="#" class="float-right">Need help?</a> -->
                </form>
                <!-- <a href="#" class="card-link">Read More</a> -->
              </div>
            </div>
          </div>
        </div>

        <div class="container contact-form hidden" id="addquastiondata">
          <div class="row">
            <div class="col">
              <button class="btn btn-primary " id="addQuas" data-toggle="modal" data-target="#exampleModa2">Add New
                Quastion</button>
            </div>
            <div class="col">
              <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
              </div>
            </div>
          </div>
</div>
<div class="container " id ="dis">

</div>
<hr>
<div id="Options" class="hidden">
            <table id="optionstable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>description</th>
                  <th>Value</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody id="optiondata">
              </tbody>
            </table>
          </div>

   <!-- Modal add options-->
   <div class="modal fade" id="addoptionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Add New Option</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img class="model-img-top" src="images/logo.png" alt="" />
                <form class="form-signin">
                  <input id="Opdes" type="text" class="form-control mb-2 name" placeholder="Descreption" required
                    autofocus>
                  <input id="Opval" type="number" class="form-control mb-2 name" placeholder="Value" required
                    autofocus>
                  <div class="row text-center">
                    <button type="button" id="addoptionsavebtn"
                      class="col-sm-6 md-3 btn btn-lg btn-primary btn-block">Add</button>
                    <button type="button" class=" col-sm-6 md-3 btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  <!-- <a href="#" class="float-right">Need help?</a> -->
                </form>
                <!-- <a href="#" class="card-link">Read More</a> -->
              </div>
            </div>
          </div>
        </div>

        <div class="container contact-form hidden" id="addoptiondata">
          <div class="row">
            <div class="col">
              <button class="btn btn-primary " id="addQuas" data-toggle="modal" data-target="#addoptionmodal">Add New
                Option</button>
            </div>
            <div class="col">
              <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
              </div>
            </div>
          </div>
</div>

        </div>
    </main>


    <!-- page-content" -->
  </div>
  <!-- page-wrapper -->


  <!--library-->
  <script src="js/jquery-3.3.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="css/Admin/main.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="js/DataTable.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <!--script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>
  <script src="js/swl.js"></script>
  <script src="js/mangerIbrahim.js"> </script>

</body>

</html>
