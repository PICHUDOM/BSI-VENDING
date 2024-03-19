@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3 id="myTab" role="tablist">Inventory
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <div class="table-responsive">
                                <form action="{{ url('/products-refill') }}" method="post" enctype="multipart/form-data">
                                    <div class="text-end">
                                        <button class="btn btn-sm btn-outline-primary float-end" type="submit"><i
                                                class="fas fa-plus-circle"></i> Add Or
                                            Update</button>
                                    </div>
                                    @csrf
                                    <table width="100%" class="table table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Slot</th>
                                                <th>Product Name</th>
                                                <th>Total</th>
                                                <th>Available</th>
                                                <th>To Refill</th>
                                                <th>Warehouse</th>
                                                <th>Created At</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                @php
                                                    $slotCounts = [];
                                                    $dateThreshold = '2024-02-07'; // Threshold date

                                                    foreach ($syncedData as $slot) {
                                                        $slotDate = date('Y-m-d', strtotime($slot['date']));
                                                        $sortDatedate = date('Y-m-d', strtotime($item->updated_at));

                                                        if (
                                                            isset($slot['slot']) &&
                                                            $slotDate < $dateThreshold &&
                                                            $sortDatedate < $slotDate
                                                        ) {
                                                            $slotNumber = $slot['slot'];
                                                            $slotCounts[$slotNumber] = isset($slotCounts[$slotNumber])
                                                                ? $slotCounts[$slotNumber] + 1
                                                                : 1;
                                                        }
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->product->p_name }}</td>
                                                    <td>{{ $item->QTY }}</td>
                                                    <td>

                                                        @php
                                                            $uniqueSlot = $item->slot_num;
                                                            $countAll = $slotCounts[$uniqueSlot] ?? 0;
                                                            $quantity = $item->QTY - $countAll;
                                                            $todayDate = date('2024-02-08');
                                                            $sortDate = date('Y-m-d', strtotime($item->created_at));
                                                        @endphp
                                                        @if ($quantity != $item->QTY && $item->to_refill != null)
                                                            {{ $item->to_refill - $countAll ?? 0 }}
                                                        @else
                                                            @php
                                                                $matchingSlot = null;
                                                                foreach ($syncedData as $slot) {
                                                                    if (
                                                                        isset($slot['slot']) &&
                                                                        $slot['slot'] == $uniqueSlot
                                                                    ) {
                                                                        $matchingSlot = $slot;
                                                                        break;
                                                                    }
                                                                }
                                                            @endphp
                                                            @if ($matchingSlot && $item->updated_at > $matchingSlot['date'])
                                                                {{-- {{ $quantity }} --}}
                                                                {{ $item->to_refill - $countAll ?? 0 }}
                                                            @else
                                                                {{ $item->to_refill ?? 0 }}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="mb-3 col-md-8">
                                                            <input type="hidden" name="inventory_id[]"
                                                                value="{{ $item->id }}">
                                                            <div class="input-group">
                                                                <span class="input-group-text">
                                                                    @if ($item->to_refill != null)
                                                                        {{ $item->to_refill - ($item->to_refill - $countAll) ?? 0 }}
                                                                    @else
                                                                        {{ $item->QTY }}
                                                                    @endif
                                                                </span>
                                                                <input type="number" name="to_refill[]" value=""
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <select id="ware_id" name="ware_id" autocomplete="off" class="border-style-select">
                                                                    <option value="" selected></option>
                                                                    @foreach ($wareData as $ware)
                                                                        <option value="{{ $ware->ware_id }}" data-slots="">
                                                                            {{ $ware->warehouse->warehouse_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ date('Y-m-d', strtotime($item->created_at)) }}</td>
                                                    <td
                                                        class="{{ $item->QTY - ($quantity + ($item->to_refill ?? 0)) > 5 ? 'text-danger' : 'text-success' }}">
                                                        {{ $item->QTY - ($quantity + ($item->to_refill ?? 0)) < 5 ? 'Active' : 'Active' }}
                                                    </td>

                                                    <td>
                                                        <a href="{{ url('edit_inventoryproduct/' . $item->id) }}"
                                                            class="btn btn-outline-info btn-rounded"><i
                                                                class="fas fa-pen"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
