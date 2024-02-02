@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 page-header ">
                    <div class="page-pretitle">Overview</div>
                    <h2 class="page-title">Dashboard</h2>
                    {{-- <input type="text" name="date" class="form-control" placeholder="Select Date" > --}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon-big text-center">
                                        <i class="machine fas fa-fax"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="detail">
                                        <p class="detail-subtitle">Devices</p>
                                        <span class="number">{{ $machinesByOwner }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="fas fa-calendar"></i> For this Week
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon-big text-center">
                                        <i class="machine fas fa-money-bill-alt"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="detail filter-date">
                                        <p class="detail-subtitle">Daily Income</p>
                                        <span class="number">
                                            @php
                                                $totalPriceSum = 0;

                                                foreach ($resultsApi as $value) {
                                                    $totalPriceSum += $value->total_price;
                                                }
                                                echo number_format($totalPriceSum, 2) . ' (៛)';
                                            @endphp

                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <span>
                                    <div class="stats">
                                        <i class="fas fa-calendar"></i> For this Week
                                    </div>
                                    {{-- <input type="text" name="date" class="form-control" placeholder="Select Date"> --}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon-big text-center">
                                        <i class="machine fas fa-hand-holding-usd"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="detail">
                                        <p class="detail-subtitle">Top Product</p>
                                        <span id="productData" class="number"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="fas fa-stopwatch"></i> For this Month
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon-big text-center">
                                        <i class="machine fas fa-file-signature"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="detail">
                                        <p class="detail-subtitle">Sales Transection
                                        </p>
                                        <span class="number">{{ $getTransection }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="fas fa-envelope-open-text"></i> For this week
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Sales By Categories</h5>
                                        <p class="text-muted">Current year website visitor data</p>
                                    </div>
                                    <div class="canvas-wrapper ">
                                        <canvas class="chart" id="pieChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Incom And Expense</h5>
                                        <p class="text-muted">Current year sales transection data</p>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <canvas class="chart" id="sales"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="content">
                            <div class="head">
                                <h5 class="mb-0">Product Instock</h5>
                                <p class="text-muted">Current year website visitor data</p>
                            </div>
                            <div class="canvas-wrapper">
                                <table class="table table-striped" id="dataTables-example">
                                    <thead class="success">
                                        <tr>
                                            <th>SLOT</th>
                                            <th>IMAGE</th>
                                            <th>PRODUCT</th>
                                            <th>AVAILAABLE</th>
                                            <th>PRICE OUT</th>
                                            <th class="text-end">CREATED AT </th>
                                        </tr>
                                    </thead>
                                    <tbody class="img-size">
                                        @php
                                            $slotCounts = [];
                                            foreach ($dataslot as $slot) {
                                                $slotNumber = $slot['slot'] ?? null;
                                                if ($slotNumber !== null) {
                                                    $slotCounts[$slotNumber] = isset($slotCounts[$slotNumber]) ? $slotCounts[$slotNumber] + 1 : 1;
                                                }
                                            }
                                        @endphp
                                        @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $data->product->p_image) }}"
                                                        alt="{{ $data->product->p_image }}"
                                                        style="max-width: 60px; max-height: 69px;">
                                                </td>
                                                <td>{{ $data->product->p_name }}</td>
                                                <td>
                                                    @php
                                                        $uniqueSlot = $data->slot_num;
                                                        $countAll = $slotCounts[$uniqueSlot] ?? 0;
                                                        $quantity = $data->QTY - $countAll;
                                                    @endphp
                                                    @if ($quantity != $data->QTY)
                                                        {{ $quantity + ($data->to_refill ?? 0) }}
                                                    @else
                                                        @php
                                                            $matchingSlot = null;
                                                            foreach ($dataslot as $slot) {
                                                                if (isset($slot['slot']) && $slot['slot'] == $uniqueSlot) {
                                                                    $matchingSlot = $slot;
                                                                    break;
                                                                }
                                                            }
                                                        @endphp
                                                        @if ($matchingSlot && $data->updated_at > $matchingSlot['date'])
                                                            {{ $quantity }}
                                                        @else
                                                            {{ $data->QTY }}
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>{{ $data->product->producPrice->price_out ?? 0 }}(៛)</td>
                                                <td class="text-end">{{ $data->created_at }}</td>
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

    <script src="{{ asset('assets/vendor/chartsjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard-charts.js') }}"></script>
@endsection
