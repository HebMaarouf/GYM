$(document).ready(function () {
    //show to today check in table
    getTodayCheckIn();

    //initialize the name of the user
    $('.user-name').text(sessionStorage.getItem('user_name'));

    //initialize the subscription type select
    $('#subscription_type').change(function () {
        if ($(this).val() == '1') {
            $('#subscription').empty();
            $.ajax({
                url: 'http://' + host + '/GetSubscriptionType',
                data: {
                    user_name: sessionStorage.getItem('user_name'),
                    token: sessionStorage.getItem('token')
                },
                method: 'post',
                success: function (data) {
                    if (data.header == "success") {
                        data.data.forEach(type => {
                            $('#subscription').append('<option value="' + type.id + '">' + type.description + '</option>');
                        });
                    }
                },
                error: function (err) {
                    alert(err);
                }
            });

        } else if ($(this).val() == '2') {
            $('#subscription').empty();
            $.ajax({
                url: 'http://' + host + '/GetSpecificSubscriptionType',
                data: {
                    user_name: sessionStorage.getItem('user_name'),
                    token: sessionStorage.getItem('token')
                },
                method: 'post',
                success: function (data) {
                    if (data.header == "success") {
                        data.data.forEach(type => {
                            $('#subscription').append('<option value="' + type.id + '">' + type.name + '</option>');
                        });
                    }
                },
                error: function (err) {
                    alert(err);
                }
            });
        }
    }); //</subscription type select>

    //add player subscription
    $('#add_player_subscription_savebtn').click(function () {
        var id_player = $('#id').val(),
            start_date = $('#start_date').val();
        var discount = $('#discount').val();
        var temp = document.getElementById('subscription_type').value;
        var id_subscription, id_specific_subscription_type;
        if (temp == '1') {
            id_subscription = document.getElementById('subscription').value;
            id_specific_subscription_type = 0;
        } else if (temp == '2') {
            id_subscription = 0;
            id_specific_subscription_type = document.getElementById('subscription').value;
        }

        //<ajax>
        $.ajax({
            method: 'post',
            url: 'http://' + host + '/AddPlayerSubscription',
            data: {
                user_name: sessionStorage.getItem('user_name'),
                token: sessionStorage.getItem('token'),
                id_player: id_player,
                start_date: start_date,
                discount: discount,
                id_subscription: id_subscription,
                id_specific_subscription_type: id_specific_subscription_type
            },
            success: function (data) {
                if (data.error) {
                    swal(data.error, '', 'error')
                } else {
                    swal('Success', '', 'success');
                }
            },
            error: function (err) {
                alert('error in save');
            }
        });
        //</ajax>
    });


    //Subscriptions Deadline

    //get Subscription Deadline
    $('#subscriptions_deadline_table').DataTable();
    $('#subscriptions_deadline').on('click', getSubscriptionDeadline);


    //add player
    $('#add_player_savebtn').click(function () {
        var first_name = $('#user_name').val(),
            last_name = $('#last_name').val(),
            father_name = $('#father_name').val(),
            national_id = $('#national_id').val(),
            user_name_new = $('#user_name').val(),
            password = $('#password').val(),
            phone_number = $('#phone_number').val();
        email = $('#email').val();
        gender = $('#gender').find(":selected").text();
        var id_gym;
        //<ajax>
        $.ajax({
            method: 'post',
            url: 'http://' + host + '/AddPlayer',
            data: {
                user_name: sessionStorage.getItem('user_name'),
                token: sessionStorage.getItem('token'),
                phone_number: phone_number,
                first_name: first_name,
                last_name: last_name,
                father_name: father_name,
                national_id: national_id,
                user_name_new: user_name_new,
                password: password,
                email: email,
                gender: gender
            },
            success: function (data) {
                if (data.error) {
                    swal(data.error, '', 'error')
                } else {
                    swal('Added Player Successfully', '', 'success')
                }
            },
            error: function (err) {
                swal(err.message, '', 'error')
            }
        });
        //</ajax>
    });
    //<Check IN save btn>
    $('#checkin_savebtn').click(function () {
        var id_player = $('#id_player').val();
        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        $.ajax({

            method: 'post',
            url: 'http://' + host + '/CheckIn',
            data: {
                id: 1,
                user_name: sessionStorage.getItem('user_name'),
                token: sessionStorage.getItem('token'),
                date: date,
                time: time,
                id_player: id_player
            },
            success: function (data) {
                console.log(data.header);
                if (data.error) {
                    swal(data.error, '', 'error')
                }   else {
                    if (data.header == "success")
                        $('.toast').toast('show');
                    swal('Player checked in!', '', 'success');
                    //clear the check in input
                    $('#id_player').val('');
                    window.location.reload()
                }
                //content of alert

            },
            error: function (error) {
                alert(error)
            }
        }); //</ajx>
    });


    //<add vacation request>
    $('#add_vacation_request_savebtn').click(function () {
        var start_date = $('#v_start_date').val();
        var description = $('#description').val();
        $.ajax({
            url: 'http://' + host + '/AddVacationRequest',
            method: 'post',
            data: {
                user_name: sessionStorage.getItem('user_name'),
                token: sessionStorage.getItem('token'),
                description: description,
                start_date: start_date
            },
            success: function (data) {
                console.log(data);
                if (data.error) {
                    swal(data.error, '', 'error')
                } else {
                    swal('Request Sent Successfully', '', 'success')
                }
            },
            error: function (error) {
                alert(error);
            }

        });
    });


    $('#get_player_info').click(function () {
        //change modal title
        $('#pi_title').text('Get Player Info');
        //change the action
        $('#get_player_info_savebtn').off('click').on('click', getPlayerInfo)
        //show
        $('#get_player_info_modal').modal('show');
    });

    //get player info
    function getPlayerInfo() {
        var id_player = $('#gpi_id_player').val();
        $.ajax({
            url: 'http://' + host + '/GetPlayerInfo',
            method: 'post',
            data: {
                user_name: sessionStorage.getItem('user_name'),
                token: sessionStorage.getItem('token'),
                id_player: id_player
            },
            success: function (data) {
                console.log(data);
                //if success
                if (data.header == "success" && data.data.length != 0) {
                    $('#gpi_id_player').val('');
                    $('#get_player_info_modal').modal('hide');
                    //civil info
                    $('#pi_first_name').text(data.data[0].first_name);
                    $('#pi_last_name').text(data.data[0].last_name);
                    $('#pi_father_name').text(data.data[0].father_name);
                    $('#pi_national_id').text(data.data[0].national_id);
                    //more info
                    $('#pi_phone_number').text(data.data[0].phone_number);
                    $('#pi_s_phone_number').text(data.data[0].s_phone_number);
                    //subscription
                    $('#pi_start_date').text(data.data[0].start_date);
                    $('#pi_duration').text(data.data[0].duration);
                    //account
                    $('#pi_user_name').text(data.data[0].user_name);
                    $('#pi_password').text(data.data[0].password);
                    $('#pi_email').text(data.data[0].email);

                    //hide the table and show the card
                    $('#filling > div').attr('hidden', true);
                    $('#player_info_div').attr('hidden', false);

                } else {
                    alert("Invalid player id");
                }
            },
            error: function (error) {
                alert(error);
            }
        });

    }

    //get Player subscription
    $('#player_subscriptions').DataTable();

    //get player subscriptions open modal
    $('#get_player_subscriptions').click(function () {
        //change modal title
        $('#pi_title').text('Get Player Subscriptions');
        //change the action
        $("#get_player_info_savebtn").off('click').on('click', getPlayerSubscriptions)
        //show
        $('#get_player_info_modal').modal('show');
    });

    function getPlayerSubscriptions() {
        var id_player = $('#gpi_id_player').val();
        $('#get_player_info_modal').modal('hide');
        //clear the table
        $('#player_subscriptions').DataTable().rows().clear();

        $.ajax({
            url: 'http://' + host + '/GetPlayerSubscription',
            method: 'post',
            data: {
                user_name: sessionStorage.getItem('user_name'),
                token: sessionStorage.getItem('token'),
                id_player: id_player
            },
            success: function (data) {
                console.log(data);
                var i = 0;
                data.data.forEach(function (json) {
                    i = i + 1;
                    var startdate = json['Start Date'];
                    var subscriptiontype = (json['Name'] == '0') ? 'Normal' : 'Specific';
                    var description_name = (json['Name'] == '0') ? json['Description'] : json['Name'];
                    var duration = (json['Name'] == '0') ? json['Subscription Duration'] : json['Specific Subscription Duration'];
                    var price = (json['Name'] == '0') ? json['Subscription Price'] : json['Specific Subscription Price'];
                    $('#player_subscriptions').DataTable().row.add([i, startdate, subscriptiontype, description_name, duration, price]).draw();
                    //clear id player
                    $('#gpi_id_player').val('');
                });

                //show the table and hide the card
                $('#filling > div').attr('hidden', true);
                $('#player_subscriptions_div').attr('hidden', false);

            },
            error: function (data) {
                alert('error');
            },

        });
    }


    //get Checked in table
    $('#check_in_table').DataTable();
    $('#today_check_in').on('click', getTodayCheckIn);

    function getTodayCheckIn() {
        //hide all the other shown components
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        today = mm + '-' + dd + '-' + yyyy;
        //get the check in data
        $.ajax({
            url: 'http://' + host + '/GetTodayCheckedIn',
            method: 'post',
            data: {
                user_name: sessionStorage.getItem('user_name'),
                token: sessionStorage.getItem('token'),
                date: today
            },
            success: function (data) {
                if (data.error) {
                    swal(data.error, '', 'error')
                } else {
                    //clear the table
                    $('#check_in_table').DataTable().rows().remove();
                    //append the data
                    console.log(data);
                    var i = 0;
                    data.data.forEach(function (check) {
                        i = i + 1;
                        $('#check_in_table').DataTable().row.add([i, check.name, check.day, check.time]);
                    });
                    $('#check_in_table').DataTable().draw();
                    //show the table and hide the card
                    $('#filling > div').attr('hidden', true);
                    $('#check_in_div').attr('hidden', false);
                }
            },
            error: function (error) {
                alert("error");
            }
        });
    }

    function getSubscriptionDeadline() {
        //hide all the other shown components
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        today = mm + '-' + dd + '-' + yyyy;
        //get the check in data
        $.ajax({
            url: 'http://' + host + '/GetSubscriptionDeadline',
            method: 'post',
            data: {
                user_name: sessionStorage.getItem('user_name'),
                token: sessionStorage.getItem('token'),
                date: today
            },
            success: function (data) {
                if (data.error) {
                    swal(data.error, '', 'error')
                } else {


                    //clear the table
                    $('#subscriptions_deadline_table').DataTable().rows().remove();
                    //append the data
                    console.log(data);
                    var i = 0;
                    data.data.forEach(function (check) {
                        i = i + 1;
                        if (check.daysleft != 0) {
                            var button = ('<button class=\"btn btn-dark\"disabled>Renew</button>');

                        } else
                            var button = ('<button class=\"btn btn-success\" onclick=\"RenewFunction(\'' + check.id_player + '\'' + ',' + '\'' + check.id_subscription + '\'' + ',' + '\'' + check.discount + '\')\"  >Renew</button>');
                        $('#subscriptions_deadline_table').DataTable().row.add([i, check.name, check.daysleft, button]);
                    });
                    $('#subscriptions_deadline_table').DataTable().draw();
                    //show the table and hide the card
                    $('#filling > div').attr('hidden', true);
                    $('#subscriptions_deadline_div').attr('hidden', false);
                }
            },
            error: function (error) {
               swal(error.message, '', 'error')
            }
        });
    }


    //end of js
});

function RenewFunction(id_player, id_subscription, discount) {
    var today = new Date();
    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    $.ajax({
        url: 'http://' + host + '/AddPlayerSubscription',
        method: 'post',
        data: {
            user_name: sessionStorage.getItem('user_name'),
            token: sessionStorage.getItem('token'),
            id_player: id_player,
            id_subscription: id_subscription,
            id_specific_subscription_type: 0,
            discount: discount,
            start_date: date
        },
        success: function (data) {
            //clear the table
            console.log(data);
        },
        error: function (error) {
            alert("error");
        }
    });

}
