$(document).ready(function () {
  $('.user-name').text(sessionStorage.getItem('user_name'));

    showstatistics();


    $('#slct').on('change', function (e) {
      var optionSelected = $("option:selected", this);
      var valueSelected = this.value;
      console.log("this select : " + optionSelected + ":::" + valueSelected);
      var type = 'allyear';
      var date = $("#datasta").val();
      console.log("date : " + date);
      var year = date.year();
      grtstatic(type, year, valueSelected);
    });

    var st ;
    $('#state').on('change', function (e) {
      var optionSelected = $("option:selected", this);
      var valueSelected = this.value;
      console.log("this select : " + optionSelected + ":::" + valueSelected);
      if(valueSelected == 1){
        st ='active';
      }
      else{
        st = 'nonactive';
      }
    });

    var ty ;
    $('#TypeEmp').on('change', function (e) {
      var optionSelected = $("option:selected", this);
      var valueSelected = this.value;
      console.log("this select : " + optionSelected + ":::" + valueSelected);
      if(valueSelected == 1){
        ty ='cotch';
      }
      else{
        ty = 'recption';
      }
    });

    $('#sta-group').on('click',function() {
      console.log("Zein : click :)")
      $(this)
        .find(".btn").toggleClass("active");
      if ($(this).find(".btn-primary").length > 0) {
        $(this).find(".btn").toggleClass("btn-primary");
      }
      $(this).find(".btn").toggleClass("btn-default");
    });

    //add employee
    $('#addemployee').click(function () {
      var TypeEmp = ty;
      var state = st;
      var user_name = $('#user_name').val();
      var id_gym = sessionStorage.getItem('id');
      var password = $('#password').val();
      var open_time = $('#open_time').val();
      var shift = $('#shift').val();
      var close_time = $('#close_time').val();
      var first_name = $('#first_name').val();
      var last_name = $('#last_name').val();
      var father_name = $('#father_name').val();
      var national_id = $('#national_id').val();
      var birthday = $('#birthday').val();
      var phone_number = $('#phone_number').val();
      var email = $('#email').val();
      var token = sessionStorage.getItem('token');
      var salary = $('#salary').val();
      var user_name_gym = sessionStorage.getItem('user_name');

      console.log(user_name_gym + " : " + salary + " : "+token + " : " + email +
      " : "+phone_number + " : " + birthday + " : "+national_id + " : " + father_name + " : "+
      " : "+last_name + " : " + first_name + " : "+close_time + " : " + shift + " : "+
      " : "+open_time + " : " + password + " : "+id_gym + " : " + user_name + " : "+state + " : " + TypeEmp + " : ");
      $.ajax({
        method: "post",
        url: "http://"+ host+"/addEmployee",
        data: {
          user_name_gym: user_name_gym,
          TypeEmp: TypeEmp,
          state: state,
          user_name: user_name,
          id_gym: id_gym,
          password: password,
          open_time: open_time,
          shift: shift,
          close_time: close_time,
          first_name: first_name,
          last_name: last_name,
          father_name: father_name,
          national_id: national_id,
          birthday: birthday,
          phone_number: phone_number,
          email: email,
          token: token,
          salary: salary
        },

        success: function (data) {
          console.log(data);
          swal('تم اضافة موظف جديد', '', 'success');
        },
        error: function (error) {
        }
      });
      var myTable = $('#example').DataTable();
      myTable.destroy();
    });

    $('#addVacationtype').click(function () {
      var id_gym = sessionStorage.getItem('id');
      var token = sessionStorage.getItem('token');
      var description = $('#description').val();
      var period = $('#period').val();
      var user_name = sessionStorage.getItem('user_name');
      console.log("des : " + description);
      console.log("period : " + period);
      $.ajax({
        method: "post",
        url: "http://"+ host+"/insertV",
        data: {
          user_name: user_name,
          id_gym: id_gym,
          token: token,
          description: description,
          period: period
        },

        success: function (data) {
          console.log(data);
          swal('تمت العملية بنجاح', '', 'success');

        },
        error: function (error) {
        }
      });
      var myTable = $('#tablevac1').DataTable();
      myTable.destroy();

      showVaction();
    });
  });

  $('#addSubscriptionTypeS').click(function () {
    var id_gym = sessionStorage.getItem('id');
    var token = sessionStorage.getItem('token');
    var description = $('#DescriptionS').val();
    var duration = $('#DurationS').val();
    var Price = $('#PriceS').val();
    var user_name = sessionStorage.getItem('user_name');
    $.ajax({
      method: "post",
      url: "http://"+ host+"/insertSubscriptionType",
      data: {
        user_name: user_name,
        id: id_gym,
        token: token,
        description: description,
        duration: duration,
        price: Price
      },

      success: function (data) {
        console.log(data);
        swal('تمت العملية بنجاح', '', 'success');

      },
      error: function (error) {
      }
    });
    $('#SubscriptionTypedata').empty();
    var mytable = $('#Subscriptiontable').dataTable();
    mytable.destroy();
    showSubscriptionType();
  });

  $('#addSubscriptionSS').click(function () {
    var id_gym = sessionStorage.getItem('id');
    var token = sessionStorage.getItem('token');
    var Name = $('#Namess').val();
    var duration = $('#DurationSS').val();
    var Price = $('#PriceSS').val();
    var user_name = sessionStorage.getItem('user_name');
    $.ajax({
      method: "post",
      url: "http://"+ host+"/inserSpecifictSubscriptionType",
      data: {
        user_name: user_name,
        id: id_gym,
        token: token,
        name: Name,
        duration: duration,
        price: Price
      },

      success: function (data) {
        console.log(data);
        swal('تمت العملية بنجاح', '', 'success');

      },
      error: function (error) {
      }
    });
    mytable =$('#SpecificSubscriptionTypedata').empty();
    var mytable = $('#SpecificSubscriptiontable').dataTable();
    mytable.destroy();
    showSpecificSubscriptionType();
  });



  $('#Addmachines').click(function () {
    var id_gym = sessionStorage.getItem('id');
    var token = sessionStorage.getItem('token');
    var datemachine = $('#datemachine').val();
    var pricemachine = $('#pricemachine').val();
    var namemachine = $('#namemachine').val();
    var user_name = sessionStorage.getItem('user_name');
    $.ajax({
      method: "post",
      url: "http://"+ host+"/addmachine",
      data: {
        user_name: user_name,
        id: id_gym,
        token: token,
        price: pricemachine,
        name: namemachine,
        date: datemachine
      },

      success: function (data) {
        console.log(data);
        swal('تمت العملية بنجاح', '', 'success');

      },
      error: function (error) {
      }
    });
    var mytable =$('#machinestable').dataTable();
    mytable.destroy();
    showdatamachines();
  });

  $("#dropdownlist").change(function () {
    var selected = $(this).val(); // get selected options value.
    console.log("repairs : " + selected);
    if (selected === "repairs") {
      console.log("repairsrepairs");
    }
  });

  function fun0() {
    display("set1");
    display("set2")
    nondisplay("dataemp");
    nondisplay("con");
    nondisplay("dataVacationType");
    nondisplay("addVacationT");
    nondisplay("addVacationP");
    nondisplay("dataSpecificSubscriptionType");
    nondisplay("addSubscriptionTypeSS");
    nondisplay("dataSubscriptionType");
    nondisplay("addSubscriptionType");
    nondisplay("addmachinesdata");
    nondisplay("EmpVacation");
    $('#empdata').empty();
    showstatistics();
  }

  function fun() {
    nondisplay("set1");
    nondisplay("set2");
    display("dataemp");
    nondisplay("con");
    nondisplay("dataVacationType");
    nondisplay("addVacationT");
    nondisplay("addVacationP");
    nondisplay("dataSpecificSubscriptionType");
    nondisplay("addSubscriptionTypeSS");
    nondisplay("dataSubscriptionType");
    nondisplay("addSubscriptionType");
    nondisplay("addmachinesdata");
    nondisplay("EmpVacation");
    $('#empdata').empty();
    showEmp();
  }
  function fun1() {
    nondisplay("set1");
    nondisplay("set2");
    display("con");
    nondisplay("dataemp");
    nondisplay("dataVacationType");
    nondisplay("addVacationT");
    nondisplay("addVacationP");
    nondisplay("dataSpecificSubscriptionType");
    nondisplay("addSubscriptionTypeSS");
    nondisplay("dataSubscriptionType");
    nondisplay("addSubscriptionType");
    nondisplay("addmachinesdata");
    nondisplay("EmpVacation");
  }
  function fun3() {
    nondisplay("set1");
    nondisplay("set2");
    display("dataVacationType");
    display("addVacationT");
    nondisplay("addVacationP");
    nondisplay("dataemp");
    nondisplay("con");
    nondisplay("dataSpecificSubscriptionType");
    nondisplay("addSubscriptionTypeSS");
    nondisplay("dataSubscriptionType");
    nondisplay("addSubscriptionType");
    nondisplay("addmachinesdata");
    nondisplay("EmpVacation");
    // display("addVacationP");
    showVaction();
  }

  function fun4() {
    $('#form-vacation').toggle("slide");
  }
  function fun5() {
    $('#form-vacationemp').toggle("slide");
  }
  function fun8() {
    $('#form-SubscriptionType').toggle("slide");
  }
  function fun9() {
    $('#form-SubscriptionTypeSS').toggle("slide");
  }

  function fun6() {
    nondisplay("set1");
    nondisplay("set2");
    display("dataSubscriptionType");
    display("addSubscriptionType");
    nondisplay("dataSpecificSubscriptionType");
    nondisplay("addSubscriptionTypeSS");
    nondisplay("dataVacationType");
    nondisplay("addVacationT");
    nondisplay("addVacationP");
    nondisplay("dataemp");
    nondisplay("addmachinesdata");
    nondisplay("con");
    nondisplay("EmpVacation");
    showSubscriptionType()
  }

  function fun7() {
    nondisplay("set1");
    nondisplay("set2");
    nondisplay("dataSubscriptionType");
    nondisplay("addSubscriptionType");
    display("dataSpecificSubscriptionType");
    display("addSubscriptionTypeSS");
    nondisplay("dataVacationType");
    nondisplay("addVacationT");
    nondisplay("addVacationP");
    nondisplay("dataemp");
    nondisplay("addmachinesdata");
    nondisplay("con");
    nondisplay("EmpVacation");
    showSpecificSubscriptionType();
  }

  function fun10() {
    nondisplay("set1");
    nondisplay("set2");
    nondisplay("dataSubscriptionType");
    nondisplay("addSubscriptionType");
    nondisplay("dataSpecificSubscriptionType");
    nondisplay("addSubscriptionTypeSS");
    nondisplay("dataVacationType");
    nondisplay("addVacationT");
    nondisplay("addVacationP");
    nondisplay("dataemp");
    nondisplay("EmpVacation");
    nondisplay("con");
    display("datamachines");
    display("addmachinesdata");
    showdatamachines();
  }

  function display(id) {
    var d = document.getElementById(id);
    d.classList.remove('hidden');
  }
  function nondisplay(id) {
    var d = document.getElementById(id);
    d.className += " hidden";
  }

  function showdatamachines() {
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    console.log("token : " + token);
    console.log("id : " + id);
    console.log("name : " + user_name);
    var temp = "";
    $('#machinesdata').empty();
    var mytable =$('#machinestable').dataTable();
    mytable.destroy();
    $.ajax({
      method: "get",
      url: "http://"+ host+"/getmachines",
      data: {
        id: id,
        token: token,
        user_name: user_name
      },
      success: function (data) {
        console.log(data);
        console.log(data.data.length);
        for (let index = 0; index < data.data.length; index++) {
          temp += '<tr>'
            + '<td>' + data.data[index].name + '</td>'
            + '<td>' + data.data[index].price + '</td>'
            + '<td>' + data.data[index].date + '</td>'
            + '<td>' + '<button class="btn btn-danger" onClick="delmachines(\'' + data.data[index].id + '\')">' + 'حذف' + '</button>' + '</td>'
          temp += '</tr>';
        }
        console.log("temp : : ");
        console.log(temp);
        $('#machinesdata').append(temp);
        $('#machinestable').dataTable({
          "pageLength": 3
        });

      },
      error: function (error) {
        alert("error");
      }
    });
  }

  function delmachines(idm) {
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    var id_new = idm;
    console
    $.ajax({
      method: "post",
      url: "http://"+ host+"/deletemachine",
      data: {
        id: id,
        token: token,
        user_name: user_name,
        id_new: idm
      },
      success: function (data) {
        console.log(data);
        swal('تمت العملية بنجاح', '', 'success');
      },
      error: function (error) {
        swal('فشل العملية ', '', 'info');
      }
    });
    $('#vacationempdata').empty();
    var mytable =$('#machinestable').dataTable();
    mytable.destroy();
    showdatamachines();
  }


  function grtstatic(type, year, option) {
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    // var type = 'allyear';
    // var year = '2019';
    var arr = [];
    $.ajax({
      method: "get",
      url: "http://"+ host+"/getstatistics",
      data: {
        id: id,
        token: token,
        user_name: user_name,
        type: type,
        year: year
      },
      success: function (data) {
        //console.log(data.data.repairs);
        if (option == 1){
          for (let i in data.data.all) {
            console.log("Allll");
            console.log(data.data.all[i]);
            arr[i] = data.data.all[i];
          }
          arr.shift();
          console.log(arr);
          getchart(arr);
        }
        if (option == 2){
          for (let i in data.data.repairs) {
            console.log("RRRRRRR");
            console.log(data.data.repairs[i]);
            arr[i] = data.data.repairs[i];
          }
          arr.shift();
        console.log(arr);
        getchart(arr);
        }
        if (option == 3){
          for (let i in data.data.randompayments) {
            console.log("RAAAAAAAAA");
            console.log(data.data.randompayments[i]);
            arr[i] = data.data.randompayments[i];
          }
          arr.shift();
        console.log(arr);
        getchart(arr);
        }
        if (option == 4){
          for (let i in data.data.income) {
            console.log("iiiiiiiiiiiii");
            console.log(data.data.income[i]);
            arr[i] = data.data.income[i];
          }
          arr.shift();
          console.log(arr);
          getchart(arr);
        }

      },
      error: function (error) {
      }
    });
  }

  function getchart(arr) {
    // const context = ctx.getContext('2d');
    // context.clearRect(0, 0, ctx.width, ctx.height);
    // ctx.clearRect(0, 0, ctx.width, ctx.height);
    $('#myAreaChart').remove(); // this is my <canvas> element
    $('#areaChart').append('<canvas id="myAreaChart"style="height: 249px;"></canvas>');
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx);
    myLineChart.destroy();
    myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["ك1", "شباط", "اذار", "نيسان", "ايار", "حزيران", "تموز", "اب", "ايلول", "ت1", "ت2", "ك2"],
        datasets: [{
          // label: "Earnings",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: arr
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function (value, index, values) {
                return '$' + number_format(value);
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function (tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
            }
          }
        }
      }
    });
  }

  function getnumberplyerstatistics() {
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    $.ajax({
      method: "get",
      url: "http://"+ host+"/getnumberplyerstatistics",
      data: {
        id: id,
        token: token,
        user_name: user_name,
      },
      success: function (data) {
        console.log(data);
        var x = data.data[0].subscriptions_count;
        var y = data.data[0].players_count;
        console.log("ibr : " + x + "::: " + y);
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ["Crruent Plyers", "All Players"],
            datasets: [{
              data: [x, y],
              backgroundColor: ['#4e73df', '#1cc88a'],
              hoverBackgroundColor: ['#2e59d9', '#17a673'],
              hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
            },
            legend: {
              display: false
            },
            cutoutPercentage: 80,
          },
        });

      },
      error: function (error) {
        swal('opps .. Error', '', 'info');
      }
    });
  }


  function showEmp() {
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    console.log("token : " + token);
    console.log("id : " + id);
    console.log("name : " + user_name);
    $('#empdata').empty();
    var temp = "";
    var all;
    var myTable = $('#example').DataTable();
    myTable.destroy();
    $.ajax({
      method: "get",
      url: "http://"+ host+"/showEmployee",
      data: {
        id: id,
        token: token,
        user_name: user_name
      },
      success: function (data) {
        console.log(data);
        console.log(data.data.length);
        all = data.data.length;
        var active = 'active';
        var noactive = 'nonactive'
        for (let index = 0; index < data.data.length; index++) {
          temp += '<tr>'
            + '<td>' + data.data[index].last_name + '</td>'
            + '<td>' + data.data[index].first_name + '</td>'
            + '<td>' + data.data[index].type + '</td>'
            + '<td>' + data.data[index].shift + '</td>'
            + '<td>' + data.data[index].phone_number + '</td>'
            + '<td>' + data.data[index].salary + '</td>'
            + '<td>' +'<div class="btn-group btn-toggle" id="sta-group">';
          if (data.data[index].state === "active") {
            temp += '<button id = "b1" class="btn btn-primary active" onClick="setactive(\'' + data.data[index].id + '\'' + ',' + ' \'' + active + '\')">نشط</button>'
                 + '<button id ="b2" class="btn btn-default" onClick="setnonactive(\'' + data.data[index].id + '\'' + ',' + ' \'' + noactive + '\')">غير نشط</button>';
            // temp += '<button class="btn btn-danger" onClick="setnonactive(\'' + data.data[index].id + '\'' + ',' + ' \'' + noactive + '\')">' + 'OFF ' + '</button>' + '</td>';
          }
          else {
            temp += '<button id = "b1" class="btn btn-default" onClick="setactive(\'' + data.data[index].id + '\'' + ',' + ' \'' + active + '\')">نشط</button>'
                 + '<button id ="b2" class="btn btn-primary active" onClick="setnonactive(\'' + data.data[index].id + '\'' + ',' + ' \'' + noactive + '\')">غير نشط</button>';
            // temp += '<td>' + '<button class="btn btn-primary" onClick="setactive(\'' + data.data[index].id + '\'' + ',' + ' \'' + active + '\')">' + 'ON ' + '</button>' + '</td>';
          }
          temp += '</div>' + '</td>';
          temp += '<td colspan="5">' + '<button class="btn btn-primary" onClick="showVacationEmp(\'' + data.data[index].id + '\')">' + 'عرض' + '</button>' + '</td>';
          temp += '</tr>';
        }
        console.log("temp : : ");
        console.log(temp);
        $('#empdata').append(temp);
        // $('#example').DataTable();
        $('#example').DataTable( {
          responsive: true,
          pageLength: 5,
          lengthMenu: [1,3,5],

      } );
      },
      error: function (error) {
        alert("error");
      }
    });
    $('#pie-chart').remove(); // this is my <canvas> element
    $('#chartp').append('<canvas id="pie-chart" style="width: 288px; display: block; height: 224px;"></canvas>');
    var ctx = document.getElementById("pie-chart");
    $.ajax({
      method: "get",
      url: "http://"+ host+"/getcountEmp",
      data: {
        id: id,
        token: token,
        user_name: user_name,
      },
      success: function (data) {
        console.log(data);
        var activenum = data.data[0].active_count;
        var nonactivenum = data.data[0].nonactive_count;
        console.log("state ::: " + activenum + "   :: " + nonactivenum);
        new Chart(document.getElementById("pie-chart"), {
          type: 'pie',
          data: {
            labels: ["Active", "NonActive"],
            datasets: [{
              label: "Population (millions)",
              backgroundColor: ["#3e95cd", "#1cc88a"],
              data: [activenum,nonactivenum]
            }]
          },
      });
      },
      error: function (error) {
      }
    });
    $('#numberemployee1').empty();
    $('#salary_count1').empty();
    $.ajax({
      method: "get",
      url: "http://"+ host+"/getnumberemployee",
      data: {
          id: id,
          token: token,
          user_name: user_name,
      },
      success: function (data) {
          console.log(data);
          temp = data.data[0].employee_count + ' موظفين';
          $('#numberemployee1').append(temp);
          temp = '$ '+data.data[0].salary_count;
          $('#salary_count1').append(temp);
      },
      error: function (error) {
          swal('opps .. Error', '', 'info');
      }
  });
  }


  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function (n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }



  function setnonactive(idemp, nonactive) {
    // var d1 = document.getElementById("b1");
    // var d2 = document.getElementById("b2");

    // if(d1.classList.contains("active")){
    //   d1.classList.remove("active");
    // }
    // if(d1.classList.contains("btn-primary")){
    //   d1.classList.remove("btn-primary");
    //   d1.classList.add("btn-default");
    // }
    // if(d1.classList.contains("btn-default")){
    //   d1.classList.remove("btn-default");
    //   d1.classList.add("btn-primary");
    // }
    // if(d2.classList.contains("active")){
    //   d2.classList.remove("active");
    // }
    // if(d2.classList.contains("btn-primary")){
    //   d2.classList.remove("btn-primary");
    //   d2.classList.add("btn-default");
    // }
    // if(d2.classList.contains("btn-default")){
    //   d2.classList.remove("btn-default");
    //   d2.classList.add("btn-primary");
    // }
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    var iddelemp = idemp;
    var state = nonactive;
    $.ajax({
      method: "post",
      url: "http://"+ host+"/setStateEmployee",
      data: {
        id: id,
        token: token,
        user_name: user_name,
        iddelemp: iddelemp,
        state: state
      },
      success: function (data) {
        console.log(data);
      },
      error: function (error) {
      }
    });
    var myTable = $('#example').DataTable();
    myTable.destroy();
    showEmp();
  }

  function setactive(idemp, active) {
    console.log("Active ::::::");
    // var d1 = document.getElementById("b1");
    // var d2 = document.getElementById("b2");

    // if(d1.classList.contains("active")){
    //   d1.classList.remove("active");
    // }
    // if(d1.classList.contains("btn-primary")){
    //   d1.classList.remove("btn-primary");
    //   d1.classList.add("btn-default");
    // }
    // if(d1.classList.contains("btn-default")){
    //   d1.classList.remove("btn-default");
    //   d1.classList.add("btn-primary");
    // }
    // if(d2.classList.contains("active")){
    //   d2.classList.remove("active");
    // }
    // if(d2.classList.contains("btn-primary")){
    //   d2.classList.remove("btn-primary");
    //   d2.classList.add("btn-default");
    // }
    // if(d2.classList.contains("btn-default")){
    //   d2.classList.remove("btn-default");
    //   d2.classList.add("btn-primary");
    // }
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    var iddelemp = idemp;
    var state = active;
    $.ajax({
      method: "post",
      url: "http://"+ host+"/setStateEmployee",
      data: {
        id: id,
        token: token,
        user_name: user_name,
        iddelemp: iddelemp,
        state: state
      },
      success: function (data) {
        console.log(data);
      },
      error: function (error) {
      }
    });
    var myTable = $('#example').DataTable();
    myTable.destroy();
    showEmp();
  }
  let empid;
  function showVacationEmp(idemp) {
    nondisplay("dataVacationType");
    nondisplay("addVacationT");
    nondisplay("dataemp");
    nondisplay("con");
    nondisplay("dataSpecificSubscriptionType");
    nondisplay("dataSubscriptionType");
    nondisplay("addSubscriptionType");
    nondisplay("addSubscriptionTypeSS");
    display("EmpVacation");
    display("addVacationP");
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    console.log("token : " + token);
    console.log("id : " + id);
    console.log("name : " + user_name);
    var id_employee = idemp;
    empid = id_employee;
    var temp = "";
    $('#vacationempdata').empty();
   var table =  $('#dataempvacation').dataTable();
       table.destroy();
    $.ajax({
      method: "get",
      url: "http://"+ host+"/showEmployeesVacation",
      data: {
        id: id,
        token: token,
        user_name: user_name,
        id_employee: id_employee
      },
      success: function (data) {
        console.log(data);
        console.log(data.data.length);
        for (let index = 0; index < data.data.length; index++) {
          temp += '<tr>'
            + '<td>' + data.data[index].description + '</td>'
            + '<td>' + data.data[index].start_date + '</td>'
            + '<td>' + data.data[index].period + '</td>'
            + '<td>' + '<button class="btn btn-danger" onClick="delVacationEmp(\'' + data.data[index].id_employee + '\'' + ',' + ' \'' + data.data[index].id_vacation_type + '\')">' + 'حذف' + '</button>' + '</td>'
            + '</tr>';
        }
        console.log("temp : : ");
        console.log(temp);
        $('#vacationempdata').append(temp);
        $('#dataempvacation').dataTable({
          "pageLength": 2,
          "lengthMenu": [1, 2,],
        });
      },
      error: function (error) {
        alert("error");
      }
    });
  }
  $('#addVacationemp').click(function () {
    var id = sessionStorage.getItem('id');
    var token = sessionStorage.getItem('token');
    var id_vacation_type = $('#id_vacationt_type').val();
    var start_date = $('#start_date').val();
    var id_employee = empid;
    var user_name = sessionStorage.getItem('user_name');
    console.log("idemployee : " + id_employee);
    var myTable = $('#dataempvacation').DataTable();
    myTable.destroy();
    $.ajax({
      method: "post",
      url: "http://"+ host+"/insertEmployeesVacation",
      data: {
        user_name: user_name,
        id: id,
        token: token,
        id_employee: id_employee,
        id_vacation_type: id_vacation_type,
        start_date: start_date
      },

      success: function (data) {
        console.log(data);
        swal('تمت العملية بنجاح', '', 'success');
        showVacationEmp(id_employee);
      },
      error: function (error) {
      }
    });
  });

  function delVacationEmp(idemp, idvacation) {
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    var id_employee = idemp;
    var id_vacationt_ype = idvacation;
    var myTable = $('#dataempvacation').DataTable();
    myTable.destroy();
    $.ajax({
      method: "post",
      url: "http://"+ host+"/deleteEmployeesVacation",
      data: {
        id: id,
        token: token,
        user_name: user_name,
        id_employee: id_employee,
        id_vacationt_ype: id_vacationt_ype
      },
      success: function (data) {
        console.log(data);
        swal('تمت العملية بنجاح', '', 'success');
        $('#vacationempdata').empty();
        showVacationEmp(id_employee);
      },
      error: function (error) {
        swal('opps .. Error', '', 'info');
      }
    });
  }


  function showVaction() {
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    console.log("token : " + token);
    console.log("id : " + id);
    console.log("name : " + user_name);
    var temp = "";
    // $("#vacdata").remove();
    // temp +='<table  id="vacdata"class="table table-striped table-bordered" style="width:100%">'
    //      +'<thead>'
    //      +'<tr>'
    //      +'<th>ID</th>'
    //      +'<th>description</th>'
    //      +'<th>period</th>'
    //      +'<th>Action</th>'
    //      +'</tr>'
    //      +'</thead>'
    //      +'<tbody id="vacationdata">'
    //      +'</tbody>'
    //      +'</table>';
    // $("#vacdata").append(temp);

    $('#vacationdata').empty();
    // var table = $('.table').DataTable();
    //     table.destroy();
    $.ajax({
      method: "get",
      url: "http://"+ host+"/showVacationType",
      data: {
        id: id,
        token: token,
        user_name: user_name
      },

      success: function (data) {
        console.log(data);
        console.log(data.data.length);
        for (let index = 0; index < data.data.length; index++) {
          temp += '<tr>'
            + '<td>' + data.data[index].id + '</td>'
            + '<td>' + data.data[index].description + '</td>'
            + '<td>' + data.data[index].period + '</td>'
            + '<td>' + '<button class="btn btn-danger" onClick="delVacationtype(\'' + data.data[index].id + '\')">' + 'حذف' + '</button>' + '</td>'
            + '</tr>';
        }
        console.log("temp : : ");
        console.log(temp);
        $('#vacationdata').append(temp);
        $('#tablevac1').dataTable({
          retrieve: true,
          // paging: false,
          pageLength: 2,
          lengthMenu: [1, 2]
        });
      },
      error: function (error) {
        alert("error");
      }
    });
  }

  function delVacationtype(idVacation) {
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    var myTable = $('#tablevac1').DataTable();
    myTable.destroy();
    $.ajax({
      method: "post",
      url: "http://"+ host+"/deleteVacationType",
      data: {
        id: id,
        token: token,
        user_name: user_name,
        idv: idVacation
      },
      success: function (data) {
        console.log(data);
        swal('تمت العملية بنجاح', '', 'success');
        $('#vacationdata').empty();
        showVaction();
      },
      error: function (error) {
        swal('opps .. Error', '', 'info');
      }
    });
  }


  function showSubscriptionType() {
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    console.log("token : " + token);
    console.log("id : " + id);
    console.log("name : " + user_name);

    var temp = "";
    $('#SubscriptionTypedata').empty();
    var mytable = $('#Subscriptiontable').dataTable();
    mytable.destroy();
    $.ajax({
      method: "get",
      url: "http://"+ host+"/showSubscriptionType",
      data: {
        id: id,
        token: token,
        user_name: user_name
      },

      success: function (data) {
        console.log(data);
        console.log(data.data.length);
        for (let index = 0; index < data.data.length; index++) {
          temp += '<tr>'
            + '<td>' + data.data[index].duration + '</td>'
            + '<td>' + data.data[index].price + '</td>'
            + '<td>' + data.data[index].description + '</td>'
            + '<td>' + '<button class="btn btn-danger" onClick="delSubscriptionType(\'' + data.data[index].id + '\')">' + 'حذف' + '</button>' + '</td>'
            + '</tr>';
        }
        console.log("temp : : ");
        console.log(temp);
        $('#SubscriptionTypedata').append(temp);
        $('#Subscriptiontable').dataTable({
          "pageLength": 2,
          "lengthMenu": [1, 2,],
        });
      },
      error: function (error) {
        alert("error");
      }
    });
  }
  function delSubscriptionType(idsub) {
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    var mytable = $('#Subscriptiontable').dataTable();
    mytable.destroy();
    $.ajax({
      method: "post",
      url: "http://"+ host+"/deleteSubscriptionType",
      data: {
        id: id,
        token: token,
        user_name: user_name,
        idsub: idsub
      },
      success: function (data) {
        console.log(data);
        swal('تمت العملية بنجاح', '', 'success');
        showSubscriptionType();
      },
      error: function (error) {
        swal('opps .. Error', '', 'info');
      }
    });
  }
  function showSpecificSubscriptionType() {
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    console.log("token : " + token);
    console.log("id : " + id);
    console.log("name : " + user_name);

    var temp = "";
    $('#SpecificSubscriptionTypedata').empty();
    var mytable = $('#SpecificSubscriptiontable').dataTable();
    mytable.destroy();
    $.ajax({
      method: "get",
      url: "http://"+ host+"/showSpecificSubscriptionType",
      data: {
        id: id,
        token: token,
        user_name: user_name
      },

      success: function (data) {
        console.log(data);
        console.log(data.data.length);
        for (let index = 0; index < data.data.length; index++) {
          temp += '<tr>'
            + '<td>' + data.data[index].name + '</td>'
            + '<td>' + data.data[index].price + '</td>'
            + '<td>' + data.data[index].duration + '</td>'
            + '<td>' + '<button class="btn btn-danger" onClick="delSpecificSubscriptionType(\'' + data.data[index].id + '\')">' + 'حذف' + '</button>' + '</td>'
            + '</tr>';
        }
        console.log("temp : : ");
        console.log(temp);
        $('#SpecificSubscriptionTypedata').append(temp);
        $('#SpecificSubscriptiontable').dataTable({
          "pageLength": 2,
          "lengthMenu": [1, 2,],
        });
      },
      error: function (error) {
        alert("error");
      }
    });
  }

  function delSpecificSubscriptionType(idssub) {
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    $('#SpecificSubscriptionTypedata').empty();
    var mytable = $('#SpecificSubscriptiontable').dataTable();
    $.ajax({
      method: "post",
      url: "http://"+ host+"/deleteSpecificSubscriptionType",
      data: {
        id: id,
        token: token,
        user_name: user_name,
        idssub: idssub
      },
      success: function (data) {
        console.log(data);
        swal('تمت العملية بنجاح', '', 'success');
        showSpecificSubscriptionType();
      },
      error: function (error) {
        swal('opps .. Error', '', 'info');
      }
    });
  }
  function addEmp() {

  }

  function showstatistics() {
    var token = sessionStorage.getItem('token');
    var id = sessionStorage.getItem('id');
    var user_name = sessionStorage.getItem('user_name');
    var temp;
    $('#numberemployee').empty();
    $('#salary_count').empty();
    $('#count_sub').empty();
    $('#price_sub').empty();
    $('#count_rep').empty();
    $('#price_rep').empty();
    $.ajax({
      method: "get",
      url: "http://"+ host+"/getnumberemployee",
      data: {
          id: id,
          token: token,
          user_name: user_name,
      },
      success: function (data) {
          console.log(data);
          temp = data.data[0].employee_count + ' موظفين';
          $('#numberemployee').append(temp);
          temp = '$ '+data.data[0].salary_count;
          $('#salary_count').append(temp);
      },
      error: function (error) {
          swal('opps .. Error', '', 'info');
      }
  });
  var y = '2019';
  $.ajax({
    method: "get",
    url: "http://"+ host+"/getcountsub",
    data: {
        id: id,
        token: token,
        user_name: user_name,
        year : y
    },
    success: function (data) {
        console.log(data);
        temp = data.data[0].count + ' اشتراك';
        $('#count_sub').append(temp);
        temp = '$ '+data.data[0].expense;
        $('#price_sub').append(temp);
    },
    error: function (error) {
        console.log(error);
        swal('opps .. Error', '', 'info');
    }
  });
  $.ajax({
    method: "get",
    url: "http://"+ host+"/getcountRepair",
    data: {
        id: id,
        token: token,
        user_name: user_name,
    },
    success: function (data) {
        console.log(data);
        temp = data.data[0].count + ' اصلاح';
        $('#count_rep').append(temp);
        temp = '$ '+data.data[0].expense;
        $('#price_rep').append(temp);
    },
    error: function (error) {
        console.log(error);
        swal('opps .. Error', '', 'info');
    }
  });
  getnumberplyerstatistics();
  }

  function clearchart(){
    var ctx = document.getElementById("myAreaChart");
    const context = ctx.getContext('2d');
    context.clearRect(0, 0, ctx.width, ctx.height);
  }
