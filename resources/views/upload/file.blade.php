<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">

</head>

<body><br>

<div class="row">
<div class="container">
    <div class="col-lg-offset-4 col-lg-12">
        <p style="text-align:center;"> File Upload</p>
        <form action="{{route('upload.file')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <input type="file" name="file" id="">

            <br>


            <select class="form-control form-control-sm" name="selection-cate">
    @foreach($category as  $value)
     <option value="{{ $value->id }}">{{ $value->name }}</option>
    @endforeach
</select>

            <br>
            <input type="submit" value="Upload" class="btn btn-primary">

        </form>
    </div>
<div>
<p style="text-align:center;">Show File</p>
@foreach($filetoshow as  $fileshow)
     {{ $fileshow->name }}

    @endforeach



</div>
<div>
    </div>


    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
    
</body>

</html>