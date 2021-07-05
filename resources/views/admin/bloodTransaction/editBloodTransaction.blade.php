@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Edit Blood Transaction

                            <a href="/bloodTransaction" class="btn btn-default pull-right"
                            >Go Back</a
                            >
                        </h2>
                        @include('partials._errors')
                    </div>

                    <div class="panel-body">
                        <form
                            method="POST"
                            action="/bloodTransaction/{{$bloodTransaction->transactID}}"
                            accept-charset="UTF-8"
                            class="form-horizontal"
                            role="form"
                        >
                            {{-- <input type="hidden" name="_method" value="put"> --}}
                            @method('put')
                            @csrf

                            <div class="form-group">
                                <label for="empID" class="col-md-2 control-label"
                                >empID</label
                                >

                                <div class="col-md-8">
                                    <select
                                        class="form-control"
                                        required="required"
                                        id="empID"
                                        name="empID"

                                    >

                                        @foreach ($medical_personnels as $medical_personnel)
                                            <option value={{$medical_personnel->empID}}
                                            >{{$medical_personnel->empID}}-{{$medical_personnel->firstName}}</option>
                                        @endforeach
                                    </select>

                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="dateOut" class="col-md-2 control-label"
                                >Date Out</label
                                >

                                <div class="col-md-8">
                      <input
                          class="form-control"
                          required="required"
                          autofocus="autofocus"
                          name="dateOut"
                          type="date"
                          value="{{$bloodTransaction->dateOut}}"
                          id="dateOut"
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
                                        value="{{$bloodTransaction->quantity}}"
                                        id="quantity"
                                    >

                                    <span class="help-block">
                        <strong></strong>
                      </span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="recipientsID" class="col-md-2 control-label"
                                >recipients</label
                                >

                                <div class="col-md-8">
                                    <select
                                        class="form-control"
                                        required="required"
                                        id="recipientsID"
                                        name="recipientsID"
                                    >

                                        @foreach ($recipients as $recipient)
                                            <option value= {{$recipient->recipientsID}}
                                            >{{ $recipient->recipientsID }}-{{ $recipient->firstName }}</option>
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

