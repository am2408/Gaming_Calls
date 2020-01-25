# Gaming_Calls

# Avant le lancement du site:
  - importer la BDD (gaming_calls.sql)
  - changer le fichier 'database.php' (application/config/database.php) avec vos identifiants si nécessaire

# Optionnel si vous voulez mettre votre compte stripe:
 - mettre votre clé "public" dans le fichier 'charge.js' (application/www/js/charge.js) -> var stripe = Stripe('votre clé'); (ligne: 3)
 - mettre votre clé "privée" dans le fichier 'ChargeController.class.php' (application/controllers/payment/charge/ChargeController.class.php) -> \Stripe\Stripe::setApiKey('votre clé'); (ligne: 48)

# Informations à connaître:
  - compte admin:
    - email: admin@gmail.com et pseudo: admin
    - mot de passe: admin
  - compte pro:
    - email: user.pro@gmail.com et pseudo: UserPro
    - mot de passe: pro
  - compte user:
    - email: user@gmail.com et pseudo: user
    - mot de passe: user
