@extends('Template.master')


@section('styles')

<style>
    .wrapper {
        /* padding: 1rem; */
        position: relative;
        min-height: 100vh;
        /* background-color: orange; */
        text-align: center;
        /* background-image: url('/assets/mobile-bg.png'); */
        background-position: bottom;
        background-size: contain;
        background-repeat: no-repeat;
        -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            transition: all 1s ease;
    }

    .wrapper .logo {
        padding-top: 1rem;
    }
    .wrapper .header-title h1 {
        font-size: 2.4rem;
        font-weight: bold;
        padding-top: 1rem;
        transition: .5s ease;


    }

    .wrapper .header-title p{
        font-size: 1.5rem;
        transition: .5s ease;
    }

    .wrapper .header-title {
        max-width: 900px;
        margin: 0 auto;
        padding-bottom: 2rem;
    }

    .wrapper .header-title span {
        font-style: italic; /* Change font*/
    }

    .wrapper .position-btn {
        position: absolute;
        width: 100%;
        bottom: 2rem;
        text-align: center;
        font-size: 1.2rem;
        color: #3f3f3f;
        padding: 1rem;
        transition: .5s ease;
    }

    .wrapper .mobile-bg {
        position: absolute;
        bottom: 0;
        height: 400px;
        background-color: green;
        /* background: url('https://via.placeholder.com/100'); */
        background-position: left;
        background-repeat: no-repeat;
        left: 0;
        width: 100%;
        text-align: center;
    }

    .btn-outline-quiz {
            /* background-color: #caa437; */
            /* border: transparent; */
            padding: 1rem;
            border: 1px solid #caa437;;
            border-radius: 30px;
            width: 100%;
            color: #caa437;
            font-size: 1.3rem;
            transition: all .3s ease;
        }

        .btn-outline-quiz:hover {

            background-color: #b59331;
            border: transparent;
            color: white;
        }
        .name-header {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .name-subheader {
            font-size: 1rem;
        }
        .name.skip, .name-header, .name-subheader {
            height: auto;
            -webkit-transition: all .5s ease;
            -moz-transition: all .5s ease;
            transition: all .5s ease;
            opacity: 1;
        }

        .hide {
            height: 0 !important;
            opacity: 0;
        }


        .content {
            padding: 2rem;
        }
        input:focus{
            outline: none !important;
        }
        button, input {
            overflow: visible;
            outline: 0;
        }

        .name-input {
            padding: 1rem;
            text-align: center;
            font-weight: bold;
            border: none;
            border-radius: 0;
            outline: none;
            appearance: none;
            -webkit-appearance: none;
            font-size: 1.3rem;
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            transition: all 1s ease;
        }

        .custom-radio {
            position: relative;

        }

        .mb-4 {
            margin-bottom: 1rem !important;
        }

        .custom-radio label {
            cursor: pointer;
        }

        /* input[type="checkbox"] {
            position: absolute;
            left: 0;
            padding: 5px;
            width: 1.15em;
            height: 1.15em;
        } */



        input[type="radio"], input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            /* display: none */
        }

        input[type="radio"] + label {
            border: 1px solid rgba(0,0,0,0.25);
            width: 100%;
            border-radius: 30px;
            padding: .6rem;
            color: rgba(0,0,0,0.25);
            font-size: 1.3rem;
        }

        input[type="radio"]:checked + label {
            color: white;
            background-color: #caa337a2;
            border: 1px solid transparent;
        }


        input[type="checkbox"] + label {
            border: 1px solid rgba(0,0,0,0.25);
            width: 100%;
            border-radius: 30px;
            padding: .5rem;
            /* color: rgba(0,0,0,0.25); */
            color: rgba(0,0,0,0.25);
            font-size: 1.3rem;
            /* background-color: #caa337a2; */
        }

        input[type="checkbox"] + label img {
            display: none;
            border-radius: 30px;
        }

        input[type="checkbox"]+label:before {

            content: url("/assets/un-check.png");
        position: absolute;
        top: 8px;
        right: 10px;
        /* transform: translateY(-50%); */

        transition: transform .5s ease-in-out;
        opacity: .4;
        transform: scale(.8);
        }

        input[type="checkbox"]:checked+label:before {
        content: url("/assets/check.png");
        position: absolute;
        top: -10px;
        right: -10px;
        /* transform: translateX(-100%); */
        transform: scale(.4);
        opacity: 1;

}
        input[type="checkbox"]:checked + label {
            color: white;
            background-color: #caa337a2;
            border: 1px solid transparent;

        }

        .copyright {
            color:  color: rgba(0,0,0,0.25);;
        }
    @media (min-width: 768px){
        .wrapper {
            /* background-image: url('/assets/home-bg.png'); */
            background-position: bottom;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .content {

            max-width: 768px;
            margin: 0 auto;
        }
        .wrapper .header-title h1 {
            font-size: 2.7rem;
        }

        .wrapper .header-title p{
            font-size: 1.7rem;
        }

        .name-input {
            font-size: 2rem;
        }
        .wrapper .position-btn {

            margin: 0 auto;
            position: relative;
            /* width: 200px; */
        }

        .name-header {
            margin-top: 30%;
        }

        .copyright {
            display: none;
        }
        input[type="checkbox"] + label {
            padding: 5px;
        }
        input[type="checkbox"] + label img {
            display: block;
            border-radius: 30px;
        }
    }
    </style>
@endsection


@section('content')

<div class="wrapper">
    <div class="logo">
        <img src="/assets/ehp-logo.png" alt="Logo">
    </div>
    @if($step == 'info')
    <form action="/quiz/{{$qid}}/budget" autocomplete="off">
    <div class="content wow fadeInUp">
        <h2 class="name-header" >Welcome to Quiz Builder</h2>
        <h4 class="name-subheader"><em> May I know your name, please?</em></h4>
        <div  class="p-4">

                @csrf
                <div class="mt-4 mb-4">
                    <input id="name" type="text" class="form-control name-input" value="{{Session::get('name')}}" name="name"
                        placeholder="Enter Your Name">
                </div>


        </div>
    </div>
    <div class="position-btn wow fadeInUp">
        <div style="margin-bottom: 5rem;">
            <div class="row">
                <div class="col-md-6" style="text-align: right">
                    <button type="submit" id="nameBtn" class="btn btn-quiz mb-4 disabled">Continue</button>
                </div>
                <div class="col-md-6" style="text-align: left">
                    <button type="submit" class="btn btn-skip name-skip">Skip</button>
                </div>
            </div>


        </div>
        {{-- <p class="copyright">Дать обратную связь</p> --}}
    </div>
    </form>
    @elseif ($step == 'budget')
    <div class="p-4 wow fadeInUp">
        <h2 class="mb-5" style="margin-top: 10%">Let's get started. What is your estimated budget?</h2>
        <div >
            <form action="/quiz/{{$qid}}/purpose">
                @csrf

                <div class="row">

                    @foreach ($options as $budget)
                    <div class="col-12 col-md-4">
                    <div class="custom-radio mb-4">
                        <input type="{{ $input }}" name="budget" class="radio-budget" value="{{ $budget }}" />
                        <label>{{ $budget }}</label>
                    </div>
                </div>
                    @endforeach

                </div>

                <div class="row mt-2">
                    <div class="col-md-6 mb-3" style="text-align: right">
                        <button id="btnBudget" type="submit" class="btn btn-quiz disabled" >Continue</button>
                    </div>
                    <div class="col-md-6 mb-3" style="text-align: left">
                        <button type="submit" class="btn btn-skip">Skip</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    @elseif ($step == 'purpose')
    <div  class="p-4 wow fadeInUp">
        <h2 class="mb-5" style="margin-top: 10%">What is your prime purpose of purchase?</h2>
        <div >
            <form action="/quiz/{{$qid}}/areas">
                @csrf

                <div class="row mb-4">

                    @foreach ($options as $budget)
                    <div class="col-12 col-md-6">

                        <div class="custom-radio mb-4">
                            <input type="{{ $input }}" name="purpose" class="radio-purpose" value="{{ $budget }}" />
                            <label>{{ $budget }}</label>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <button id="btnPurpose" type="submit" class="btn btn-quiz disabled">Continue</button>
                    </div>
                    <div class="col-md-6 mb-4">
                        <button type="submit" class="btn btn-skip">Skip</button>
                    </div>
                </div>


            </form>
        </div>
    </div>

    @elseif ($step == 'areas')
    <div  class="p-4 wow fadeInUp">
        <h2 class="mb-5" style="margin-top: 10%">What area would you like most in Dubai?</h2>
        <div>
            <form action="/quiz/{{$qid}}/completion">
                @csrf

                <div class="row">

                    @foreach ($options as $budget)
                    <?php $img = getImage($budget);
                    foreach ($img as $pic) {
                        $litrato = $pic['image'];
                    }
                    ?>
                    <div class="col-12 col-md-4">
                        <div class="custom-radio mb-4">

                            <input type="{{ $input }}" name="areas[]" class="radio-areas" value="{{ $budget }}" />
                            <label>
                                <img src="/uploads/{{$litrato }}" class="w-100 " alt="{{ $budget }}">
                                {{ $budget }}
                            </label>
                        </div>
                    </div>
                    @endforeach

                </div>


                <div class="row mt-2">
                    <div class="col-md-6 mb-3" style="text-align: right">
                        <button id="btnArea" type="submit" class="btn btn-quiz " disabled>Continue</button>
                    </div>
                    <div class="col-md-6 mb-4" style="text-align: left">
                        <button type="submit" class="btn btn-skip">Skip</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @elseif ($step == 'completion')
    <div class="p-4 wow fadeInUp">
        <h2 class="mb-5 " style="margin-top: 10%">When would you like to move in?</h2>
        <div>
            <form action="/quiz/{{$qid}}/result">
                @csrf

                <div class="row mb-4">
                    @foreach ($options as $budget)
                    <div class="col-12 col-md-4">
                        <div class="custom-radio mb-4">
                            <input type="{{ $input }}" name="completion" class="radio-completion" value="{{ $budget }}" />
                            <label>{{ $budget }}</label>
                        </div>
                    </div>
                    @endforeach

                </div>


                <div class="row mt-5">
                    <div class="col-md-6 mb-3"  style="text-align: right">
                        <button id="btnCompletion" type="submit" class="btn btn-quiz disabled">Continue</button>
                    </div>
                    <div class="col-md-6 mb-4" style="text-align: left">
                        <button type="submit" class="btn btn-skip">Skip</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @endif
</div>

@endsection


@section('scripts')
    <script>
        $(document).ready(function(){


            if($('#name').val() !== ''){
                $('#nameBtn').removeClass('disabled');
                // $('.content h2').css('display', 'block');
                // $('.position-btn').css('bottom', '2rem');
                // $('.name-skip').css('display', 'block');
            }

            $("#name").on('keypress. keyup', function(){
                let x =  $('#name').val().length;
                if(x > 0){
                    $('#nameBtn').removeClass('disabled');
                }else{
                    $('#nameBtn').addClass('disabled');
                }
            });


            $('.radio-budget').on('click', function(){
                console.log('tset');
                $('#btnBudget').removeClass('disabled');

            });

            $('.radio-purpose').on('click', function(){
                console.log('tset');
                $('#btnPurpose').removeClass('disabled');

            });

            $('.radio-areas').on('click', function(){
                console.log('tset');
                $('#btnArea').removeClass('disabled');
            });

            $('.radio-areas').change(function() {
                if(this.checked){
                    console.log('tet');
                }
                if ($('.radio-areas:checked').length) {
                    $('#btnArea').removeAttr('disabled');
                    console.log('okey');
                } else {
                    $('#btnArea').attr('disabled', 'disabled');
                    console.log('notok');
                }
            });

            $('.radio-completion').on('click', function(){
                console.log('tset');
                $('#btnCompletion').removeClass('disabled');

            });

            if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
            // true for mobile device
            //   document.write("mobile device");
                console.log('mobile');
                // $('.name-input').focus(function(){
                //             $('.content h2').css('display', 'none');
                //             $('.position-btn').css('bottom', '0');
                //             $('.name-skip').css('display', 'none');
                //         });

                //         $('.name-input').focusout(function(){
                //             $('.content h2').css('display', 'block');
                //             $('.position-btn').css('bottom', '2rem');
                //             $('.name-skip').css('display', 'block');
                //         });
                        $('.name-input').focus(function(){
                            $('.name-header').addClass('hide');
                            $('.name-subheader').addClass('hide');
                            $('.position-btn').css('bottom', '-10px');
                            $('.name-skip').addClass('hide');
                        });

                        $('.name-input').focusout(function(){
                            $('.name-header').removeClass('hide');
                            $('.name-subheader').removeClass('hide');
                            $('.position-btn').css('bottom', '2rem');
                            $('.name-skip').removeClass('hide');
                        });
            }else{
                        // $('.name-input').focus(function(){
                        //     $('.content h2').addClass('hide');
                        //     $('.position-btn').css('bottom', '0');
                        //     $('.name-skip').addClass('hide');
                        // });

                        // $('.name-input').focusout(function(){
                        //     $('.content h2').removeClass('hide');
                        //     $('.position-btn').css('bottom', '2rem');
                        //     $('.name-skip').removeClass('hide');
                        // });
            }


        });



    </script>
@endsection
