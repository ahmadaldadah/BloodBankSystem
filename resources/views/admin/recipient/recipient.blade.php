@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Recipient

                    </div>

                    <div class="panel-body">
                        <table class="table" id="datatable">
                            <a href="{{ route('recipient.create') }}" class="btn btn-xs btn-success">Create Recipient</a>

                            <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Date Of Birth</th>
                                <th>BloodType</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($recipients as $recipient)
                                <tr>
                                    <td>{{$recipient->firstName }}</td>
                                    <td>{{$recipient->lastName }}</td>
                                    <td>{{$recipient->phone }}</td>
                                    <td>{{$recipient->address}}</td>
                                    <td>{{$recipient->dateOfBirth}}</td>
                                    <td>{{$recipient->bloodType}}</td>
                                    @if($donor->bloodType == 1)
                                        <td>{{"A+"}}</td>
                                    @elseif($donor->bloodType == 2)
                                        <td>{{"A-"}}</td>
                                    @elseif($donor->bloodType == 2)
                                        <td>{{"A-"}}</td>
                                    @elseif($donor->bloodType == 3)
                                        <td>{{"B+"}}</td>
                                    @elseif($donor->bloodType == 4)
                                        <td>{{"B-"}}</td>
                                    @elseif($donor->bloodType == 5)
                                        <td>{{"AB+"}}</td>
                                    @elseif($donor->bloodType == 6)
                                        <td>{{"AB-"}}</td>
                                    @elseif($donor->bloodType == 7)
                                        <td>{{"O+"}}</td>
                                    @elseif($donor->bloodType == 8)
                                        <td>{{"O-"}}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('recipient.edit', ['recipientsID' => $recipient->recipientsID]) }}" class="btn btn-xs btn-info">Edit</a>
{{--                                        <a href="{{ route('donor.destroy', ['donorID' => $donor->donorID]) }}" class="btn btn-xs btn-danger">delete</a>--}}

                                        <form style="display: inline;" action="{{ route('recipient.destroy', ['recipientsID' => $recipient->recipientsID]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection

