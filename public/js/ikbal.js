$(document).ready(function () {
    $('.user-name').text(sessionStorage.getItem('user_name'));


    //hebal

    //<add vacation request>
    $(document).on('click', '#add_vacation_request_savebtn', function () {
        var start_date = $('#v_start_date').val();
        var description = $('#v_description').val();
        $.ajax({
            url: 'http://'+host+'/AddVacationRequest',
            method: 'post',
            data: {
                user_name: sessionStorage.getItem('user_name'),
                token: sessionStorage.getItem('token'),
                description: description,
                start_date: start_date
            },
            success: function (data) {
                console.log(data);
                //hide modal
                $('#add_vacation_request_modal').modal('hide');
                //clear data
                $('#v_start_date').val('');
                $('#v_description').val('');
            },
            error: function (error) {
                alert(error);
            }

        });
    });
    //</add vacation request>

    //<add meal>

    $('#add_meal_savebtn').click(function () {
        var name = $('#m_name').val();
        var description = $('#m_description').val();
        $.ajax({
            method: 'get',
            url: 'http://'+host+'/addNewMeal',
            data: {
                user_name: sessionStorage.getItem('user_name'),
                token: sessionStorage.getItem('token'),
                name: name,
                description: description
            }, success: function (data) {
                console.log(data);

            }, error: function (data) {
                alert("error");
            }
        });
    });

    var idLastRequest;
    var moves = [];
    $(document).on('click', '.show_prog', function () {
        moves=[];
        $('.page-content').html("");
        drawSportProRequest();
        fetchSportProReqData();
        fetchFoodProReqData();
        //draw table for sport program request
        function drawSportProRequest() {
            var html = '';
            html +=
                '<div class="container box">' +
                '<h3 class="reqTitle">Sport Program Request</h3><br/>' +
                '<div class="panel panel-default">' +
                '<div class="panel-body">' +
                '<div id="message"></div>' +
                '<div class="table-responsive">' +
                '<table class="table table-striped table-bordered table-hover" ID="mydata">' +
                '<thead>' +
                '<tr>' +
                '<th>First Name</th>' +
                '<th>Last Name</th>' +
                '<th>Date</th>' +
                '<th>Goal</th>' +
                '<th>Age</th>' +
                '<th>Weight</th>' +
                '<th>Height</th>' +
                '<th>Reply</th>' +
                '<th>More Info</th>' +
                '<th>Help</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody id="pro_tbl">' +

                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            html +=
                '<div class="container box"> ' +
                '<h3 class="reqTitle">Food Program Request</h3><br/>' +
                '<div class="panel panel-default">' +
                '<div class="panel-body">' +
                '<div id="message"></div>' +
                '<div class="table-responsive">' +
                '<table class="table table-striped table-bordered table-hover" ID="mydata">' +
                '<thead>' +
                '<tr>' +
                '<th>First Name</th>' +
                '<th>Last Name</th>' +
                '<th>Goal</th>' +
                '<th>Age</th>' +
                '<th>Weight</th>' +
                '<th>Height</th>' +
                '<th>Fat</th>' +
                '<th>Reply</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody id="pro_tb2">' +

                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('.page-content').html(html);
        }

        //fetch sport program request data
        function fetchSportProReqData() {
            $.ajax({
                method: "get",
                url: "http://"+ host+"/fetch_data",
                data: {
                    user_name:sessionStorage.getItem('user_name'),
                    token: sessionStorage.getItem('token'),
                },
                //data: {first_name,last_name},
                success: function (data) {
                    console.log(data.data);
                    console.log(data.data.length);
                    var html = '';
                    for (var count = 0; count < data.data.length; count++) {
                        html += '<tr>';
                        html += '<td  class="column_name" data-column_name="First Name" data-id="' + data.data[count].id + '">' + data.data[count].first_name + '</td>';
                        html += '<td  class="column_name" data-column_name="Last Name" data-id="' + data.data[count].id + '">' + data.data[count].last_name + '</td>';
                        html += '<td  class="column_name" data-column_name="Date" data-id="' + data.data[count].id + '">' + data.data[count].date + '</td>';
                        html += '<td  class="column_name" data-column_name="Goal" data-id="' + data.data[count].id + '">' + data.data[count].goal + '</td>';
                        html += '<td  class="column_name" data-column_name="Age" data-id="' + data.data[count].id + '">' + data.data[count].age + '</td>';
                        html += '<td  class="column_name" data-column_name="Weight" data-id="' + data.data[count].id + '">' + data.data[count].weight + '</td>';
                        html += '<td  class="column_name" data-column_name="Height" data-id="' + data.data[count].id + '">' + data.data[count].height + '</td>';
                        html += '<td><button type="button" class="btn btn-danger btn-xs Reply" id="Reply" value="' + data.data[count].id + '" >Reply</button></td>';
                        html += '<td> <button type="button" class="btn btn-primary More"  data-toggle="modal" data-target="#modalRelatedContent" value="' + data.data[count].id + '" >More info</button></td>';
                        html += '<td><button type="button" class="btn btn-success btn-xs " data-toggle=\"modal\" data-target=\"#similar_program\"  onclick=\"getSimilarProgram(\'' + data.data[count].id + '\')\" value="' + data.data[count].id + '" >Similar Program</button></td></tr>';

                    }
                    $('#pro_tbl').html(html);
                }
            });
        }

        function fetchFoodProReqData() {
            $.ajax({
                //method:"get",
                url: "http://"+ host+"/fetch_data_food",
                data: {
                    user_name: sessionStorage.getItem('user_name'),
                    token: sessionStorage.getItem('token')
                },
                //data: {first_name,last_name},
                success: function (data) {
                    console.log(data);
                    var html = '';
                    for (var count = 0; count < data.data.length; count++) {
                        html += '<tr>';
                        html += '<td  class="column_name" data-column_name="First Name" data-id="' + data.data[count].id + '">' + data.data[count].first_name + '</td>';
                        html += '<td  class="column_name" data-column_name="Last Name" data-id="' + data.data[count].id + '">' + data.data[count].last_name + '</td>';
                        html += '<td  class="column_name" data-column_name="Goal" data-id="' + data.data[count].id + '">' + data.data[count].goal + '</td>';
                        html += '<td  class="column_name" data-column_name="Age" data-id="' + data.data[count].id + '">' + data.data[count].age + '</td>';
                        html += '<td  class="column_name" data-column_name="Weight" data-id="' + data.data[count].id + '">' + data.data[count].weight + '</td>';
                        html += '<td  class="column_name" data-column_name="Height" data-id="' + data.data[count].id + '">' + data.data[count].height + '</td>';
                        html += '<td  class="column_name" data-column_name="Fat" data-id="' + data.data[count].id + '">' + data.data[count].fat + '</td>';
                        html += '<td><button type="button" class="btn btn-danger btn-xs ReplyFood" value="' + data.data[count].id + '" >Reply</button></td>';


                    }
                    $('#pro_tb2').html(html);
                }
            });
        }

    });


    /********** reply for soprt pro ****************/
    var idRequest;
    $(document).on('click', '#Reply', function () {
        $('.page-content').html("");
        // $(".page-content").attr("hidden", true);

        if ($(this).on(":click")) {
            idRequest = ($(this).val());
            //console.log("hai i am idRequest : "+idRequest);

        }
        drawMove()

        function drawMove() {
            var html = "";
            html +=
                '<div class="container box">' +
                '<h3>Moves</h3><br />' +
                '<div class="panel panel-default">' +
                '<div class="panel-heading">Moves</div>' +
                '<div class="panel-body">' +
                '<div id="message"></div>' +
                '<div class="table-responsive">' +
                '<table class="table table-striped table-bordered table-hover" ID="myMove">' +
                '<thead>' +
                '<tr>' +
                '<th>Name</th>' +
                '<th>Description</th>' +
                '<th>Target Muscles</th>' +
                '<th>Reputations</th>' +
                '<th>Days</th>' +
                '<th>choice</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody id="move_tbl">' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('.page-content').html(html);
        }
        fetch_Move_data();

        function fetch_Move_data() {
            $.ajax({
                // type="post",
                url: "http://"+ host+"/fetch_Move_data",
                dataType: "json",
                success: function (data) {
                    console.log("id request = " + idRequest);
                    var html = '';
                    for (var count = 0; count < data.length; count++) {
                        html += '<tr>';
                        html += '<td  class="column_name" data-column_name="Name" data-id="' + data[count].id + '">' + data[count].name + '</td>';
                        html += '<td  class="column_name" data-column_name="Description" data-id="' + data[count].id + '">' + data[count].description + '</td>';
                        html += '<td  class="column_name" data-column_name="Target Muscles" data-id="' + data[count].id + '">' + data[count].target_muscle + '</td>';

                        html += '<td ><input  id=repu' + data[count].id + ' type="text" class="form-control" ></td>';

                        html += '<td  class="column_name" data-column_name="Day" data-id="' + data[count].id + '">' +
                            '<select id=day' + data[count].id + ' name="Days">' +
                            '<option value ="saturday">saturday</option>' +
                            '<option value ="sunday">sunday</option>' +
                            '<option value ="monday">monday</option>' +
                            '<option value ="tuesday">tuesday</option>' +
                            '<option value ="wednesday">wednesday</option>' +
                            '<option value ="thursday">thursday</option>' +
                            '<option value ="friday">friday</option>' +
                            '</select>' + '</td>';


                        html += '<td><button type="button" class="btn btn-danger btn-xs addMoveToSportPro" value="' + data[count].id + '" >Add</button></td></tr>';

                    }
                    html += '<tr><td><button type="button" class="btn btn-danger btn-xs saveSportPro" id="saveSportPro">Done</button></td></tr>';
                    $('#move_tbl').html(html);
                }
            });
        }


        //inser_sport_Programe_data(idRequest);

        //fetch_Sport_pro();



        /*********************************************/

        var choicesMove, choiceDay, choiceRepu;

        $(document).on('click', '.addMoveToSportPro', function () {
            var day;
            var repu;
            console.log("clicking button 'Add' move");
            if ($(this).on(":click")) {

                moveID = $(this).val();
                console.log("move: " + moveID);
                var dayID = '#day' + moveID;
                var repuID = '#repu' + moveID;
                // console.log("day id: "+dayID);
                move = moveID;
                day = $(dayID).val();
                repu = $(repuID).val();
                //hebal
                $(repuID).val('');
                var temp = { 'move': '', 'day': '', 'repu': '' };

                temp.move = move;
                temp.day = day;
                temp.repu = repu;
                if (temp.repu != "") { //for not adding empty record
                    moves.push(temp);
                    console.log(temp);
                    console.log(moves);
                }
            }

            //insert_programe_move();

            function insert_programe_move() {

                $.ajax({
                    type: 'GET',
                    data: {
                        choicesMove: move,
                        choiceDay: day,
                        choiceRepu: repu,
                        idInsert_programe_move: idLastRequest
                    },

                    url: "http://"+ host+"/insert_programe_move",
                    dataType: "json",
                    success: function (data) {
                        console.log("success insert_programe_move " + data);
                    },
                    error: function (data) {
                        console.log("error form insert_programe_move");
                    }

                });
            }





        });


    });

    //fetch sport program to get id of the last inserted program
    function fetch_Sport_pro() {
        $.ajax({
            // data: {choicesMovec: jsonString},
            url: "http://"+ host+"/fetch_Sport_pro",
            dataType: "json",
            success: function (data) {
                for (var count = 0; count < 1; count++) {
                    idLastRequest = data[0].id;
                    console.log("success fetch_Sport_pro " + idLastRequest);

                }
            },
            async:false
        });
    }

    //insert move hebal version
    function insert_programe_move_B(move, day, repu, idLastRequest) {

        $.ajax({
            type: 'GET',
            data: {
                choicesMove: move,
                choiceDay: day,
                choiceRepu: repu,
                idInsert_programe_move: idLastRequest
            },
            url: "http://"+ host+"/insert_programe_move",
            dataType: "json",
            success: function (data) {
                console.log("success insert_programe_move " + data);
            },
            error: function (data) {
                console.log("error form insert_programe_move");
            }

        });
    }

    $(document).on('click', '#saveSportPro', function () {
        //1- insert programme
           inser_sport_Programe_data(idRequest);
        //2- fetch sport pro
            fetch_Sport_pro();
        //3- add moves to database
        console.log(moves);
        moves.forEach(move => {
            insert_programe_move_B( move['move'] , move['day'] , move['repu'] , idLastRequest );
        });

        $('.page-content').html("");
        //console.log("move : " + choicesMove + "day : " + choiceDay + " repu : " + choiceRepu);

        draw_programe_sport();

        function draw_programe_sport() {

            //console.log("id last request : " + idLastRequest);
            var html = "";
            html +=
                '<div class="container box">' +
                '<h3>Programe Sport </h3><br />' +
                '<div class="panel panel-default">' +
                '<div class="panel-heading">Programe Sport</div>' +
                '<div class="panel-body">' +
                '<div id="message"></div>' +
                '<div class="table-responsive">' +
                '<table class="table table-striped table-bordered table-hover" ID="myMove">' +
                '<thead>' +
                '<tr>' +
                '<th>Name</th>' +
                '<th>Day</th>' +
                '<th>Reputations</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody id="Movepro_tbl">' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('.page-content').html(html);

            $.ajax({
                // type:"GET",
                data: {

                    idLastRequest: idLastRequest
                },

                url: "http://"+ host+"/draw_programe_sport",
                dataType: "json",
                success: function (data) {
                    console.log("success draw_programe_sport" + data);
                    // console.log(idRequest);
                    var html = '';
                    for (var count = 0; count < data.length; count++) {
                        html += '<tr>';
                        html += '<td  class="column_name" data-column_name="Name" data-id="' + data[count].id + '">' + data[count].name + '</td>';
                        html += '<td  class="column_name" data-column_name="day" data-id="' + data[count].id + '">' + data[count].day + '</td>';
                        html += '<td  class="column_name" data-column_name="reputations" data-id="' + data[count].id + '">' + data[count].reputations + '</td>';

                    }
                    //html += '<tr><td><button type="button" class="btn btn-danger btn-xs showmealPro" id="showmealPro">done</button></td></tr>';
                    $('#Movepro_tbl').html(html);
                },
                error: function (data) {
                    console.log("error form draw_programe_sport");
                }
            });
        }



    });


    /********************** reply for food pro ***********************/
    var idRequest;
    var meals=[];
    $(document).on('click', '.ReplyFood', function () {
        meals=[];
        $(".page-content").html("");
        if ($(this).on(":click")) {
            idRequest = ($(this).val());
            console.log("id food request is: " + idRequest);
        }
        drawMeals();

        function drawMeals() {
            var html = "";
            html += '<div class="container box">' +
                '<h3>Meals</h3><br />' +
                '<div class="panel panel-default">' +
                '<div class="panel-heading">Meals</div>' +
                '<div class="panel-body">' +
                '<div id="message"></div>' +
                '<div class="table-responsive">' +
                '<table class="table table-striped table-bordered table-hover" ID="myMeal">' +
                '<thead>' +
                '<tr>' +
                '<th>Name</th>' +
                '<th>Description</th>' +
                '<th>Number Meal</th>' +
                '<th>Day</th>' +
                '<th>choice</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody id="food_tbl">' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('.page-content').html(html);
        }
        fetch_Food_data();

        function fetch_Food_data() {
            $.ajax({
                // type="post",
                url: "http://"+ host+"/fetch_Food_data",
                dataType: "json",
                success: function (data) {
                    console.log(idRequest);
                    var html = '';
                    for (var count = 0; count < data.length; count++) {
                        html += '<tr>';
                        html += '<td  class="column_name" data-column_name="Name" data-id="' + data[count].id + '">' + data[count].name + '</td>';
                        html += '<td  class="column_name" data-column_name="Description" data-id="' + data[count].id + '">' + data[count].description + '</td>';
                        // html += '<td><input type="checkbox" class="get_value" value="' + data[count].id + '" ></td></tr>'
                        html += '<td ><input  id=num' + data[count].id + ' type="text" class="form-control" ></td>';

                        html += '<td  class="column_name" data-column_name="Day" data-id="' + data[count].id + '">' +
                            '<select id=day' + data[count].id + ' name="Days">' +
                            '<option value ="saturday">saturday</option>' +
                            '<option value ="sunday">sunday</option>' +
                            '<option value ="monday">monday</option>' +
                            '<option value ="tuesday">tuesday</option>' +
                            '<option value ="wednesday">wednesday</option>' +
                            '<option value ="thursday">thursday</option>' +
                            '<option value ="friday">friday</option>' +
                            '</select>' + '</td>';
                        html += '<td><button type="button" class="btn btn-danger btn-xs addMealToFoodPro" value="' + data[count].id + '" >Add</button></td></tr>';
                    }
                    html += '<tr><td><button type="button" class="btn btn-danger btn-xs saveFoodPro" id="saveFoodPro">done</button></td></tr>';
                    $('#food_tbl').html(html);
                }
            });
        }

        //inser_food_Programe_data();


        //fetch_Food_pro();

        var _token = $('input[name="_token"]').val();


    });
    function inser_food_Programe_data() {
        console.log(idRequest);
        $.ajax({
            //type="POST",
            data: {
                idFoodProReq: idRequest
            },
            url: "http://"+ host+"/add_food_Program_data",
            dataType: "json",
            success: function (data) {
                console.log("success inser_food_Programe_data " + data);

            }
        });
    }
    function fetch_Food_pro() {
        $.ajax({
            // data: {choicesMovec: jsonString},
            url: "http://"+ host+"/fetch_food_pro",
            dataType: "json",

            success: function (data) {
                for (var count = 0; count < 1; count++) {
                    idLastRequest = data[0].id;
                    console.log("success fetch_Food_pro " + data[count].id);
                }
            },
            async:false
        });
    }

    // var choicesMeal = [];
    // $(document).on('click', '.addMealToFoodPro', function() {

    //     if ($(this).on(":click")) {
    //         choicesMeal.push($(this).val());
    //     }
    // });

    $(document).on('click', '.addMealToFoodPro', function () {


        var day;
        var num;
        console.log("clicking button");
        if ($(this).on(":click")) {

            mealID = $(this).val();
            console.log("meal: " + mealID);
            var dayID = '#day' + mealID;
            var numID = '#num' + mealID;
            // console.log("day id: "+dayID);
            meal = mealID;
            day = $(dayID).val();
            num = $(numID).val();
            $(numID).val('');
            var temp={'meal':'','day':'','num':''};
            temp['meal']=meal;
            temp['day']=day;
            temp['num']=num;
            meals.push(temp);

        }
        //insert_programe_food(meal,day,num,idLastRequest);



    });

    function insert_programe_food(meal,day,num,idLastRequest) {

        $.ajax({
            type: 'get',
            data: {
                choicesMeal: meal,
                choiceDayFood: day,
                choiceNumFood: num,
                idLastRequest: idLastRequest
            },

            url: "http://"+ host+"/insert_programe_food",

            success: function (data) {
                console.log("success insert_programe_food " + data);
            },
            error: function (data) {
                console.log("eror");
            }

        });
    }
    //<hebal>
    function insert_programe_food_B(meal,day,num,idLastRequest) {

        $.ajax({
            type: 'get',
            data: {
                choicesMeal: meal,
                choiceDayFood: day,
                choiceNumFood: num,
                idLastRequest: idLastRequest
            },

            url: "http://"+ host+"/insert_programe_food",

            success: function (data) {
                console.log("success insert_programe_food " + data);
            },
            error: function (data) {
                console.log("eror");
            }

        });
    }

    $(document).on('click', '#saveFoodPro', function () {

        //1- insert programme
            inser_food_Programe_data();
        //2- fetch sport pro
            fetch_Food_pro();
        //3- add moves to database
            meals.forEach(meal => {
                console.log(meal);
                insert_programe_food_B( meal['meal'] , meal['day'] , meal['num'] , idLastRequest );
            });

        $('.page-content').html("");

        //draw the program
        draw_programe_meal();
        /////////////////DRAW PROGRAME MOVE
        function draw_programe_meal() {
            console.log("id last request : " + idLastRequest);
            var html = "";
            html +=
                '<div class="container box">' +
                '<h3>Programe Meals </h3><br />' +
                '<div class="panel panel-default">' +
                '<div class="panel-heading">Programe Meals</div>' +
                '<div class="panel-body">' +
                '<div id="message"></div>' +
                '<div class="table-responsive">' +
                '<table class="table table-striped table-bordered table-hover" ID="myMeal">' +
                '<thead>' +
                '<tr>' +
                '<th>Name</th>' +
                '<th>Day</th>' +
                '<th>Number</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody id="mealpro_tbl">' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('.page-content').html(html);

            $.ajax({
                // type:"GET",
                data: {

                    idLastRequest: idLastRequest
                },

                url: "http://"+ host+"/draw_programe_meal",
                dataType: "json",

                success: function (data) {
                    console.log("success draw_programe_meal" + data);

                    // console.log(idRequest);
                    var html = '';
                    for (var count = 0; count < data.length; count++) {
                        html += '<tr>';
                        html += '<td  class="column_name" data-column_name="Name" data-id="' + data[count].id + '">' + data[count].name + '</td>';
                        html += '<td  class="column_name" data-column_name="day" data-id="' + data[count].id + '">' + data[count].day + '</td>';
                        html += '<td  class="column_name" data-column_name="reputations" data-id="' + data[count].id + '">' + data[count].number_meal + '</td>';

                    }
                    //html += '<tr><td><button type="button" class="btn btn-danger btn-xs showmealPro" id="showmealPro">done</button></td></tr>';
                    $('#mealpro_tbl').html(html);
                }
            });
        }

    });


    $(document).on('click', '.More', function () {
        //$(".page-content").html("");
        if ($(this).on(":click")) {
            idRequest = ($(this).val());
            console.log("hai i am idRequest : " + idRequest);

        }
        draw();

        function draw() {
            $.ajax({
                // type:"GET",
                data: {
                    idRequest: idRequest
                },
                url: "http://"+ host+"/show_image",
                dataType: "json",


                success: function (data) {

                    var html = "";
                    // var imgLinkStr="images/img11.jpg";
                    for (var count = 0; count < data.length; count++) {
                        html +=
                            '<div class="modal fade" id="get_player_info_modal" tabindex="-1" role="dialog" aria-hidden="true">' +
                            '<div class="modal-dialog" role="document">' +
                            ' <div class="modal-content">' +
                            '<div class="modal-header">' +
                            '<h5 id="pi_title"class="modal-title">Player Photos</h5>' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            '</button>' +
                            '</div>' +
                            '<div class="modal-body" >' +
                            '<div class="row-1">' +
                            '<div class="col-12 form-group">' +
                            '<img class="card-img-top" src="images/' + data[count].side_image + '" alt="Card image cap">' +
                            '</div>' +
                            '<div class="row-2">' +
                            '<div class="col-12 form-group">' +
                            '<img class="card-img-top" src="images/' + data[count].front_image + '" alt="Card image cap">' +
                            '</div>' +
                            '<div class="row-3">' +
                            '<div class="col-12 form-group">' +
                            '<img class="card-img-top" src="images/' + data[count].back_image + '" alt="Card image cap">' +
                            '</div>' +

                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        $('.mo').html(html);
                        $('#get_player_info_modal').modal('show');
                    }
                }
            });
        }

    });
    //add move
    $(document).on('click', '.addMove', function () {

        $(".page-content").html("");
        drawInserMove();

        function drawInserMove() {
            var html = '';
            html +=

                '<div id="myModal" class="modal fade" role="dialog">' +
                '<div class="modal-dialog">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<h5 class="modal-title">New Move Info</h5>' +
                '<button type="button" class="close" data-dismiss="modal">&times;</button>' +

                '</div>' +
                '<div class="modal-body">' +


                '<div>' +
                '<form>' +
                '<div class="form-group row">' +
                '<label class="col-sm-4 col-form-label" >Name Move </label>' +
                '<div class="col-sm-8">' +
                '<input  id="name" type="text"class="form-control" >' +
                '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                '<label class="col-sm-4 col-form-label" >Description</label>' +
                '<div class="col-sm-8">' +
                '<input id="description" type="text" class="form-control">' +
                '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                '<label class="col-sm-4 col-form-label form-group" >Target Muscle</label>' +
                '<div class="col-sm-8">' +
                '<select id="target_muscle" class="custom-select">' +
                '<option value="Chest">Chest</option>' +
                '<option value="Back">Back</option>' +
                '<option value="Biceps">Biceps</option>' +
                '<option value="Triceps">Triceps</option>' +
                '<option value="Shoulders">Shoulders</option>' +
                '<option value="Legs">Legs</option>' +
                '</select>' +
                '</div>' +
                '</div>' +

                '<div class="form-group row">' +
                '<label class="col-sm-4 col-form-label" >Choice Image 1 </label>' +
                '<div class="col-sm-8">' +
                '<input type="file" name="image" id="link_image1"/><br/>' +
                '</div>' +
                '</div>' +

                '<div class="form-group row">' +
                '<label class="col-sm-4 col-form-label" >Choice Image 2 </label>' +
                '<div class="col-sm-8">' +
                '<input type="file" name="image" id="link_image2"/><br/>' +
                '</div>' +
                '</div>' +
                '<div>' +

                '</div>    ' +


                '</form>' +
                '</div>' +
                '<br>' +

                '<button type="button" class="btn btn-danger btn-xs addmove" id="addmove">ADD</button> ';


            '</div>' +
                '<div class="modal-footer">' +

                '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
                '</div>' +
                '</div>' +

                '</div>' +
                '</div>';


            $('.formmove').html(html);
            $('#myModal').modal('show');
            // '<div>'+
            //      '<form>'+
            //           '<div class="form-group row">'+
            //             '<label class="col-sm-2 col-form-label" >Name Move </label>'+
            //             '<div class="col-sm-10">'+
            //                 '<input  id="name" type="text"class="form-control" >'+
            //             '</div>'+
            //           '</div>'+
            //           '<div class="form-group row">'+
            //             '<label class="col-sm-2 col-form-label" >Description</label>'+
            //             '<div class="col-sm-10">'+
            //                 '<input id="description" type="text" class="form-control">'+
            //             '</div>'+
            //           '</div>'+
            //           '<div class="form-group row">'+
            //             '<label class="col-sm-2 col-form-label" >Target Muscle</label>'+
            //             '<div class="col-sm-10">'+
            //                 '<input id="target_muscle" type="text" class="form-control">'+
            //             '</div>'+
            //           '</div>'+

            //      '</form>'+
            // '</div>'+
            // '<div>'+
            //      '<input type="file" name="image" id="link_image1"/><br/>'+
            //      '<input type="file" name="image" id="link_image2"/><br/>'+
            // '</div>    '+
            // '<button type="button" class="btn btn-danger btn-xs addmove" id="addmove">ADD</button> ';
            // $('.page-content').html(html);

        }

        console.log('this is add move func');
        $(document).on('click', '#addmove', function () {
            var name = $('#name').val();
            var description = $('#description').val();
            var target_muscle = $('#target_muscle').val();
            var link_image = [];
            var check = 1;
            link_image[0] = document.getElementById("link_image1").files[0];
            link_image[1] = document.getElementById("link_image2").files[0];
            var name1 = link_image[0].name;
            var name2 = link_image[1].name;
            //get extantion of images ???????
            var ext1 = name1.split('.').pop().toLowerCase();
            var ext2 = name2.split('.').pop().toLowerCase();
            // //check if the extabtion is one of this ['gif', 'png', 'jpg', 'jpeg']
            if (jQuery.inArray(ext1, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                check = 0;
                alert("Invalid Image File");
            }
            if (jQuery.inArray(ext2, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                check = 0;
                alert("Invalid Image File");
            }
            // //check the size of images
            for (var i = 0; i < 2; i++) {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(link_image[i]);
                var f = link_image[i];
                var fsize = f.size || f.fileSize;
                if (fsize > 2000000) {
                    check = 0;
                    alert("Image File Size is very big");
                }
            }
            add_move();


            function add_move() {
                console.log('this is func add move ');
                console.log('name = ' + name);
                console.log('description = ' + description);
                console.log('target_muscle = ' + target_muscle);
                var form_data = new FormData();
                form_data.append("user_name", sessionStorage.getItem('user_name'));
                form_data.append("token", sessionStorage.getItem('token'));
                form_data.append("name", name);
                form_data.append("description", description);
                form_data.append("target_muscle", target_muscle);
                form_data.append("link_image1", link_image[0]);
                form_data.append("link_image2", link_image[1]);
                $.ajax({
                    type: 'post',
                    url: 'http://'+host+'/addMove',
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log("success add  move " + data);
                    },
                    error: function () {

                    }
                });
            }

        });

    });


    //show all my sport program


    $(document).on('click', '#mySportPro', function () {
        getIdPrForCoach();

        function getIdPrForCoach() {
            $.ajax({
                url: "http://"+ host+"/getIdPrForCoach",
                data: {
                    user_name: sessionStorage.getItem('user_name'),
                    token: sessionStorage.getItem('token')
                },
                success: function (data) {
                    console.log(data);
                    for (var count = 0; count < data.length; count++) {
                        //draw_programe_sport
                        console.log("this is id pro for the coach" + data[count].id);
                        drawAllMySportPro(data[count].id,count+1);
                    }
                }
            });
        }


        var html = "";

        function drawAllMySportPro(idProgram,count) {
            console.log("id last request : " + idProgram);

            html +=
                '<div class="container box">' +
                '<h3>Program #'+count+' </h3><br />' +
                '<div class="panel panel-default">' +
                '<div class="panel-heading">Programe Sport</div>' +
                '<div class="panel-body">' +
                '<div id="message"></div>' +
                '<div class="table-responsive">' +
                '<table class="table table-striped table-bordered table-hover" ID="myMove">' +
                '<thead>' +
                '<tr>' +
                '<th>Name</th>' +
                '<th>Day</th>' +
                '<th>Reputations</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody id=' + idProgram + '>' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('.page-content').html(html);

            $.ajax({
                // type:"GET",
                data: {
                    idLastRequest: idProgram
                },

                url: "http://"+ host+"/draw_programe_sport",
                dataType: "json",

                success: function (data) {
                    console.log("success draw_programe_sport" + data);

                    // console.log(idRequest);
                    var html = '';
                    for (var count = 0; count < data.length; count++) {
                        html += '<tr>';
                        html += '<td  class="column_name" data-column_name="Name" data-id="' + data[count].id + '">' + data[count].name + '</td>';
                        html += '<td  class="column_day" data-column_name="day" data-id="' + data[count].id + '">' + data[count].day + '</td>';
                        html += '<td  class="column_reputations" data-column_name="reputations" data-id="' + data[count].id + '">' + data[count].reputations + '</td></tr>';

                    }
                    //html += '<tr><td><button type="button" class="btn btn-danger btn-xs showmealPro" id="showmealPro">done</button></td></tr>';
                    var idid = '#' + idProgram;
                    $(idid).html(html);
                },
                error: function (data) {
                    console.log("error form draw_programe_sport");
                }
            });
        }
    });

    /************************************************ */

    $(document).on('click', '#myFoodPro', function () {
        getIdFoodPrForCoach();

        function getIdFoodPrForCoach() {
            $.ajax({
                url: "http://"+ host+"/getIdFoodPrForCoach",
                data: {
                    user_name: sessionStorage.getItem('user_name'),
                    token: sessionStorage.getItem('token')
                },
                success: function (data) {
                    console.log(data);
                    for (var count = 0; count < data.length; count++) {
                        //draw_programe_sport
                        console.log("this is id food pro for the coach" + data[count].id);
                        drawAllMyFoodPro(data[count].id,count+1);
                    }
                }
            });
        }
        var html = "";

        function drawAllMyFoodPro(idProgram,count) {
            console.log("id last request : " + idProgram);
            // var html = "";
            html +=
                '<div class="container box">' +
                '<h3>Programe #'+count+' </h3><br />' +
                '<div class="panel panel-default">' +
                '<div class="panel-heading">Programe Meals</div>' +
                '<div class="panel-body">' +
                '<div id="message"></div>' +
                '<div class="table-responsive">' +
                '<table class="table table-striped table-bordered table-hover" ID="myMeal">' +
                '<thead>' +
                '<tr>' +
                '<th>Name</th>' +
                '<th>Day</th>' +
                '<th>Number</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody id=' + idProgram + '>' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('.page-content').html(html);

            $.ajax({
                // type:"GET",
                data: {

                    idLastRequest: idProgram
                },

                url: "http://"+ host+"/draw_programe_meal",
                dataType: "json",

                success: function (data) {
                    console.log("success draw_programe_meal" + data);

                    // console.log(idRequest);
                    var html = '';
                    for (var count = 0; count < data.length; count++) {
                        html += '<tr>';
                        html += '<td  class="column_name" data-column_name="Name" data-id="' + data[count].id + '">' + data[count].name + '</td>';
                        html += '<td  class="column_day" data-column_name="day" data-id="' + data[count].id + '">' + data[count].day + '</td>';
                        html += '<td  class="column_number_meal" data-column_name="reputations" data-id="' + data[count].id + '">' + data[count].number_meal + '</td>'+'</tr>';

                    }
                    //html += '<tr><td><button type="button" class="btn btn-danger btn-xs showmealPro" id="showmealPro">done</button></td></tr>';
                    var idFood = "#" + idProgram;
                    $(idFood).html(html);
                }
            });
        }

    });



});
function inser_sport_Programe_data(id_Request) {
    console.log(id_Request);
    $.ajax({
        //type="POST",
        data: {
            idSportProReq: id_Request
        },
        url: "http://"+ host+"/add_Sport_Program_data",

        success: function (data) {
            console.log(data);
            console.log("success inser_sport_Programe_data " + data);
        }
    });
}
//reham

//************************* Helping system for Sport program********************************** */


var html = "";



function drawSimilarProgram(MyReq, HisReq) {

    $.ajax({
        type: "GET",
        data: {
            idLastRequest: HisReq
        },

        url: "http://"+ host+"/draw_programe_sport",
        dataType: "json",

        success: function (data) {
            console.log("success draw_programe_sport" + data);

            // console.log(idRequest);
            var html = '';
            for (var count = 0; count < data.length; count++) {

                html += '<tr>';
                html += '<td  class="column_name" data-column_name="Name" >' + data[count].name + '</td>';
                html += '<td  class="column_day" data-column_name="day" >' + data[count].day + '</td>';
                html += '<td  class="column_reputations" data-column_name="reputations">' + data[count].reputations + '</td>';
                html += '</tr>';
            }
            html += '<tr><td style=\"border:0; background-color:white; \"><button type="button" class="btn btn-danger btn-xs showmealPro chose" onclick=\"build(\'' + MyReq + '\'' + ',' + '\'' + HisReq + '\')\"  id="showmealPro">Chose</button></td></tr>';
            $('.t_body').append(html);

        },
        error: function (data) {
            console.log("error form draw_programe_sport");
        }
    });
}






function build(MyReq, HisReq) {
    inser_sport_Programe_data(MyReq);
    $.ajax({

        type: "POST",
        url: "http://"+ host+"/getProgramFromIdRequest",
        data: {
            user_name: sessionStorage.getItem('user_name'),
            token: sessionStorage.getItem('token'),
            MyReq: MyReq,
            HisReq: HisReq
        }, success: function (data) {
            console.log(data);
            $(".show_prog").trigger("click");
            $('#similar_program').modal('hide');
        },
        error: function (data) {
            alert(data);
        }
    });

}









function getSimilarProgram(val) {

    $('.t_body').html('');
    console.log(val);
    $.ajax({

        type: "POST",
        url: "http://"+ host+"/helpingSystemSportProgram",
        data: {
            user_name: sessionStorage.getItem('user_name'),
            token: sessionStorage.getItem('token'),
            id_request_sport_program: val
        }, success: function (data) {
            console.log(data);

            for (var count = 0; count < data.length; count++) {
                //draw_programe_sport

                //console.log(data[count].id+' '+val);

                drawSimilarProgram(val, data[count].id);
            }


        },
        error: function (data) {
            alert(data.header);
        }
    });




}

