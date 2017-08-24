@extends('layouts.main') @section('content')

<div class="hero-body">
<div class="container">
  <div class="columns">
    <div class="column">
     

        <h1 class="title">Category Management - Delete</h1>

        <form action="{{route('category.categoryDelete')}}" enctype="multipart/form-data" method="post">
          {{csrf_field()}}

          <div class="field has-addons-centered">
            <label class="label">ชื่อหมวดแฟ้ม</label>
            <div class="control">
              <div class="select">
                <select class="form-control form-control-sm" name="selection-cate">
                @foreach($category as $value )
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="field is-grouped is-grouped-left">
                <p class="control">
                  <input type="submit" class="button is-primary" value="Delete">
                </p>

                <p class="control">
                    <a class="button is-light"> Cancel </a>
                </p>
          </div
        </form>
      </div>
    </div>
  </div>
</div>


@endsection