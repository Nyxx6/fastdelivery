<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ __('Profile Information') }}</title>
    <style>
        /* Define your CSS styles for PDF here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-data {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ __('Profile Information') }}</h1>
        </div>
        <div class="profile-data">
            <p><strong>{{ __('Last Name') }}:</strong> {{ $user->nom }}</p>
            <p><strong>{{ __('First Name') }}:</strong> {{ $user->prenom }}</p>
            <p><strong>{{ __('Address') }}:</strong> {{ $user->adresse }}</p>
            <p><strong>{{ __('Gender') }}:</strong> {{ $user->genre }}</p>
            <p><strong>{{ __('Date of Birth') }}:</strong> {{ $user->date_naissance }}</p>
            <p><strong>{{ __('Favorite Restaurant') }}:</strong> {{ $user->resto_fav }}</p>
            <p><strong>{{ __('Telephone') }}:</strong> {{ $user->tel }}</p>
            <p><strong>{{ __('Operator') }}:</strong> {{ $user->operateur }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>
</body>
</html>
