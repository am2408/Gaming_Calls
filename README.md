# Gaming_Calls

# Avant le lancement du site:
  - Importer la BDD (gaming_calls.sql)
  - Changer le fichier 'database.php' (application/config/database.php) avec vos identifiants si nécessaire

# Optionnel si vous voulez mettre votre compte stripe:
 - Mettre votre clé "publique" dans le fichier 'charge.js' (application/www/js/charge.js) -> var stripe = Stripe('votre clé'); (ligne: 3)
 - Mettre votre clé "secrète" dans le fichier 'ChargeController.class.php' (application/controllers/payment/charge/ChargeController.class.php) -> \Stripe\Stripe::setApiKey('votre clé'); (ligne: 48)

# Informations à connaître:
  - Compte admin:
    - Email: admin@gmail.com et Pseudo: admin
    - Mot de passe: admin
  - Compte pro:
    - Email: user.pro@gmail.com et Pseudo: UserPro
    - Mot de passe: pro
  - Compte user:
    - Email: user@gmail.com et Pseudo: user
    - Mot de passe: user
