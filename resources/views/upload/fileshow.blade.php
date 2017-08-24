@extends('layouts.main') 

@section('content')
<br>


<div class="hero-body">
<div class="container">
        <div class="columns">
            <div class="column">
                <a class="button is-outlined" href="/file">File Upload</a>
                <a class="button is-outlined" href="/file/show">File Show</a>

            <br>
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
                                @foreach($category as $valuecate) @if ($valuecate->id == $fileshow->category)<i class="fa fa-circle" style="color:#{{ $valuecate->color }};padding-right:5px;"></i> {{ $valuecate->name}} @endif @endforeach
                            </td>
                            <td>{{ $fileshow->size }}</td>
                            <td><a href="{{ asset('storage/'.$fileshow->path)}}">{{$fileshow->path}}</a></td>
                            <td>{{ $fileshow->created_at }}</td>

                            <td><a href="{{ url('/file/' . $fileshow->id . '/delete') }}"><button class="delete"></button></a</td>
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
    </script>


@endsection