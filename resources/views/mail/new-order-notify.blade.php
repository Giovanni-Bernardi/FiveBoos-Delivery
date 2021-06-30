<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New-Order-Message</title>
    <style>

        #mail-main{
            width: 1200px;
            margin: 30px auto;
            border: 20px solid #F85B59;
        }
        #content-container{
            width: 1100px;
            margin: auto;
        }
        #container-logo{
            display: flex;
            justify-content: center;
        }
        #logo-img{
            margin-top: 50px;
            width: 250px;
        }
        #thanksgiving{
            text-align: center;
            color: #F85B59;
            margin-top: 20px;
            font-size: 40px;
        }
        #recap{
            text-align: center;
            margin-top: 50px;
            margin-bottom: 20px;
            font-size: 35px;
        }
        #container-info{
            display: flex;
            justify-content: space-between;
            margin: 0 15px;
        }
        .font-size-text{
            font-size: 20px;
            text-transform: capitalize;
        }
        #table-name{
            display: flex;
            padding: 15px 25px;
            background-color: #343434;
        }
        #table-part-left{
            width: 50%;
        }
        #table-part-right{
            width: 50%;
            display: flex;
            justify-content: space-between;
        }
        .color-white{
            color: whitesmoke;
            padding: 0px;
            margin: 0px;
        }
        #table-products{
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            border-bottom: 5px solid #343434;
            padding-bottom: 5px;
        }
        #table-products-left{
            width: 40%;
            padding-left: 5px;
        }
        #table-products-right{
            width: 50%;
            display: flex;
            justify-content: space-between;
        }
        .product{
            padding: 0px 10px;
            text-transform: capitalize;
            color: #343434;
        }
        #total-price{
            margin: 50px 0;
            display: flex;
            justify-content: flex-end;
            font-size: 28px;
        }
        h3{
            font-size: 23px;
        }
    </style>
  </head>
  <body>
        <main id="mail-main">
            <div id="content-container">
                <div id="container-logo">
                    <img id="logo-img" src="{{asset('/storage/assets/site-logo/loader.svg')}}" alt="">
                </div>

                <div>
                    <h1 id="thanksgiving">GRAZIE PER AVER SCELTO 5BOO'S!</h1>
                </div>

                <div>
                    <h2 id="recap">Ecco il riepilogo del tuo ordine:</h2>
                </div>

                <div id="container-info">
                    <div>
                        <h3>CLIENTE</h3>
                        <p class="font-size-text">{{$order -> firstname}} {{$order -> lastname}}</p>
                    </div>

                    <div>
                        <h3>ID ORDINE</h3>
                        <p class="">#{{$order -> id}}</p>
                    </div>

                    <div>
                        <h3>DATA DI CONSEGNA</h3>
                        <p class="">{{$order -> delivery_date}} {{$order -> delivery_time}}</p>
                    </div>
                </div>

                <div id="table-name">
                    <div id="table-part-left">
                        <h4 class="color-white">DESCRIZIONE</h4>
                    </div>

                    <div id="table-part-right">
                        <h4 class="color-white">QTA</h4>
                        <h4 class="color-white">PREZZO</h4>
                        <h4 class="color-white">TOTALE</h4>
                    </div>
                </div>

                <div>
                    @foreach ($order -> products as $plate)
                        <div id="table-products">

                            <div id="table-products-left">
                                <p class="product">{{$plate -> name}}</p>
                            </div>

                            <div id="table-products-right">
                                <p class="product">1</p>
                                <p class="product">{{$plate -> price}} €</p>
                                <p class="product">{{$plate -> price * 2}} €</p>
                            </div>

                        </div>
                    @endforeach
                </div>

                <div id="total-price">
                    <h2>TOTALE: <strong>{{$order -> total_price}} €</strong></h2>
                </div>
            </div>
        </main>
  </body>
</html>
{{-- <h1>Abbiamo ricevuto il vostro ordine N{{ $order -> id }}</h1>
@foreach ($order -> products as $plate)
<h1>{{$plate -> name}} : {{$plate -> price}}€</h1>
@endforeach
<h1>Totale Pagato: {{$order -> total_price}}€</h1>
<h1>La consegna avvera al indirizzo: {{$order -> address}}</h1>
<h1>Tempo di Consegna: {{$order -> delivery_date}}  {{$order -> delivery_time}}</h1> --}}
