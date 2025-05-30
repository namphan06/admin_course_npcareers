<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa khóa học</title>
</head>
<body>
    <h1>Chỉnh sửa khóa học</h1>

    <a href="{{ route('courses.index') }}">Quay lại danh sách khóa học</a>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Tên khóa học:</label><br>
            <input type="text" name="title" value="{{ old('name', $course->title) }}" required>
        </div>

        <div>
            <label>Link video YouTube:</label><br>
            <input type="url" name="youtube_link" value="{{ old('link', $course->youtube_link) }}" required>
        </div>

        <div>
            <label>Giá tiền:</label><br>
            <input type="number" name="price" value="{{ old('price', $course->price) }}" min="0" required>
        </div>

        <div>
            <label>Thể loại:</label><br>
            <select name="category_id" required>
                <option value="">-- Chọn thể loại --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $course->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Mô tả khóa học:</label><br>
            <textarea name="description" rows="4">{{ old('describe', $course->description) }}</textarea>
        </div>

        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
