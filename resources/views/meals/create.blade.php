@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            @if($errors->any())
                <div class="alert-danger">
                    <strong>Error! </strong> There are some problems with your form. Kindly check again<br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!--Check for success message-->
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif

            <div>
                <h1 style="text-align: center">Add New Meal</h1>
                <form action="{{route('meals.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="picture">Meal Picture</label>
                        <input type="file" class="form-control-file" id="picture" name="meal_picture">
                    </div>
                    <div class="form-group">
                        <label for="meal_name">Meal Name</label>
                        <input type="text" class="form-control" id="meal_name" placeholder="rice" name="meal_name">
                    </div>
                    <div class="form-group">
                        <label for="meal_price">Meal Price</label>
                        <input type="text" class="form-control" id="meal_price" placeholder="100" name="meal_price">
                    </div>
                    <div class="form-group">
                        <label for="meal_name">Meal Status</label>
                        <select id="meal_status" class="form-control" name="meal_status">
                            <option value="0">Available</option>
                            <option value="1">Unavailable</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection
