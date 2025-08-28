
## Project start
 - Please after install the composer run migrate and db seed.
 - Used laravel reverb for real time table load
 - use the env example as main env file

# Queue
php artisan queue:work --queue=enterprise,pro,free

# Reverb
php artisan reverb:start --verbose