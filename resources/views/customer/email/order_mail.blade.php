<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi mail</title>
</head>
    <body>
        <div style="margin:0px;padding:0px;color:rgb(32,32,32);font-size:14px;font-weight:normal;font-family:Helvetica,Arial,sans-serif!important;line-height:150%!important">
            <div style="display:none!important;opacity:0;color:transparent;height:0;width:0">Your order request has beenreceived
            </div>
            <div class="m_5284939909110726982main-content" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:730px">
                    <tbody>
                        <tr>
                            <td colspan="2"></td>
                            <td bgcolor="#E8E8E8" colspan="3" height="1px"></td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F8F8F8" width="1px"></td>
                            <td bgcolor="#E8E8E8" width="1px"></td>
                            <td bgcolor="#D1D1D1" width="1px"></td>


                            <td bgcolor="#FFF" style="padding:30px;">


                                <div class="m_5284939909110726982header" style="margin-bottom:15px">
                                    <div>
                                        <table class="m_5284939909110726982header" lang="header" cellpadding="0"
                                            cellspacing="0" width="100%" border="0" style="width:100%">
                                        </table>
                                    </div>
                                </div>

                                <div class="m_5284939909110726982section" style="padding-top:0px">
                                    <div class="m_5284939909110726982header-title" style="color:#0f146d;text-align:center">
                                    Thanks for ordering at TCLM</div>
                                    <div class="m_5284939909110726982section-content">
                                        <h2>Hi {{ $person->full_name }},</h2>
                                        <p>TCLM has received your order request and is processing it. You will receive a follow-up notification when your order is ready to be shipped.</p>
                                    </div>
                                </div>
                                <div class="m_5284939909110726982section">
                                    <div class="m_5284939909110726982section-header m_5284939909110726982section-header--deliveredTo">Order is delivered to</div>
                                    <div class="m_5284939909110726982section-content">
                                        <table cellpadding="2" cellspacing="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td width="25%" valign="top" style="color:#0f146d;font-weight:bold">Name:
                                                    </td>
                                                    <td width="75%" valign="top">{{ $person->full_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="color:#0f146d;font-weight:bold">Address:
                                                    </td>
                                                    <td valign="top">{{ $person->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="color:#0f146d;font-weight:bold">Phone:</td>
                                                    <td valign="top">{{ $person->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="color:#0f146d;font-weight:bold">Email:</td>
                                                    <td valign="top"><a href="mailto:{{ $person->email }}"
                                                            target="_blank">{{ $person->email }}</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="m_5284939909110726982section" style="padding-bottom:0px;margin-bottom:20px;margin-top:20px;">
                                    <div class="m_5284939909110726982section-content">
                                        <div class="m_5284939909110726982section-header m_5284939909110726982section-header--yourPackage">Package</div>
                                        <p style="margin-top:0px;margin-bottom:0px;color:#585858">Sold by : TCLM</p>
                                        <div class="m_5284939909110726982product" style="border-bottom:0px none">
                                            <table cellpadding="0" cellspacing="0" style="width:100%;padding-bottom:1px solid #000;">
                                                <tbody>
                                                    @foreach($cart as $key => $value)
                                                    <?php $product_id = $key; ?>
                                                    @foreach($value as $key => $item)
                                                    <tr>
                                                        <td style="width:100%;display:flex;padding-bottom:5px;">
                                                            <div class="m_5284939909110726982product-productInfo-name">
                                                                <a href="{{ route('detail', $product_id) }}" target="_blank" style="font-size:14px">
                                                                    <span>{{ $item['name'] }}</span>
                                                                </a>
                                                            </div>
                                                            <div class="m_5284939909110726982product-productInfo-price" style="padding-left:10px;padding-right:10px;">
                                                                <span style="font-size:14px">{{ number_format($item['price'],0)  }}</span>
                                                            </div>
                                                            <div class="m_5284939909110726982product-productInfo-price" style="padding-right:10px;">
                                                                <span style="font-size:14px">{{ $item['size_name'] }}</span>
                                                            </div>
                                                            <div class="m_5284939909110726982product-productInfo-subInfo">
                                                                <span style="font-size:14px">{{ $item['quantity'] }}</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="m_5284939909110726982section" style="padding-top:0px">
                                    <div class="m_5284939909110726982section-content">
                                        <div class="m_5284939909110726982checkout">
                                            <div class="m_5284939909110726982two_col">
                                                <table cellpadding="0" cellspacing="0"
                                                    class="m_5284939909110726982checkout-amount"
                                                    style="border-bottom:1px solid #d8d8d8">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top" style="color:#585858;width:49%">Price:
                                                            </td>
                                                            <td align="right" valign="top">VND</td>
                                                            <td align="right" valign="top" style="transform: translateX(15px);">{{ number_format($grand_price_origin,0) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" style="color:#585858">Shipping cost:</td>
                                                            <td align="right" valign="top">VND</td>
                                                            <td align="right" valign="top" style="transform: translateX(15px);">{{ number_format($ship_cost,0) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" style="color:#585858">Discount:</td>
                                                            <td align="right" valign="top">VND</td>
                                                            <td align="right" valign="top" style="transform: translateX(15px);">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" style="color:#585858">Grand Price:</td>
                                                            <td align="right" valign="top">
                                                                <div style="color:#f27c24;font-weight:bold">VND</div>
                                                            </td>
                                                            <td align="right" valign="top">
                                                                <?php $grand_price_origin += $ship_cost; ?>
                                                                <div style="color:#f27c24;font-weight:bold;transform: translateX(15px);">{{ number_format($grand_price_origin,0) }}</div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>       
                            </td>
                            <td bgcolor="#B3B3B3" width="1px"></td>
                            <td bgcolor="#D1D1D1" width="1px"></td>
                            <td bgcolor="#E8E8E8" width="1px"></td>
                            <td bgcolor="#F8F8F8" width="1px"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td bgcolor="#B3B3B3" colspan="3" height="1px"></td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td bgcolor="#D1D1D1" colspan="3" height="1px"></td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td bgcolor="#E8E8E8" colspan="3" height="1px"></td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td bgcolor="#F8F8F8" colspan="3" height="1px"></td>
                            <td colspan="3"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>