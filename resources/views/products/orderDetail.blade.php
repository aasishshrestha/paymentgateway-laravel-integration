<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout Page</title>
</head>
<body>
    {{$order_detail}}

    @php
        $url = env('KHALTI');
        // print_r($order_detail);
    @endphp
    <form action="epayment" method="post">
        @csrf
        {{-- <button type="submit">Pay With </button> --}}

        <input type="text" name="purchase_order_id" value="{{$order_detail->payments[0]['ulid']}}">
        {{-- <input type="hidden" name="amount" value="{{$order_detail}}"> --}}
        <input type="submit" value="Pay with Khalti">
    </form>
</body>
</html>
