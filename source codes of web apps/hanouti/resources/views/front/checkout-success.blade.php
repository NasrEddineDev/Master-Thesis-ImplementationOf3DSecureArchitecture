@extends('layouts.front.app')

@section('content')
    {{-- <div class="container product-in-cart-list">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <p class="alert alert-success">Your order is under way! <a href="{{ route('home') }}">Show more!</a></p>
            </div>
        </div>
    </div> --}}
{{-- 
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     --}}
    <style>
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
    
    <!--Author      : @arboshiki-->
    <div id="invoice" style="width: 800px;border:1px solid black;margin:auto">
    
        <div class="toolbar hidden-print">
            <div class="text-right">
                <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
            </div>
            <hr>
        </div>
        <div class="invoice overflow-auto">
            <div style="min-width: 600px">
                <header>
                    <div class="row">
                        <div class="col-md-3">
                            <a target="_blank" href="https://lobianijs.com">
                            <img style="width:114px;" src="{{ asset("storage/hanouti-logo.png") }}" alt="{{ __('Hanouti') }}" data-holder-rendered="true" />
                                </a>
                        </div>
                        <div class="col-md-9 company-details">
                            <h2 class="name">
                                <a target="_blank" href="https://lobianijs.com">
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
                    <table border="0" cellspacing="0" cellpadding="0">
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
                              {{-- <td class="text-left">{{$product->sku}}</td> --}}
                              <td class="text-left">{{$product->name}}</td>
                              <td class="text-left">{{$product->description}}</td>
                              <td class="unit">{{$product->price}}</td>
                              <td class="qty">{{$product->qty}}</td>
                              <td class="total">{{config('cart.currency')}} {{number_format($product->price * $product->qty, 2)}}</td>
                            </tr>
                          @endforeach
                            {{-- <tr>
                                <td class="no">01</td>
                                <td class="text-left"><h3>Website Design</h3>Creating a recognizable design solution based on the company's existing visual identity</td>
                                <td class="unit">$40.00</td>
                                <td class="qty">30</td>
                                <td class="total">$1,200.00</td>
                            </tr>
                            <tr>
                                <td class="no">02</td>
                                <td class="text-left"><h3>Website Development</h3>Developing a Content Management System-based Website</td>
                                <td class="unit">$40.00</td>
                                <td class="qty">80</td>
                                <td class="total">$3,200.00</td>
                            </tr>
                            <tr>
                                <td class="no">03</td>
                                <td class="text-left"><h3>Search Engines Optimization</h3>Optimize the site for search engines (SEO)</td>
                                <td class="unit">$40.00</td>
                                <td class="qty">20</td>
                                <td class="total">$800.00</td>
                            </tr> --}}
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
    </div>
    
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

@endsection