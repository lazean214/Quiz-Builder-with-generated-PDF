<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QuizBuilder</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/asPieProgress.min.css">
        <link rel="stylesheet" href="/assets/css/animate.css">
    @yield('styles')
    <style>
        button:focus,
        textarea:focus,
        textarea.form-control:focus,
        input.form-control:focus,
        input[type=text]:focus,
        input[type=password]:focus,
        input[type=email]:focus,
        input[type=number]:focus,
        [type=text].form-control:focus,
        [type=password].form-control:focus,
        [type=email].form-control:focus,
        [type=tel].form-control:focus,
        [contenteditable].form-control:focus {
        box-shadow: inset 0 -1px 0 transparent;
        outline: 0;
        }

        main {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;

            width: 100%;
            padding: 15px;
        }
        .btn-skip {
            background-color: #ccc;
            border: transparent;
            padding: .7rem;
            border-radius: 30px;
            width: 100%;
            color: white;
            font-size: 1.3rem;
        }
        .btn-quiz {
            background-color: #caa437;
            border: transparent;
            padding: .7rem;
            border-radius: 30px;
            width: 100%;
            color: white;
            font-size: 1.3rem;
        }

        .btn-quiz:hover {

            background-color: #b59331;
            color: white;
        }

        .logo img {
            max-width: 200px;
        }

        @media screen and (min-width: 768px) {
            .wrapper {
                width: 900px;
                margin: 0 auto;
            }

            .is_home {
                width: 100%;
                margin: 0;
            }
            .btn-quiz {
                max-width: 300px;
                padding: 1rem;
            }

            .btn-skip {
                max-width: 300px;
                padding: 1rem;
            }
        }

        /* =============================================
        * RADIO BUTTONS
        =============================================== */

        /* .radios label {
            cursor: pointer;
            position: relative;
            margin-bottom: 2rem;
            width: 100%;
        }

        .radios label+label {
        }


        input[type="radio"] {
            opacity: 0;
            position: absolute;
        }

        input[type="radio"]+span {
            font-family: 'Material Icons';
            color: #ccc;
            border-radius: 30px;
            padding: 12px;
            transition: all 0.4s;
            -webkit-transition: all 0.4s;
            border: 1px solid #ccc;

        }

        input[type="radio"]:checked+span {
            color: #white;
            background-color: #caa337a2;
            border: 1px solid transparent;
        }

        input[type="radio"]:focus+span {
            color: #fff;
        }

        @media screen and (min-width: 768px){

            .radios label {
                margin-bottom: 5rem;
                width: auto;
            }

            .radios span {

            }
            input[type="radio"]+span {
                border: 1px solid #ccc;
                padding: 2rem 5rem;
            }
        }


        #radios {
            text-align: center;
            margin 0 auto;
        } */

        .header-bg {
            position: absolute;
            bottom: 0;
            left: 0;
            background: url('/assets/footerbg.png');
            background-size: cover;
            width: 100vw;
            height: 400px;
            background-position: center;
            opacity: .5;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            text-align: center;
            width: 100%;
            padding: .5rem;
            color: rgba(0,0,0,0.25);
            z-index: -1;
            font-size: 12px;
        }
    </style>
</head>

<body>
    @yield('content')

    <footer>
        &copy; <a href="https://neilsalazar.info" style="text-decoration: none; color: rgba(0,0,0,0.25)">Neil Salazar</a> {{ date('Y')}}. All Rights Reserved.
    </footer>
    <script src="/assets/js/wow.min.js"></script>
    <script>
        new WOW().init();
      </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
        <script type="text/javascript" src="/assets/js/jquery.js"></script>
        <script src="/assets/js/jquery-asPieProgress.min.js"></script>


           @yield('scripts')
</body>

</html>
