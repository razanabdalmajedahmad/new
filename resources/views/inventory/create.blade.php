@extends('welcome')

@section('style')
    <title>create inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .model{
            display: none;
             position: fixed;
             z-index: 100;
             top:70%;
             width:75%
             ;margin: auto;


             left:50%;
             transform: translate(-50%, -50%);

        }
    </style>
@endsection
@section('headder')
<h2>create inventory</h2>
@endsection
@section('min')

    <div class="modal fade show" id="modalStatic" tabindex="-1" role="dialog" aria-labelledby="modalStaticTitle" aria-modal="true" style="">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class=" mt-5"id="alert_update" hidden></div>
            <div class="modal-header">
              <h5 class="modal-title" id="modalStaticTitle">Update Item</h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                    <label  class="form-label">Item Description</label>
                    <textarea name="item_descriptio_update"  class="form-control"></textarea>
                </div>
                <div class="col-6">
                    <label  class="form-label">Item Name</label>
                    <input type="text" class="form-control" placeholder="Item Name" name="item_name_update" >
                    <input type="text" hidden class="form-control"  name="id" >
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                    <label  class="form-label">Item price</label>
                    <input type="number" class="form-control" placeholder="Item price" name="item_price_update" >
                </div>
                <div class="col-6">
                    <label  class="form-label">Item qty</label>
                    <input type="number" class="form-control" placeholder="Item qty" name="item_qty_update" >
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                    <label  class="form-label">Total price</label>
                    <input type="number" class="form-control" placeholder="Total price" name="total_price_update" readonly >
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="Update btn btn-primary">Update</button>
              <button type="button" class="btn btn-danger" onclick="fun()" >Close</button>
            </div>
          </div>
        </div>
      </div>
    <div class="container-xxl mt-5 border border-dark">
        <form id="form1">
            <div class=" mt-5"id="alert" hidden></div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 mt-5 mb-5">
                <div class="col">
                    <label  class="form-label">Inventory Name</label>
                    <input type="text" class="form-control" placeholder="Inventory Name" name="name">
                </div>
                <div class="col">
                    <label  class="form-label">Inventory Code</label>
                    <input type="text" class="form-control" placeholder="Inventory Code" name="code">
                </div>
                <div class="col">
                    <label  class="form-label">Inventory Date</label>
                    <input type="text" class="form-control" placeholder="Inventory Date" name="date">
                </div>
                <div class="col">
                    <label  class="form-label">Inventory Namber</label>
                    <input type="text" class="form-control" placeholder="Inventory Namber" name="namber" >
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 mt-5 mb-5">
                <div class="col">
                    <label  class="form-label">Company Name</label>
                    <input type="text" class="form-control" placeholder="Company Name" name="company_name" >
                </div>
                <div class="col">
                    <label  class="form-label">Customer Name</label>
                    <input type="text" class="form-control" placeholder="Company Name" name="customer_name" >
                </div>
                <div class="col">
                    <label  class="form-label">Customer Address</label>
                    <input type="text" class="form-control" placeholder="Customer Address" name="customer_address" >
                </div>
                <div class="col">
                    <label  class="form-label">Customer Email</label>
                    <input type="email" class="form-control" placeholder="Customer Email" name="customer_email" >
                </div>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col text-center">
                    <button id="add_items" type="button" class="btn btn-warning">Add Items</button>
                </div>

            </div>

        <div class="row m-5" id="table_div" hidden>
            <div class=" mt-5"id="alert_item" hidden></div>
            <div class="table-responsive">
                <table class="table align-middle" id="table">
                    <thead>
                        <tr>
                            <th scope="col" >#</th>
                            <th scope="col">Item Description</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item qty</th>
                            <th scope="col">Item price</th>
                            <th scope="col">Total price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table_row" id="0">
                            <td >
                                {{-- <button id="Delete" type="button" class="btn btn-danger">Delete</button> --}}
                            </td>
                            <td>
                                <textarea name="item_description[]" cols="30" class="form-control" placeholder="Write your Description"></textarea>
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Item Name" name="item_name[]" >
                            </td>
                            <td>
                                <input type="number" class="form-control" placeholder="Item qty" name="item_qty[]" >
                            </td>
                            <td>
                                <input type="number" class="form-control" placeholder="Item price" name="item_price[]" >
                            </td>
                            <td>
                                <input type="number" class="form-control" placeholder="Total price" name="total_price[]" readonly >
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" style="text-align: center">
                                <button id="add_item" type="button" class="btn btn-warning">add</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-5 mb-5" id="create-div" hidden>
            <div class="col text-center">
                <button id="create" type="button" class="btn btn-warning">create Invoice</button>
            </div>

        </div>
    </form>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        flatpickr('input[name="date"]', {
        enableTime: false,
        dateFormat: "d-m-Y",
    });
    </script>
    <script
    src="https://code.jquery.com/jquery-3.6.1.js"
    integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    <script>

        $(document).ready(function(){
            $("#add_items").click(function(){
                const form = document.getElementById('form1');
                const formData = new FormData(form);
                if(formData.get('name') == "" || formData.get('code') == "" || formData.get('date') == "" || formData.get('namber') == "" || formData.get('company_name') == "" ){
                    $('#alert').empty();
                    $('#alert').css('display','block');
                    $('#alert').append('<div class="alert alert-danger" role="alert">you should enter data!</div>');
                    $('#alert').attr('hidden',false).delay(4000).fadeOut();
                }else{

                    $('#create-div').attr('hidden',false);
                    $('#table_div').attr('hidden',false);
                }

            });
            $('input[name="item_qty[]"]').change(function(){
                var item_qty=$('input[name="item_qty[]"]').val();
                var item_price=$('input[name="item_price[]"]').val();
                var total_price=$('input[name="total_price[]"]').val(item_qty*item_price)
            })
            $('input[name="item_price[]"]').change(function(){
                var item_qty=$('input[name="item_qty[]"]').val();
                var item_price=$('input[name="item_price[]"]').val();
                var total_price=$('input[name="total_price[]"]').val(item_qty*item_price)
            })
            $("#add_item").click(function(){
                var count=$('#table').find('tr.table_row:last').length;
                var last_id=parseInt($('#table').find('tr.table_row:last').attr('id'));
                var incr= count > 0 ? last_id+1 : 0;
                var desc=$('textarea[name="item_description[]"]').val();
                var item_name=$('input[name="item_name[]"]').val();
                var item_qty=$('input[name="item_qty[]"]').val();
                var item_price=$('input[name="item_price[]"]').val()
                var total_price=$('input[name="total_price[]"]').val()
                if( desc == "" || item_name == "" || item_qty == "" || item_price == "" || total_price == "" ){
                    $('#alert_item').empty();
                    $('#alert_item').css('display','block');
                    $('#alert_item').append('<div class="alert alert-danger" role="alert">you should enter data!</div>');
                    $('#alert_item').attr('hidden',false).delay(4000).fadeOut();
                }else{
                    $('#alert_item').attr('hidden',true);
                    $('#table').append(
                        '<tr class="table_row" id="'+incr+'">'+
                            '<td style="width: 15%">'+
                                '<button id="Delete" data-id="'+incr+'" type="button" class=" Delete btn btn-danger mr-1">Delete</button>'+
                                '<button id="Edit" data-id="'+incr+'" type="button" class=" Edit btn btn-info ">Edit</button>'+
                            '</td>'+
                            '<td>'+
                               '<textarea name="item_description['+incr+']" cols="30" class="form-control"readonly>'+desc+'</textarea>'+
                            '</td>'+
                            '<td>'+
                                '<input type="text" value="'+item_name+'" class="form-control" placeholder="Item Name" name="item_name['+incr+']" readonly >'+
                            '</td>'+
                            '<td>'+
                                '<input type="number" value="'+item_qty+'"  class="form-control" placeholder="Item qty" name="item_qty['+incr+']" readonly >'+
                            '</td>'+
                            '<td>'+
                                '<input type="number" value="'+item_price+'" class="form-control" placeholder="Item price" name="item_price['+incr+']" readonly >'+
                            '</td>'+
                            '<td>'+
                                '<input type="number" value="'+total_price+'" name="total_price['+incr+']"  class="form-control" placeholder="Total price" readonly >'+
                            '</td>'
                    );
                    $('textarea[name="item_description[]"]').val('');
                    $('input[name="item_name[]"]').val('');
                    $('input[name="item_qty[]"]').val('');
                    $('input[name="item_price[]"]').val('');
                    $('input[name="total_price[]"]').val('')
                }
            });
            $(document).on('click','.Delete',function(){
                var id = $(this).data("id");
                $('.table_row#'+id ).remove();
                $('#alert_item').empty();
                $('#alert_item').css('display','block');
                $('#alert_item').append('<div class="alert alert-info" role="alert">deleted Item successfully</div>');
                $('#alert_item').attr('hidden',false).delay(4000).fadeOut();
            });
            $(document).on('click','.Edit',function(){
                var id = $(this).data("id");
                var desc=$('.table_row#'+id ).find("td:eq(1)").text();
                var name= $('input[name="item_name['+id+']"]').val();
                var qty=$('input[name="item_qty['+id+']"]').val();
                var price=$('input[name="item_price['+id+']"]').val();
                var total=$('input[name="total_price['+id+']"]').val();
                $('textarea[name="item_descriptio_update"]').val(desc);
                $('input[name="item_name_update"]').val(name);
                $('input[name="item_qty_update"]').val(qty);
                $('input[name="item_price_update"]').val(price);
                $('input[name="total_price_update"]').val(total);
                $('input[name="id"]').val(id);
                $('.modal').css('display','block')
            });
            $('input[name="item_qty_update"]').change(function(){
                var item_qty=$('input[name="item_qty_update"]').val();
                var item_price=$('input[name="item_price_update"]').val();
                var total_price=$('input[name="total_price_update"]').val(item_qty*item_price)
            })
            $('input[name="item_price_update"]').change(function(){
                var item_qty=$('input[name="item_price_update"]').val();
                var item_price=$('input[name="item_qty_update"]').val();
                var total_price=$('input[name="total_price_update"]').val(item_qty*item_price)
            })
            $(document).on('click','.Update',function(){
                var desc= $('textarea[name="item_descriptio_update"]').val();
                var name= $('input[name="item_name_update"]').val();
                var qty=$('input[name="item_qty_update"]').val();
                var price=$('input[name="item_price_update"]').val();
                var total=$('input[name="total_price_update"]').val();
                var id=$('input[name="id"]').val();
                if( desc == "" || name == "" || qty == "" || price == "" || total == "" ){
                    $('#alert_update').empty();
                    $('#alert_update').css('display','block');
                    $('#alert_update').append('<div class="alert alert-danger" role="alert">you should enter data!</div>');
                    $('#alert_update').attr('hidden',false).delay(4000).fadeOut();
                }else{
                    $('#alert_update').attr('hidden',true);
                    $('textarea[name="item_description['+id+']"]').text(desc);
                    $('input[name="item_name['+id+']"]').val(name);
                    $('input[name="item_qty['+id+']"]').val(qty);
                    $('input[name="item_price['+id+']"]').val(price);
                    $('input[name="total_price['+id+']"]').val(total);
                    $('.modal').css('display','none')
                    $('#alert_item').empty();
                    $('#alert_item').css('display','block');
                    $('#alert_item').append('<div class="alert alert-info" role="alert">Updated Item successfully</div>');
                    $('#alert_item').attr('hidden',false).delay(4000).fadeOut();
                }
            });
            $("#create").click(function(){
                const form = document.getElementById('form1');
                const formData = new FormData(form);
                formData.append("_token", "{{ csrf_token() }}");
                $.ajax({
                    type: "POST",
                    processData: false,
                    contentType: false,
                    cache: false,
                    url: "{{ route('save') }}",
                    data:formData,
                    success: function(result) {
                        if(result.state){
                            $('#alert').empty();
                            $('#alert').css('display','block');
                            $('#alert').append('<div class="alert alert-info" role="alert">'+result.message+'</div>');
                            $('#alert').attr('hidden',false).delay(4000).fadeOut();
                            window.location.href = "{{ route('list') }}";
                        }else{
                            $('#alert').empty();
                            $('#alert').css('display','block');
                            $.each(result.message, function(key,value ){
                            $("#alert").append("<div class= 'alert alert-danger'>" + value +"</div>");
                  		     });
                            $('#alert').attr('hidden',false).delay(4000).fadeOut();

                        }

                    },
                });
            });
        });
    </script>
    <script>
        function fun(){
            $('.modal').css('display','none')
        }
    </script>
@endsection
