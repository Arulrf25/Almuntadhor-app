<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Invoice - {{$title}}</title>

		<!-- Favicon -->
		<link rel="icon" href="./images/favicon.png" type="image/x-icon" />

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
            .table {
  width: 100%;
  margin-bottom: 1rem;
  color: #858796;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #e3e6f0;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #e3e6f0;
}

.table tbody + tbody {
  border-top: 2px solid #e3e6f0;
}

.table-sm th,
.table-sm td {
  padding: 0.3rem;
}

.table-bordered {
  border: 1px solid #e3e6f0;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #e3e6f0;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}

.table-borderless th,
.table-borderless td,
.table-borderless thead th,
.table-borderless tbody + tbody {
  border: 0;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(0, 0, 0, 0.05);
}

.table-hover tbody tr:hover {
  color: #858796;
  background-color: rgba(0, 0, 0, 0.075);
}

.table-primary,
.table-primary > th,
.table-primary > td {
  background-color: #cdd8f6;
}

.table-primary th,
.table-primary td,
.table-primary thead th,
.table-primary tbody + tbody {
  border-color: #a3b6ee;
}

.table-hover .table-primary:hover {
  background-color: #b7c7f2;
}

.table-hover .table-primary:hover > td,
.table-hover .table-primary:hover > th {
  background-color: #b7c7f2;
}

.table-secondary,
.table-secondary > th,
.table-secondary > td {
  background-color: #dddde2;
}

.table-secondary th,
.table-secondary td,
.table-secondary thead th,
.table-secondary tbody + tbody {
  border-color: #c0c1c8;
}

.table-hover .table-secondary:hover {
  background-color: #cfcfd6;
}

.table-hover .table-secondary:hover > td,
.table-hover .table-secondary:hover > th {
  background-color: #cfcfd6;
}

.table-success,
.table-success > th,
.table-success > td {
  background-color: #bff0de;
}

.table-success th,
.table-success td,
.table-success thead th,
.table-success tbody + tbody {
  border-color: #89e2c2;
}

.table-hover .table-success:hover {
  background-color: #aaebd3;
}

.table-hover .table-success:hover > td,
.table-hover .table-success:hover > th {
  background-color: #aaebd3;
}

.table-info,
.table-info > th,
.table-info > td {
  background-color: #c7ebf1;
}

.table-info th,
.table-info td,
.table-info thead th,
.table-info tbody + tbody {
  border-color: #96dbe4;
}

.table-hover .table-info:hover {
  background-color: #b3e4ec;
}

.table-hover .table-info:hover > td,
.table-hover .table-info:hover > th {
  background-color: #b3e4ec;
}

.table-warning,
.table-warning > th,
.table-warning > td {
  background-color: #fceec9;
}

.table-warning th,
.table-warning td,
.table-warning thead th,
.table-warning tbody + tbody {
  border-color: #fadf9b;
}

.table-hover .table-warning:hover {
  background-color: #fbe6b1;
}

.table-hover .table-warning:hover > td,
.table-hover .table-warning:hover > th {
  background-color: #fbe6b1;
}

.table-danger,
.table-danger > th,
.table-danger > td {
  background-color: #f8ccc8;
}

.table-danger th,
.table-danger td,
.table-danger thead th,
.table-danger tbody + tbody {
  border-color: #f3a199;
}

.table-hover .table-danger:hover {
  background-color: #f5b7b1;
}

.table-hover .table-danger:hover > td,
.table-hover .table-danger:hover > th {
  background-color: #f5b7b1;
}

.table-light,
.table-light > th,
.table-light > td {
  background-color: #fdfdfe;
}

.table-light th,
.table-light td,
.table-light thead th,
.table-light tbody + tbody {
  border-color: #fbfcfd;
}

.table-hover .table-light:hover {
  background-color: #ececf6;
}

.table-hover .table-light:hover > td,
.table-hover .table-light:hover > th {
  background-color: #ececf6;
}

.table-dark,
.table-dark > th,
.table-dark > td {
  background-color: #d1d1d5;
}

.table-dark th,
.table-dark td,
.table-dark thead th,
.table-dark tbody + tbody {
  border-color: #a9aab1;
}

.table-hover .table-dark:hover {
  background-color: #c4c4c9;
}

.table-hover .table-dark:hover > td,
.table-hover .table-dark:hover > th {
  background-color: #c4c4c9;
}

.table-active,
.table-active > th,
.table-active > td {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover > td,
.table-hover .table-active:hover > th {
  background-color: rgba(0, 0, 0, 0.075);
}

.table .thead-dark th {
  color: #fff;
  background-color: #5a5c69;
  border-color: #6c6e7e;
}

.table .thead-light th {
  color: #6e707e;
  background-color: #eaecf4;
  border-color: #e3e6f0;
}

.table-dark {
  color: #fff;
  background-color: #5a5c69;
}

.table-dark th,
.table-dark td,
.table-dark thead th {
  border-color: #6c6e7e;
}

.table-dark.table-bordered {
  border: 0;
}

.table-dark.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(255, 255, 255, 0.05);
}

.table-dark.table-hover tbody tr:hover {
  color: #fff;
  background-color: rgba(255, 255, 255, 0.075);
}

@media (max-width: 575.98px) {
  .table-responsive-sm {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  .table-responsive-sm > .table-bordered {
    border: 0;
  }
}

@media (max-width: 767.98px) {
  .table-responsive-md {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  .table-responsive-md > .table-bordered {
    border: 0;
  }
}

@media (max-width: 991.98px) {
  .table-responsive-lg {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  .table-responsive-lg > .table-bordered {
    border: 0;
  }
}

@media (max-width: 1199.98px) {
  .table-responsive-xl {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  .table-responsive-xl > .table-bordered {
    border: 0;
  }
}

.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.table-responsive > .table-bordered {
  border: 0;
}

.text-right {
  text-align: right !important;
}
.text-center {
  text-align: center !important;
}
.text-left {
  text-align: left !important;
}
.text-white {
  color: #fff !important;
}
		</style>
	</head>

	<body onload="window.print();">
		<div class="invoice-box">
			<table class="table">
				<tr class="top">
					<td colspan="7">
						<table>
							<tr>
								<td class="title">
									<img src="{!! asset('assets/images/almun-logo.png') !!}" alt="logo" style="width: 80%; max-width: 300px" />
								</td>
                                @foreach ($riwayatPembayaran as $bayar)
								<td class="text-right" style="font-size: small">
									No Kwitansi : {{$bayar->order_id}}<br />
									Tanggal Bayar: {{$bayar->updated_at}}<br />
									Tanggal Cetak: {{$tanggal}}
								</td>
                                @endforeach
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="7">
						<table>
							<tr>
								<td width="300px" style="font-size: small">
									AL MUNTADHOR<br />
									Jl. Merdeka No 55 Desa Babakan Ciwaringin Cirebon
								</td>
								
								
								<td width="500px" style="font-size: small">
									{{auth()->user()->username}}
									{{auth()->user()->name}}
									{{auth()->user()->alamat}}
                                    
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading" style="font-size: small">
					<td>Nama Tagihan</td>
					<td class="text-left">Methode</td>
					<td class="text-left">Nominal</td>
				</tr>
                    @foreach ($riwayatPembayaran as $bayar)
                    <tr class="item" style="font-size: small">
					<td class="text-left">{{$bayar->tagihan}}</td>
					<td class="text-left">{{$bayar->payment_type}}</td>
					<td class="text-left">{{$bayar->gross_amount}} </td>
                    </tr>
                    @endforeach
				

                <tr>
				   <td colspan="7" class="text-center" style="font-size: small">
					<h3 class="text-white"  style="background-color: green;">
						Lunas
					</h3>
                </td>
                </tr>
			</table>
		</div>
	</body>
</html>