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

<form action="{{ route('issues.update', $issue->id) }}" method="POST" style="margin: 50px 50px">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="computer_id">Tên máy</label>
        <select name="computer_id" class="form-control" required>
            @foreach($computers as $computer)
            <option value="{{ $computer->id }}" {{ $computer->id == $issue->computer_id ? 'selected' : '' }}>{{ $computer->computer_name }}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="reported_by">Người báo cáo</label>
        <input type="text" name="reported_by" class="form-control" value="{{ $issue->reported_by }}" required>
    </div>

    <div class="form-group">
        <label for="reported_date">Thời gian báo cáo</label>
        <input type="date" name="reported_date" class="form-control" value="{{ $issue->reported_date }}" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <input type="text" name="description" class="form-control" value="{{ $issue->description }}" required>
    </div>

    <div class="form-group">
        <label for="urgency">Mức độ</label>
        <input type="text" name="urgency" class="form-control" value="{{ $issue->urgency }}" required>
    </div>

    <div class="form-group">
        <label for="status">Trạng thái</label>
        <input type="text" name="status" class="form-control" value="{{ $issue->status }}" required>
    </div>

    
    <div class="form-group">
        <label for="created_at">Ngày tạo</label>
        <input type="date" name="created_at" class="form-control" value="{{ $issue->created_at }}">
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

</body>