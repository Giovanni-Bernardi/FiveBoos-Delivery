@extends('layouts.main-layout')

@section('content')
    <main>
        {{-- landing page --}}
        <main>
    
            <body>
                <section id="landing-jumbo">
                    <div id="background-jumbo">
                        <h1 id="landing-title">
                            Hai fame? Sei nel posto giusto
                        </h1>
                        <div id="cover">
                            <form method="get" action="">
                                <div class="tb">
                                    <div class="td"><input type="text" placeholder="Indirizzo di consegna" required></div>
                                    <div class="td" id="s-cover">
                                        <button type="submit">
                                            <div id="s-circle"></div>
                                            <span></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </body>
        </main>


        {{-- restaurant list --}}
        <h2>Delivery</h2>
        <ul>
            <li>
                <h4>
                    Restaurants List:
                </h4>
            </li>
            @foreach ($restaurants as $restaurant)
                <li>
                    {{$restaurant -> business_name}}
                    <a href="{{route('restaurantDetailsViewLink', $restaurant -> id)}}">details</a>
                </li>
            @endforeach
        </ul>
    </main>
@endsection