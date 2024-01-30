<html>
<head>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>

    <!-- Place this where you need payment button -->
    <button id="payment-button">Pay with Khalti</button>
    <!-- Place this where you need payment button -->
    <!-- Paste this code anywhere in you body tag -->

{{$order_detail}}

    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_YOUR_PUBLIC_KEY",
            "productIdentity": "1234567890", //Product ID
            "productName": "Dragon", //Product Name
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons", //Product URL
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    //console.log(payload);
                    if(payload.status==200) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-Token': '{{csrf_token()}}'
                            }
                        });
                        $.ajax({
                            url: "{{ route('verification') }}", //Your backend route url, replace this with the route you'll be creating later
                            data: payload,
                            method: 'POST',
                            success: function(data) {
                                console.log('Payment is succcessfull');
                                console.log(data);
                            },
                            error: function(err) {
                                console.log(err.response);
                            },
                        });
                    }
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 3000});
        }
    </script>
    <!-- Paste this code anywhere in you body tag -->
</body>
</html>
