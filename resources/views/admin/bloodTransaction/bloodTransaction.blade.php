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
                        BloodTransaction
                        <a href="{{ route('bloodTransaction.create') }}" class="btn btn-xs btn-success">Create bloodTransaction</a>

                    </div>

                    <div class="panel-body">
                        <table class="table" id="datatable">
                            <thead>
                            <tr>
                                <th>Transact ID</th>
                                <th>Emp ID</th>
                                <th>DateOut</th>
                                <th>Quantity</th>
                                <th>Recipients ID</th>
                                <th>Blood Type</th>
                                <th>Blood ID</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($blood_transactions as $blood_transaction)
                                <tr>
                                    <td>{{$blood_transaction->transactID }}</td>
                                    <td>{{$blood_transaction->empID }}</td>
                                    <td>{{$blood_transaction->dateOut }}</td>
                                    <td>{{$blood_transaction->quantity}}</td>
                                    <td>{{$blood_transaction->recipientsID }}</td>
                                    @if($blood_transaction->bloodType == 1)
                                        <td>{{"A+"}}</td>
                                    @elseif($blood_transaction->bloodType == 2)
                                        <td>{{"A-"}}</td>
                                    @elseif($blood_transaction->bloodType == 2)
                                        <td>{{"A-"}}</td>
                                    @elseif($blood_transaction->bloodType == 3)
                                        <td>{{"B+"}}</td>
                                    @elseif($blood_transaction->bloodType == 4)
                                        <td>{{"B-"}}</td>
                                    @elseif($blood_transaction->bloodType == 5)
                                        <td>{{"AB+"}}</td>
                                    @elseif($blood_transaction->bloodType == 6)
                                        <td>{{"AB-"}}</td>
                                    @elseif($blood_transaction->bloodType == 7)
                                        <td>{{"O+"}}</td>
                                    @elseif($blood_transaction->bloodType == 8)
                                        <td>{{"O-"}}</td>
                                    @endif
                                    <td>{{$blood_transaction->bloodID }}</td>
                                    <td>
                                        <a href="{{ route('bloodTransaction.edit', ['transactID' => $blood_transaction->transactID]) }}" class="btn btn-xs btn-info">Edit</a>
{{--                                        <a href="{{ route('donor.destroy', ['donorID' => $donor->donorID]) }}" class="btn btn-xs btn-danger">delete</a>--}}

                                        <form style="display: inline;" action="{{ route('bloodTransaction.destroy', ['transactID' => $blood_transaction->transactID]) }}" method="POST">
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

