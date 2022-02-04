@extends('Template.master')

@section('styles')
<link rel="stylesheet" href="/css/intlTelInput.min.css">
    <style>
        .pie_progress {
            width: 200px;
        }

        .result {
            display: none;
            min-height: 80vh;
            padding: 2rem 1rem;
            /* position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%; */
        }

        .btn-restart i {
            transition: transform .7s ease-in-out;
        }

        .btn-restart:hover i{
            transform: rotate(-360deg);
        }
        .wrapper {
            text-align: center;
        }

        .preloader {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
        .modal-content {
            border-radius: 30px;
            border: 0;
        }
        .modal-body {
            text-align: center;
        }
        .modal-form {
            border-radius: 30px;
            padding: 1rem;
            text-align: center;
            margin-bottom: 1rem;
        }

        .custom-btn {
            position: absolute;
            left: 50%;
            top: 0;
            transform: translate(-50%, -75px);
            border: 1px solid #ccc;
            border-radius: 50%;
            padding: 1rem;
        }

        .form-modal-download {
            display: none;
        }

        .result-img {
            width: 100%;
        }

        .iti {
            width: 100%;
        }
        @media screen and (min-width: 768px){
            .pie_progress {
                width: 300px;
            }

            .result {
            display: none;
            min-height: auto;
            padding: 2rem 1rem;

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
        }

        .result-img {
            width: calc(100%/3)
        }
        }
    </style>
@endsection

@section('content')
    <div class="wrapper">
        <div class="logo">
            <img src="/assets/ehp-logo.png" alt="Logo">
        </div>
        <div class="preloader wow fadeIn p-3 my-5">
            <h2>Fine! Already looking for options</h2>
            <P>In the meantime, we are looking for, did you know that in June 2021, more than 570,000 m² of housing was launched in Moscow</P>

            <div class="d-flex justify-content-center">
                <div class="pie_progress" role="progressbar" data-goal="100" aria-valuemin="0" aria-valuemax="100">
                    <span class="pie_progress__number">0%</span>
                  </div>
            </div>
        </div>
        <div class="result wow fadeIn p-3" style="max-width: 960px; margin: 0 auto;">

            @if ($status == 'found')
                <div class="match_found">
                    <h2>Found {{ rand(50, 150)}} complexes that are suitable for you.</h2>
                    <p>Here are some of them. Download the detailed catalog in PDF format</p>

                    <div class="row  my-5">

                        @foreach ($q as $item)
                            <div class="col-md-4 mb-4">
                                <img src="/thumbnail/{{$item['image']}}" class="w-100 rounded shadow" alt="">
                                <h4>{{ $item['name'] }}</h4>
                            </div>
                        @endforeach
                    </div>

                </div>
            @endif

            @if($status == 'not found')
                <div class="match_not_found">
                    <h2>Sorry, we cannot find a matching result to you interests.</h2>
                    <p>Instead, we provide all the list that you might get interested in.</p>
                </div>
            @endif

            <div class="row text-center">
                <div class="col-md-6 mb-4" style="text-align: right">


                    <button type="button" class="btn btn-quiz" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Download
                      </button>
                </div>
                <div class="col-md-6 mb-4" style="text-align: left">
                    <a href="/quiz/1/" class="btn btn-skip btn-restart"><i class="fas fa-undo-alt"></i> Start Over</a>
                </div>
            </div>


        </div>

    </div>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <button type="button" class="btn-close custom-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <h2>Download Catalog</h2>
                <div class="form-modal-info">

                    <p>All residential complexes that the system has selected according to your parameters are in one directory</p>
                        <form id="leadForm" action="/sendmail" class="needs-validation">
                            @csrf

                            <input type="hidden" name="budget" value="{{ \Session::get('budget') }}">
                            <input type="hidden" name="areas" value="<?php
                            $areas = \Session::get('areas');
                            if(null !== $areas){
                                foreach($areas as $k){
                                echo $k . ' | ';
                            }
                            } ?>">
                            <input type="hidden" name="purpose" value="{{ \Session::get('purpose') }}">
                            <input type="hidden" name="completion" value="{{ \Session::get('completion') }}">
                    <div class="form-group">
                        <input type="text" id="name" class="form-control modal-form" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" id="phone" class="form-control modal-form" name="phone" placeholder="+971501234234" required>
                        <label for=""> <span id="error-msg" class="hide"></span></label>

                    </div>
                    <div class="form-group">
                        <input type="email" id="email" class="form-control modal-form" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="leadBtn" class="btn btn-quiz">Download</button>
                    </div>
                    </form>
                </div>
                <div class="form-modal-download wow fadeIn">
                    <a href="{{ URL::to('/generate-pdf') }}" target="_blank" class="btn btn-quiz"><i class="fas fa-file-download"></i> Download Catalog</a>
                </div>
            </div>
            <p class="text-center p-2">By filling out the form you consent to the processing of personal data</p>
          </div>
        </div>
      </div>
@endsection

@section('scripts')
<script src="/js/intlTelInput.min.js"></script>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});




var input = document.querySelector("#phone"),
  errorMsg = document.querySelector("#error-msg"),
  validMsg = document.querySelector("#valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// initialise plugin
var iti = window.intlTelInput(input, {
    nationalMode: true,
  hiddenInput: "full_phone",
  initialCountry: "ae",
  geoIpLookup: function(callback) {
    $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : "ae";
      callback(countryCode);
    });
  },
  utilsScript: "/js/utils.js?1638200991544"
});

var reset = function() {
  input.classList.remove("error");
  errorMsg.innerHTML = "";
  errorMsg.classList.add("hide");
//   validMsg.classList.add("hide");
};

// on blur: validate
input.addEventListener('blur', function() {
  reset();
  if (input.value.trim()) {
    if (iti.isValidNumber()) {
    //   validMsg.classList.remove("hide");
    } else {
      input.classList.add("error");
      var errorCode = iti.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      errorMsg.classList.remove("hide");
    }
  }
});

// on keyup / change flag: reset
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);
</script>

<script type="text/javascript">
    jQuery(function($) {
      $('.pie_progress').asPieProgress({
        namespace: 'pie_progress',
        easing: 'linead',
        barcolor: '#caa437',
        goal: 100,
        speed: 100
      });
      // Example with grater loading time - loads longer
      $('.pie_progress--slow').asPieProgress({
        namespace: 'pie_progress',
        goal: 100,
        min: 0,
        speed: 10,
        max: 100,
        easing: 'linear'
      });
      // Example with grater loading time - loads longer
      $('.pie_progress--countdown').asPieProgress({
        namespace: 'pie_progress',
        easing: 'linear',
        first: 120,
        max: 120,
        goal: 0,
        speed: 1200, // 120 s * 1000 ms per s / 100
        numberCallback: function(n) {
          var minutes = Math.floor(this.now / 60);
          var seconds = this.now % 60;
          if (seconds < 10) {
            seconds = '0' + seconds;
          }
          return minutes + ': ' + seconds;
        }
      });

      $('document').ready( function() {
        $('.pie_progress').asPieProgress('start');


      });
      $('#button_finish').on('click', function() {
        $('.pie_progress').asPieProgress('finish');
      });
      $('#button_go').on('click', function() {
        $('.pie_progress').asPieProgress('go', 50);
      });
      $('#button_go_percentage').on('click', function() {
        $('.pie_progress').asPieProgress('go', '50%');
      });
      $('#button_stop').on('click', function() {
        $('.pie_progress').asPieProgress('stop');
      });
      $('#button_reset').on('click', function() {
        $('.pie_progress').asPieProgress('reset');
      });

    });
  </script>

  <script>
      const myTimeout = setTimeout(myGreeting, 10000);

        function myGreeting() {
        $('.preloader').css('display', 'none').delay(500);
        $('.result').css('display', 'block').delay(600);
        }
  </script>


{{-- <script>
    (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        event.preventDefault();
        form.classList.add('was-validated')
      }, false)
    })
})()
</script> --}}

<script>
    $('#leadForm').on('submit', function(e){
        e.preventDefault();

        if($('#name').val() == ""){
            e.preventDefault();
            e.stopPropagation()
        }
        if($('#phone').val() == ""){
            e.preventDefault();
            e.stopPropagation()
        }
        if($('#email').val() == ""){
            e.preventDefault();
            e.stopPropagation()
        }
        var data = $(this).serialize();
        console.log(data);

        $('#leadBtn').html('Processing...');
        $.ajax({
            url: '/sendmail',
            data: data,
            type: 'post',
            success: function (response) {
                $(this).removeClass('was-validated');
                $('.form-modal-info').css('display', 'none').delay(300);
                $('.form-modal-download').css('display', 'block').delay(300);


            },
            statusCode: {
                404: function () {
                    alert('web not found');
                }
            },
            error: function (x, xs, xt) {
                $('#msgResponse').addClass('alert-danger');
                $('#msgResponse').html(
                        'Something went wrong. Please try again later.')
                    .delay(5000).fadeOut('slow');;
                }
        });
    })
</script>
@endsection
