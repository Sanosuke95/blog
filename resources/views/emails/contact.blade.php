<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Envoie du contact</h2>
    <p>Prise de contact avec une personne</p>
    <p><strong>Email</strong> : {{ $contact['email']}}</p>
    <p><strong>Subject</strong> : {{ $contact['subject']}}</p>
    <p>{{ $contact['content'] }}</p>
</body>
</html>
