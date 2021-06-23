<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New-Order-Message</title>
    <style>
      body {
        background-color: purple;
        color: white;
      }
    </style>
  </head>
  <body>
    <h1>Abbiamo ricevuto il vostro ordine N{{ $order -> id }}</h1>
    @foreach ($order -> products as $plate)
        <h1>{{$plate -> name}} : {{$plate -> price}}€</h1>
    @endforeach
    <h1>Totale Pagato: {{$order -> total_price}}€</h1>
    <h1>La consegna avvera al indirizzo: {{$order -> address}}</h1>
    <h1>Tempo di Consegna: {{$order -> delivery_date}}  {{$order -> delivery_time}}</h1>
  </body>
</html>
