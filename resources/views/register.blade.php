<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .register {
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            margin-top: 3%;
            padding: 3%;
        }

        .register-left {
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }

        .register-left input {
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-right {
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }

        .register-left img {
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        .register-left p {
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }

        .register .register-form {
            padding: 10%;
            margin-top: 10%;
        }

        .btnRegister {
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }

        .register .nav-tabs {
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }

        .register .nav-tabs .nav-link {
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .register .nav-tabs .nav-link:hover {
            border: none;
        }

        .register .nav-tabs .nav-link.active {
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }

        .register-heading {
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }

    </style>
</head>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p>You are 30 seconds away from earning your own money!</p>
                <input type="submit" name="" value="Login" /><br />
            </div>
            <div class="col-md-9 register-right">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Registration</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name"
                                            placeholder="First Name *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="mail" placeholder="Your Email *"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password *" value="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="last_name"
                                            placeholder="Last Name *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" name="txtEmpPhone"
                                            class="form-control" name="phone" placeholder="Your Phone *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password_confirmation"
                                            placeholder="Confirm Password *" value="" />
                                    </div>
                                </div>
                                <div class="m-auto">
                                    <input type="submit" class="btnRegister w-100 px-3 py-1" value="Register" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</body>

</html>
