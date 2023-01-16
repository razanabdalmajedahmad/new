<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="container-xxl mt-5 border border-dark">
        <form id="form1">
            <div class=" mt-5"id="alert" hidden></div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 mt-5 mb-5">
                <div class="col">
                    <p  class="form-label">Inventory Name:{{$Invoice->name}}</p>
                    <p  class="form-label">Inventory Code: {{$Invoice->code}}</p>
                    <p  class="form-label">Inventory Date: {{$Invoice->date}}</p>

                    <p  class="form-label">Inventory Namber: {{$Invoice->namber}}</p>

                    <p  class="form-label">Company Name: {{$Invoice->company_name}}</p>

                    <p  class="form-label">Customer Name: {{$Invoice->customer_name}}</p>

                    <p  class="form-label">Customer Address: {{$Invoice->customer_address}}</p>

                    <p  class="form-label">Customer Email: {{$Invoice->customer_email}}</p>

                </div>
            </div>
            <div >
                <table  id="table" style="width: 100%">
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
                        @foreach ($items as $key )
                        <tr>
                            <td style="text-align: center" ></td>
                            <td style="text-align: center" >{{$key->description}}</td>
                            <td style="text-align: center" >{{$key->name}}</td>
                            <td style="text-align: center" >{{$key->qty}}</td>
                            <td style="text-align: center" >{{$key->price}}</td>
                            <td style="text-align: center" >{{$key->total}}</td>
                        </tr>

                        @endforeach
                        <tr>
                            <td style="text-align: center"></td>
                            <td style="text-align: right" colspan="4">Total:</td>
                            <td style="text-align: center" >{{$Invoice->total}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </form>
    </div>
</body>
</html>



