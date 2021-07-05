@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Create Blood Donation

                            <a href="/bloodDonation" class="btn btn-default pull-right"
                            >Go Back</a
                            >
                        </h2>

                        @include('partials._errors')

                    </div>

                    <div class="panel-body">
                        <form
                            method="POST"
                            action="/bloodDonation"
                            accept-charset="UTF-8"
                            class="form-horizontal"
                            role="form"
                        >

                            @csrf
                            <div class="form-group">
                                <label for="bloodID" class="col-md-2 control-label"
                                >bloodID</label
                                >

                                <div class="col-md-8 {{ $errors->first('bloodID') ? "has-error" : ""}}">
                                    <input
                                        class="form-control"

                                        autofocus="autofocus"
                                        name="bloodID"
                                        type="number"
                                        id="bloodID"
                                    />

                                    <div class="text-danger">
                                        {{$errors->first('bloodID')}}
                                    </div>
                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="donorID" class="col-md-2 control-label"
                                >donorID</label
                                >

                                <div class="col-md-8">
                                    <select
                                        class="form-control"
                                        required="required"
                                        id="donorID"
                                        name="donorID">
                                        @foreach ($donors as $donor)
                                            <option value="{!! $donor->donorID !!}">{!! $donor->donorID!!}-{!! $donor->firstName!!}</option>
                                        @endforeach
                                    </select>


                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dateDonated" class="col-md-2 control-label"
                                >dateDonated</label
                                >

                                <div class="col-md-8 {{ $errors->first('dateDonated') ? "has-error" : ""}}">
                                    <input
                                        class="form-control"

                                        autofocus="autofocus"
                                        name="dateDonated"
                                        type="date"
                                        id="dateDonated"
                                    />

                                    <div class="text-danger">
                                        {{$errors->first('dateDonated')}}
                                    </div>
                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="quantity" class="col-md-2 control-label"
                                >quantity</label
                                >

                                <div class="col-md-8 {{ $errors->first('quantity') ? "has-error" : ""}}">
                                    <input
                                        class="form-control"

                                        autofocus="autofocus"
                                        name="quantity"
                                        type="number"
                                        id="quantity"
                                    />

                                    <div class="text-danger">
                                        {{$errors->first('quantity')}}
                                    </div>
                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

