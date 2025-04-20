@extends('layouts.app')

@section('content')
<div class="container">
    <h1>カテゴリ登録</h1>


    <form action="{{ route('types.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">カテゴリ名</label>
            <input type="text" class="form-control " name="name" id="name" value="{{ old('name') }}" required>

        </div>

        <div class="mb-3">
            <label for="category" class="form-label">カテゴリ</label>
            <select name="category" id="category" class="form-select">
                <option value="0" >0 (収入)</option>
                <option value="1" >1 (支出)</option>
            </select>

        </div>

        <button type="submit" class="btn btn-primary">登録</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">戻る</a>
    </form>
</div>
@endsection