@extends('layouts.main')

@section('content')
<div class="container my-3">
    <div class="card">
        <div class="card-header header-custom">
            <span class="font-weight-bold text-white">Transaction History</span>
        </div>
        <ul class="list-group list-group-flush">
            @if (empty($histories))
                <li class="list-group-item">No Data</li>
            @else
                @foreach($histories as $history)
                    <li class="list-group-item"><a href="{{ url('transaction-history/' . $history->id) }}" class="text-dark">{{ $history->date }}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
@endsection
