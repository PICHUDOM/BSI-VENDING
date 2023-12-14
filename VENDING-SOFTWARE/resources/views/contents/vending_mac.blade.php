@extends('layouts.app-nav')
@section('content')
    <div class="bootstrap-iso">
        {{-- <div class="container-fluid"> --}}
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <form class="form-horizontal" method="post">

                    <div class="col-sm-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar">
                                </i>
                            </div>
                            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY"
                                type="text" />
                        </div>
                    </div>
                    <label class="col-sm-2 requiredField" for="date">
                        <button class="btn btn-primary " name="submit" type="submit">
                            Submit
                        </button>
                    </label>

                </form>
            </div>
        </div>
        {{-- </div> --}}
    </div>
@endsection
