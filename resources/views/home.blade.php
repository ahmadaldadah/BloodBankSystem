@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class='text-center'>Blood Type</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table" id="datatable">
                            <thead>
                            <tr>
                                <th>Type name</th>
                                <th>Total Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($blood_types as $blood_type)
                                <tr>
                                    <td>{{$blood_type->typeName }}</td>
                                    <td>{{$blood_type->totalQuantity}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-2">
                <div class="panel-heading">
                    <div class="panel panel-default">
                    <h1 class='text-center'>Total Quantity Chart</h1>
                </div>
                    <div class="panel-body">

                    <div id="chart" style="height: 480px;"></div>
                <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
                <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
                <script>

                    const chart = new Chartisan({
                        el: '#chart',
                        url: "@chart('sample_chart')",
                    });
                </script>
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

