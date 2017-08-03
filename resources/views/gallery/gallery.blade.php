@extends('master')

@section('style')
  <link rel="stylesheet" href="/css/gallery-view.css">
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
        <h1>Mijn Albums</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8" id="test-list">
        @if ($galleries->count() > 0)
          <table class="table table-striped table-bordered table-responsive">
              <thead>
                <tr class="info">
                  <th>Naam van de album <span class="pull-right">fotos</span></th>
                  <th>Actie</th>
                </tr>
              </thead>

              <tbody  class="list">
                @foreach ($galleries as $gallery)
                <tr class="name">
                  <td>{{$gallery->name}} <span class="pull-right">{{ $gallery->images()->count() }}</span></td>
                  <td><a href="{{url('gallery/delete/' . $gallery->id)}}" class="btn btn-danger pull-right">verwijder</a><a href="{{url('gallery/view/' . $gallery->id)}}" class="btn btn-success pull-right">bekijk</a></td>
                </tr>
                @endforeach
              </tbody>
          </table>
        @endif
      <ul class="col-md-12 pagination"></ul>
    </div>

    <div class="col-md-4">
        @if (count($errors) > 0)
          <div class="alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form class="form" action="{{url('gallery/save')}}" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
            <input type="text" name="gallery_name" id="gallery_name" placeholder="Album naam" value="{{ old('gallery_name') }}" class="form-control">
          </div>

          <button class="btn btn-primary">voeg toe</button>
        </form>
    </div>
  </div>
  @section('code')
      <script type="text/javascript" src="/js/paginatelijst.js"></script>
  @endsection
@endsection
