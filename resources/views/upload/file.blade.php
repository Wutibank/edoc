@extends('layouts.main') @section('content')
<br>


<div class="hero-body">
    <div class="container">
    <a class="button is-outlined" href="/file">File Upload</a>
    <a class="button is-outlined" href="/file/show">File Show</a>
    <br>

        @if ($delisFinish == 1)
        <div class="columns">
            <div class="column">
                <div class="notification is-success">
                    <a href="/file" class="delete"></a>ระบบได้ลบไฟล์เรียบร้อยแล้ว
                </div>
            </div>
        </div>
        @endif

        

        <div class="columns">
            <div class="column">
            <br>
                <h1 class="title">File Upload</h1>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <form action="{{route('upload.file')}}" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="field">
                        <div class="file is-medium is-boxed has-name is-fullwidth">
                            <label class="file-label">
                            <input class="file-input" type="file" name="file" id="file">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fa fa-upload"></i>
                                </span>
                                <span class="file-label has-text-centered">Select file …</span>
                            </span>
                            <span class="file-name has-text-centered" id="filename"> </span>
                            </label>
                        </div>
                    </div>

                    <div class="control">
                        <div class="select">
                            <select class="form-control form-control-sm" name="selection-cate">
                            @foreach($category as  $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="column">
                        <input type="submit" value="Upload" class="button is-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<div class="hero-body">
    <div class="container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Show File</h1>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <table class="table is-fullwidth">
                    <thead>
                        <tr>
                            <th><abbr title="id">ID</abbr></th>
                            <th>FileName</th>
                            <th>Category</th>
                            <th>Size</th>
                            <th>Path</th>
                            <th>Create Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th><abbr title="id">ID</abbr></th>
                            <th>FileName</th>
                            <th>Category</th>
                            <th>Size</th>
                            <th>Path</th>
                            <th>Create Date</th>
                        </tr>
                    </tfoot>
                    <tbody>


                        @foreach($filetoshow as $fileshow)
                        <tr>
                            <th>{{ $fileshow->id }}</th>
                            <td>{{ $fileshow->name }}</td>
                            <td>
                                @foreach($category as $valuecate) 
                                
                                @if ($valuecate->id == $fileshow->category) 
                                <i class="fa fa-circle" style="color:#{{ $valuecate->color }};padding-right:5px;"></i>{{ $valuecate->name}} 
                                @endif 
                                
                                @endforeach
                            </td>
                            <td>{{ $fileshow->size }}</td>
                            <td><a href="{{ asset('storage/'.$fileshow->path)}}">{{$fileshow->path}}</a></td>
                            <td>{{ $fileshow->created_at }}</td>

                            <td><a href="{{ url('/file/' . $fileshow->id . '/delete') }}"><button class="delete" onclick="myFunction()"></button></a</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>


    <script>
        var file = document.getElementById("file");
        file.onchange = function () {
            if (file.files.length > 0) {

                document.getElementById('filename').innerHTML = file.files[0].name;

            }
        };

    jQuery(document).ready(function($){
	//open popup
	$('.cd-popup-trigger').on('click', function(event){
		event.preventDefault();
		$('.cd-popup').addClass('is-visible');
	});
	
	//close popup
	$('.cd-popup').on('click', function(event){
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$('.cd-popup').removeClass('is-visible');
	    }
    });
});

    </script>


@endsection