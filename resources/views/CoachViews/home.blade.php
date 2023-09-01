<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="js/publicVar.js"></script>
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/animate.min.css">
     <!-- font awesome -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
     <script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js"
          integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous">
     </script>
     <link rel="stylesheet" href="css/font-awesome.css">
     <!-- jquery and bootstrap js-->
     <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <!-- side bar work area -->
     <link rel="stylesheet" href="css/navbarside.css">
     <script src="js/sidebar.js"> </script>
     <!--Coach work-->
     <script src="js/coachPage.js"></script>
     <script src="js/ikbal.js"></script>
     <title>Document</title>
     <!--Css-->
     <link rel="stylesheet" href="css/coachPage.css">


     <!--  DataTable -->
     <link rel="stylesheet" type="text/css" href="css/DataTable.min.css">
     <script src="js/DataTable.min.js"></script>






</head>

<body>

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
                                   <label for="v_description">Description</label>
                                   <input type="text" id="v_description" class="form-control">
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

     <!-- <!Add vacation request modal> -->


     <!-- <Add Meal> -->
     <div class="modal fade" id="add_meal_modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title">New Meal Info</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">

                         <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Meal Name</label>
                              <div class="col-sm-8">
                                   <input id="m_name" type="text" class="form-control">
                              </div>
                         </div>
                         <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Meal Description</label>
                              <div class="col-sm-8">
                                   <input id="m_description" type="text" class="form-control">
                              </div>
                         </div>


                    </div>
                    <div class="modal-footer">
                         <button type="button" id="add_meal_savebtn" class="btn btn-danger btn-xs">Add</button>
                    </div>
               </div>
          </div>

     </div>

     <!-- ************************  reham  **********************-->

     <!--modal for display similar program-->

     <div class="modal fade" id="similar_program" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title">Similar Programs</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">

                         <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover"  style="background:white" id="s_myMove">
                                   <thead>
                                        <tr>
                                             <th>Name</th>
                                             <th>Day</th>
                                             <th>Reputations</th>
                                        </tr>
                                   </thead>
                                   <tbody class="t_body">

                                   </tbody>
                              </table>
                         </div>
                    </div>
               </div>
          </div>
     </div>




     <!-- <!Add Meal> -->
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
                              <img class="img-responsive img-rounded" src="images/avatar2.png" alt="User picture">
                         </div>
                         <div class="user-info">
                              <span class="user-name">coach
                                   <!-- from db -->
                                   <strong>name</strong> <!-- from db -->
                              </span>
                              <span class="user-role">Coach</span>
                         </div>
                    </div>
                    <div class="sidebar-menu">
                         <ul>
                              <li class="header-menu">
                                   <span>Coach Page</span>
                              </li>
                              <li>
                                   <a href="#">
                                        <i class="fa fa-eye"></i>
                                        <span class="show_prog">Show Program Request</span>
                                   </a>
                                   <!-- <button id="show_pro">Show program request</button> -->
                              </li>
                              <li class="sidebar-dropdown">
                                   <a href="#">
                                        <i class="fa fa-table"></i>
                                        <span>Show My Program</span>
                                   </a>
                                   <div class="sidebar-submenu">
                                        <ul>
                                             <li>
                                                  <button class="btn btn-primary" id="mySportPro">Sport Program</button>
                                             </li>
                                             <li>
                                                  <button class="btn btn-primary" id="myFoodPro">Food Program</button>
                                             </li>
                                        </ul>
                                   </div>
                              </li>
                              <li>
                                   <a href="#">
                                        <i class="fa fa-book"></i>
                                        <span data-toggle="modal" data-target="#modalRelatedContent" class="addMove">Add
                                             Move</span>

                                   </a>
                              </li>
                              <li>
                                   <a data-toggle="modal" data-target="#add_vacation_request_modal" href="#">
                                        <i class="fas fa-plane"></i>
                                        <span>Request vacation</span>
                                   </a>
                              </li>
                             <li>
                                 <a data-toggle="modal" data-target="#add_meal_modal" href="#">
                                     <i class="fas fa-hamburger"></i>
                                     <span>Add Meal</span>
                                 </a>
                             </li>
                             <li style="width: 100%">
                                 <a href="#" onclick="logout()">
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
                         <img src="logo.png" width="150" height="65" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                         data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                         aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="navbar-nav ml-auto navbar-right">
                              <!--<li class="nav-item"><a class="nav-link" href="#">Login</a></li>-->
                         </ul>
                    </div>
               </div>
          </nav>


          <!-- sidebar-wrapper  -->
          <div class="mo"></div>
          <div class="formmove"></div>
          <main class="page-content">
               <div class="container-fluid"></div>
          </main>

     </div>

</body>

</html>
