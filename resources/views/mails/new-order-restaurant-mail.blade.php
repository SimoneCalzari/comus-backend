<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuova mail al ristoratore</title>
</head>

<body class=font-secondary>
    <p>Gentile {{ $lead->restaurant->user->name }}</p>
    <p>Il suo ristorante {{ $lead->restaurant->name }} ha ricevuto un ordine da un utente con i seguenti dati:</p>
    <ul>
        <li>Nome Cognome: {{ $lead->customer_name }} </li>
        <li>Telefono: {{ $lead->phone_number }} </li>
        <li>Indirizzo: {{ $lead->delivery_address }} </li>
        <li>Mail: {{ $lead->email }} </li>
    </ul>
    <p>L'ordine è il seguente: </p>
    <ul>
        @foreach ($lead->dishes as $dish)
            <li>{{ $dish->name }} - {{ $dish->pivot->quantity }}</li>
        @endforeach
        <li>Totale: {{ $lead->final_price }} €</li>
    </ul>
    <p>La invitiamo alla preparazione e relativa consegna dell'ordine all'indirizzo e orario sopra indicati.</p>
    <p>Il team di Comus la ringrazia nuovamente per essere diventato nostro affiliato e le augura che le sue vendite
        possano andare alle &star;;</p>
</body>

</html>
