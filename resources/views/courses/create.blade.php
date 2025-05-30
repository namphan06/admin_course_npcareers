@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tạo Khóa Học Mới</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Tiêu đề khóa học:</label><br>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label>Mô tả:</label><br>
            <textarea name="description" required>{{ old('description') }}</textarea>
        </div>

        <div>
            <label>Link YouTube:</label><br>
            <input type="url" name="youtube_link" value="{{ old('youtube_link') }}" required>
        </div>

        <div>
            <label>Giá tiền (VNĐ):</label><br>
            <input type="number" name="price" value="{{ old('price') }}" min="0" required>
        </div>

        <div>
            <label>Thể loại:</label><br>
            <select name="category_id" required>
                <option value="">-- Chọn thể loại --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Ảnh đại diện (thumbnail):</label><br>
            <input type="file" name="thumbnail" accept="image/*">
        </div>

        <button type="submit">Tạo mới</button>
    </form>
</div>
@endsection
