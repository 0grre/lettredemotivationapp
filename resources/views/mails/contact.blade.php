<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Demande de contact</title>
</head>
<body>

<h1>Nouveau message de {{ $contact_name }}</h1>
<ul>
    <li>Email: {{ $contact_email }}</li>
    <li>Sujet: {{ $contact_subject }}</li>
</ul>
<br>
<br>
<p>{{ $contact_message }}</p>
<br>
<br>
</body>
</html>
