<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New-Order-Message</title>

    <style>

        #mail-main{
            width: 95%;
            margin: 30px auto;
            border: 20px solid #F85B59;
        }
        #content-container{
            width: 95%;
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
            font-family: 'Fredoka One', cursive;
        }
        #recap{
            text-align: center;
            margin-top: 50px;
            margin-bottom: 20px;
            font-size: 35px;
            font-family: 'Fredoka One', cursive;
        }
        #container-info{
            display: flex;
            justify-content: space-between;
            margin: 0 15px 20px 15px;
        }
        .font-size-text{
            font-size: 20px;
            text-transform: capitalize;
            font-family: 'Raleway', sans-serif;
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
            font-family: 'Raleway', sans-serif;
        }
        #table-products{
            display: flex;
            justify-content: space-between;
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
            font-family: 'Raleway', sans-serif;
        }
        #total-price{
            margin: 50px 0;
            display: flex;
            justify-content: flex-end;
            font-size: 28px;
            font-family: 'Fredoka One', cursive;
        }
        h3{
            font-size: 23px;
            font-family: 'Raleway', sans-serif;
            font-weight: bold;
        }
        @media screen and (max-width: 576px) {
            #mail-main{
                width: 100%
                margin: 15px auto;
                border: 10px solid #F85B59;
            }
            #content-container{
                width: 100%;
            }
            #thanksgiving{
                font-size: 30px;
            }
            #recap{
                font-size: 25px;
            }
            #container-info{
                display: block;
                text-align: center;
            }
            #table-name{
                padding: 10px 5px;
            }
            #table-part-left{
                width: 28%;
            }
            #table-part-right{
                width: 70%;
            }
            .color-white{
                font-size: 16px;
            }
            #table-products-left{
                width: 28%;
            }
            #table-products-right{
                width: 70%;
                padding-right: 10px;
            }
            .product{
                padding: 0px 5px;
            }
            #total-price{
                font-size: 18px;
            }
        }
    </style>
  </head>
  <body>
        <div id="mail-main">
            <div id="content-container">
                <div id="container-logo">
                    <img id="logo-img" src="{{asset('/storage/assets/site-logo/mail-logo.jpg')}}" alt="">
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
                        <p class="font-size-text">#{{$order -> id}}</p>
                    </div>

                    <div>
                        <h3>DATA DI CONSEGNA</h3>
                        <p class="font-size-text">{{date("j-n-Y")}} / {{$order -> delivery_time}}</p>
                    </div>
                </div>

                <div id="table-name">
                    <div id="table-part-left">
                        <h4 class="color-white">TITOLO</h4>
                    </div>

                    <div id="table-part-right">
                        <h4 class="color-white">Q.TA</h4>
                        <h4 class="color-white">PREZZO</h4>
                        <h4 class="color-white">TOTALE</h4>
                    </div>
                </div>
                {{-- Serve per aggiungere count --}}
                @php
                    $plates = [];
                    for ($i=0; $i < count($order -> products); $i++) {
                        if($i == 0){
                            $plates[$i] ['id'] = $order -> products[$i] -> id;
                            $plates[$i] ['name'] = $order -> products[$i] -> name;
                            $plates[$i] ['price'] = $order -> products[$i] -> price;
                            $plates[$i] ['count'] = 1;

                        }
                        else if($order -> products[$i] -> id == $plates[count($plates) - 1]['id']){
                            $plates[count($plates) - 1]['count'] ++;
                        }
                        else{
                            $plates[count($plates)] ['id'] = $order -> products[$i] -> id;
                            $plates[count($plates) - 1] ['name'] = $order -> products[$i] -> name;
                            $plates[count($plates) - 1] ['price'] = $order -> products[$i] -> price;
                            $plates[count($plates) - 1] ['count'] = 1;
                        }
                    }

                    // number_format($prezzo = (floatval($plate['price'] / 100 )), 2);

                    // $final_price = number_format($totale = (floatval($total_price / 100), 2));
                @endphp
                <div>
                    @foreach ($plates as $plate)
                        <div id="table-products">

                            <div id="table-products-left">
                                <p class="product">{{$plate ['name']}}</p>
                            </div>

                            <div id="table-products-right">
                                <p class="product">{{$plate ['count']}}</p>
                                {{-- {{number_format($prezzo = (floatval($product -> price / 100 )), 2)}} --}}
                                <p class="product">{{number_format($prezzo = (floatval($plate['price'] / 100 )), 2)}} &euro;</p>
                                <p class="product">{{number_format($prezzo = (floatval($plate['price'] / 100 * $plate ['count'])), 2)}} &euro;</p>
                                {{-- <p class="product">{{$price * $plate ['count']}} &euro;</p> --}}
                            </div>

                        </div>
                    @endforeach
                </div>

                <div id="total-price">
                    <h2>TOTALE: <strong>{{number_format($prezzo = (floatval($order -> total_price / 100 )), 2)}} &euro;</strong></h2>
                </div>
            </div>
        </div>
  </body>
</html>
