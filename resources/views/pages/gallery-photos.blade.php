@extends('master')

@section('style')
  <link rel="stylesheet" href="/css/gallery-view.css">
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12 center-row">
      <h1>{{$gallery->name}}</h1>
    </div>
  </div>

<div class="row">
  <div class="col-md-12 center-row">
    <div id="test-list">
      <ul class="list">
        @foreach ($gallery->images as $image)
          <li>
            <a href="{{ url($image->file_path) }}" data-lightbox="mygallery" class="name">
              <img src="{{ url('/gallery/images/thumbs/' . $image->file_name) }}">
            </a>
          </li>
        @endforeach
      </ul>
      <ul class="col-md-12 pagination"></ul>
    </div>
  </div>
</div>

@section('code')
    <script type="text/javascript" src="/js/paginate.js"></script>
@endsection

@endsection
