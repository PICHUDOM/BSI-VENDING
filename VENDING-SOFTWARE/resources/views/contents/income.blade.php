@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3 id="myTab" role="tablist">Income
                    <a class="btn btn-sm btn-outline-primary float-end" id="slot-tab" data-bs-toggle="tab" href="#slot"
                        role="tab" aria-controls="slot" aria-selected="false">
                        <i class="fas fa-plus-circle"></i><span class="btn-header" >Add income</span>
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
                                                            <th>Description</th>
                                                            <th>Type</th>
                                                            <th>Machine</th>
                                                            <th>Status</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                    @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->income_category->type ?? ''  }}</td>
                                <td>{{ $data->machine->m_name ?? ''}}</td>
                                <td>Active</td>
                                <td class="text-end">
                                    <a href="" class="btn btn-outline-muted btn-rounded"><i
                                            class="fas fa-regular fa-eye "></i></a>
                                    <a href="{{ url('edit_product/'.$data->id) }}" class="btn btn-outline-info btn-rounded"><i
                                            class="fas fa-pen"></i></a>
                                    <a href="income/destroy/{{ $data->id }}" class="btn btn-outline-danger btn-rounded"
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
                            <form action="{{ url('/create-income') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card space-card">
                                    <div class="card-header">
                                        <h5>Income</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-md-12">
                                            <div class="mb-3 col-md-6">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" name="description"></textarea>
                                                {{-- <span class="text-danger">
                                                    @error('description')
                                                        {{$message}}
                                                    @enderror
                                                </span> --}}
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row col-md-12">
                                                <div class="col-md-6">
                                                    <div class="mb-3 col-md-6"> <label for=" province"
                                                        class=" block text-sm font-medium leading-6 text-gray-900">
                                                        Income Categories</label>
                                                        <div class="relative mt-2 rounded-md shadow-sm">
                                                            <select id="id_income_categories" name="id_income_categories"
                                                                autocomplete="off" class="border-style-select">
                                                                <option value="" selected>Select
                                                                    Categories</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->type }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="mb-3 col-md-6"> <label for=" province"
                                                        class=" block text-sm font-medium leading-6 text-gray-900">
                                                        Vending Machine</label>
                                                        <div class="relative mt-2 rounded-md shadow-sm">
                                                            <select id="id_vending_machine" name="id_vending_machine"
                                                                autocomplete="off" class="border-style-select">
                                                                <option value="" selected>Select
                                                                    Machine</option>
                                                                @foreach ($machine as $machines)
                                                                    <option value="{{ $machines->id }}">
                                                                        {{ $machines->m_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
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
