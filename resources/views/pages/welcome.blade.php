@extends('main')

@section('css')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@endsection

@section('content')

<div id="head" class="stage">

    <div class="stage-caption">

        <img src="https://s-media-cache-ak0.pinimg.com/originals/35/d9/e2/35d9e20c2647caa747ebacd9cb93da11.jpg" alt="Joëlle" id="joëlle" width="30%">
        <h1 class="display-3"><span class="intro">Ik ben </span> <span id="naam" class="intro" data-delay="1800">Joëlle</span></h1>

        <hr>



        <p>mijn naam Joëlle en ik maak fotos.</p>
        <div id="login_wrapper">
        <a href="#">Ga naar mijn foto's...</a>

        </div>

        <hr>

    </div>

</div>

@endsection
