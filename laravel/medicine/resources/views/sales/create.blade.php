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


    <h1 style="margin: 50px 50px">Thêm Sale mới</h1>
    <form action="{{ route('sales.store') }}" method="POST" style="margin: 50px 50px">
        @csrf
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="integer" class="form-control" id="quantity" name="quantity" required>
        </div>

        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale_date</label>
            <input type="date" class="form-control" id="sale_date" name="sale_date" required>
        </div>

        <div class="mb-3">
            <label for="customer_phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="customer_phone" name="customer_phone" required>
        </div>

        
        <div class="mb-3">
            <label for="medicine_id" class="form-label">Medicine</label>
            <select class="form-control" id="medicine_id" name="medicine_id" required>
                @foreach($medicines as $medicine)
                    <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="created_at" class="form-label">Ngày tạo</label>
            <input type="date" class="form-control" id="created_at" name="created_at" required>
        </div>
    
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

</body>