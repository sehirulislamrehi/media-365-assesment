
## Project start
 - Please after install the composer run migrate and db seed.
 - Used laravel reverb for real time table load
 - use the env example as main env file
 - Please create a role first if you want to create multiple user.

# Queue
php artisan queue:work --queue=enterprise,pro,free

# Reverb
php artisan reverb:start --verbose