@extends('partials.layout')
@section('title') Phones @endsection
@section('content')
    <div>
        <div>
            <h2>Phones</h2>
        </div>

        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($phones as $phone)
                        <tr>
                            <td>{{ $phone->id }}</td>
                            <td>{{ $phone->name }}</td>
                            <td>{{ $phone->phone }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
