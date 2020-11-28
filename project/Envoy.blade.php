@servers(['production' => 'findit@172.105.73.78', 'dev' => 'findit@172.105.73.78'])

@task('deploy-production', ['on' => 'production'])
cd /home/findit/app/findit/project
php artisan down
git reset --hard HEAD
git pull origin master
php composer.phar dump-autoload
php artisan migrate --force
php artisan up
@endtask

@task('deploy-dev', ['on' => 'dev'])
cd /home/findit/app/findit/project
php artisan down
git reset --hard HEAD
git pull origin master
php composer.phar dump-autoload
php artisan migrate --force
php artisan up
@endtask