#!/bin/bash

# Dossier du thème
DIR="."

echo "📁 Création des dossiers..."
mkdir -p views public/css public/js

echo "📄 Création de theme.json..."
cat << 'EOF' > theme.json
{
    "name": "ClientXCMS_Test_Theme",
    "author": "XenoXzOFF",
    "version": "1.0.0",
    "description": "Thème de test pour ClientXCMS",
    "screenshot": "screenshot.png"
}
EOF

echo "📄 Création de views/layout.twig..."
cat << 'EOF' > views/layout.twig
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{% block title %}Mon Thème{% endblock %}</title>
    <link rel="stylesheet" href="{{ theme_asset('css/bootstrap.min.css') }}">
</head>
<body>
    {% block body %}{% endblock %}
    <script src="{{ theme_asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
EOF

echo "📄 Création de views/index.twig..."
cat << 'EOF' > views/index.twig
{% extends 'layout.twig' %}
{% block body %}
    <h1>Bienvenue sur mon thème ClientXCMS !</h1>
{% endblock %}
EOF

echo "⚡ Téléchargement de Bootstrap..."
curl -L https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css -o public/css/bootstrap.min.css
curl -L https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js -o public/js/bootstrap.min.js

echo "✅ Terminé ! Tout est prêt."