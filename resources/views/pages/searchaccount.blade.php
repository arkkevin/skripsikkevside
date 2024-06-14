@extends('layout.app')

@section('content')
    <div class="container my-5">
        <h1>Search Accounts</h1>
        <form action="{{ route('searchaccount') }}" method="GET" class="form-inline my-2 my-lg-0">
            @csrf
            <input type="text" name="query" class="form-control mr-sm-2" placeholder="Search for accounts...">
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
        </form>

        @if(isset($accounts))
            <h2 class="mt-5">Search Results</h2>
            <ul class="list-group">
                @forelse($accounts as $account)
                    <li class="list-group-item">
                        <h5>{{ $account->name }}</h5>
                        <p>{{ $account->email }}</p>
                    </li>
                @empty
                    <li class="list-group-item">No accounts found</li>
                @endforelse
            </ul>
        @endif
    </div>
@endsection
