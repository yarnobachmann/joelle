@extends('master')

@section('style')
  <link rel="stylesheet" href="/css/gallery-view.css">
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12 center-row">
      <h1>Albums</h1>
    </div>
  </div>

<div class="row">
  <div class="col-md-12 center-row">
    <div id="test-list">
      <ul class="list">
        @foreach ($galleries as $gallery)
          @foreach ($gallery->images as $image)
            @if ($loop->first)
            <li>
            <a href="{{url('photos/' . $gallery->id)}}">

              <img src="{{ url('/gallery/images/thumbs/' . $image->file_name) }}" onerror="this.src = '../img/placehold/noimage.png';"/>

              <p>{{$gallery->name}}</p>
            </a>
          </li>
           @endif
         @endforeach
        @endforeach
      </ul>
      <ul class="col-md-12 pagination"></ul>
    </div>
  </div>
</div>

@section('code')
    <script type="text/javascript" src="/js/paginatealbum.js"></script>
@endsection

@endsection
