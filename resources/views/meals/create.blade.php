@extends('layout.app')

@section('content')
    <div>
        <h1 style="text-align: center">Add New Meal</h1>
        <form>
            <div class="form-group">
                <label for="meal_name">Meal Name</label>
                <input type="text" class="form-control" id="meal_name" placeholder="rice">
            </div>
            <div class="form-group">
                <label for="meal_price">Meal Price</label>
                <input type="text" class="form-control" id="meal_price" placeholder="100">
            </div>
            <div class="form-group">
                <label for="meal_name">Meal Status</label>
                <select id="meal_status" class="form-control">
                    <option value="0">Available</option>
                    <option value="1">Unavailable</option>
                </select>
                <input type="text" class="form-control" id="meal_status" placeholder="available">
            </div>
            <div class="form-group">
                <label for="meal_picture">Meal Picture</label>
                <input type="file" class="form-control-file" id="meal_picture">
            </div>
        </form>
    </div>
@endsection
