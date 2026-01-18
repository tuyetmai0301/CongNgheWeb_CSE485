<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
crossorigin="anonymous">
<title>Posts</title>
</head>
<body>

<h1 style="margin: 50px 50px">Cập nhật thông tin </h1>

<form action="{{ route('sales.update', $sale->id) }}" method="POST" style="margin: 50px 50px">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="integer" name="quantity" class="form-control" value="{{ $sale->quantity }}" required>
    </div>

    <div class="form-group">
        <label for="sale_date">Sale_date</label>
        <input type="date" name="sale_date" class="form-control" value="{{ $sale->sale_date }}" required>
    </div>

    <div class="form-group">
        <label for="customer_phone">Phone</label>
        <input type="text" name="customer_phone" class="form-control" value="{{ $sale->customer_phone }}" required>
    </div>

    <div class="form-group">
        <label for="medicine_id">Medicine</label>
        <select name="medicine_id" class="form-control" required>
            @foreach($medicines as $medicine)
            <option value="{{ $medicine->id }}" {{ $medicine->id == $sale->medicine_id ? 'selected' : '' }}>{{ $medicine->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="created_at">Ngày tạo</label>
        <input type="date" name="created_at" class="form-control" value="{{ $sale->created_at }}">
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

</body>