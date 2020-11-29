@servers(['production' => '-A deploybot@172.105.73.78', 'dev' => '-A deploybot@172.105.73.78'])

@task('deploy-production', ['on' => 'production'])
cd /home/deploybot/app/findit/project
php artisan down
git reset --hard HEAD
git pull origin master
php composer.phar dump-autoload
php artisan migrate --force
php artisan up
@endtask

@task('deploy-dev', ['on' => 'dev'])
cd /home/deploybot/beta-app/findit/project
php artisan down
git reset --hard HEAD
git pull origin master
php composer.phar dump-autoload
php artisan migrate --force
php artisan up
@endtask