<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Balogh Bíborka</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/ingatlan.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="js/ajax.js"></script>
    <script src="js/ingatlan.js"></script>
    <script src="js/ingatlanClass.js"></script>

    <script src="js/kategoria.js"></script>
    <script src="js/kategoriaClass.js"></script>

    <script src="js/ujHirdetesMentese.js"></script>

</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        {{-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
        <h1>Ajánlataink</h1>
        <div class="asztaliNezet">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Kategória</th>
                        <th scope="col">Leírás</th>
                        <th scope="col">Hirdetés dátuma</th>
                        <th scope="col">Tehermentes</th>
                        <th scope="col">Fénykép</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="elemek">
                        <td class="kategoria"></td>
                        <td class="leiras"></td>
                        <td class="hirdetesDatuma"></td>
                        <td class="tehermentes"></td>
                        <td class="kep"><img src=""></td>
                        <td class="torol"> <button>Törlés</button> </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="grid-container text-center divElem">
            @foreach ($kategoriakNev as $kategoriaNev)
                @foreach ($ingatlanok as $ingatlan)
                    @if ($kategoriaNev->id === $ingatlan->kategoria)
                        <div class="grid-item egyDoboz">
                            <div class="cimke">
                                <p style="float: left">{{ $kategoriaNev->nev }}
                                <p style="float: right">{{ $ingatlan->ar }}</p>
                                </p>
                            </div>
                            <div><img src="{{ $ingatlan->kepURL }}"></div>
                            {{-- <button id="erdekelGomb" class="erdekel">Érdekel</button> --}}
                            <input type="button" value="Érdekel" class="btn btn-primary erdekel" id="erdekelGomb">
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>

        <form>
            <div class="form-group">
                <h1>Új hirdetés elküldése</h1>
                <label for="kategoria">Ingatlan kategóriája</label>
                <select class="form-control kategoriaSelect" id="kategoriaSelect" name="kategoriaSelect">
                    <option class="kategoriaElem" value=""></option>
                </select>
            </div>

            <div class="form-group">
                <label for="datum">Hirdetés dátuma</label>
                <input type="date" class="form-control" id="HirdetesDatum" value="<?php echo date('Y-m-d'); ?>"
                    name="hirdetesDatuma">
            </div>

            <div class="form-group">
                <label for="leiras">Ingatlan leírása</label>
                <textarea class="form-control" id="ingatlanLeiras" rows="3" name="leiras"></textarea>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="tehermentes" name="tehermentes">
                <label class="form-check-label" for="tehermentes">
                    Tehermentes ingatlan
                </label>
            </div>

            <div class="form-group">
                <label for="fenykepURL">Fénykép az ingatlanról</label>
                <input type="text" class="form-control" id="fenykepURL" name="kepURL">
            </div>


                <button type="button" class="btn btn-primary kuldes" id="gomb">Küldés</button>

        </form>




    </div>
</body>

</html>
