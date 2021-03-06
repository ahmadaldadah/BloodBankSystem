@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h1 class='text-center'>Recipient</h1>
                        <div style="text-align: center">
                            <a href="{{ route('recipient.create') }}" class="btn btn-default btn-lg" style="background-color: #7bd3f7">Create Recipient</a>
                        </div>

                    </div>

                    <div class="panel-body">
                        <table class="table" id="datatable">

                            <thead>
                            <tr>
                                <th>RecipientID</th>
                                <th>Identity Number</th>
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
                                    <td>{{$recipient->recipientsID}}</td>
                                    <td>{{$recipient->identityNumber}}</td>

                                    <td>{{$recipient->firstName }}</td>
                                    <td>{{$recipient->lastName }}</td>
                                    <td>{{$recipient->phone }}</td>
                                    <td>{{$recipient->address}}</td>
                                    <td>{{$recipient->dateOfBirth}}</td>
                                    @if($recipient->bloodType == 1)
                                        <td>{{"A+"}}</td>
                                    @elseif($recipient->bloodType == 2)
                                        <td>{{"A-"}}</td>
                                    @elseif($recipient->bloodType == 2)
                                        <td>{{"A-"}}</td>
                                    @elseif($recipient->bloodType == 3)
                                        <td>{{"B+"}}</td>
                                    @elseif($recipient->bloodType == 4)
                                        <td>{{"B-"}}</td>
                                    @elseif($recipient->bloodType == 5)
                                        <td>{{"AB+"}}</td>
                                    @elseif($recipient->bloodType == 6)
                                        <td>{{"AB-"}}</td>
                                    @elseif($recipient->bloodType == 7)
                                        <td>{{"O+"}}</td>
                                    @elseif($recipient->bloodType == 8)
                                        <td>{{"O-"}}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('recipient.edit', ['recipientsID' => $recipient->recipientsID]) }}" class="btn btn-xs btn-info">Edit</a>
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

