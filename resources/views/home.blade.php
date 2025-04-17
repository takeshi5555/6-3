@extends('layouts.layout')

@section('content')
<main class="py-4">
    <div class="row justify-content-around">
        <!-- 収入カード -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">収入</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>詳細</th>
                                <th>日付</th>
                                <th>金額</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($incomes as $income)
                            <tr>
                                <td>
                                    <a href="{{ route('income.detail', ['id' => $income['id']]) }}">#</a>
                                </td>
                                <td>{{ $income['date'] }}</td>
                                <td>{{ $income['amount'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- 支出カード -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">支出</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>詳細</th>
                                <th>日付</th>
                                <th>金額</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($spends as $spend)
                            <tr>
                                <td>
                                    <a href="{{ route('spend.detail', ['id' => $spend['id']]) }}">#</a>
                                </td>
                                <td>{{ $spend['date'] }}</td>
                                <td>{{ $spend['amount'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection



