# create project : 
    composer create-project symfony/website-skeleton:"^5.4" test_technique_torrente_thomas
# create DB :
    php bin/console doctrine:database:create

# Modify .env

# Create User Table (For Admin)
    php bin/console make:user
    php bin/console make:migration
    php bin/console doctrine:migrations:migrate

# Create login Form : 
php bin/console make:auth
Modify the files (controller)

# Create Signup Form :
php bin/console make:registration-form
Modify the files (controller)
