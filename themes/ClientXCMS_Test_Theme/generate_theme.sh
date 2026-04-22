#!/bin/bash

# Configuration du nom
THEME_SLUG="ClientXCMS_Test_Theme"
THEME_NAME="ClientXCMS Test Theme"
BASE_DIR="./"

echo "--- Génération de la structure complète : $THEME_SLUG ---"

# 1. Création de l'arborescence
mkdir -p $BASE_DIR/assets/{css,js,images}
mkdir -p $BASE_DIR/config
mkdir -p $BASE_DIR/database/seeders
mkdir -p $BASE_DIR/lang/fr
mkdir -p $BASE_DIR/views/layouts

echo "[1/10] Dossiers créés."

# 2. theme.json
cat <<EOF > $BASE_DIR/theme.json
{
    "name": "$THEME_NAME",
    "slug": "$THEME_SLUG",
    "author": "Expert",
    "version": "1.0.0",
    "support": "3.*",
    "description": "Thème complet avec support Client et Auth."
}
EOF

# 3. menus.json
cat <<EOF > $BASE_DIR/menus.json
[
    {"name": "Accueil", "url": "/", "order": 1},
    {"name": "Boutique", "url": "/store", "order": 2}
]
EOF

# 4. Assets (CSS & JS)
cat <<EOF > $BASE_DIR/assets/css/app.css
:root { --primary: #0d6efd; }
body { font-family: 'sans-serif'; }
EOF

cat <<EOF > $BASE_DIR/assets/js/app.js
console.log('$THEME_NAME chargé !');
EOF

# 5. Config Files
cat <<EOF > $BASE_DIR/config/config.json
{
    "show_footer_logo": true,
    "primary_color": "#0d6efd"
}
EOF

cat <<EOF > $BASE_DIR/config/config.blade.php
<div class="mb-3">
    <label class="form-label">Couleur primaire</label>
    <input type="color" name="primary_color" class="form-control" value="{{ theme_config('primary_color', '#0d6efd') }}">
</div>
EOF

cat <<EOF > $BASE_DIR/config/rules.php
<?php
return [
    'primary_color' => 'required|string|size:7',
];
EOF

# 6. Database (Seeder & Settings)
cat <<EOF > $BASE_DIR/database/db_settings.php
<?php
return [
    'theme_test_setting' => 'default_value',
];
EOF

cat <<EOF > $BASE_DIR/database/seeders/ThemeNameSeeder.php
<?php
namespace Themes\\$THEME_SLUG\\database\\seeders;
use Illuminate\Database\Seeder;

class ThemeNameSeeder extends Seeder {
    public function run() {
        // Logique de seeding ici
    }
}
EOF

# 7. Langues
cat <<EOF > $BASE_DIR/lang/fr/messages.php
<?php
return [
    'welcome' => 'Bienvenue sur notre plateforme',
    'contact_us' => 'Contactez-nous',
];
EOF

# 8. Views - Layout Front
cat <<EOF > $BASE_DIR/views/layouts/front.blade.php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - {{ setting('app_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ theme_asset('css/app.css') }}">
</head>
<body>
    <main>@yield('content')</main>
    <script src="{{ theme_asset('js/app.js') }}"></script>
</body>
</html>
EOF

# 9. Views - Layout Client (Espace membre)
cat <<EOF > $BASE_DIR/views/layouts/client.blade.php
@extends('layouts.front')
@section('content')
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 bg-light sidebar p-4 shadow-sm">Menu Client</nav>
        <main class="col-md-9 p-4">@yield('client_content')</main>
    </div>
</div>
@endsection
EOF

# 10. Views - Layout Auth (Connexion / Inscription)
cat <<EOF > $BASE_DIR/views/layouts/auth.blade.php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Authentification - {{ setting('app_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">
    <div class="container text-center">
        <div class="card mx-auto shadow" style="max-width: 400px;">
            <div class="card-body">@yield('content')</div>
        </div>
    </div>
</body>
</html>
EOF

echo "--- Terminé ! Structure complète créée dans $BASE_DIR ---"