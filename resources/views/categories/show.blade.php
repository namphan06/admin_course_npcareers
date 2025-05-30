@extends('layouts.app')

@section('content')
    <h2>Khóa học trong thể loại: {{ $category->name }}</h2>
    <p>Mô tả: {{ $category->describe }}</p>

    <a href="{{ route('courses.create', ['category_id' => $category->id]) }}">
        <button>Tạo khóa học mới</button>
    </a>

    <a href="{{ route('categories.index') }}">
        <button>Quay lại danh sách thể loại</button>
    </a>

    @if($courses->count() > 0)
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; margin-top: 20px;">
            <thead>
                <tr>
                    <th>Tên khóa học</th>
                    <th>Giá tiền (VNĐ)</th>
                    <th>Video</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->title }}</td>
                        <td>{{ number_format($course->price, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ $course->youtube_link }}" target="_blank">Xem video</a>
                        </td>
                        <td>{{ $course->description }}</td>
                        <td>
                            <a href="{{ route('courses.edit', $course->id) }}">
                                <button>Sửa</button>
                            </a>

                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa khóa học này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: red; color: white;">Xóa</button>
                            </form>
                        </td>
                        <td>
                        <a href="{{ route('courses.enrollments', $course->id) }}">
                            Người dùng đã đăng ký
                        </a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Chưa có khóa học nào trong thể loại này.</p>
    @endif
@endsection
