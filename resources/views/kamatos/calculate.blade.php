@extends('kamatos.layout')

@section('content')
    @include('kamatos._nav')

<?php

    $all = ($credit->getLoan() + $credit->getSumInterestRate()[$credit->getDurationInMonth()-1]);
    $monthly = $all / $credit->getDurationInMonth();
    // Egy összesítő arról, hogy milyen adatokkal is számolunk.
    echo "
    <section class='container'>
        <div class='row'>
            <table id='sum' class='ten columns offset-by-one'>
                <tr>
                <th id='center' colspan='2'>Összesítés</th>
                </tr>
                <tr>
                    <td>Felvett hitel</td>
                    <td>".number_format($credit->getLoan(),0,',',' ')." Ft</td>
                </tr>
                <tr>
                    <td>Futamidő</td>
                    <td>".$credit->getDurationInMonth()." hónap</td>
                </tr>
                <tr>
                    <td>Kamat</td>
                    <td>".$credit->getInterestRate()."%</td>
                </tr>
                <tr>
                    <td>Összesen viszafizetendő</td>
                    <td>".number_format($all,0,',',' ')." Ft</td>
                </tr>
                <tr>
                    <td>Havi szinten törlesztendő</td>
                    <td>".number_format($monthly,0,',',' ')." Ft</td>
                </tr>
                <tr>
                    <td>Összes kamat</td>
                    <td>".number_format($credit->getSumInterestRate()[$credit->getDurationInMonth()-1],0,',',' ')." Ft</td>
                </tr>
            </table>
        </div>";

    //Táblázat
    echo '
        <div class="row">
        <table class="ten columns offset-by-one">
            <tr>
                <th colspan="4">Táblázat</th>
            </tr>
            <tr>
                <th>Hónap</th>
                <th>Tőkemaradvány</th>
                <th>Kamat adott hónapban</th>
                <th>Kamat adott hónapig</th>
            </tr>';

    for ($i = 0; $i < count($credit->getLoanCounter()) ; $i ++)
    {
        echo "<tr>"
        ."<td>".($i+1)."</td>"
        ."<td>".number_format($credit->getLoanCounter()[$i],0,',',' ')."</td>"
        ."<td>".number_format($credit->getInterestRateCounter()[$i],0,',',' ')."</td>"
        ."<td>".number_format($credit->getSumInterestRate()[$i],0,',',' ')."</td>
        </tr>";
    }

    echo "</table>
    </div>
    </section>";

?>

@endsection
