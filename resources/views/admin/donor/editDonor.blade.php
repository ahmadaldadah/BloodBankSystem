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
                                            type="integer"
                                            value="{{$donor->phone}}"
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
                                            required="required"
                                            autofocus="autofocus"
                                            name="address"
                                            type="text"
                                            value="{{$donor->address}}"
                                            id="address"

                                        >

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
                                                <option value={{$blood_type->typeID}}
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

