@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3 id="myTab" role="tablist">Vending Machines
                    <a class="btn btn-sm btn-outline-primary float-end" id="machine-tab" data-bs-toggle="tab" href="#machine"
                        role="tab" aria-controls="machine" aria-selected="false">
                        <i class="fas fa-plus-circle"></i><span class="btn-header" ">Add Machines</span>
                 </a>
                 <a class="active btn btn-sm btn-outline-primary float-end" id="general-tab" data-bs-toggle="tab"
                    href="#general" role="tab" aria-controls="general" aria-selected="true">
                 <i class="fas fa-angle-left"></i> <span class="btn-header">Return</span>
                 </a>
              </h3>
           </div>
           <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
              <div class="modal-dialog modal-xl">
                <div class="modal-content"> @include('contents/edit_vending_machines') </div>
              </div>
            </div>
           <div class="box box-primary">
              <div class="box-body">
                 <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                       <div class="table-responsive">
                          <table width="100%" class="table table-hover" id="dataTables-example">
                             <thead>
                                <tr>
                                   <th>#</th>
                                   <th>Name</th>
                                   <th>Machine Image</th>
                                   <th>Slot</th>
                                   <th>Installation Date</th>
                                   <th>Expired Date</th>
                                   <th>Address</th>
                                   <th>Created At</th>
                                   {{-- <th>Updated At</th> --}}
                                   <th>Status</th>
                                   <th></th>
                                </tr>
                             </thead>
                             <tbody>
                                  @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->m_name }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $data->m_image) }}" alt="{{ $data->m_name }}"
                                        style="max-width: 60px; max-height: 69px;">
                                </td>
                                <td>{{ $data->slot }}</td>
                                <td>{{ $data->installation_date }}</td>
                                <td>{{ $data->expiry_date }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->created_at }}</td>
                                {{-- <td>{{ $data->updated_at }}</td>     --}}
                                <td>Active</td>
                                <td class="text-end">
                                    <a href="" class="btn btn-outline-muted btn-rounded"><i
                                            class="fas fa-regular fa-eye "></i></a>
                                    <a href="/{}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        class="btn btn-outline-muted btn-rounded"><i class="fas fa-pen"></i></a>
                                    <a href="/destroy/{{ $data->id }}" class="btn btn-outline-danger btn-rounded"
                                        onclick="return confirm('{{ __('Are you sure you want to deleted?') }}')"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
            </div>
        </div>
        <div class="tab-pane fade" id="machine" role="tabpanel" aria-labelledby="machine-tab">
            <div class="content">
                <div class="container">
                    <div class="card ">
                        <div class="card-body">
                            <div class="col-md-12">
                                <form action="{{ url('/create') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card space-card">
                                        <div class="card-header">
                                            <h5>Machines Information</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row col-md-12">
                                                <div class="mb-3 col-md-6">
                                                    <label for="m_name" class="form-label">Machines name</label>
                                                    <input type="text" name="m_name" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="slot" class="form-label">Slot</label>
                                                    <input type="text" name="slot" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row col-md-12">
                                                <div class="mb-3 col-md-6">
                                                    <label for="installation_date" class="form-label">Installation
                                                        date</label>
                                                    <input type="date" name="installation_date" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="expired_date" class="form-label">Expired date</label>
                                                    <input type="date" name="expiry_date" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="mb-3">
                                                <label class="form-label">Machines image</label>
                                                <input class="form-control" name="m_image" type="file"
                                                    id="formFile1">
                                                <small class="text-muted">The image must have a maximum size of 1MB</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Machines Address</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row col-md-12">
                                                <div class="col-md-6">
                                                    <div class="mb-3 col-md-6>
                                                <label for="province"
                                                        class=" block text-sm font-medium leading-6 text-gray-900">
                                                        Province</label>
                                                        <div class="relative mt-2 rounded-md shadow-sm">
                                                            <select id="province" name="province"
                                                                autocomplete="country-name" class="border-style-select">
                                                                <option value="" selected>Select Province</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 col-md-12">
                                                        <label for="districts"
                                                            class=" block text-sm font-medium leading-6 text-gray-900">Districts</label>
                                                        <div class="relative mt-2 rounded-md shadow-sm">
                                                            <select id="districts" name="districts"
                                                                autocomplete="country-name" class="border-style-select">
                                                                <option selected>Select Districts</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 col-md-12">
                                                        <label for="communes"
                                                            class="block text-sm font-medium leading-6 text-gray-900">Communes</label>
                                                        <div class="relative mt-2 rounded-md shadow-sm">
                                                            <select id="communes" name="communes"
                                                                autocomplete="country-name" class="border-style-select">
                                                                <option selected>Select Communes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <label for="villages"
                                                            class="block text-sm font-medium leading-6 text-gray-900">village</label>
                                                        <div class="relative mt-2 rounded-md shadow-sm">
                                                            <select id="villages" name="villages"
                                                                autocomplete="country-name" class="border-style-select">
                                                                <option selected>Select Village</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Full Address</label>
                                                <textarea class="form-control" name="address"></textarea>
                                            </div>
                                            <div class="mb-3 text-end">
                                                <button class="btn btn-success" type="submit"><i
                                                        class="fas fa-check"></i> Save</button>
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
    </div>
    </div>
    </div>
@endsection
