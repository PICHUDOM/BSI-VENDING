@extends('layouts.app-nav')
@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item item-10">
            <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab"
                aria-controls="general" aria-selected="true">Location</a>
        </li>
        <li class="nav-item item-10">
            <a class="nav-link" id="email-tab" data-bs-toggle="tab" href="#email" role="tab" aria-controls="email"
                aria-selected="false">Create New Location</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
            <div class="content">
                <div class="container">
                    <div class="col-md-6">
                        <p class="text-muted">General settings such as,machines name, time description, address and so on.
                        </p>
                        <form action="{{ url('/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="m_name" class="form-label">Location Name</label>
                                <input type="text" name="location_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="installation_date" class="form-label">Latitude</label>
                                <input type="date" name="latitude" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="expired_date" class="form-label">logtitude</label>
                                <input type="date" name="logtitude" class="form-control">
                            </div>
                            {{-- <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" name="address"></textarea>
                            </div> --}}
                            <div class="mb-3">
                                <select name="provinc" id="provinc"
                                    style="width: 581px;
                                    height: 36px;">
                                    <option value="" disabled selected>Province</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="distric" id="distric"
                                    style="width: 581px;
                                    height: 36px;" disabled>
                                    <option value="" disabled selected>Districts</option>
                                    @foreach ($districts as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="communes" id="communes"
                                    style="width: 581px;
                                    height: 36px;" disabled>
                                    <option value="" disabled selected>Communes</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="villege" id="villege"
                                    style="width: 581px;
                                    height: 36px;" disabled>
                                    <option value="" disabled selected>Villege</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Machines image</label>
                                <input class="form-control" name="m_image" type="file" id="formFile1">
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
                                            <th>Location Name</th>
                                            <th>Latitude</th>
                                            <th>logtitude</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>EMab Koh Pich</td>
                                            <td>20m</td>
                                            <td>50m</td>
                                            <td>Active</td>
                                            <td class="text-end">
                                                <a href="" class="btn btn-outline-info btn-rounded"><i
                                                        class="fas fa-pen"></i></a>
                                                <a href="#"
                                                    class="btn btn-outline-danger btn-rounded"
                                                    onclick="return confirm('{{ __('Are you sure you want to deleted?') }}')"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
