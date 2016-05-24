@extends('layouts.app')

@section('content')
<div class="panel panel-success">
    <div class="panel panel-heading">
        <h2>{{ session('categoryName') }} Result
            {{ $totalCorrect }}/{{ session('totalQuestions') }}
        </h2>
        <div class="panel-body">
            <div class="col-lg-10">
                <table class="col-lg-12">
                    <thead>
                        <tr>
                            <th class="col-lg-4">Is Correct</th>
                            <th class="col-lg-4">Question</th>
                            <th class="col-lg-4">Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($resultOptions as $resultOption)
                        <tr>
                            <td>{{ $resultOption['isCorrect'] }}</td>
                            <td>{{ $resultOption['wordContent'] }}</td>
                            <td>{{ $resultOption['wordAnswerContent'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
