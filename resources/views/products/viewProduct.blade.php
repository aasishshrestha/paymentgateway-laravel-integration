<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Products</title>
</head>

<body>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://play-lh.googleusercontent.com/Xh_OlrdkF1UnGCnMN__4z-yXffBAEl0eUDeVDPr4UthOERV4Fll9S-TozSfnlXDFzw"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Price {{ $product->price }}</p>
                            <form action="/order" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="submit" value="Buy Now">
                            </form>
                            <a href="/checkout" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
