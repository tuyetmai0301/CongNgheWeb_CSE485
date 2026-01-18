@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Dish</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menu_items.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Dish Name</label>
            <input type="text" name="dish_name" class="form-control" value="{{ old('dish_name') }}" required maxlength="100">
        </div>

        <div class="mb-3">
            <label>Restaurant</label>
            <select name="restaurant_id" class="form-control" required>
                <option value="">-- Select Restaurant --</option>
                @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}" {{ old('restaurant_id') == $restaurant->id ? 'selected' : '' }}>
                        {{ $restaurant->restaurant_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Availability</label>
            <select name="availability" class="form-control">
                <option value="Available" {{ old('availability') == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Out of Stock" {{ old('availability') == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('menu_items.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
