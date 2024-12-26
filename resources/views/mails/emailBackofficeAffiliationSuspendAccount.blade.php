<!-- resources/views/emails/compte_activé.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Désactivation de votre compte</title>
</head>
<body>
    <h1>Bonjour {{ $user->nom_parrain }},</h1>
    <p>Nous tenons à vous informer que votre compte d'affiliation sur le site BARAKA CONSULTING a été désactivé. </p>

    <p>
        Si vous pensez qu'il s'agit d'une erreur ou si vous avez des questions concernant cette décision, 
        n'hésitez pas à nous contacter. Nous sommes là pour vous aider.
    </p>
    <p>
        Nous vous remercions de votre compréhension et espérons pouvoir collaborer à nouveau à l'avenir.
    <p>
        
    <p>
        Cordialement,
        L'équipe de BARAKA CONSULTING.
    </p>
</body>
</html>
