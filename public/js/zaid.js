
var SportArray = { 'Chest': [], 'Back': [], 'Biceps': [], 'Triceps': [], 'Shoulders': [], 'Legs': [] };
var FoodArray = { 'saturday': [], 'sunday': [], 'monday': [], 'tuesday': [], 'wednesday': [], 'thursday': [], 'friday': [] };

$(document).ready(function () {
    $('#Muscle').attr("hidden", true);

    //view the Questions modal and get information
   //$('#questions_modal').modal('show');
    //get all questions
    // $.ajax({
    //     type:'get',
    //     url:'http://'+host+'/getquestions',
    //     data:{
    //         token:sessionStorage.getItem('token'),
    //         user_name:sessionStorage.getItem('user_name')
    //     },success:function(data){
    //         data.data.forEach(Q => {
    //             $('#questions_modal :modal_body').append('');
    //         });
    //     },error:function(error){
    //         console.log("error in get questions");
    //     }
    // });

    $('.user-name').text(sessionStorage.getItem('user_name'));

    //Get Player Info
    $('#get-profile-info').click(function () {
        $('#Muscle').attr("hidden", true);
        $('#getprograms').attr("hidden", true);
        $('#MyMuscle').attr("hidden", true);
        $('#MyDays').attr("hidden", true);
        $('#zaid').attr("hidden", true);
        $('#exited_image').attr("hidden", true);
        $('#programs').html('');
        $.ajax({
            type: "POST",
            url: "http://"+ host+"/getPalyerInfo",
            data: {
                user_name:sessionStorage.getItem('user_name'),
                token:sessionStorage.getItem('token'),
            },
            success: function (data) {
                var adding = "";
                console.log(data.data);
                data.data.forEach(element => {
                    adding =

                        "                <h3 style=\"background-color: #E6E6FA;\" class=\"card-title col-lg-12 col-sm-12 text-left\">Civil Info </h3>\n" +
                        "                  <label style=\"font-weight: bold; \"  class=\"card-text col-lg-4 \">Id :</label><span class=\"label label-default col-lg-5 \">" + element.id + "</span>\n" +
                        "                  <label style=\"font-weight: bold; \"  class=\"card-text col-lg-4  \">First name :</label><span class=\"label label-default col-lg-5 \">" + element.first_name + "</span>\n" +
                        "                  <label style=\"font-weight: bold; \"  class=\"card-text col-lg-4  \">Last name :</label><span class=\"label label-default col-lg-5 \">" + element.last_name + "</span>\n" +
                        "                  <label style=\"font-weight: bold; \"  class=\"card-text col-lg-4  \">Father name :</label><span  class=\"label label-default col-lg-5 \">" + element.father_name + "</span>\n" +
                        "                  <label style=\"font-weight: bold; \"  class=\"card-text col-lg-4  \">National ID :</label><span  class=\"label label-default col-lg-5 \">" + element.national_id + "</span>\n" +
                        "                  <label style=\"font-weight: bold; \"  class=\"card-text col-lg-4  \">Phone number :</label><span class=\"label label-default col-lg-5 \">" + element.phone_number + "</span>\n" +
                        "                  <label style=\"font-weight: bold; \"  class=\"card-text col-lg-4  \">Second phone number :</label><span class=\"label label-default col-lg-5 \">" + element.s_phone_number + "</span>\n" +
                        "                  <h3 style=\"background-color: #E6E6FA;\" class=\"card-title col-lg-12 col-sm-12 text-left\">Subscription Info  </h3>\n" +
                        "                  <label style=\"font-weight: bold; \"  class=\"card-text col-lg-4  \">Start substriction :</label><span class=\"label label-default col-lg-5 \">" + element.start_date + "</span>\n" +
                        "                  <label style=\"font-weight: bold; \"  class=\"card-text col-lg-4  \">Duration :</label><span class=\"label label-default col-lg-5 \">" + element.duration + "</span>\n" +
                        "                  <h3 style=\"background-color: #E6E6FA;\" class=\"card-title col-lg-12 col-sm-12 text-left\">Account Info </h3>\n" +
                        "                  <label style=\"font-weight: bold;\"  class=\"card-text col-lg-4 \">User name :</label><span class=\"label label-default col-lg-5 \">" + element.user_name + "</span>\n" +
                        "                  <label style=\"font-weight: bold;\"  class=\"card-text col-lg-4 \">Password :</label><span type=\"password\" class=\"label label-default col-lg-5 \">" + element.password + "</span>\n" +
                        "                  <label style=\"font-weight: bold;\"  class=\"card-text col-lg-4 \">Email :</label><span class=\"label label-default col-lg-5 \">" + element.email + "</span>\n"
                });

                $('#zaid').html(adding);
                $('#zaid').attr("hidden", false);
            },
            error: function (data) {
                alert(data.header);
            }
        });


    });



    //Get sport Programs date

    $('#get_sport_programs').click(function () {
        $('#Muscle').attr("hidden", true);
        $('#getprograms').attr("hidden", true);
        $('#MyMuscle').attr("hidden", true);
        $('#MyDays').attr("hidden", true);
        $('#zaid').attr("hidden", true);
        $('#exited_image').attr("hidden", true);
        $('#programs').html('');

        $.ajax({
            type: "POST",
            url: "http://"+ host+"/getSportPlayerProgramsDate",
            data: {
                user_name:sessionStorage.getItem('user_name'),
                token:sessionStorage.getItem('token'),
            },
            success: function (data) {
                var adding = "";

                var i = 0;
                data.data.forEach(element => {
                    i++;
                    if (i % 2 == 0)
                        adding += ('<li class="col-lg-10 col-md-8 col-sm-6 list-group-item" style=" font-size: 125%; margin:1px; border:none;">' + element.start + '  ' + element.goal + '<button style="float:right" class="btn btn-success" onclick="getSportVal(\'' + element.start + '\')">Show</button></li>');
                    else
                        adding += ('<li class="col-lg-10 col-md-8 col-sm-6 list-group-item list-group-item-dark" style=" font-size: 125%; margin:1px; border:none;">' + element.start + '  ' + element.goal + '<button style="float:right" class="btn btn-success" onclick="getSportVal(\'' + element.start + '\')">Show</button></li>');
                });
                $('#programs').html(adding);
            },
            error: function (data) {
                alert(data.header);
            }
        });
        $('#getprograms').attr("hidden", false);
    });



    //Get food Programs date
    $('#get_food_programs').click(function () {
        $('#getprograms').attr("hidden", true);
        $('#Muscle').attr("hidden", true);
        $('#MyMuscle').attr("hidden", true);
        $('#MyDays').attr("hidden", true);
        $('#zaid').attr("hidden", true);
        $('#exited_image').attr("hidden", true);
        $('#programs').html('');

        $.ajax({
            type: "POST",
            url: "http://"+ host+"/getFoodPlayerProgramsDate",
            data: {
                 user_name:sessionStorage.getItem('user_name'),
                token:sessionStorage.getItem('token'),
            },
            success: function (data) {
                var adding = "";

                var i = 0;
                data.data.forEach(element => {

                    i++;
                    if (i % 2 == 0)
                        adding += ('<li class="col-lg-10 col-md-8 col-sm-6 list-group-item" style=" font-size: 125%; margin:1px; border:none;">' + element.start + '  ' + element.goal + '<button style="float:right" class="btn btn-success btn-md" onclick="getFoodVal(\'' + element.start + '\')">Show</button></li>');
                    else
                        adding += ('<li class="col-lg-10 col-md-8 col-sm-6 list-group-item list-group-item-dark" style=" font-size: 125%; margin:1px; border:none;">' + element.start + '  ' + element.goal + '<button style="float:right" class="btn btn-success btn-md" onclick="getFoodVal(\'' + element.start + '\')">Show</button></li>');
                });
                $('#programs').html(adding);
            },
            error: function (data) {
                alert(data.header);
            }
        });
        $('#getprograms').attr("hidden", false);
    });




    //reqest  Sport Programs

    $('#reqest_Sport_program').click(function () {
        var check = 1, r = 0;
        var image = [];
        //get images
        if (document.getElementById("PlayerSideImage").files[0] != null && document.getElementById("PlayerBackImage").files[0] != null && document.getElementById("PlayerFrontImage").files[0] != null) {
        image[0] = document.getElementById("PlayerSideImage").files[0];
            image[1] = document.getElementById("PlayerBackImage").files[0];
            image[2] = document.getElementById("PlayerFrontImage").files[0];
            //get name of images
            var name1 = image[0].name;
            var name2 = image[1].name;
            var name3 = image[2].name;
            //get extantion of images اللاحقة
            var ext1 = name1.split('.').pop().toLowerCase();
            var ext2 = name2.split('.').pop().toLowerCase();
            var ext3 = name3.split('.').pop().toLowerCase();
            //check if the extabtion is one of this ['gif', 'png', 'jpg', 'jpeg']
            if (jQuery.inArray(ext1, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                check = 0;
                alert("Invalid Image File");
            }
            if (jQuery.inArray(ext2, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                check = 0;
                alert("Invalid Image File");
            }
            if (jQuery.inArray(ext3, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                check = 0;
                alert("Invalid Image File");
            }
            //check the size of images
            for (var i = 0; i < 3; i++) {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(image[i]);
                var f = image[i];
                var fsize = f.size || f.fileSize;
                if (fsize > 2000000) {
                    check = 0;
                    alert("Image File Size is very big");
                }
                r = 1;
            }
        }
        // build form data to send file and data by ajax
        var form_data = new FormData();
        if (check != 0) {

            form_data.append("user_name", sessionStorage.getItem('user_name'));
            form_data.append("token", sessionStorage.getItem('token'));
            form_data.append("id_coach", $('#IdCoach').val());
            form_data.append("goal", $('#SportProgramGoal').val());
            form_data.append("weight", $('#PlayerWeight').val());
            form_data.append("height", $('#PlayerHeight').val());
            form_data.append("age", $('#PlayerAge').val());

            form_data.append("side_image", document.getElementById('PlayerSideImage').files[0]);
            form_data.append("front_image", document.getElementById('PlayerFrontImage').files[0]);
            form_data.append("back_image", document.getElementById('PlayerBackImage').files[0]);

            //sending data
            $.ajax({
                type: "POST",
                url: "http://"+ host+"/requestSportProgram",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data.header);
                     $('#PlayerWeight').val('');
                    $('#PlayerHeight').val('');
                     $('#PlayerAge').val('');

                     document.getElementById('PlayerSideImage').files[0]=null;
                     document.getElementById('PlayerFrontImage').files[0]=null;
                     document.getElementById('PlayerBackImage').files[0]=null;
                    $('#modal_reqest_Sport_program').modal('hide');
                },
                error: function (data) {
                    alert(data.header);
                }
            });
        }
    });



    // to get all id and name of coachs in KeepFit
    $('#button_reqest_Sport_program').click(function () {
        $('#IdCoach').empty();
        $.ajax({
            type: "POST",
            url: "http://"+ host+"/ModalReqestSportProgram",
            data: {
                user_name:sessionStorage.getItem('user_name'),
               token:sessionStorage.getItem('token')
            },
            success: function (data) {
                console.log(data);
                console.log(data.header);
                data.data.forEach(element => {
                    $('#IdCoach').append('<option value= ' + element.id + '>' + element.name + '</option>');
                })

            },
            error: function (data) {
                alert(data.header);
            }
        });
    });



    // to get all id and name of coachs in KeepFit
    $('#button_reqest_Food_program').click(function () {
        $('#IdCoachF').empty();
        $.ajax({
            type: "POST",
            url: "http://"+ host+"/ModalReqestFoodProgram",
            data: {
                user_name:sessionStorage.getItem('user_name'),
                token:sessionStorage.getItem('token')
            },
            success: function (data) {

                console.log(data.header);
                data.data.forEach(element => {
                    $('#IdCoachF').append('<option value= ' + element.id + '>' + element.name + '</option>');
                })
            },
            error: function (data) {
                alert(data.header);
            }
        });
    });






    //Request Food Program
    $('#reqest_food_program').click(function () {


        $.ajax({
            type: "POST",
            url: "http://"+ host+"/requestFoodProgram",
            data: {
                user_name:sessionStorage.getItem('user_name'),
               token:sessionStorage.getItem('token'),
                id_coach: $('#IdCoachF').val(),
                height: $('#PlayerHeightF').val(),
                weight: $('#PlayerWeightF').val(),
                sex: $('#Sex').val(),
                sugar: $('#sugar').val(),
                social_status: $('#social_status').val(),
                age: $('#PlayerAgeF').val(),
                goal: $('#FoodProgramGoal').val()
            },
            success: function (data) {

                console.log(data.header);
                $('#PlayerHeightF').val('');
                $('#PlayerWeightF').val('');
                $('#PlayerAgeF').val('');


                $('#modal_reqest_Food_program').modal('hide');

            },
            error: function (data) {
                alert(data.header);
            }
        });
    });




    //to choose program dependent on Muscle

    $('#Chest').click(function () {
        $('#zaid').html(SportArray['Chest']);
        $('#zaid').attr("hidden", false);
    });
    $("#Back").click(function () {
        $('#zaid').html(SportArray['Back']);
        $('#zaid').attr("hidden", false);
    });
    $("#Biceps").click(function () {
        $('#zaid').html(SportArray['Biceps']);
        $('#zaid').attr("hidden", false);
    });
    $("#Triceps").click(function () {
        $('#zaid').html(SportArray['Triceps']);
        $('#zaid').attr("hidden", false);
    });
    $("#Shoulders").click(function () {
        $('#zaid').html(SportArray['Shoulders']);
        $('#zaid').attr("hidden", false);
    });
    $("#Legs").click(function () {
        $('#zaid').html(SportArray['Legs']);
        $('#zaid').attr("hidden", false);
    });

    //to choose program dependent on Day
    $('#saturday').click(function () {
        $('#zaid').html(FoodArray['saturday']);
        $('#zaid').attr("hidden", false);
    });
    $("#sunday").click(function () {
        $('#zaid').html(FoodArray['sunday']);
        $('#zaid').attr("hidden", false);
    });
    $("#monday").click(function () {
        $('#zaid').html(FoodArray['monday']);
        $('#zaid').attr("hidden", false);
    });
    $("#tuesday").click(function () {
        $('#zaid').html(FoodArray['tuesday']);
        $('#zaid').attr("hidden", false);
    });
    $("#wednesday").click(function () {
        $('#zaid').html(FoodArray['wednesday']);
        $('#zaid').attr("hidden", false);
    });
    $("#thursday").click(function () {
        $('#zaid').html(FoodArray['thursday']);
        $('#zaid').attr("hidden", false);
    });
    $("#friday").click(function () {
        $('#zaid').html(FoodArray['friday']);
        $('#zaid').attr("hidden", false);
    });

    // Ending $(document).ready()
});






// get spsific sport program
function getSportVal(val) {
    $('#Muscle').attr("hidden", true);
    $('#getprograms').attr("hidden", true);
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "http://"+ host+"/getSportPlayerProgram",
            data: {
                user_name:sessionStorage.getItem('user_name'),
               token:sessionStorage.getItem('token'),
                date: val
            },
            success: function (data) {
                var counter = 1;

                for (var key in SportArray) {
                    SportArray[key] = [];
                }


                var SpotrArrayTage = { 'saturday': [], 'sunday': [], 'monday': [], 'tuesday': [], 'wednesday': [], 'thursday': [], 'friday': [] };

                data.data.forEach(element => {
                    console.log(element.target_muscle);

                    if (SpotrArrayTage[element.day].indexOf(element.target_muscle) === -1) {
                        SpotrArrayTage[element.day].push(element.target_muscle);
                    }
                    SportArray[element.target_muscle].push("<div class=\" col-lg-4 col-md-2 col-sm-2\"  >" +
                        "                        <div style=\"margin:10px; \" class=\"card row \" >\n" +
                        "                      <h3  class=\"card-title col-lg-12 col-md-6 col-sm-3\">" + counter + "</h3>\n" +
                        "                     <h6  style=\" font-weight:bold; text-align: center;\" class=\"card-title col-lg-12 col-md-6 col-sm-3\">" + element.name + "</h6>\n" +
                        "                    <div class=\"row\">\n" +
                        "                    <div class=\"card-body row\">\n" +
                        "                    <div class=\" col-6\">\n" +
                        "                    <h5 >Stretch </h5>" +
                        "                    <img height=\"150\" class=\" card-img \" src=\"images/" + element.link_image1 + " \" alt=\"Card image cap\">\n" +
                        "                    </div>\n" +
                        "                    <div class=\" col-6\">\n" +
                        "                    <h5 >Contraction </h5>" +
                        "                    <img height=\"150\" class=\"card-img \" src=\"images/" + element.link_image2 + "\" alt=\"Card image cap\">\n" +
                        "                    </div>\n" +
                        "                    </div>\n" +
                        "                    </div>\n" +
                        "                    <ul class=\"list-group list-group-flush\">\n" +
                        "                      <li  class=\"list-group-item\"> <h3 class=\"\">The Reputations: </h3><p\h6 >" + element.reputations + "</h6></li>\n" +
                        "                      <li class=\"list-group-item\"> <h3 class=\"\">Description: </h3> <h6 >" + element.description + "</h6></li>\n" +
                        "                    </ul>\n" +
                        "                  </div>" +
                        "                  </div>");
                    counter++;
                });
                $('#MyMuscle').attr("hidden", false);
                $("#Chest").trigger("click");
                function printt(obj) {
                    var temp = "";
                    obj.forEach(i => {
                        temp += i + " ";
                    }
                    )
                    return temp;
                }
                $('#1').html(printt(SpotrArrayTage.saturday));
                $('#2').html(printt(SpotrArrayTage.sunday));
                $('#3').html(printt(SpotrArrayTage.monday));
                $('#4').html(printt(SpotrArrayTage.tuesday));
                $('#5').html(printt(SpotrArrayTage.wednesday));
                $('#6').html(printt(SpotrArrayTage.thursday));
                $('#7').html(printt(SpotrArrayTage.friday));
                $('#Muscle').attr("hidden", false);

            },
            error: function (data) {
                alert(data.header);
            }
        });
    });
}





// get spsific food program
function getFoodVal(val) {
    $('#Muscle').attr("hidden", true);
    $('#getprograms').attr("hidden", true);
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "http://"+ host+"/getFoodPlayerProgram",
            data: {
                user_name:sessionStorage.getItem('user_name'),
                token:sessionStorage.getItem('token'),
                date: val
            },
            success: function (data) {
                for (var key in FoodArray) {
                    FoodArray[key] = [];
                }
                data.data.forEach(element => {
                    FoodArray[element.day].push("<div class=\" col-lg-4 col-md-2 col-sm-1\"  >" +
                        "                        <div style=\"margin:10px; \" class=\"card row \" >\n" +
                        "                        <div  class=\"card-title \" >\n" +
                        "                      <h4  class=\" col-lg-12 col-md-6 col-sm-3\">" + element.number_meal + "</h4>\n" +

                        "                    </div>\n" +

                        "                     <h3  style=\" font-weight:bold; text-align: center;\" class=\"card-title col-lg-12 col-md-6 col-sm-3\">" + element.name + "</h3>\n" +
                        "                       <hr>" +
                        "                    <div class=\"card-body\">\n" +
                        "                     <span > <h5 style=\" font-weight:bold; \" >Description: </h5> <h6 >" + element.description + "</h6></span>\n" +
                        "                    </div>\n" +

                        "                  </div>" +
                        "                  </div>");
                });
                $("#saturday").trigger("click");
            },
            error: function (data) {
                alert(data.header);

            }
        });
        $('#MyDays').attr("hidden", false);
    });


}
