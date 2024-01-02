@extends('master')
@section('main')
    <div class="container mt-3">
        <div class="row">
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        @include('create')
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-3">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">បញ្ចីអ្នកជំងឺ</h2>
                        <span class="mt-1 text-sm leading-6 text-gray-600">ក្រសួងសុខាភិបាលនៃព្រះរាជាណាចក្រកម្ពុជា</span>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 btn-primary float-right"><i
                                class="fa fa-address-card-o"></i>
                            បញ្ចូលទិន្នន័យអ្នកជំងឺ
                        </button>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">លរ</th>
                            <th scope="col">ឈ្នោះអ្នកជំងឺ</th>
                            <th scope="col">ភេទ</th>
                            <th scope="col">ថ្ងៃខែឆ្នាំកំណើត</th>
                            <th scope="col">ខេត្ត</th>
                            <th scope="col">ស្រុក</th>
                            <th scope="col">ឃុំ</th>
                            <th scope="col">ភូមិ</th>
                        </tr>
                    </thead>
                    <tbody id="contact">
                    </tbody>
                </table>
            </div>
            <div class="col-4" id="Numberpage">
                <h6 class="float-left">page <span id="current_page"> 1 </span> of <span id="last_page">1</span></h6>
            </div>
            <div class="col-8">
                <div aria-label="...">
                    <ul class="pagination float-right">

                    </ul>
                </div>
            </div>
            @push('script')
                <script src="{{ URL::asset('js/components/formatted.js') }}"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                <script>
                    patient('/api/patient/web?page=1')
                    $('.pagination').css('cursor', 'pointer');

                    function patient(url) {
                        $.ajax({
                            type: 'GET',
                            url: url,
                            success: function(data) {
                                const number_link = data.meta.links;
                                const curr = data.meta.current_page;
                                const last = data.meta.last_page;
                                var text = '';
                                $(".pagination").find('li').remove();
                                number_link.forEach(el => {
                                    text += `<li class="page-item ${el.active ? 'active' : ''} ${el.url ? '': 'disabled'}">
                                        <a class="page-link"  tabindex="-1" data-url="${el.url}" id="click_link_page">${el.label}</a>
                                    </li>`;
                                });

                                $('#current_page').text(curr);
                                $('#last_page').text(last);

                                $(".pagination").append(text);
                                $("#contact").find('tr').remove();

                                data.data.forEach(el => {
                                    $('#contact').append(
                                        "<tr>" +
                                        "<td> " + el.id + " </td>" +
                                        "<td> " + el.name + " </td>" +
                                        "<td> " + el.gender + " </td>" +
                                        "<td> " + el.dob + " </td>" +
                                        "<td> " + el.province + " </td>" +
                                        "<td> " + el.district + " </td>" +
                                        "<td> " + el.commune + " </td>" +
                                        "<td> " + el.village + " </td>" +
                                        "</tr>"
                                    );
                                });
                            },
                        });
                    }

                    //on click pagination
                    $('body').on('click', '#click_link_page', function() {
                        var url = $(this).data('url');
                        patient(url);
                    });

                    //get all provinces
                    $.ajax({
                        type: 'GET',
                        url: '/api/provinces/web',
                        success: function(data) {
                            $.each(data.data, function(key, val) {
                                $('#province').append('<option value= ' + (val.id) + '>' + val.name_en +
                                    '</option>')
                            });
                        },
                        error: function() {
                            console.log(data);
                        }
                    });

                    //get all districts
                    $("#province").change(function() {
                        var province_id = $('select[name=province]').val();
                        if (province_id != "") {
                            $.ajax({
                                type: 'GET',
                                url: '/api/districts/' + province_id + '/web',
                                success: function(data) {
                                    $("#districts").find('option').remove();
                                    $("#communes").find('option').remove();
                                    $("#villages").find('option').remove();
                                    $("#communes").append('<option value="">សូមជ្រើសរើស</option>');
                                    $("#villages").append('<option value="">សូមជ្រើសរើស</option>');
                                    $("#districts").append('<option value="">សូមជ្រើសរើស</option>');
                                    $.each(data.data, function(key, val) {
                                        $('#districts').append('<option value= ' + (val.id) + '>' + val
                                            .name_en + '</option>')
                                    });
                                },
                                error: function() {
                                    console.log(data);
                                }
                            });
                        } else {
                            $("#districts").find('option').remove();
                            $("#communes").find('option').remove();
                            $("#villages").find('option').remove();
                            $("#communes").append('<option value="">សូមជ្រើសរើស</option>');
                            $("#villages").append('<option value="">សូមជ្រើសរើស</option>');
                            $("#districts").append('<option value="">សូមជ្រើសរើស</option>');
                        }
                    });

                    //get all communes
                    $("#districts").change(function() {
                        var district_id = $('select[name=districts]').val();
                        if (district_id != "") {
                            $.ajax({
                                type: 'GET',
                                url: '/api/communes/' + district_id + '/web',
                                success: function(data) {
                                    $("#communes").find('option').remove();
                                    $("#villages").find('option').remove();
                                    $("#communes").append('<option value="">សូមជ្រើសរើស</option>');
                                    $("#villages").append('<option value="">សូមជ្រើសរើស</option>');
                                    $.each(data.data, function(key, val) {
                                        $('#communes').append('<option value= ' + (val.id) + '>' + val
                                            .name_en + '</option>');
                                    });
                                },
                                error: function() {
                                    console.log(data);
                                }
                            });
                        } else {
                            $("#communes").find('option').remove();
                            $("#villages").find('option').remove();
                            $("#communes").append('<option value="">សូមជ្រើសរើស</option>');
                            $("#villages").append('<option value="">សូមជ្រើសរើស</option>');
                        }
                    });

                    //get all villages
                    $("#communes").change(function() {
                        var commune_id = $('select[name=communes]').val();
                        if (commune_id != "") {
                            $.ajax({
                                type: 'GET',
                                url: '/api/villages/' + commune_id + '/web',
                                success: function(data) {
                                    $("#villages").find('option').remove();
                                    $("#villages").append('<option value="">សូមជ្រើសរើស</option>');
                                    $.each(data.data, function(key, val) {
                                        $('#villages').append('<option value= ' + (val.id) + '>' + val
                                            .name_en + '</option>');
                                    });
                                },
                                error: function() {
                                    console.log(data);
                                }
                            });
                        } else {
                            $("#villages").find('option').remove();
                            $("#villages").append('<option value="">សូមជ្រើសរើស</option>');
                        }
                    });

                    //post data patient to database
                    $('html').on('click', '#submit', function(e) {
                        e.preventDefault();
                        var myGender = $("input[name='gender']:checked").val();
                        var data = {
                            'name': $('#name').val(),
                            'email': $('#email').val(),
                            'phone': $('#phone').val(),
                            'gender': myGender,
                            'date_of_birth': $('#date_of_birth').val(),
                            'village_id': $('#villages').val(),
                            'province': $('#province').val(),
                            'districts': $('#districts').val(),
                            'communes': $('#communes').val(),
                        }
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        // ajax request send
                        $.ajax({
                            type: 'POST',
                            url: '/api/patient/store',
                            data: data,
                            dataType: "json",
                            success: function(response) {
                                if (response.status == 400) {
                                    $('#savaform_errlist').html()
                                    $('#savaform_errlist').addClass('alert alert-danger')
                                    $('#savaform_errlist').find('li').remove()
                                    $.each(response.messages, function(key, err_value) {
                                        $('#savaform_errlist').append(
                                            '<li> <i class="fa fa-exclamation-circle" aria-hidden="true"></i> ' +
                                            err_value + '</li>')
                                    })
                                }
                                if (response.messages == "successfully") {
                                    location.reload();
                                }
                            },
                            error: function() {
                                console.log(data);
                            }
                        });
                    });
                </script>
            @endpush
        @endsection
