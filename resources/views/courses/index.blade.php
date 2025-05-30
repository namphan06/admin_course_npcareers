<!DOCTYPE html>
<html>
<head>
    <title>Danh sách khóa học</title>
</head>
<body>
    <h1>Danh sách khóa học</h1>

    <a href="{{ route('courses.create') }}">Thêm khóa học mới</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên khóa học</th>
                <th>Link video</th>
                <th>Giá tiền</th>
                <th>Thể loại</th>
                <th>Hành động</th>
                <th>Đăng ký</th> <!-- cột mới -->
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->title }}</td>
                    <td><a href="{{ $course->youtube_link }}" target="_blank">Xem video</a></td>
                    <td>{{ number_format($course->price, 0, ',', '.') }} VND</td>
                    <td>{{ $course->category->name ?? 'Chưa có' }}</td>
                    <td>
                        <a href="{{ route('courses.show', $course->id) }}">Xem</a> |
                        <a href="{{ route('courses.edit', $course->id) }}">Sửa</a> |
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Bạn có chắc muốn xoá?')">Xoá</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('courses.enrollments', $course->id) }}">
                            Người dùng đã đăng ký
                        </a>
                    </td>
                </tr>
            @endforeach
            @if($courses->isEmpty())
                <tr>
                    <td colspan="7">Không có khóa học nào.</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
