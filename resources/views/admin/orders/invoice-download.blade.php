<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>{{$order->no_order}}</title>
    </head>
    <body>

        <h3 class="text-success"><b>{{$app ? $app->name : 'Rarakirana'}}</b></h3>
        <small>
            <table class="table table-sm">
                <tr>
                    <th colspan="2">{{$order->payment->no_invoice}}</th>
                    <th><i><b>{{strtoupper($order->kurir)}}</b> {{$order->services}}</i></th>
                </tr>
                <tr>
                    <th colspan="2">Kepada</th>
                    <th class="text-success">Pengirim</th>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{$order->address->penerima}}</td>
                    <td class="text-success">{{$app ? $app->name : 'Rarakirana'}}</td>
                </tr>
                <tr>
                    <td>ALamat</td>
                    <td>{{strip_tags($order->address->address)}} {{$order->address->kecamatan}} {{$order->address->kabupaten}} {{$order->address->provinsi}} {{$order->address->postal_code}} - {{$order->address->phone}} </td>
                    <td class="text-success">{{strip_tags($addAdmin->address)}} {{$addAdmin->kecamatan}} {{$addAdmin->kabupaten}} {{$addAdmin->provinsi}} {{$addAdmin->postal_code}} - {{$addAdmin->phone}} </td>
                </tr>
            </table>
        </small>
        
        <small>Tanggal: {{ date('d F, Y', strtotime($order->payment->created_at))}}</small>
        <small>
            <table class="table table-sm table-bordered">
                <tr class="table-success">
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Berat</th>
                    <th>Harga Barang</th>
                    <th>Subtotal</th>
                </tr>
                @foreach ($order->details as $detail)
                    <tr>
                        <td>{{str_limit($detail->product->title, 20)}}</td>
                        <td>{{number_format($detail->qty)}}</td>
                        <td>{{number_format($detail->product->weight)}} gr</td>
                        <td>Rp {{number_format($detail->product->price)}}</td>
                        <td>Rp {{number_format($subtotal = $detail->product->price*$detail->qty)}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">Catatan : {{$order->note}}</td>
                </tr>
                <tr class="table-active">
                    <td colspan="1"></td>
                    <td colspan="3"><b>Subtotal Harga Produk</b></td>
                    <td><b>Rp {{number_format($order->total_price-$order->ongkir)}}</b></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="3"><i><b>{{strtoupper($order->kurir)}}</b> {{$order->services}}</i></td>
                    <td>Rp {{number_format($order->ongkir)}}</td>
                </tr>
                <tr class="table-secondary">
                    <td colspan="1"></td>
                    <td colspan="3"><b>Total Pembayaran</b></td>
                    <td><b>Rp {{number_format($order->total_price)}}</b></td>
                </tr>
            </table>
        </small>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>