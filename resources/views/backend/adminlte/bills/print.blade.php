<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Galada|Vollkorn" rel="stylesheet">
    <title>Kurier Link - bills - bill no. {{$bill['number']}}</title>
    <script type="text/javascript" src="/plugins/jsbarcode/JsBarcode.all.min.js"></script>
</head>

<style>
    body {
        font-family: 'Vollkorn', serif;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        min-height: 100%;
        min-height: 98vh;
        box-sizing: border-box;
        border-top: 15px solid #f6ab36;
        border-bottom: 15px solid #f6ab36;
        padding: 5px 0;
    }

    .bill-header,
    main, footer {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        max-width: 750px;
        margin: 0 auto;
        min-width: 51%;
    }

    .bill-header .orderNumber {
        min-width: 100%;
        text-align: center;
        font-size: 30px;
        font-family: 'Galada', cursive;


    }

    .bill-header .bill-date {
        min-width: 100%;
        display: flex;

    }

    .bill-header .bill-date span {
        flex: 1 0 50%;
        min-width: 50%;
        max-width: 50%;
        /* text-align: center; */
    }

    main .adress {
        width: 100%;
        display: flex;

    }

    main .adress span {
        max-width: 45%;
        font-size: 18px;
        /* font-weight: bold; */
    }
    main .adress span.customer-name{
       font-family: 'Galada', cursive;
       flex-grow: 1;
       text-align: right;
       padding-right: 5px;
       max-width: initial;
       letter-spacing: 2px;
       word-spacing: 3px;
       text-transform: capitalize;
    }
    main .table {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        border: 2px solid black;
        border-radius: 10px;
        width: 100%;
        overflow: hidden;
        margin-top: 10px;
    }

    main .table .table-raw {
        width: 100%;
        display: flex;
        flex-wrap: nowrap;
        padding: 0 2.5px;
        height: 30px;
        border-bottom: 1px solid black;
        box-sizing: border-box;
        line-height: 30px;
    }

    main .table .table-head {
        width: 40%;
        border-right: 1px solid black;
        font-weight: 300;
        text-align: center;
        font-size: 20px;
        font-family: 'Galada', cursive;
    }

    main .table .table-cell {
        text-align: center;
        font-size: 18px;
        width: 60%;
        
    }
    .reverse{
        background: #333333;
        color: #ffffff;
    }
    .table-raw.last{
        border-bottom: 0;
        
    }
    .notes{
        width: 100%;
        margin-top: 20px;
    }
    .notes span{
        font-family: 'Galada', cursive;
    }
    footer .barcode{
        width: 100%;
        display: flex;
        justify-content: center;
        
    }
    .barcode svg{
        max-width: 140px;
        max-height: 75px;
    }
    svg text{
        font-family: 'Galada', cursive !important;
        font-size: 25px !important;
        letter-spacing: 5px;
    }
</style>

<body>
    <header class="bill-header">
        <div class="bill-date">
            <span style="text-align:left;">{{trans('backend/bills.PrintMessageBeforeDate')}}</span>
            <span style="text-align:right;">{{ Carbon\Carbon::now()->format('D, m - Y') }} .</span>
        </div>
        <img src="/images/logo3.png" alt="" srcset="">
        <div class="orderNumber">{{trans('backend/bills.printBill')}} {{$bill['number']}} . </div>
    </header>
    <main>
        <div class="adress">
            <span>
                {{trans('backend/bills.kurierLinkInBill')}}<br/>
                {{trans('backend/bills.KurierLinkAdress')}}
            </span>
            <span class="customer-name">
                {{$bill['customerName']}}
            </span>
        </div>
        <div class="table">
            <div class="table-raw">
                <div class="table-head">{{trans('backend/bills.customer')}}</div>
                <div class="table-cell">{{$bill['customerName']}}</div>
            </div>
            <div class="table-raw">
                <div class="table-head">{{trans('backend/bills.billDate')}}</div>
                <div class="table-cell">{{Carbon\Carbon::parse($bill['invionce_date'])->format(' D , Y-m-d')}}</div>
            </div>
            <div class="table-raw">
                <div class="table-head">{{trans('backend/bills.number')}}</div>
                <div class="table-cell">{{$bill['number']}}</div>
            </div>
            <div class="table-raw">
                <div class="table-head">{{trans('backend/bills.orderNumber')}}</div>
                <div class="table-cell">{{$bill['order_num']}}</div>
            </div>
            <div class="table-raw">
                <div class="table-head">{{trans('backend/bills.paymentType')}}</div>
                <div class="table-cell">{{$bill['payment_type']}}</div>
            </div>
            <div class="table-raw">
                <div class="table-head">{{trans('backend/bills.orderCost')}}</div>
                <div class="table-cell">{{$bill['order_cost']}}</div>
            </div>
            <div class="table-raw">
                <div class="table-head">{{trans('backend/bills.tax')}}</div>
                <div class="table-cell">{{$bill['tax']}}</div>
            </div>
            <div class="table-raw">
                <div class="table-head">{{trans('backend/bills.fees')}}</div>
                <div class="table-cell">{{$bill['fees']}}</div>
            </div>
            <div class="table-raw">
                <div class="table-head">{{trans('backend/bills.discount')}}</div>
                <div class="table-cell">{{$bill['discount']}}</div>
            </div>
            <div class="table-raw reverse last">
                <div class="table-head">{{trans('backend/bills.subTotal')}}</div>
                <div class="table-cell reverse" >{{$bill['sub_total']}}</div>
            </div>



        </div>
        @if($bill['note'])
            <div class="notes">
                <span>* {{trans('backend/bills.note')}} : </span>{{$bill['note']}}
            </div>
        @endif
    </main>
    <footer>
       <div class="barcode">
            <svg id="barcode"></svg>
       </div>
    </footer>
    <script>
        window.addEventListener('load',function(){
            JsBarcode("#barcode", "{{$bill['number']}}");
            window.print();

        })
    </script>
</body>

</html>