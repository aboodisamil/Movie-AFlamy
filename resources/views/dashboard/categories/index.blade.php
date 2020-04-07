@extends('layouts.dashboard.app')
@section('content')
    <h2 style="font-family: Andalus">Category</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Category</li>
        </ol>
    </nav>

    <div class="tile mp-4">
        <div class="row">
            <div class="col-12">
                <div class="row">

                    <div class="col-md-4">
                        <form action="" method="get">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="search">
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search">SEARCH</i></button>
                        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary"><i class="fa fa-plus">ADD</i></a>
                    </div>

                </div>{{--end of row--}}

                <div class="row">
                    <div class="col-md-12">

                        @if($categories->count() >0)
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as$i=>$category)

                                <tr>
                                    <td>{{$i++  }}</td>
                                    <td>{{$category->name }}</td>
                                    <td >
                                        <a  href="{{ route('dashboard.categories.edit' , $category->id) }}" class="btn btn-warning"><i class="fa fa-edit"> Edit</i></a>
                                        <form style="display: inline-block" action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
                                            {{ method_field('delete') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"> Delete</i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                            @else
                            <h2 style="font-family: 'Arabic Typesetting'; font-weight: 400; text-align: center ">Not Found Any Data</h2>
                            @endif

                    </div>


                </div>

            </div>
        </div>
    </div>


@endsection