@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Edit Blood Donation

                            <a href="/bloodDonation" class="btn btn-default pull-right"
                            >Go Back</a
                            >
                        </h2>
                        @include('partials._errors')
                    </div>

                    <div class="panel-body">
                        <form
                            method="POST"
                            action="/bloodDonation/{{$bloodDonation->bloodID}}"
                            accept-charset="UTF-8"
                            class="form-horizontal"
                            role="form"
                        >
                            {{-- <input type="hidden" name="_method" value="put"> --}}
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="bloodID" class="col-md-2 control-label"
                                >bloodID</label
                                >

                                <div class="col-md-8">
                                    <input
                                        class="form-control"
                                        required="required"
                                        autofocus="autofocus"
                                        name="bloodID"

                                        value="{{$bloodDonation->bloodID}}"
                                        id="bloodID"
                                    />

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
                                        name="donorID"

                                    >

                                        @foreach ($donors as $donor)
                                            <option value={{$donor->donorID}}
                                            >{{$donor->donorID}}-{{$donor->firstName}}</option>
                                        @endforeach
                                    </select>

                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="dateDonated" class="col-md-2 control-label"
                                >Date Donated</label
                                >

                                <div class="col-md-8">
                                    <input
                                        class="form-control"
                                        required="required"
                                        autofocus="autofocus"
                                        name="dateDonated"
                                        type="date"
                                        value="{{$bloodDonation->dateDonated}}"
                                        id="dateDonated"
                                    >

                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="quantity" class="col-md-2 control-label"
                                >Quantity</label
                                >

                                <div class="col-md-8">
                                    <input
                                        class="form-control"
                                        required="required"
                                        autofocus="autofocus"
                                        name="quantity"
                                        type="number"
                                        value="{{$bloodDonation->quantity}}"
                                        id="quantity"
                                    >

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

