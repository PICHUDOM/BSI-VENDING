@extends('layouts.app-nav')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 page-header">
                    <div class="page-pretitle">Overview</div>
                    <h2 class="page-title">Dashboard</h2>
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
                                    <div class="detail">
                                        <p class="detail-subtitle">Daily Income</p>
                                        <span class="number">$180,900</span>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="fas fa-calendar"></i> For this Month
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
                                        <i class="machine fas fa-hand-holding-usd"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="detail">
                                        <p class="detail-subtitle">Expense</p>
                                        <span class="number">$28,21</span>
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
                                        <p class="detail-subtitle">Daily sale report</p>
                                        <span class="number">75</span>
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
                                        <h5 class="mb-0">Top Products</h5>
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
                                        <h5 class="mb-0">Sales Transection</h5>
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
                                <table class="table table-striped">
                                    <thead class="success">
                                        <tr>
                                            <th>Num</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th class="text-end">QTY</th>
                                        </tr>
                                    </thead>
                                    <tbody class="img-size">
                                        <tr>
                                            <td>1</td>
                                            <td> <img src="/images/Coca.png" alt="logo">Coca cola</td>
                                            <td>$1</td>
                                            <td class="text-end">27,340</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td> <img src="/images/water.png" alt="logo">Water</td>
                                            <td>$0.5</td>
                                            <td class="text-end">21,280</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td> <img src="/images/pepsi.png" alt="logo">Pepsi</td>
                                            <td>$0.5</td>
                                            <td class="text-end">18,210</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td> <img src="/images/Nodle.png" alt="logo">Nodle</td>
                                            <td>$0.5</td>
                                            <td class="text-end">15,176</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td> <img src="/images/pepsi.png" alt="logo">Pepsi</td>
                                            <td>$1</td>
                                            <td class="text-end">14,276</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td> <img src="/images/water.png" alt="logo">Water</td>
                                            <td>$0.5</td>
                                            <td class="text-end">13,176</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td> <img src="/images/Nodle.png" alt="logo">Nodle</td>
                                            <td>$0.5</td>
                                            <td class="text-end">12,176</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td> <img src="/images/pepsi.png" alt="logo">Pepsi</td>
                                            <td>$1</td>
                                            <td class="text-end">11,886</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="dfd text-center">
                                    <i class="blue large-icon mb-2 fas fa-thumbs-up"></i>
                                    <h4 class="mb-0">+21,900</h4>
                                    <p class="text-muted">FACEBOOK PAGE LIKES</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="dfd text-center">
                                    <i class="orange large-icon mb-2 fas fa-reply-all"></i>
                                    <h4 class="mb-0">+22,566</h4>
                                    <p class="text-muted">INSTAGRAM FOLLOWERS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="dfd text-center">
                                    <i class="grey large-icon mb-2 fas fa-envelope"></i>
                                    <h4 class="mb-0">+15,566</h4>
                                    <p class="text-muted">E-MAIL SUBSCRIBERS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="dfd text-center">
                                    <i class="olive large-icon mb-2 fas fa-dollar-sign"></i>
                                    <h4 class="mb-0">+98,601</h4>
                                    <p class="text-muted">TOTAL SALES</p>
                                </div>
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
