<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <!--[if !mso]--><!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel="stylesheet">
    <!--<![endif]-->

    <title>TIARET University Design for masters</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style type="text/css">
 #invoice{
    padding: 30px;
 }

 .invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
 }

 .invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
 }

 .invoice .company-details {
    text-align: right
 }

 .invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
 }

 .invoice .contacts {
    margin-bottom: 20px
 }

 .invoice .invoice-to {
    text-align: left
 }

 .invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>
<!------ Include the above in your HEAD tag ---------->
</head>
<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<!--Author      : @arboshiki-->
<div id="invoice" style="width: 600px;border:1px solid black;margin:auto">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col-md-3">
                        <a target="_blank" href="https://www.hanouti.dz">
                        <img style="width:114px;" src="https://raw.githubusercontent.com/NasrEddineDev/Master-Thesis-ImplementationOf3DSecureArchitecture/master/images/logo/logo-hanouti-trans.png" alt="{{ __('Hanouti') }}" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col-md-3 company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://www.hanouti.dz">
                              Hanouti
                            </a>
                        </h2>
                        <div>Ibn-Khaldoun University, Tiaret, Algeria.</div>
                        <div>+213(0)46 20 88 49</div>
                        <div>contact@hanouti.dz</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">{{$customer->name}}</h2>
                        <div class="address">{{$billingAddress->address_1}}</div>
                        <div class="email"><a href="mailto:{{$customer->email}}">{{$customer->email}}</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE {{$invoice_code}}</h1>
                        <div class="date">Date of Invoice: {{date('Y-m-d')}}</div>
                        <div class="date">Due Date: {{date('Y-m-d')}}</div>
                    </div>
                </div>
                <table width="560px" border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            {{-- <th class="text-right">SKU</th> --}}
                            <th class="text-right">NAME</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th class="text-right">UNIT PRICE</th>
                            <th class="text-right">QUANTITY</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                        <tr>
                          <td class="no">01</td>
                          <td class="text-left">{{$product->name}}</td>
                          <td class="text-left">{{$product->description}}</td>
                          <td class="unit">{{$product->price}}</td>
                          <td class="qty">{{$product->qty}}</td>
                          <td class="total">{{config('cart.currency')}} {{number_format($product->price * $product->qty, 2)}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>{{config('cart.currency')}} {{number_format($subtotal, 2)}}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">TAX</td>
                            <td>{{number_format($tax, 2)}}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">TOTAL</td>
                            <td>{{config('cart.currency')}} {{number_format($total, 2)}}</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A refund will be given on undelivered products after 3 days.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>

    <!-- main section -->
    <table border="0" width="100%"  style="width: 600px;" cellpadding="0" cellspacing="0" bgcolor="2a2e36">

        <tr>
            <td align="center" style="background-image: url(https://raw.githubusercontent.com/NasrEddineDev/Master-Thesis-ImplementationOf3DSecureArchitecture/master/images/logo/hanouti-footer.png); background-size: cover; background-position: top center; background-repeat: no-repeat;"
                background="https://raw.githubusercontent.com/NasrEddineDev/Master-Thesis-ImplementationOf3DSecureArchitecture/master/images/logo/hanouti-footer.png">

                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="50" style="font-size: 50px; line-height: 50px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="380" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">

                                <tr>
                                    <td align="center">
                                        <table border="0" align="center" cellpadding="0" cellspacing="0" class="container580">
                                            <tr>
                                                <td align="center" style="color: #cccccc; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 26px;">
                                                    <!-- section text ======-->

                                                    <div style="line-height: 26px">

                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>


                    <tr>
                        <td height="50" style="font-size: 50px; line-height: 50px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>

    </table>

    <!-- end section -->

    <!-- footer ====== -->
    <table border="0" width="100%"  style="width: 600px;" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">

                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td>
                            <table border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">
                                <tr>
                                    <td align="left" style="color: #aaaaaa; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                        <div style="line-height: 24px;">

                                            <span style="color: #333333;">TIARET University Design for masters</span>

                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table border="0" align="left" width="5" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">
                                <tr>
                                    <td height="20" width="5" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                                </tr>
                            </table>

                            <table border="0" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">

                                <tr>
                                    <td align="center">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center">
                                                    <a style="font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;color: #5caad2; text-decoration: none;font-weight:bold;"
                                                        href="UnsubscribeURL">UNSUBSCRIBE</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>

<div dir="ltr" style="width: 600px;">
    <div style="color:rgb(0,0,0);font-family:&quot;Times New Roman&quot;;font-size:medium;width:130px;max-width:130px;min-width:100px;float:left;padding-top:15px">
        <img style="width:90px;margin-left:23px;" src="https://raw.githubusercontent.com/NasrEddineDev/Master-Thesis-ImplementationOf3DSecureArchitecture/master/images/logo/logo-hanouti-trans.png">
    </div>
    <div style="width:190px;max-width:190px;font-family:&quot;Lucida Grande&quot;,Tahoma;font-size:12px;margin-top:0.5em;color:rgb(102,102,102);letter-spacing:2px;border-left:2px solid rgb(211,216,215);padding-top:3px;padding-left:10px;overflow:hidden">
        <p>Hanouti&nbsp;<br></p>
        <p style="margin-top:10px;margin-bottom:10px;">+213 23 23 23 23&nbsp;<br></p>
        <p>
           <a href="mailto:" style="color: #888888; font-size: 14px; font-family: 'Hind Siliguri', Calibri, Sans-serif; font-weight: 400;">contact@hanouti.dz</a>
        </p> 
        <p style="margin-top:10px;margin-bottom:10px;">
            <a href="http://www.hanouti.dz/" style="margin-top:0.5em;color:rgb(102,102,102);text-decoration:none" target="_blank">www.hanouti.dz</a>&nbsp;<br>
        </p>
        <p>
            <a href="https://www.linkedin.com/hanouti.dz" style="margin-top:0.5em;color:rgb(102,102,102);text-decoration:none" target="_blank">
                <img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/linkedin_circle_gray-24.png">
            </a>&nbsp;
            <a href="https://twitter.com/hanouti.dz" style="margin-top:0.5em;color:rgb(102,102,102);text-decoration:none" target="_blank">
                <img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/twitter_circle_gray-24.png">
            </a>&nbsp;
            <a href="https://plus.google.com/hanouti.dz" style="margin-top:0.5em;color:rgb(102,102,102);text-decoration:none" target="_blank">
                <img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/google_circle_gray-24.png">
            </a>
        </p>
    </div>
    <div style="width:190px;max-width:190px;font-family:'Lucida Grande',Tahoma;font-size:12px;margin-top:0.5em;color:rgb(102,102,102);letter-spacing:2px;border-left-width:2px;border-left-style:solid;border-left-color:rgb(251,224,181);padding-top:3px;padding-left:10px;overflow:hidden">
    </div>
</div>
</div>

   <!-- end footer ====== -->
   <script>
    $('#printInvoice').click(function(){
      Popup($('.invoice')[0].outerHTML);
      function Popup(data) 
      {
          window.print();
          return true;
      }
    });
    </script>
</body>

</html>
 