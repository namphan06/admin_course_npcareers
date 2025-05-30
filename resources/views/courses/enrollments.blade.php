<!DOCTYPE html>
<html>
<head>
    <title>Danh sách đăng ký - {{ $course->title }}</title>
</head>
<body>
    <h1>Người dùng đăng ký khóa học: {{ $course->title }}</h1>

    <a href="{{ route('courses.index') }}">Quay lại danh sách khóa học</a>

    @if($enrollments->count() > 0)
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Course ID</th>
                    <th>Trạng thái</th>
                    <th>Ngày đăng ký</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrollments as $enroll)
                    <tr>
                        <td>{{ $enroll->user_id }}</td>
                        <td>{{ $enroll->course_id }}</td>
                        <td>{{ $enroll->status }}</td>
                        <td>{{ \Carbon\Carbon::parse($enroll->registered_at)->format('d/m/Y H:i') }}</td>
                        <td>{{ $enroll->note ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Chưa có người dùng nào đăng ký khóa học này.</p>
    @endif
</body>
</html>
