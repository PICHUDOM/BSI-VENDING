@extends('layouts.app-nav')
@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab"
                aria-controls="general" aria-selected="true">Vending Machines</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="email-tab" data-bs-toggle="tab" href="#email" role="tab" aria-controls="email"
                aria-selected="false">New Machine</a>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
            <div class="content">
                <div class="container">
                    <div class="col-md-6">
                        <p class="text-muted">General settings such as,machines name, time description, address and so on.
                        </p>
                        <form action="{{ url('/create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="m_name" class="form-label">Machines name</label>
                                <input type="text" name="m_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="installation_date" class="form-label">Installation date</label>
                                <input type="text" name="installation_date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="expired_date" class="form-label">Expired date</label>
                                <input type="text" name="expired_date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" name="address"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Machines image</label>
                                <input class="form-control" name="m_img" type="file" id="formFile1">
                                <small class="text-muted">The image must have a maximum size of 1MB</small>
                            </div>
                            <div class="mb-3 text-end">
                                <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper tab-pane fade active show"id="general" role="tabpanel" aria-labelledby="general-tab">
        <div id="body" class="active">
            <div class="content">
                <div class="container">
                    {{-- <div class="page-title">
                        <div class="bootstrap-iso">
                            <div class="row">
                                <div class="col-md-8">
                                    <button type="button" class="btn-create">Create Product</button>
                                </div>
                                <div class="col-md-4">
                                    <form class="form-horizontal" method="post">
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar">
                                                    </i>
                                                </div>
                                                <input class="form-control" id="date" name="date"
                                                    placeholder="MM/DD/YYYY" type="text" />
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
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <table width="100%" class="table table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Installation Date</th>
                                                    <th>Expired Date</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $data)
                                                <tr>
                                                    <td>{{$loop->iteration }}</td>
                                                    <td>{{$data->m_name}}</td>
                                                    <td>{{$data->installation_date}}</td>
                                                    <td>{{$data->expiry_date}}</td>
                                                    <td>{{$data->address}}</td>
                                                    <td>Active</td>
                                                    <td class="text-end">
                                                        <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                                        <a href="/destroy/{{ $data->id }}" class="btn btn-outline-danger btn-rounded" onclick="return confirm('{{ __('Are you sure you want to deleted?') }}')"><i class="fas fa-trash"></i></a>
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
                </div>
            </div>
        </div>
    </div>
@endsection
