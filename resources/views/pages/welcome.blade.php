@extends('main')

@section('css')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@endsection

@section('content')

<div id="head" class="stage">

    <div class="stage-caption">

        <a draggable="false" href="{{ url("login") }}"><img draggable="false" src="img/profile/joelle.jpg" alt="Joëlle" id="joëlle" width="50%"></a>
        <h1 class="display-3"><span class="intro">Ik ben </span> <span id="naam" class="intro" data-delay="1800">Joëlle</span></h1>

        <hr>



        <p>mijn naam Joëlle en ik maak fotos.</p>
        <div id="login_wrapper">
        <a draggable="false" href="{{ url("albums") }}">Ga naar mijn foto's...</a>

        </div>

        <hr>

    </div>

</div>
@section('code')

@endsection

@endsection
