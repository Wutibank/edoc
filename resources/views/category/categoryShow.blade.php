@extends('layouts.main') 
@section('content')
<br>


<div class="hero-body">
<div class="container">
        <div class="columns">
            <div class="column">
            <a class="button is-outlined" href="/category">Category Upload</a>
            <a class="button is-outlined" href="/category/show">Category Show</a>
           

            <br>
                <h1 class="title">Show Category</h1>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <table class="table is-fullwidth">
                    <thead>
                        <tr>
                            <th><abbr title="id">ID</abbr></th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>Color</th>
                            <th>FileInCategory</th>
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


                        @foreach($category as $categoryShow)
                        <tr>
                            <th>{{ $categoryShow->id }}</th>
                            <td>{{ $categoryShow->name }}</td>
                            <td>{{ $categoryShow->detail }}</td>
                            <td><i class="fa fa-circle" style="color:#{{ $categoryShow->color }};"></i></td>
                            <td>{{ $categoryShow->countFile}}</a></td>
                            <td>{{ $categoryShow->created_at }}</td>
                            <td><a href="{{ url('/category/' . $categoryShow->id) }}"><i class="fa fa-edit"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection