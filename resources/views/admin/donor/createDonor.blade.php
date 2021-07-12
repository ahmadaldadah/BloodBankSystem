@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Create Donor

                            <a href="/donor" class="btn btn-default pull-right"
                            >Go Back</a
                            >
                        </h2>

                        @include('partials._errors')

                    </div>

                    <div class="panel-body">
                        <form
                            method="POST"
                            action="/donor"
                            accept-charset="UTF-8"
                            class="form-horizontal"
                            role="form"
                        >

                            @csrf
                            <div class="form-group">
                                <label for="email" class="col-md-2 control-label"
                                >Email</label
                                >

                                <div class="col-md-8 {{ $errors->first('email') ? "has-error" : ""}}">
                                    <input
                                        class="form-control"

                                        autofocus="autofocus"
                                        name="email"
                                        type="email"
                                        id="email"
                                    />

                                    <div class="text-danger">
                                        {{$errors->first('email')}}
                                    </div>
                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-2 control-label"
                                >Password</label
                                >

                                <div class="col-md-8 {{ $errors->first('password') ? "has-error" : ""}}">
                                    <input
                                        class="form-control"

                                        autofocus="autofocus"
                                        name="password"
                                        type="password"
                                        id="password"
                                    />

                                    <div class="text-danger">
                                        {{$errors->first('password')}}
                                    </div>
                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="identityNumber" class="col-md-2 control-label"
                                >Identity Number</label
                                >

                                <div class="col-md-8 {{ $errors->first('identityNumber') ? "has-error" : ""}}">
                                    <input
                                        class="form-control"

                                        autofocus="autofocus"
                                        name="identityNumber"
                                        type="text"
                                        id="identityNumber"
                                        maxlength="9"
                                        minlength="9"
                                    />

                                    <div class="text-danger">
                                        {{$errors->first('identityNumber')}}
                                    </div>
                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>
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
                                    <div class="text-danger">
                                        {{$errors->first('lastName')}}
                                    </div>
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
                                        type="text"
                                        id="phone"
                                        maxlength="10"
                                        minlength="10"
                                    >

                                    <div class="text-danger">
                                        {{$errors->first('phone')}}
                                    </div>
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
                                    <div class="text-danger">
                                        {{$errors->first('address')}}
                                    </div>
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
                                    <div class="text-danger">
                                        {{$errors->first('dateOfBirth')}}
                                    </div>
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

                                 <select
                                     class="form-control"

                                     autofocus="autofocus"
                                     name="bloodType"
                                     type="text"
                                     id="bloodType"
                                 >
                                     @foreach ($blood_types as $blood_type)
                                         <option value="{!! $blood_type->typeID !!}">{!! $blood_type->typeName!!}</option>
                                     @endforeach
                                 </select>
                                    <div class="text-danger">
                                        {{$errors->first('bloodType')}}
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

