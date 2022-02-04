@extends('Template.master')

@section('styles')

<style>
.wrapper {
    /* padding: 1rem; */
    position: relative;
    min-height: 100vh;
    /* background-color: orange; */
    text-align: center;
    background-image: url('/assets/mobile-bg.png');
    background-position: bottom;
    background-size: contain;
    background-repeat: no-repeat;

}

.wrapper .logo {
    padding-top: 1rem;
}
.wrapper .header-title h1 {
    font-size: 1.4rem;
    font-weight: bold;
    padding-top: 1rem;
    transition: .5s ease;


}

.wrapper .header-title p{
    font-size: 1rem;
    transition: .5s ease;
    color: rgba(0,0,0,0.5);
}

.wrapper .header-title {
    max-width: 900px;
    margin: 0 auto;
    padding-bottom: 2rem;
    padding-left: 5px;
    padding-right: 5px;
}

.wrapper .header-title span {
    font-style: italic; /* Change font*/
}

.wrapper .position-btn {
    position: absolute;
    width: 100%;
    bottom: 7%;
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
    background: url('https://via.placeholder.com/100');
    background-position: left;
    background-repeat: no-repeat;
    left: 0;
    width: 100%;
    text-align: center;
}

.copyright {
    color:  color: rgba(0,0,0,0.25);;
}

@media (min-width: 768px){

    .wrapper {
        background-image: url('/assets/home-bg.png');
        background-position: bottom;
        background-size: cover;
        background-repeat: no-repeat;

    }

    .wrapper .header-title h1 {
        font-size: 2.4rem;
    }

    .wrapper .header-title {
        margin-top: 10%;
        padding-bottom: 0;
    }

    .wrapper .header-title p{
        font-size: 1.2rem;
    }


    .wrapper .position-btn {

        margin: 0 auto;
        position: relative;
        width: 200px;
        padding: 0;
    }

    .copyright {
        display: none;
    }

}
</style>



@endsection

@section('content')


<div class="wrapper is_home">
    <div class="logo">
        <img src="/assets/ehp-logo.png" alt="Logo">
    </div>

    <div class="header-title wow fadeInUp">
        <h1>There are more than 100 developments in Dubai. <br> Our experienced team had chosen the best development for you.</h1>
        <p class="mt-5">Pass the short survey. The best options are awaiting you.</p>
    </div>


    <div class="position-btn wow fadeInUp">
        <a href="/quiz/1/info" class="btn btn-outline-dark btn-quiz">Start Test</a>
    </div>
</div>

@endsection
