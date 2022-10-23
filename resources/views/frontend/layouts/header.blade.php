<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $company_info = App\Models\CompanyInfo::first();
    @endphp
    <title>{{ $company_info->title }}</title>
    <link rel="icon" type="image/png" href="{{ asset($company_info->logo) }}" />
    {{-- online css link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    {{-- custom css link --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
    <link href="https://fonts.maateen.me/apona-lohit/font.css" rel="stylesheet">
    <link href="https://fonts.maateen.me/mukti/font.css" rel="stylesheet">

    <link href="https://fonts.maateen.me/apona-lohit/font.css" rel="stylesheet">



    {{-- <link rel="stylesheet" href="{{ asset('css/css/style1.css') }}"> --}}
    <style>
        body {
            font-size: 17px;
        }

        .order-section {
            background-color: rgba(207, 127, 127, 0.422);
        }

        .text-wrap-head {
            background-color: rgba(64, 218, 13, 0.422);
            font-weight: bold;
            font-size: 23px;
        }

        .order-text {
            background-color: #e84393;
            color: black;
            font-size: 20px;
        }

        .fa-youtube {
            color: red;
        }

        .footer-text {
            color: #0BF729;
        }

        .free-delivary {
            display: inline-block;
            border: 5px solid #eed282;
            margin-bottom: 30px;
            padding: 8px;
            color: violet;
        }

        .fa-phone-alt {
            color: #60ec1f;
        }

        .text-wrap p {
            background-color: yellow;
            font-weight: bold;
            padding: 9px;
            font-size: 31px;
        }


        .text-animation {
            animation: pulse 0.6s ease-out infinite;
            cursor: pointer;
        }

        @keyframes pulse {
            0% {
                opacity: 0.9;
                transform: scale(0.8);
            }

            30% {
                opacity: 1;
                transform: scale(1);
            }

            70% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0.9;
                transform: scale(0.8);
            }
        }

        .delivary-image {
            margin-left: 14px;
            border: 1px dotted;
            background: #ffbd1f57;
            margin-bottom: 5px;
            height: 115px;
            width: 144px;
        }

        input {
            height: 40px;
            font-size: 16px !important;
        }

        textarea {
            height: 69px;
            font-size: 16px !important;
        }

        .delivary-img-section {
            display: flex;
            justify-content: space-around;
        }


        /*Thank you page design*/
        .thank-div {
            padding: 60px 2px 50px 20px;
        }

        .thank-icon {
            color: #0cf20c;
            font-size: 50px;
            padding: 0px 0px 30px 0px;
            /* background-color: green; */
        }

        .thank-text {
            color: white;
            font-size: 26px;
        }

        .order-received {
            color: #000000;
            font-family: "Raleway", Sans-serif;
            font-weight: 600;
            margin-top: 40px;
            font-size: 28px;
            text-align: center;
        }

        .order-receive-details {
            background-color: #f8f8f8;
            font-size: 18px;
        }

        .order-details-div {
            display: flex;
            justify-content: space-around;
        }

        .order-details-header {
            font-size: 22px;
            font-weight: bold;
        }

        .order-details-text {
            font-size: 18px;
        }

        .order-details {
            font-size: 26px;
            font-weight: bolder;
            color: blue;
        }

        /*end thank you page design*/


        /*Why us section */
        .why-us {
            background-color: yellow;
        }

        .why-us-emoji {
            font-size: 45px;
            display: block;
            text-align: center;
        }

        .why-us-header {
            text-align: center;
            font-weight: bold;
            font-size: 27px;
        }

        .why-us-div-des {
            text-align: center;
            font-weight: bold;
            font-size: 27px;
            color: #0b86ea;
        }

        .why-us-footer {
            background-color: rgb(65, 9, 248);
            text-align: center;
            font-weight: bold;
            font-size: 27px;
        }

        .why-us-footer-text {
            text-align: center;
            font-weight: bold;
            font-size: 27px;
            color: white;
        }

        /*end why us section */
        .footer {
            background-color: black;
            color: white;
            /* height: 50px; */
            justify-items: center;
            padding: 16px 8px 16px 8px;
        }

        /*Animation*/
        /*rotate animation */
        .animation {
            animation-name: nobir;
            animation-duration: 2s;
            animation-timing-function: cubic-bezier(0.075, 0.82, 0.165, 1);
            animation-iteration-count: infinite;
            text-align: center;
            border: 1px solid;
            margin: 0px 5px 5px 12px;
            color: black;
            background: #F8AC00;
            font-size: 25px;
            display: flex;
            align-items: center;
            padding: 0px 8px 0px 8px;

        }

        @keyframes nobir {
            from {
                transform: scaleX(-100%);
                -webkit-transform: scaleX(-100%);
                -moz-transform: scaleX(-100%);
                -ms-transform: scaleX(-100%);
                -o-transform: scaleX(-100%);
            }

            to {
                transform: scale(100%);
                -webkit-transform: scale(100%);
                -moz-transform: scale(100%);
                -ms-transform: scale(100%);
                -o-transform: scale(100%);
            }
        }

        /*end animation */
    </style>

</head>
