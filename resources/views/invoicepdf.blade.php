<!DOCTYPE html>
<html>
	<head>
		<!-- <meta charset="utf-8" /> -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>

		<style>
			.invoice-box {
				max-width: 100%;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 14px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(4) {
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

			.invoice-box table tr.total td:nth-child(4) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

            .color-text{
                color: #0000ff;
                padding:0px;
                margin: 0px;
            }
            .info{

                text-align: right;
            }
            .invoice-box .total-td .last-td{
                width: 315px
            }
            .footer{
                margin-top: 10px;
                color: #555;
            }
			/* @media only screen and (max-width: 600px) {
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
			} */

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>

		<div class="invoice-box">
        <div><h3 style=" text-align: center;color:#D4AF37">Arabian shelf</h3></div>
			<table cellpadding="0" cellspacing="0">
				<tr class="top">


					<td colspan="2">
						<table>
							<tr>
								<td >
                                    Invoice : {{$app->order_unique_id}}<br />
									<!-- <img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" /> -->
								</td>

								<td>


								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">

					<td colspan="2">
						<table >
							<tr>
								<td>
                                    Shipping Addres <br>
									{{$app->shipping_address}}<br />
									{{$app->city}},{{$app->country}}<br />

									zip:{{$app->zip}}
								</td>

								<td >@if($app->user_id == NULL)
                                    <p class="color-text">Guest</p> <br>
                                    {{$app->email}} <br>
                                    {{$app->phone}}
                                    @else
									<p  class="color-text">{{$app->user->name}}</p><br />

									{{$app->email}} <br>
                                    {{$app->phone}}
                                    @endif
								</td>
							</tr>
						</table>
					</td>

				</tr>

				<!-- <tr class="heading">
					<td>Payment Method</td>

					<td>Check #</td>
				</tr>

				<tr class="details">
					<td>Check</td>

					<td>1000</td>
				</tr> -->

				<tr class="heading">
					<td>Item</td>
                    <td>qty</td>
					<td>Unite Price</td>
                    <td>Price</td>

				</tr>
                @foreach($app->orderitems as $orderitem)
				<tr class="item">
					<td>{{$orderitem->name}}</td>
                    <td>{{$orderitem->qty}}</td>
                    <td>{{$orderitem->price}} (BDT)</td>
					<td>{{$orderitem->totalprice}} (BDT)</td>
				</tr>
                @endforeach

                <tr class="total-td">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="last-td">SubTotal:{{$app->total_amount_before_cupon_point}}(BDT)</td>


                </tr>
                <tr class="total-td">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="last-td">
                        @if($app->coupon != "null")
                        Coupon:{{$app->coupon}} - {{$app->coupon_price}}(BDT)
                        @endif
                    </td>

                </tr>

                <tr class="total-td">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="last-td">
                     @if($app->point != "not_apply")
                     Congratulation! For Point (15%) Reduce
                     @endif
                    </td>
                </tr>
                <tr class="total-td">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="last-td">

                    Delivery Charge:{{$app->delivery_charge}}(BDT)

                    </td>
                </tr>
                <tr class="total-td">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="last-td">
                        @if($app->digital_pay_charge != "no")
                        Transaction charge: {{$app->digital_pay_charge_amount}}(BDT)
                        @endif
                    </td>

                </tr>
				<tr class="total total-td">
                	<td></td>
                    <td></td>
					<td></td>
					<td class="last-td">Total(VAT Inc.): {{$app->total_amount}}(BDT)</td>

				</tr>

				{{-- <tr>

					<td>Note: By purchasing this product,you agreed to the Terms And Conditions,Privacy policy and Return Refund policy of arabianshelf.com</td>
				</tr> --}}
			</table>
            <div class="footer">

                <span >Note: By purchasing this product,you agreed to the Terms And Conditions,Privacy policy and Return Refund policy of arabianshelf.com</span>
                <h5>Address:Aisha Tower 205/1, Bir Uttam Mir Shawkat Sarak, Dhaka 1208.
                    Phone: +880 197 0034044 ,
                    +880 171 3034044</h5>
            </div>
        </div>
	</body>

</html>
