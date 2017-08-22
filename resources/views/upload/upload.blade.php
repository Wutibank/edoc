@extends('layouts.main') @section('content')
<br>

<body><br>
<div class="col-lg-offset-4 col-lg-4">
<p style="text-align:center;"> File Upload</p>
<form action="/store" enctype="multipart/form-data" method="post">
{{csrf_field()}}
<input type="file" name="image" id="">
<br>
<input type="submit" value="Upload">

</form>
</div>
    
@endsection