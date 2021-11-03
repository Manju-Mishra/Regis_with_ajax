<?php
error_reporting(0);
include("database.php");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        label {
            color: indigo;
            font-weight: bold;
            font-size: 20px
        }

        #ref {
            color: darkslateblue;
            font-weight: lighter;
        }
    </style>
</head>

<body style="background-color:darkslategray"><br><br>
    <div class="container col-6 " style="background-color:peru" id="reg"><br>
        <h2><i class=" ml-4 col-4" align="center" style="color:darkred;font-weight:bold;font-family:fantasy">&emsp;REGISTRATION PANEL</i></h2>
        <div class="alert"></div>
        <div class="success"></div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" id="email" placeholder="email@gmail.com" class="form-control col-8">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" id="name" placeholder="enter your name" class="form-control col-8">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" id="pass" placeholder="enter password" class="form-control col-8">
        </div>
        <div class="form-group row">
            <label class="col-3">Captcha</label>
            <h5 id="cap"class="col-3"></h5>
            <a href="" class="col-6"><i class="fa fa-refresh" style="font-size:25px;" id="ref"></i>
            </a>
            <input type="text" class="form-control col-8 ml-2" placeholder="enter captcha" id="captcha">
        </div>
        <input type="submit" value="REGISTER" id="sub" class="btn btn-success col-4">
        <button id="hid" class="btn btn-success">Login</button>
        <br><br>

    </div>



    <div class="container col-6 " style="background-color:peru" id="log"><br>
        <h2><i class=" ml-4 col-4" align="center" style="color:darkred;font-weight:bold;font-family:fantasy">&emsp;LOGIN PANEL</i></h2><br>
        <div class="alert1"></div>
        <div class="success1"></div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" id="email1" placeholder="email@gmail.com" class="form-control col-8">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" id="pass1" placeholder="enter password" class="form-control col-8">
        </div>
        <input type="submit" value="LOGIN" id="login" class="btn btn-secondary col-4"><br><br>

    </div>

    <script src="jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var a = parseInt(Math.random() * 10);
            var b = parseInt(Math.random() * 10);
            var c = a + b;
            var cc = a + '+' + b + '=' + '?';
            $("#cap").text(cc);
            $("#log").hide();

            $('#ref').click(function() {
                var a = parseInt(Math.random() * 10);
                var b = parseInt(Math.random() * 10);
                var c = a + b;
                var cc = a + '+' + b + '=' + '?';
                $("#cap").text(cc);
            });

            //Register
            $('#sub').click(function() {
                var email = $('#email').val();
                var name = $('#name').val();
                var pass = $('#pass').val();
                var cap = $('#captcha').val();
                console.log(email + name + pass);
                var data1 = {
                    'email': email,
                    'name': name,
                    'pass': pass,
                    'register': 'yes'
                };
                if (email != '' && name != '' && pass != '' && cap == c) {
                    $.ajax({
                        type: "post",
                        url: "ajax.php",
                        data: data1,
                        success: function(num) {
                            if (num == 1) {
                                //$(".success").html("<p class='alert alert-success'>Registered successfully</p>");
                                $("#reg").hide();
                                $("#log").show();
                            } else {
                                $(".success").html("<p class='alert alert-success'>User Already exist</p>");
                            }
                        }

                    });
                } else
                    $('.alert').html("<p class='alert alert-danger'>Fill all the fields Correctly</p>")
            })



            //Login
            $('#hid').click(function() {
                $("#log").show();
                $("#reg").hide();

            });

            $('#login').click(function() {
                var email = $('#email1').val();
                var pass = $('#pass1').val();
                var logdata = {
                    'email1': email,
                    'pass1': pass,
                    'log1': 'yes'
                };
                if (email != '' && pass != '') {
                    $.ajax({
                        type: "post",
                        url: "ajax.php",
                        data: logdata,
                        success: function(num) {
                            if (num == 1) {
                                $(".success1").html("<p class='alert alert-success'>Login successfully</p>");

                            } else if (num == 2) {
                                $(".success1").html("<p class='alert alert-success'>Email/Password not matched</p>");
                            } else {
                                $(".success1").html("<p class='alert alert-success'>Login Error</p>");
                            }
                        }

                    });
                } else
                    $('.alert1').html("<p class='alert alert-danger'>Fill all the fields Correctly</p>")

            });

        });
    </script>
</body>

</html>