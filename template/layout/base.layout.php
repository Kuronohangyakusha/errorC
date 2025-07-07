


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'alchimiste du code - Liste des commandes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-green': '#0f1b0f',
                        'green-accent': '#22c55e',
                        'dark-gray': '#1a1a1a',
                        'light-gray': '#2a2a2a'
                    }
                }
            }
        }
    </script>
</head>
<?php
   require_once '../template/layout/partial/header.partial.php';
    echo $contentForLayout;
?>
</html>