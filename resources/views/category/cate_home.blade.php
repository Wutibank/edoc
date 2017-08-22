@extends('layouts.main') @section('content')
<br>

  <div class="col-lg-offset-4 col-lg-4">
    <p style="text-align:center;"> Category Management</p>
    <form action="{{route('category.cate_home')}}" enctype="multipart/form-data" method="post">
      {{csrf_field()}}
      <label for="namecate">ชื่อหมวดหมู่</label> 
      <input type="text" name="name_cate" id="namecate">
      <br> 
     <label for="color_cate">รหัสสี</label>
      <input type="text" name="color_cate" id="colorcate">
      <br> 
      <label for="txareadetail">รายละเอียด</label>
     <textarea class="form-control" id="txareadetail" name="detail_cate" rows="3"></textarea>
      <br> 
    
      <br>
      <input type="submit" value="Submit" class="btn btn-primary">

    </form>
  </div>


@endsection