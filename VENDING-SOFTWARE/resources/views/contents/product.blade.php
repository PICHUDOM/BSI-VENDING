@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3 id="myTab" role="tablist">Product
                    <a class="btn btn-sm btn-outline-primary float-end" id="slot-tab" data-bs-toggle="tab" href="#slot"
                        role="tab" aria-controls="slot" aria-selected="false">
                        <i class="fas fa-plus-circle"></i><span class="btn-header" ">Add product</span>
                                                    </a>
                                                    <a class=" active btn btn-sm btn-outline-primary float-end" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">
                                                    <i class="fas fa-angle-left"></i> <span class="btn-header">Return</span>
                                                    </a>
                                                  </h3>
                                                </div>
                                                <div class="box box-primary">
                                                <div class="box-body">
                                                <div class="tab-content" id="myTabContent">
                                                  <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                                                    <table width="100%" class="table table-hover" id="dataTables-example">
                                                      <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Image</th>
                                                            <th>Product Name</th>
                                                            <th>Expiry Date</th>
                                                            <th>Specific Code</th>
                                                            <th>Type</th>
                                                            <th>Created At</th>
                                                            <th>Status</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                               @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $data->p_image) }}" alt="{{ $data->p_image }}"
                                        style="max-width: 60px; max-height: 69px;">
                                </td>
                                <td>{{ $data->p_name }}</td>
                                <td>{{ $data->expiry_date }}</td>
                                <td>{{ $data->specific_code }}</td>
                                <td>{{ $data->pro_category->type ?? '' }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>Active</td>
                                <td class="text-end">
                                    <a href="" class="btn btn-outline-muted btn-rounded"><i
                                            class="fas fa-regular fa-eye "></i></a>
                                    <a href="" class="btn btn-outline-info btn-rounded"><i
                                            class="fas fa-pen"></i></a>
                                    <a href="product/destroy/{{ $data->id }}" class="btn btn-outline-danger btn-rounded"
                                        onclick="return confirm('{{ __('Are you sure you want to deleted?') }}')"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
            </div>
            <div class="tab-pane fade" id="slot" role="tabpanel" aria-labelledby="slot-tab">
                <div class="content">
                    <div class="container">
                        <div class="col-md-12">
                            <form action="{{ url('/create-product') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card space-card">
                                    <div class="card-header">
                                        <h5>Product</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-md-12">
                                            <div class="mb-3 col-md-6">
                                                <label for="p_name" class="form-label">Product Name</label>
                                                <input type="text" name="p_name" class="form-control">
                                                <span class="text-danger">
                                                    @error('p_name')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="expired_date" class="form-label">Expired date</label>
                                                <input type="date" name="expiry_date" class="form-control">
                                                <span class="text-danger">
                                                    @error('expiry_date')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row col-md-12">
                                                <div class="mb-3 col-md-6">
                                                    <label for="p_name" class="form-label">Specific Code</label>
                                                    <input type="text" name="specific_code" class="form-control">
                                                    <span class="text-danger">
                                                        @error('specific_code')
                                                            {{$message}}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 col-md-6> <label for=" province"
                                                        class=" block text-sm font-medium leading-6 text-gray-900">
                                                        Product Categories</label>
                                                        <div class="relative mt-2 rounded-md shadow-sm">
                                                            <select id="id_pro_categories" name="id_pro_categories"
                                                                autocomplete="off" class="border-style-select">
                                                                <option value="" selected>Select product
                                                                    Categories</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->type }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Machines image</label>
                                                    <input class="form-control" name="p_image" type="file"
                                                        id="formFile1">
                                                    <small class="text-muted">The image must have a maximum size of
                                                        1MB</small>
                                                </div>
                                                <div class="mb-3 text-end">
                                                    <button class="btn btn-success" type="submit"><i
                                                            class="fas fa-check"></i>
                                                        Save</button>
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
@endsection
