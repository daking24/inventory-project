<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/receipt.css') }}">
        <title>Receipt</title>
    </head>
    <body>

        <div class="container ticket">
            <img src="" alt="Logo">
            <p class="centered">RECEIPT FROM TELABIB STORES
                <br>No. 39 Rwangpam Street,
                <br>Ahmadu Bello Way, Jos,
                <br>Plateaau State
                <br><b>Tel: 08184400093 Mail: telabibstores@gmail.com</b></p>
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="description">Product</th>
                        <th class="price">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($passedSales as $item)
                        
                    @endforeach
                        <tr>
                            <td class="quantity"><center>2</center></td>
                            <td class="description"><a style="text-decoration: none; color: black;" href="">name</a></td>
                            <td class="price">₦12</td>
                        </tr>
                </tbody>
            </table>
            <hr>
            <table class="total">
                <tbody>
                    <tr>
                        <td class="quantity">Total</td>
                        <td class="description"> :</td>
                        <td class="price">₦23</td>
                    </tr>
                </tbody>
            </table>
            <hr>

            <p class="centered">Thanks for your purchase!
                <br>Tel-Abib Stores</p>
        </div>
        <button id="btnPrint" class="hidden-print">Print</button>
        <script>
            const $btnPrint = document.querySelector("#btnPrint");
            $btnPrint.addEventListener("click", () => {
                window.print();
            });
        </script>
    </body>
</html>
