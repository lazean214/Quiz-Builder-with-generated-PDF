<?php ini_set('memory_limit', '-1'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Empires Heights Properties - Catalog {{ date('Y-m-d')}}</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Oswald', sans-serif;
        }

        .bg-image {
            position: absolute;
            top: -50px;
            left: -60px;
            width: 800;
            height: 600px;
            overflow: hidden;
        }

        .bg-image-2 {
            position: absolute;
            bottom: -50px;
            right: -60px;
            width: 800;
            height: 600px;
            overflow: hidden;
        }

        .page-break {
            page-break-after: always;
        }


        .thumbnail {
            position: absolute;
            left: -50px;
            background: #fff;
            width: 300px;
            /* height: 250px; */
            border-radius: 0;
            border: none;
            padding: 15px;
            border: 1px solid rgba(0,0,0,0.025);
            margin-bottom: 15px;
        }

        .thumbnail img {
            width: 100%;
        }

        .summary {
            position: absolute;
            bottom: 0;
            width: 400px;
            background: #fff;
            right: -40px;
            padding: 20px;
            border: 1px solid rgba(0,0,0,0.025);
        }

        .link {
            position: absolute;
            left: 0;
            bottom: 0;
            text-align: center;
            text-transform: uppercase;
        }

        p {
            font-weight: 200;
            line-height: 15px;
        }

        table {
            width: 100%;
        }

        table tr td:last-child {
            text-align: right;
        }

        h4 {
            font-size: 12px;
        }

        .position-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .btn-warning {
            padding-left: 20px;
            padding-right: 20px;
            background-color: #caa337a2;
            border-radius: 30px;
            border: transparent;
        }

        .generated-info {
            position: absolute;
            top: 0;
            left: 0;
            font-size: 10px;
            font-weight: 200;
            opacity: .5;
        }
    </style>
</head>
<body>
<div class="container">
    <div style="position: relative">
        <div class="generated-info">
            <small>Generated: {{ date('Y-m-d H:i:s')}}</small>
        </div>
        <img class="bg-image-2" src="{{ public_path('assets/cover.png')  }}" alt="">
        <div class="position-center">
            <div>Hi {{ \Session::get('name');}},</div>
            <h1>There are more than 100 developments in Dubai.</h1>
            <p>We've narrowed down the <em>BEST PROPERTY</em> that suits you.</p>
        </div>

</div>
<div class="page-break"></div>
    @foreach ($data as $item)

    <?php

    $img = $item['image'];?>

	<div style="position: relative">
        <img class="bg-image" src="{{ public_path('uploads/' . $item['image']) }}" alt="">
        <?php $pic = json_decode($item['gallery'], true) ;

        ?>
        <div class="thumbnail"  style="top: 0;">
            <img class="" src="{{ public_path('uploads/' . $pic[0]) }}" alt="">
        </div>
        <div class="thumbnail" style="top: 40%;">
            <img class="" src="{{ public_path('uploads/' . $pic[1]) }}" alt="">
        </div>
        <div class="summary">
            <h1>{{ $item['name'] }} </h1>
            <table>
                <tr>
                    <td>Location: <strong>{{ $item['area'] }}</strong></td>
                    <td>Handover: <strong>{{ $item['handover'] }}</strong></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><sup>FROM</sup> <strong>AED {{ $item['price'] }}</strong></td>
                    <td><sup>AREA</sup> <strong>{{ $item['size'] }}</strong></td>
                </tr>
            </table>
            <p>{{ $item['content'] }}</p>
        </div>
        <div class="link">
            <p>Register your interest</p>
            <h2 class="m-0 p-0"><a href="tel:+9714427830">+971 4 442 7830</a></h2>
            <a class="btn btn-warning" href="#">www.neilsalazar.info</a>
        </div>
    </div>
    <div class="page-break"></div>
    @endforeach

</div>
</body>
</html>
