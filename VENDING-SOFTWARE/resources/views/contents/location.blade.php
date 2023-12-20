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
    </div>
@endsection
