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

                        <h1 class='text-center'>Medical Personnel</h1>
                        <div style="text-align: center">
                            <a href="{{ route('medicalPersonnel.create') }}" class="btn btn-default btn-lg" style="background-color: #7bd3f7">Create Medical Personnel</a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table" id="datatable">

                            <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Date Of Birth</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($medical_personnels as $medical_personnel)
                                <tr>
                                    <td>{{$medical_personnel->firstName }}</td>
                                    <td>{{$medical_personnel->lastName }}</td>
                                    <td>{{$medical_personnel->phone }}</td>
                                    <td>{{$medical_personnel->address}}</td>
                                    <td>{{$medical_personnel->dateOfBirth}}</td>
                                    <td>{{$medical_personnel->email}}</td>
                                    <td>
                                        <a href="{{ route('medicalPersonnel.edit', ['empID' => $medical_personnel->empID]) }}" class="btn btn-xs btn-info">Edit</a>
{{--                                        <a href="{{ route('donor.destroy', ['donorID' => $donor->donorID]) }}" class="btn btn-xs btn-danger">delete</a>--}}

                                        <form style="display: inline;" action="{{ route('medicalPersonnel.destroy', ['empID' => $medical_personnel->empID]) }}" method="POST">
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

