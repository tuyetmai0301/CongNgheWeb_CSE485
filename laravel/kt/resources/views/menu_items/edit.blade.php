@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Dish</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menu_items.update', $menuItem->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Dish Name</label>
            <input type="text" name="dish_name" class="form-control" value="{{ old('dish_name', $menuItem->dish_name) }}" required maxlength="100">
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $menuItem->price) }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $menuItem->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Availability</label>
            <select name="availability" class="form-control">
                <option value="Available" {{ (old('availability', $menuItem->availability) == 'Available') ? 'selected' : '' }}>Available</option>
                <option value="Out of Stock" {{ (old('availability', $menuItem->availability) == 'Out of Stock') ? 'selected' : '' }}>Out of Stock</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('menu_items.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
