@extends('partials.layout')
@section('title') Phones @endsection
@section('content')
    <div>
        @if(count($errors->all()))
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <br><br>

        <div>
            <h2>Phone numbers</h2>
        </div>
        <div>
            <form action="{{ route('filter') }}" method="get">
                <select name="country">
                    <option value="0" selected disabled>Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country }}">{{ $country }}</option>
                    @endforeach
                </select>
                <select name="state">
                    <option value="0" selected disabled>Select State</option>
                    <option value="NOK">Invalid phone numbers</option>
                    <option value="OK">Valid phone numbers</option>
                </select>
                <input type="submit" value="Filter">
            </form>
            <table border="1">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>State</th>
                        <th>Country code</th>
                        <th>Phone num</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($phones as $phone)
                        <tr>
                            <td>{{ $phone['country'] }}</td>
                            <td>{{ $phone['state'] }}</td>
                            <td>{{ $phone['country_code'] }}</td>
                            <td>{{ $phone['phone'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($phones instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $phones->links() }}
            @endif
        </div>
    </div>
@endsection
