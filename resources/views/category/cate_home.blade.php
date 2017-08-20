<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
    crossorigin="anonymous">

</head>

<body><br>
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


  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
    crossorigin="anonymous"></script>
</body>

</html>