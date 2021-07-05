@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Create Recipient

                            <a href="/recipient" class="btn btn-default pull-right"
                            >Go Back</a
                            >
                        </h2>

                        @include('partials._errors')

                    </div>

                    <div class="panel-body">
                        <form
                            method="POST"
                            action="/recipient"
                            accept-charset="UTF-8"
                            class="form-horizontal"
                            role="form"
                        >

                            @csrf
                            <div class="form-group">
                                <label for="firstName" class="col-md-2 control-label"
                                >First Name</label
                                >

                                <div class="col-md-8 {{ $errors->first('firstName') ? "has-error" : ""}}">
                                    <input
                                        class="form-control"

                                        autofocus="autofocus"
                                        name="firstName"
                                        type="text"
                                        id="firstName"
                                    />

                                    <div class="text-danger">
                                        {{$errors->first('firstName')}}
                                    </div>
                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastName" class="col-md-2 control-label"
                                >lastName</label
                                >

                                <div class="col-md-8 ">
                                    <input
                                        class="form-control"

                                        autofocus="autofocus"
                                        name="lastName"
                                        type="text"
                                        id="lastName"
                                    />
                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-md-2 control-label"
                                >Phone</label
                                >

                                <div class="col-md-8">

                                    <input
                                        class="form-control"
                                        autofocus="autofocus"
                                        name="phone"
                                        type="integer"
                                        id="phone"
                                    >


                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="address" class="col-md-2 control-label"
                                >Address</label
                                >

                                <div class="col-md-8">

                                    <input
                                        class="form-control"

                                        autofocus="autofocus"
                                        name="address"
                                        type="text"
                                        id="address"

                                    >

                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dateOfBirth" class="col-md-2 control-label"
                                >DateOfBirth</label
                                >

                                <div class="col-md-8">
                                    <input
                                        class="form-control"

                                        autofocus="autofocus"
                                        type="date"
                                        name="dateOfBirth"
                                        id="dateOfBirth">

                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bloodType" class="col-md-2 control-label"
                                >BloodType</label
                                >

                                <div class="col-md-8">

                                    <input
                                        class="form-control"

                                        autofocus="autofocus"
                                        name="bloodType"
                                        type="text"
                                        id="bloodType"

                                    >

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

