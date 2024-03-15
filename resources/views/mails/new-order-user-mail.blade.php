<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuova mail all'utente</title>
</head>

<body class="font-secondary">
    <p>Gentile {{ $lead->customer_name }},</p>
    <p>Il suo ordine che comprende:</p>
    <ul>
        @foreach ($lead->dishes as $dish)
            <li>{{ $dish->name }} - {{ $dish->pivot->quantity }}</li>
        @endforeach
    </ul>
    <p>Per un totale di {{ $lead->final_price }} € è stato accettato da {{ $lead->restaurant->name_restaurant }} e le
        verrà consegnato all'indirizzo ed orario da lei indicato al momento dell'ordine.</p>
    <p>Il team di Comus le augura una buona serata e una buona cena a domicilio &hearts;</p>
</body>

</html>
