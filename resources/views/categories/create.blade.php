@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tạo Thể Loại Mới</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div>
            <label>Tên thể loại:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label>Mô tả:</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <button type="submit">Tạo mới</button>
    </form>
</div>
@endsection
