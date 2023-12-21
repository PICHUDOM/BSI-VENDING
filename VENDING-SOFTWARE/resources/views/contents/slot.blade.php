@extends('layouts.app-nav')
@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item item-10">
            <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab"
                aria-controls="general" aria-selected="true">Slot</a>
        </li>
        <li class="nav-item item-10">
            <a class="nav-link" id="email-tab" data-bs-toggle="tab" href="#email" role="tab" aria-controls="email"
                aria-selected="false">Create New Slot</a>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
            <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-6">
                                <form action="{{ url('/create') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="card">
                                    <div class="card-header"><h5>Our Slot detail</h5></div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="type" class="form-label">Type</label>
                                            <input type="text" name="type" class="form-control">
                                        </div>
                                        <div class="row col-md-12">
                                            <div class="mb-3 col-md-6">
                                                <label for="quantity" class="form-label">Quantity</label>
                                                <input type="text" name="quantity" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="id_ven_machines" class="form-label">Vending Machine</label>
                                                <input type="text" name="id_ven_machines" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="mb-3">
                                            <label class="form-label">Machines image</label>
                                            <input class="form-control" name="m_image" type="file" id="formFile1">
                                            <small class="text-muted">The image must have a maximum size of 1MB</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header"><h5>Machines Address</h5></div>
                                    <div class="card-body">

                                        <div class="row col-md-12">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Province</label>
                                                <select name="provinc" id="provinc"
                                                    style="width: 100%;
                                                    height: 36px; ">
                                                    <option value="" disabled selected>Province</option>
                                                    @foreach ($data as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Districts</label>
                                                <select name="distric" id="distric"
                                                    style="width: 100%;
                                                    height: 36px;" disabled>
                                                    <option value="" disabled selected>Districts</option>
                                                    @foreach ($data as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Communes</label>
                                                <select name="communes" id="communes"
                                                    style="width: 100%;
                                                    height: 36px;" disabled>
                                                    <option value="" disabled selected>Communes</option>
                                                    @foreach ($data as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Villege</label>
                                                <select name="villege" id="villege"
                                                    style="width: 100%;
                                                    height: 36px;" disabled>
                                                    <option value="" disabled selected>Villege</option>
                                                    @foreach ($data as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" name="address"></textarea>
                                        </div>
                                        <div class="mb-3 text-end">
                                            <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Save</button>
                                        </div>
                                
                                    </div>
                                </div>
                            </form> 
                            </div>
                        </div>
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
                                            <th>Type</th>
                                            <th>Quantity</th>
                                            <th>Vending Machines</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Noodle</td>
                                        <td>291</td>
                                        <td>Preab Sovath</td>
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
