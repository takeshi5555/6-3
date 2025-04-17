@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>収入登録</h1>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('create.income') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="amount" class="form-label">金額</label>
                    <input type="text" class="form-control" name="amount" id="amount" required>
                    @error('amount')
                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">日付</label>
                    <input type="date" class="form-control" name="date" id="date" required>
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label">カテゴリ</label>
                    <select name="type_id" class="form-select" required>
                        <option value="" hidden>カテゴリを選択</option>
                        @foreach($types as $type)
                            <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                        @endforeach
                    </select>
                    <a href="{{ route('types.create') }}" >カテゴリを追加</a>
                </div>

                <div class="mb-3">
                    <label for="comment" class="form-label">メモ</label>
                    <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">登録</button>
            </form>
        </div>
    </div>
    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">戻る</a>
</div>
@endsection