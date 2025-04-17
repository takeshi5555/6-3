@extends('layouts.layout')

@section('content')
<main class="py-4">
<div class="row justify-content-around" >
            <div class="card mx-auto" style="width:50%;">
                <div class="card-header text-center" style="width:50.6vw; transform: translateX(-0.6vw);">支出</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>日付</th>
                                <th>金額</th>
                                <th>カテゴリ</th>
                                <th>コメント</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $spend['date'] }}</td>
                                <td>{{ $spend['amount'] }}</td>
                                <td >{{ $spend->type->name }}</td>
                                <td>{{ $spend['comment'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    
    </div>
</main>
@endsection