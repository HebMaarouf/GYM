<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .image {
            opacity: 0.75;
            filter: alpha(opacity=50);
            /* For IE8 and earlier */

        }
    </style>

    <meta charset="UTF-8">
    <script src="js/publicVar.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- jquery and bootstrap js-->
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- side bar work area -->
    <link rel="stylesheet" href="css/navbarside.css">
    <script src="js/sidebar.js"> </script>
    <!--Player work-->
    <script src="js/zaid.js"></script>
    <title>Document</title>
</head>

<body>
    <!--navbar-->

    <nav id="myNavbar" class="navbar navbar-expand navbar-light" style="height:60px">
        <a class="navbar-brand inherit" href="#">
            <span class="inherit"><img src="images/logo.png" class="inherit"></span>
            <!--<img  src="images/logo.png" width="150" height="70" alt="">-->
        </a>
        <div class="navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right">
                <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#mymodal"><i
                            class="fas fa-bell"></i>
                    </a></li>
            </ul>
        </div>
    </nav>

    <!-- end nav-->

    <!--    Questions modal    -->
    <div id="questions_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Questions</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="col-md-4">
                    <label for="Question"></label>
                </div>
                <div class="col-md-4">
                    <select name="options">
                        <option value="1" selected></option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
              <button id="questions_savebtn" type="button" class="btn btn-primary">Save</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


    <!-- display exited image -->

    <!--- slider ---->



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
                        <span class="user-name">reham</span>
                        <span class="user-role">player</span>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Players</span>
                        </li>
                        <li>
                            <a id="get-profile-info" href="#">
                                <i class="fas fa-user"></i>
                                <span>Profile Information</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#add_player_modal" href="#" id="get_sport_programs">
                                <i class="fas fa-dumbbell"></i>
                                <span>Get My Sport Programs</span>
                            </a>
                        </li>
                        <li>
                            <a id="get_food_programs" data-toggle="modal" data-target="#add_player_subscription_modal"
                                href="#">
                                <i class="fas fa-seedling"></i>
                                <span>Get My Food Programs</span>
                            </a>
                        </li>
                        <li>
                            <a id="button_reqest_Food_program" data-toggle="modal"
                                data-target="#modal_reqest_Food_program" href="#">
                                <i class="fas fa-check"></i>
                                <span>Request Food Program</span>
                            </a>
                        </li>
                        <li>
                            <a id="button_reqest_Sport_program" data-toggle="modal"
                                data-target="#modal_reqest_Sport_program" href="#">
                                <i class="fas fa-check"></i>
                                <span>Request Sport Program</span>
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



        <!-- sidebar-wrapper  -->
        <main class="page-content">

            <!--- start body ---->
            <div class="container">

                <div id="getprograms">

                    <ul class="col-12 list-group list-group-flush" id="programs">

                    </ul>

                </div>




                <!-- display table of muscil in every day -->

                <div id="Muscle" style="width:100%; overflow: auto;">
                    <table class="table table-bordered text-center" style="margin-bottom:50px; border:hidden; ">
                        <thead>
                            <tr>
                                <th scope="col" style="width:10%">saturday</th>
                                <th scope="col" style="width:10%">sunday</th>
                                <th scope="col" style="width:10%">monday</th>
                                <th scope="col" style="width:10%">tuesday</th>
                                <th scope="col" style="width:10%">wednesday</th>
                                <th scope="col" style="width:10%">thursday</th>
                                <th scope="col" style="width:10%">friday</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td id="1"></td>
                                <td id="2"></td>
                                <td id="3"></td>
                                <td id="4"></td>
                                <td id="5"></td>
                                <td id="6"></td>
                                <td id="7"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>






                <!-- display list of muscle-->

                <div hidden style="height:150px; width:100%; " id="MyMuscle" class="row">
                    <nav>
                        <div class="nav nav-tabs" role="tablist">
                            <a class="nav-item nav-link active btn-lg" id="Chest" style="color:black" data-toggle="tab"
                                href="#zaid" role="tab" aria-controls="zaid" aria-selected="true">Chest</a>
                            <a class="nav-item nav-link btn-lg" id="Back" style="color:black" data-toggle="tab"
                                href="#zaid" role="tab" aria-controls="zaid" aria-selected="false">Back</a>
                            <a class="nav-item nav-link btn-lg" id="Biceps" style="color:black" data-toggle="tab"
                                href="#zaid" role="tab" aria-controls="zaid" aria-selected="false">Biceps</a>
                            <a class="nav-item nav-link btn-lg" id="Triceps" style="color:black" data-toggle="tab"
                                href="#zaid" role="tab" aria-controls="zaid" aria-selected="true">Triceps</a>
                            <a class="nav-item nav-link btn-lg" id="Shoulders" style="color:black" data-toggle="tab"
                                href="#zaid" role="tab" aria-controls="zaid" aria-selected="false">Shoulders</a>
                            <a class="nav-item nav-link btn-lg" id="Legs" style="color:black" data-toggle="tab"
                                href="#zaid" role="tab" aria-controls="zaid" aria-selected="false">Legs</a>
                        </div>
                    </nav>

                </div>





                <!-- display list of week days-->

                <div hidden style="height:150px; width:100%;  " id="MyDays" class="row">
                    <nav>
                        <div class="nav nav-tabs" role="tablist">
                            <a class="nav-item nav-link active btn-lg" id="saturday" style="color:black"
                                data-toggle="tab" href="#zaid" role="tab" aria-controls="zaid"
                                aria-selected="true">saturday</a>
                            <a class="nav-item nav-link btn-lg" id="sunday" style="color:black" data-toggle="tab"
                                href="#zaid" role="tab" aria-controls="zaid" aria-selected="false">sunday</a>
                            <a class="nav-item nav-link btn-lg" id="monday" style="color:black" data-toggle="tab"
                                href="#zaid" role="tab" aria-controls="zaid" aria-selected="false">monday</a>
                            <a class="nav-item nav-link btn-lg" id="tuesday" style="color:black" data-toggle="tab"
                                href="#zaid" role="tab" aria-controls="zaid" aria-selected="true">tuesday</a>
                            <a class="nav-item nav-link btn-lg" id="wednesday" style="color:black" data-toggle="tab"
                                href="#zaid" role="tab" aria-controls="zaid" aria-selected="false">wednesday</a>
                            <a class="nav-item nav-link btn-lg" id="thursday" style="color:black" data-toggle="tab"
                                href="#zaid" role="tab" aria-controls="zaid" aria-selected="false">thursday</a>
                            <a class="nav-item nav-link btn-lg" id="friday" style="color:black" data-toggle="tab"
                                href="#zaid" role="tab" aria-controls="zaid" aria-selected="false">friday</a>
                        </div>
                    </nav>
                </div>






                <!-- temp div use for put html code from js   (use for "player information,  specific palyer sport program , specific player food program"-->

                <div id="zaid" class="tab-pane show active row" role="tabpanel" aria-labelledby="nav-home-tab">


                </div>









                <!-- modal request sport program-->

                <div class="modal fade" id="modal_reqest_Sport_program" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Reqest Sport Program</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="IdCoach">Coach Name</label>
                                        <select id="IdCoach" class="custom-select">

                                        </select>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="SportProgramGoal">The Goal Of Your Program</label>
                                        <select id="SportProgramGoal" class="custom-select">
                                            <option value="huge">huge</option>
                                            <option value="shred">shred</option>
                                        </select>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="PlayerWeight">Your Weight </label>
                                        <input type="number" id="PlayerWeight" class="form-control">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="PlayerHeight">Your Heightt </label>
                                        <input type="number" id="PlayerHeight" class="form-control">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="PlayerAge">Your Age</label>
                                        <input type="number" id="PlayerAge" class="form-control" />
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="PlayerSideImage">Chose Your Side Image</label>
                                        <input type="file" id="PlayerSideImage" class="form-control" />
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="PlayerBackImage">Chose Your Back Image</label>
                                        <input type="file" id="PlayerBackImage" class="form-control" />
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="PlayerFrontImage">Chose Your Front Image</label>
                                        <input type="file" id="PlayerFrontImage" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="reqest_Sport_program" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- modal request food program-->

                <div class="modal fade" id="modal_reqest_Food_program" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Reqest Food Program</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="IdCoachF">Coach Name</label>
                                        <select id="IdCoachF" class="custom-select">
                                        </select>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="FoodProgramGoal">The Goal Of Your Program</label>
                                        <select id="FoodProgramGoal" class="custom-select">
                                            <option value="decrease Weight"> decrease Weight</option>
                                            <option value="increase weight">increase weight</option>
                                        </select>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="PlayerWeightF">Your Weight </label>
                                        <input type="number" id="PlayerWeightF" class="form-control">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="PlayerHeightF">Your Heightt </label>
                                        <input type="number" id="PlayerHeightF" class="form-control">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="PlayerAgeF">Your Age</label>
                                        <input type="number" id="PlayerAgeF" class="form-control" />
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="sugar">Your Sugar ِnalysis</label>
                                        <select id="sugar" class="custom-select">
                                            <option value="0"> Normal</option>
                                            <option value="1">high</option>
                                            <option value="-1"> Low</option>
                                        </select>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="Sex">Sex</label>
                                        <select id="Sex" class="custom-select">
                                            <option value="m">Male</option>
                                            <option value="f">Femail</option>
                                        </select>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="social_status">Your Social Status</label>
                                        <select id="social_status" class="custom-select">
                                            <option value="s">Single</option>
                                            <option value="m">married</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="reqest_food_program" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </main>

        <!-- page-content" -->
    </div>
    <!-- <!page-wrapper> -->






</body>

</html>
