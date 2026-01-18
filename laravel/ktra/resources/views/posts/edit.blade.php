<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Post</h2>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control"
                   value="{{ $post->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Author</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}"
                        {{ $user->id == $post->user_id ? 'selected' : '' }}>
                        {{ $user->fullname }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-control">
                <option value="Technology" {{ $post->category=='Technology'?'selected':'' }}>Technology</option>
                <option value="Lifestyle" {{ $post->category=='Lifestyle'?'selected':'' }}>Lifestyle</option>
                <option value="Travel" {{ $post->category=='Travel'?'selected':'' }}>Travel</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="4" required>{{ $post->content }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Views</label>
            <input type="number" name="views" class="form-control"
                   value="{{ $post->views }}">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

</body>
</html>
