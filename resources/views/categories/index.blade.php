@extends('layouts.app')

@section('content')
    <h2>Danh sách Thể loại</h2>

    <a href="{{ route('categories.create') }}">
        <button>Tạo Thể loại mới</button>
    </a>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; margin-top: 15px;">
        <thead>
            <tr>
                <th>Tên Thể loại</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->describe }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}">
                            <button>Xem khóa học</button>
                        </a>
                        <a href="{{ route('categories.edit', $category->id) }}">
                            <button>Sửa</button>
                        </a>

                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc muốn xóa thể loại này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
