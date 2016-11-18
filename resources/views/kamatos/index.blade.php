@extends('kamatos.layout')

@section('content')

    <section class="container">

        <form action="/kamatos" method="post">
            <div class="row">
                <div id="form" class="four columns offset-by-four">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label for="loan">Tőke</label>
                    <input id="loan" class="u-full-width" type="number" name="loan" value="" placeholder="1 000 000 Ft" required autofocus>

                    <label for="duration">Kamat</label>
                    <input id="duration" class="u-full-width" type="number" name="interest" value="" step="any" placeholder="10 %" required>

                    <label for="month">Futamidő</label>
                    <input id="month" class="u-full-width" type="number" name="duration" value="" placeholder="24 hónap" required>

                    <input class="u-full-width button-primary" type="submit" name="submit" value="Számítás">

                </div>
            </div>
        </form>

    </section>

@endsection
