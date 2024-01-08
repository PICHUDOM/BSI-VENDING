@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
                    <div class="container">
                        <div class="col-md-12">
                            <form action="{{ url('slot/create') }}" method="post" enctype="multipart/form-data"
                                name="slotForm">
                                @csrf
                                <div class="card space-card">
                                    <div class="card-header">
                                        <h5>Our Slot detail</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-md-12">
                                            <div class="col-md-6">
                                                <div class="mb-3 col-md-6> <label for=" province"
                                                    class=" block text-sm font-medium leading-6 text-gray-900">
                                                    Machines</label>
                                                    <div class="relative mt-2 rounded-md shadow-sm">
                                                        <select id="id_ven_machines" name="id_ven_machines"
                                                            autocomplete="off" class="border-style-select">
                                                            <option value="" selected></option>
                                                            @foreach ($machin as $machine)
                                                                <option value="{{ $machine->id }}"
                                                                    data-slots="{{ $machine->slot }}">
                                                                    {{ $machine->m_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="quantity" class="form-label">Total Number Of Slot</label>
                                                <input type="text" name="" class="form-control"
                                                    id="quantity-input" readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row col-md-12">

                                            <div id="content"></div>
                                        </div>
                                        <div class="mb-3 text-end">
                                            <button class="btn btn-success" type="submit" onclick="submitForm()"><i class="fas fa-check"></i>
                                                Save</button>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                
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
    <script>
        document.getElementById('id_ven_machines').addEventListener('change', function() {
            var selectedMachineOption = this.options[this.selectedIndex];
            var slots = selectedMachineOption.getAttribute('data-slots');
            var contentContainer = document.getElementById('content');
            document.getElementById('quantity-input').value = slots;

            var html = '';
            for (var i = 1; i <= slots; i++) {
                html += '<div class="row col-md-12 ">';
                html += '<div class="mb-3 col-md-1">';
                html += '<input type="text" class="form-control text-center" value="' + i + '" readonly>';
                html += '</div>';
                html += '<div class="mb-3 col-md-5 text-center">';

                html += '<select name="product_id[]" id="product_id1' + i +
                    '" class="border-style-select text-center" autocomplete="off">';
                html += '<option value=""  selected disabled></option>';

                @foreach ($product_ca as $product)
                    html +=
                        '<option value="{{ $product->id }}" data-slots="{{ $product->slot }}">{{ $product->p_name }}</option>';
                @endforeach
                html += '</select>';
                html += '<p></p>';
                html += '</div>';
                html += '<div class="mb-3 col-md-6">';
                html += '<input type="Number" name="quantity[]" class="form-control text-center" value="" >';
                html += '</div>';
                html += '</div>';
            }
            contentContainer.innerHTML = html;
        });
    </script>
@endsection
