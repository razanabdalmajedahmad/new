@extends('welcome')

@section('style')
    <title>list inventory</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('headder')
<h2>list inventory</h2>
@endsection

@section('min')
<div class=" mt-5"id="alertdiv" hidden></div>
<div class="table-responsive">
    <table class="table" id="dataTable">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Code</th>
          <th scope="col">Date</th>
          <th scope="col">Number</th>
          <th scope="col">Company Name</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Customer Address</th>
          <th scope="col">Customer Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <div class="row mt-2">
        {{-- <div id="tableinfo" class="col-md-6 d-flex justify-content-start"></div>
        <div id="tablepaginate" class="col-md-6 d-flex justify-content-end"></div> --}}
    </div>
  </div>


@endsection
@section('script')
<script
    src="https://code.jquery.com/jquery-3.6.1.js"
    integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {

            let table=$('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                scrollCollapse: true,
                "pageLength": 100,
                "deferRender": true,
                "paging": true,
                "pagingType": "full_numbers",
                "ajax": {
                    "url": "{{ route('list2') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        return $.extend({}, d, {
                            _token: "{{ csrf_token() }}",
                        });
                    },
                },
                "columns": [
                    {
                        data: 'name',
                        name: 'name',
                        width: 100
                    },
                    {
                        data: 'code',
                        name: 'code',
                        width: 100
                    },
                    {
                        data: 'date',
                        name: 'date',
                        width: 100
                    },
                    {
                        data: 'namber',
                        name: 'namber',
                        width: 100
                    },
                    {
                        data: 'company_name',
                        name: 'company_name',
                        width: 100
                    },
                    {
                        data: 'customer_name',
                        name: 'customer_name',
                        width: 100
                    },
                    {
                        data: 'customer_address',
                        name: 'customer_address',
                        width: 100
                    },
                    {
                        data: 'customer_email',
                        name: 'customer_email',
                        width: 100
                    },
                    {
                        data: 'action',
                        name: 'action',
                        width: 500
                    },
                ],
                "lengthMenu": [
                    [1, 2, 1000, 2000, 5000, 10000],
                    [1, 2, 1000, 2000, 5000, 10000],
                ],
                "language":{
                    searchPlaceholder:"Type and press Enter"
                },
                "dom": 'Blftip',
                "buttons": [

                ],
                initComplete: (settings, json) => {
                    $('#tablepaginate').empty();
                    $('#dataTable_paginate').appendTo('#tablepaginate');
                    $('#tableinfo').empty();
                    $('#dataTable_info').appendTo('#tableinfo');
                    $('#tablebuttoncsv').empty();
                    $('.btn.btn-secondary.buttons-csv.buttons-html5').appendTo(
                        '#tablebuttoncsv');
                    $('#tablebuttonexcel').empty();
                    $('.btn.btn-secondary.buttons-excel.buttons-html5').appendTo(
                        '#tablebuttonexcel');
                    $('#tablebuttonpdf').empty();
                    $('.btn.btn-secondary.buttons-pdf.buttons-html5').appendTo(
                        '#tablebuttonpdf');
                }


            });
            $('body').on('click', '.delete', function() {
                var id = table.row(this.closest('tr')).data()['id'];
                swal({
                    title: 'Are you sure?',
                    text: 'This record and it`s details will be permanantly deleted!',
                    icon: 'warning',
                    buttons: ["Cancel", "Yes!"],
                }).then(function(value) {
                    if (value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url: "{{ route('deleteinvoice') }}",
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(result) {
                                if (result.state) {
                                    $('#alertdiv').empty();
                                    $('#alertdiv').css('display','block');
                                    $('#alertdiv').append("<div class= 'alert alert-success'>" +result.message +"</div>");
                                    $('#alertdiv').attr('hidden', false).delay(5000).fadeOut();
                                    table.clear().draw();
                                } else {
                                    $('#alertdiv').empty();
                                    $('#alertdiv').css('display','block');
                                    $('#alertdiv').append("<div class= 'alert alert-danger'>" +result.message +"</div>");
                                    $('#alertdiv').attr('hidden', false).delay(5000).fadeOut();
                                }
                            },
                        });
                    }
                });
            });
            $('body').on('click', '.Download', function() {
                var id = table.row(this.closest('tr')).data()['id'];
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('download') }}",
                    data: {
                        id: id
                    },
                    success: function(result) {
                        window.open("/inventoy.pdf",'_blank');
                    },
                    error: function(erorr) {
                        console.log(erorr);
                    }
                });
            });
            $('body').on('click', '.edit', function() {
                var id = table.row(this.closest('tr')).data()['id'];
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "get",
                    url: "{{ route('edit') }}/" + id,
                    dataType: 'html',
                    success: function(result) {
                        window.location.href = "{{ route('edit') }}/" +id;
                    },
                });
            });
        });
    </script>
@endsection
