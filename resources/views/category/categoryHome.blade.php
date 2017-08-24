@extends('layouts.main') 
@section('content')
<br>

<div class="hero-body">
<div class="container">
  <div class="columns">
    <div class="column">
     
    
     
      <a class="button is-outlined" href="/category">Category Upload</a>
      <a class="button is-outlined" href="/category/show">Category Show</a>
      <a class="button is-outlined" href="/category/edit">Category Edit</a>
    
      @yield('menu')
      
        <h1 class="title">Category Management  - Add</h1>
        <form action="{{route('category.categoryHome')}}" enctype="multipart/form-data" method="post">
          {{csrf_field()}}

          <div class="field has-addons-centered">
            <label class="label">ชื่อหมวดแฟ้ม</label>
            <div class="control">
              <input class="input" type="text" name="name_cate" placeholder="Name input">
            </div>
          </div>

          <div class="field has-addons-centered">
            <label class="label">สีประจำหมวด</label>
            <div class="control">

              <div class="select">
                <select name="color_cate">
              <option value="fff">Select color</option>
              <option value="F44336" style="color:#F44336;">Red</option>
              <option value="9C27B0" style="color:#9C27B0;">Purple</option>
              <option value="3F51B5" style="color:#3F51B5;">Indigo</option>
              <option value="2196F3" style="color:#2196F3;">Blue</option>
              <option value="4CAF50" style="color:#4CAF50;">Green</option>
              <option value="FFEB3B" style="color:#FFEB3B;">Yellow</option>
              <option value="607D8B" style="color:#607D8B;">Grey</option>
              </select>
              </div>
              
            </div>
          </div>

          <div class="field">
  <label class="label">คำอธิบาย</label>
  <div class="control">
    <textarea class="textarea" placeholder="Textarea" id="txareadetail" name="detail_cate" ></textarea>
  </div>
</div>

<div class="field is-grouped is-grouped-centered">
  <p class="control">
  <input type="submit" class="button is-primary" value="Submit">
    
  </p>
  <p class="control">
    <a class="button is-light">
      Cancel
    </a>
  </p>
</div>


        </form>
      </div>
    </div>
  </div>

  <div class="columns">
    <div class="column">
      <div class="container">

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