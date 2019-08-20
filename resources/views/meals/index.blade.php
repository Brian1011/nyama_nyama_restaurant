@extends('layout.app')

@section('content')
<div>
    <h1 style="text-align: center">Welcome to Nyama Nyama Restaurant</h1>

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </p>
        </div>
    @endif
    <table class="table table-hover table-striped table-responsive-lg" id="dataTable">
        <thead>
            <tr>
                <th>Meal Id</th>
                <th>Picture</th>
                <th>Meal Name</th>
                <th>Price</th>
                <th>Status</th>
                <th width="280px">Action</th>
            </tr>
        </thead>

        @foreach($meals as $meal)
            <tr>
                <td>{{$meal->id}}</td>
                <td>Picture</td>
                <td>{{$meal->meal_name}}</td>
                <td>{{$meal->meal_price}}</td>
                <td>
                    @if($meal->meal_status === 0)
                        Available
                    @else
                        Not Available
                    @endif
                </td>
                <td>
                    <form action="{{route('meals.destroy',$meal->id)}}" method="Post">
                        <a class="btn btn-info" href="{{route('meals.show',$meal->id)}}">Show</a>
                        <a class="btn btn-primary" href="{{route('meals.edit',$meal->id)}}">Edit</a>
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
