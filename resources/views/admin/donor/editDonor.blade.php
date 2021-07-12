@extends('layouts.app')


@section('content')


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>
                                Edit Donor

                                <a href="/donor" class="btn btn-default pull-right"
                                >Go Back</a
                                >
                            </h2>
                            @include('partials._errors')
                        </div>

                        <div class="panel-body">
                            <form
                                method="POST"
                                action="{{ route('donor.update',[$donor->donorID])}}"
                                accept-charset="UTF-8"
                                class="form-horizontal"
                                role="form"
                            >
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="identityNumber" class="col-md-2 control-label"
                                    >Identity Number</label
                                    >

                                    <div class="col-md-8">
                                        <input
                                            class="form-control"
                                            required="required"
                                            autofocus="autofocus"
                                            name="identityNumber"
                                            type="text"
                                            value="{{$donor->identityNumber}}"
                                            id="identityNumber"
                                            maxlength="9"
                                            minlength="9"
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
                                    <label for="firstName" class="col-md-2 control-label"
                                    >First Name</label
                                    >

                                    <div class="col-md-8">
                                        <input
                                            class="form-control"
                                            required="required"
                                            autofocus="autofocus"
                                            name="firstName"
                                            type="text"
                                            value="{{$donor->firstName}}"
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
                                    >Last Name</label
                                    >

                                    <div class="col-md-8">
                      <input
                          class="form-control"
                          required="required"
                          autofocus="autofocus"
                          name="lastName"
                          type="text"
                          value="{{$donor->lastName}}"
                          id="lastName"
                      >
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
                                            required="required"
                                            autofocus="autofocus"
                                            name="phone"
                                            type="text"
                                            value="{{$donor->phone}}"
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
                                            required="required"
                                            autofocus="autofocus"
                                            name="address"
                                            type="text"
                                            value="{{$donor->address}}"
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
                                    >Date Of Birth</label
                                    >

                                    <div class="col-md-8">
                                        <input
                                            class="form-control"
                                            required="required"
                                            autofocus="autofocus"
                                            name="dateOfBirth"
                                            type="date"
                                            value="{{$donor->dateOfBirth}}"
                                            id="dateOfBirth"
                                        >
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
                                    >Blood Type</label
                                    >

                                    <div class="col-md-8">
                                        <select
                                            class="form-control"
                                            required="required"
                                            name="bloodType"
                                            type="text"
                                            id="bloodType"
                                        >
                                            @foreach ($blood_types as $blood_type)
                                                <option
                                                    @if($donor->bloodType == $blood_type->typeID)
                                                        selected
                                                    @endif
                                                    value={{$blood_type->typeID}}
                                                >{{$blood_type->typeName}}</option>
                                            @endforeach
                                        </select>

                                        <span class="help-block">
                        <strong></strong>
                      </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary">
                                            Update
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

