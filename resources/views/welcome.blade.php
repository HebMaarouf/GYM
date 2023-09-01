<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="js/publicVar.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/dumbbell.png">
  <title>KeepFit</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/style.css">
  <link rel ="stylesheet" href = "css/login.css">
  <link rel="stylesheet" href="css/animate.min.css">

</head>

<body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Sign in to continue</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img class="model-img-top img-sm" src="images/logo.png" alt="" />
            <form class="form-signin">
              <input id="user_name" type="text" class="form-control mb-2" placeholder="User Name" required autofocus>
              <input id="password" type="password" class="form-control mb-2" placeholder="Password" required>
            <div class="row text-center">
              <button type="button" id="login" class="col-sm-6 md-3 btn btn-lg btn-primary btn-block" >Sign in</button>
                <button type="button" class=" col-sm-6 md-3 btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <!-- <a href="#" class="float-right">Need help?</a> -->
            </form>
             <!-- <a href="#" class="card-link">Read More</a> -->
      </div>
    </div>
  </div>
</div>

  <!--NAVIGATION-->
  <!--<nav id="myNavbar" class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-default navbar-inverse fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">

        <img  src="images/logo.png" width="150" height="70" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto navbar-right">
          <li class="nav-item active"><a class="nav-link" href="#header">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#services">services</a></li>
          <li class="nav-item "><a class="nav-link" href="#pricing">About</a></li>
          <li class="nav-item "><a onclick="document.getElementById('id01').style.display='block'" class="nav-link" href="#">contact</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#exampleModal" >Login</a></li>
        </ul>
      </div>
    </div>
  </nav>-->
  <!--- End Navigation ---->

  <!-- testing -->
<!--navbar-->
<nav id="myNavbar" class="navbar navbar-expand-lg navbar-light fixed-top" style="height:65px">
  <a class="navbar-brand inherit"  href="#">
    <span class="inherit"><img  src="images/logo.png" class="inherit"></span>
    <!--<img  src="images/logo.png" width="150" height="70" alt="">-->
  </a>
  <button class="navbar-toggler" style="background:white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto navbar-right">
      <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="#services">services</a></li>
      <li class="nav-item "><a class="nav-link" href="#pricing">About</a></li>
      <li class="nav-item "><a onclick="document.getElementById('id01').style.display='block'" class="nav-link" href="#contact">contact</a></li>
      <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#exampleModal" >Login</a></li>
    </ul>
  </div>

</nav>
	  <!--- end navbar ---->
  <!--- Header ---->
  <div class="bd-example">


    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>


      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/img1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="images/img2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="images/img3.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
          </div>
        </div>
        <div class="carousel-item">
            <img src="images/img11.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
          </div>
      </div>

      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

  </div>


    <!-- services -->
  <div id="services" class="services">
    <div class="container">
        <h2 class="wow fadeInUp">services</h2>
        <p class="wow fadeInUp" data-wow-delay="0.4"> </p>
        <div class="row">
            <div class="col-sm-6 col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="2s">
                <img src="images/img5.png" class="rounded-circle" alt="........">
                <h4>Mangement</h4>
                <b>Mangement All Gym</b>
                <p>         </p>
                <button class="btn btn-success">Read More</button>
            </div>
            <div class="col-sm-6 col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="1.6s">
                <img src="images/img4.jpg" class="rounded-circle" alt="">
                <h4>Reception</h4>
                <b>reception system for gym</b>
                <p>         </p>
                <button class="btn btn-success">Read More</button>
            </div>
            <div class="col-sm-6 col-lg-3 col-md-3 wow fadeInLeft" data-wow-delay="1.2s">
                <img src="images/img6.jpg" class="rounded-circle" alt="">
                <h4>couch</h4>
                <b>couch gym </b>
                <p>         </p>
                <button class="btn btn-success">Read More</button>
            </div>
            <div class="col-sm-6 col-lg-3 col-md-3  wow fadeInLeft" 0.8>
                <img src="images/img7.jpg" class="rounded-circle" alt="">
                <h4>Player</h4>
                <b>Player Gym</b>
                <p>         </p>
                <button class="btn btn-success">Read More</button>
            </div>
        </div>
    </div>
</div>
<!---- end services ---->
  <div id="pricing" class="pricing">
    <div class="latest-post">
      <div class="container">
        <h2 class="text-center wow fadeInUp">About Gym Clubs</h2>
        <p class="text-center wow fadeInUp">Bodybuilding is the use of progressive resistance exercise to control and develop
          one's musculature for aesthetic purposes.An individual who engages in this activity is referred to
          as a bodybuilder. In professional bodybuilding, bodybuilders appear in lineups and perform specified
          poses (and later individual posing routines) for a panel of judges who rank the competitors based on
          criteria such as symmetry, muscularity, and conditioning. Bodybuilders prepare for competitions through
          the elimination of nonessential body fat, enhanced at the last stage by a combination of intentional
          dehydration and carbohydrate loading, to achieve maximum muscular definition and vascularity, as well as
          tanning to accentuate the contrast of the skin under the spotlights. Bodybuilders may use anabolic
          steroids and other performance-enhancing drugs to build muscles.</p>
          <button class="btn btn-primary text-center wow fadeInUp" id="read-gym"> My Gyms</button>

          <section class="carousel slide" data-ride="carousel" id="postsCarousel" data-interval="false">
           <div class="container">
               <div class="row">
                <div class="col-12 text-right mb-4">
                    <a class="btn btn-outline-secondary prev" href="" title="go back"><i class="fa fa-lg fa-chevron-left"></i></a>
                    <a class="btn btn-outline-secondary next" href="" title="more"><i class="fa fa-lg fa-chevron-right"></i></a>
                </div>
               </div>
           </div>
               <div class="container p-t-0 m-t-2 carousel-inner" id="Gym-info">


               </div>
          </section>
        <!-- <button class="btn btn-primary text-center wow fadeInUp" id="read-gym"> My Gyms</button> -->
      </div>
    </div>

  </div>

    <div id="contact" class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <h4 class="wow fadeInUp">Contact Us</h4>
                    <p><i class="fa fa-home" aria-hidden="true"></i>Damascus Syria</p>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> keepfit@keepfit.com</p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> +963 965 4562 15</p>
                    <p><i class="fa fa-globe" aria-hidden="true"></i> www.facebook.com/keepfit</p>
                </div>
               <!-- <div class="col-lg-4 col-md-4">
                    <h4>About</h4>
                    <p><i class="fa fa-square-o" aria-hidden="true"></i> About Us</p>
                    <p><i class="fa fa-square-o" aria-hidden="true"></i> Privacy</p>
                    <p><i class="fa fa-square-o" aria-hidden="true"></i> Term & Condition</p>
                </div>
              -->
                <div class="col-lg-4 col-md-4">
                    <h4>KeepFit</h4>
                    <a class="social fa fa-facebook" aria-hidden="true"></a>
                    <a class="social fa fa-twitter" aria-hidden="true"></a>
                    <a class="social fa fa-pinterest" aria-hidden="true"></a>
                    <a class="social fa fa-youtube" aria-hidden="true"></a>
                    <br>
                </div>
                <div class="col-lg-4 col-md-4">
                  <a class="navbar-brand inherit"  href="#">
                    <span class="inherit"><img  src="images/logo.png" class="inherit"></span>
                  </a>
              </div>
            </div>
        </div>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
      <script>
         /* $(window).scroll(function () {
            if ($(this).scrollTop() > 280) / {
              $('.navbar-default').addClass('navbar-default1');
            } else {
              $('.navbar-default').removeClass('navbar-default1');
            }
          });*/
          $(window).scroll(function () {
            if ($(this).scrollTop() > 600)  /*height in pixels when the navbar becomes navbar-default1*/ {
              $('.navbar-default').addClass('navbar-default1');
              $('.navbar-default').addClass('navbar-default1');
              $('.navbar').addClass('navbar-dark');
              $('.navbar').addClass('bg-dark');
            } else {
              $('.navbar').removeClass('navbar-dark');
              $('.navbar').removeClass('bg-dark');
              $('.navbar-default').removeClass('navbar-default1');
            }
          });
        </script>

  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="css/Admin/main.js"></script>
  <script>
   (function($){
	   "use strict";
	   $('.next').click(function(){ $('.carousel').carousel('next');return false; });
	   $('.prev').click(function(){ $('.carousel').carousel('prev');return false; });
   })
   (jQuery);
</script>

<script>
   //login section
   $('#login').click(function(){
            var user_name=$('#user_name').val();
            var password=$('#password').val();
            $.ajax({
                method:"post",
                url: "http://"+ host+"/login",
                data:{
                    user_name:user_name,
                    password:password
                },
                success: function (data) {
                    console.log(data);
                    //save the vital info
                    if(data.header=="success"){
                    sessionStorage.setItem("id",data.id);
                    sessionStorage.setItem("token",data.token);
                    sessionStorage.setItem("user_name",data.user_name);
                    //change the page
                     window.location.href="http://"+ host+"/homepage"+"?user_name="+data.user_name+"&token="+data.token+"&page="+data.page;
                    }
                },
                error:function(error){
                    alert("error");
                }
              });
        });
   // let datax = sessionStorage.getItem('token');
    // console.log("token :" + datax);
</script>


   <script>
   var temp = '';
   $(document).ready(function () {
      $.get("{{ URL::to('/readGym') }}",function(date){

        $("#read-gym").attr("disabled", true);
        console.log(date.info.length);
        $('#Gym-info').empty();
         for (let index = 0; index < date.info.length; index = index + 3) {
            if(index == 0 )
              temp += '<div class="row row-equal carousel-item active m-t-0">'
                        + '<div class="col-md-4">'
                        +    '<div class="card " >'
                        +      '<img class="card-img-top" src="images/club1.jpg" alt="" />'
                        +         '<div class="card-body">'
                        +             '<h4 class="card-title">'+date.info[index].name+'</h4>'
                        +             '<div class="card-subtitle mb-2 text-muted text-center">'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star"></span>'
                        +             '</div>'
                        +              '<ul class="list-group list-group-flush">'
                        +                '<li class="list-group-item"><span class="fa fa-location-arrow"> Location : </span> Damascus</li>'
                        +                '<li class="list-group-item"><span class="fa fa-envelope"> Email : </span> email@gmail.com</li>'
                        +                '<li class="list-group-item"><span class="fa fa-phone"> Phone : </span> 0919192939</li>'
                        +             '</ul>'
                        +             '<iframe src="https://maps.google.com/maps?q=Damascus&t=&z=13&ie=UTF8&iwloc=&output=embed"'
                        +            'frameborder="0" style="border:0" width=100% allowfullscreen></iframe>'
                        +             '<a href="#" class="card-link">Read More</a>'
                        +          '</div>'
                        +     '</div>'
                        +  '</div>'

                        if(index+1 < date.length){
                          temp += '<div class="col-md-4">'
                        +    '<div class="card " >'
                        +      '<img class="card-img-top" src="images/club1.jpg" alt="" />'
                        +         '<div class="card-body">'
                        +             '<h4 class="card-title">'+date.info[index+1].name+'</h4>'
                        +             '<div class="card-subtitle mb-2 text-muted text-center">'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star"></span>'
                        +             '</div>'
                        +              '<ul class="list-group list-group-flush">'
                        +                '<li class="list-group-item"><span class="fa fa-location-arrow"> Location : </span> Damascus</li>'
                        +                '<li class="list-group-item"><span class="fa fa-envelope"> Email : </span> email@gmail.com</li>'
                        +                '<li class="list-group-item"><span class="fa fa-phone"> Phone : </span> 0919192939</li>'
                        +             '</ul>'
                        +             '<iframe src="https://maps.google.com/maps?q=Damascus&t=&z=13&ie=UTF8&iwloc=&output=embed"'
                        +            'frameborder="0" style="border:0" width=100% allowfullscreen></iframe>'
                        +             '<a href="#" class="card-link">Read More</a>'
                        +          '</div>'
                        +     '</div>'
                        +  '</div>'
                        }
                        if(index +2 < date.length){
                          temp +='<div class="col-md-4">'
                        +    '<div class="card " >'
                        +      '<img class="card-img-top" src="images/club1.jpg" alt="" />'
                        +         '<div class="card-body">'
                        +             '<h4 class="card-title">'+date.info[index+2].name+'</h4>'
                        +             '<div class="card-subtitle mb-2 text-muted text-center">'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star"></span>'
                        +             '</div>'
                        +              '<ul class="list-group list-group-flush">'
                        +                '<li class="list-group-item"><span class="fa fa-location-arrow"> Location : </span> Damascus</li>'
                        +                '<li class="list-group-item"><span class="fa fa-envelope"> Email : </span> email@gmail.com</li>'
                        +                '<li class="list-group-item"><span class="fa fa-phone"> Phone : </span> 0919192939</li>'
                        +             '</ul>'
                        +             '<iframe src="https://maps.google.com/maps?q=Damascus&t=&z=13&ie=UTF8&iwloc=&output=embed"'
                        +            'frameborder="0" style="border:0" width=100% allowfullscreen></iframe>'
                        +             '<a href="#" class="card-link">Read More</a>'
                        +          '</div>'
                        +     '</div>'
                        +  '</div>'
                        +'</div>'

            }else{
              temp += '<div class="row row-equal carousel-item m-t-0">'
                        + '<div class="col-md-4">'
                        +    '<div class="card " >'
                        +      '<img class="card-img-top" src="images/club1.jpg" alt="" />'
                        +         '<div class="card-body">'
                        +             '<h4 class="card-title">'+date.info[index].name+'</h4>'
                        +             '<div class="card-subtitle mb-2 text-muted text-center">'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star"></span>'
                        +             '</div>'
                        +              '<ul class="list-group list-group-flush">'
                        +                '<li class="list-group-item"><span class="fa fa-location-arrow"> Location : </span> Damascus</li>'
                        +                '<li class="list-group-item"><span class="fa fa-envelope"> Email : </span> email@gmail.com</li>'
                        +                '<li class="list-group-item"><span class="fa fa-phone"> Phone : </span> 0919192939</li>'
                        +             '</ul>'
                        +             '<iframe src="https://maps.google.com/maps?q=Damascus&t=&z=13&ie=UTF8&iwloc=&output=embed"'
                        +            'frameborder="0" style="border:0" width=100% allowfullscreen></iframe>'
                        +             '<a href="#" class="card-link">Read More</a>'
                        +          '</div>'
                        +     '</div>'
                        +  '</div>'

                        if(index+1 < date.length){
                          temp += '<div class="col-md-4">'
                        +    '<div class="card " >'
                        +      '<img class="card-img-top" src="images/club1.jpg" alt="" />'
                        +         '<div class="card-body">'
                        +             '<h4 class="card-title">'+date.info[index+1].name+'</h4>'
                        +             '<div class="card-subtitle mb-2 text-muted text-center">'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star"></span>'
                        +             '</div>'
                        +              '<ul class="list-group list-group-flush">'
                        +                '<li class="list-group-item"><span class="fa fa-location-arrow"> Location : </span> Damascus</li>'
                        +                '<li class="list-group-item"><span class="fa fa-envelope"> Email : </span> email@gmail.com</li>'
                        +                '<li class="list-group-item"><span class="fa fa-phone"> Phone : </span> 0919192939</li>'
                        +             '</ul>'
                        +             '<iframe src="https://maps.google.com/maps?q=Damascus&t=&z=13&ie=UTF8&iwloc=&output=embed"'
                        +            'frameborder="0" style="border:0" width=100% allowfullscreen></iframe>'
                        +             '<a href="#" class="card-link">Read More</a>'
                        +          '</div>'
                        +     '</div>'
                        +  '</div>'
                        }
                        if(index +2 < date.length){
                          temp +='<div class="col-md-4">'
                        +    '<div class="card " >'
                        +      '<img class="card-img-top" src="images/club1.jpg" alt="" />'
                        +         '<div class="card-body">'
                        +             '<h4 class="card-title">'+date.info[index+2].name+'</h4>'
                        +             '<div class="card-subtitle mb-2 text-muted text-center">'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star checked"></span>'
                        +                  '<span class="fa fa-star"></span>'
                        +             '</div>'
                        +              '<ul class="list-group list-group-flush">'
                        +                '<li class="list-group-item"><span class="fa fa-location-arrow"> Location : </span> Damascus</li>'
                        +                '<li class="list-group-item"><span class="fa fa-envelope"> Email : </span> email@gmail.com</li>'
                        +                '<li class="list-group-item"><span class="fa fa-phone"> Phone : </span> 0919192939</li>'
                        +             '</ul>'
                        +             '<iframe src="https://maps.google.com/maps?q=Damascus&t=&z=13&ie=UTF8&iwloc=&output=embed"'
                        +            'frameborder="0" style="border:0" width=100% allowfullscreen></iframe>'
                        +             '<a href="#" class="card-link">Read More</a>'
                        +          '</div>'
                        +     '</div>'
                        +  '</div>'
                        +'</div>'
                        }
            }
         }
         console.log(temp);
        $('#Gym-info').append(temp);

      });
    });
  </script>

</body>

</html>
