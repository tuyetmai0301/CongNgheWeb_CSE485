@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Menu Items</h2>
    <a href="{{ route('menu_items.create') }}" class="btn btn-primary mb-2">Add New Dish</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Dish Name</th>
            <th>Restaurant</th>
            <th>Price</th>
            <th>Description</th>
            <th>Availability</th>
            <th>Actions</th>
        </tr>
        @foreach($menuItems as $item)
        <tr>
            <td>{{ $item->dish_name }}</td>
            <td>{{ $item->restaurant->restaurant_name }}</td>
            <td>${{ $item->price }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->availability }}</td>
            <td>
                <a href="{{ route('menu_items.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('menu_items.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $menuItems->links() }}
</div>
@endsection
