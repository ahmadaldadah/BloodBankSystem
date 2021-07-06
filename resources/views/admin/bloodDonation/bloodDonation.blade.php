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
                        <h1 class='text-center'>Blood Donation</h1>
                        <div style="text-align: center">
                            <a href="{{ route('bloodDonation.create') }}" class="btn btn-default btn-lg" style="background-color: #7bd3f7">Create Blood Donation</a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table" id="datatable">

                            <thead>
                            <tr>
                                <th>Blood ID</th>
                                <th>Donor ID</th>
                                <th>Date Donated</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($blood_donations as $blood_donation)
                                <tr>
                                    <td>{{$blood_donation->bloodID }}</td>
                                    <td>{{$blood_donation->donorID}}</td>
                                    <td>{{$blood_donation->dateDonated }}</td>
                                    <td>{{$blood_donation->quantity}}</td>
                                    <td>
                                        <a href="{{ route('bloodDonation.edit', ['bloodID' => $blood_donation->bloodID]) }}" class="btn btn-xs btn-info">Edit</a>

                                        <form style="display: inline;" action="{{ route('bloodDonation.destroy', ['bloodID' => $blood_donation->bloodID]) }}" method="POST">
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

