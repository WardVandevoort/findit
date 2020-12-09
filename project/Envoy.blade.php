@servers(['production' => '-A deploybot@172.105.73.78', 'dev' => '-A deploybot@172.105.73.78'])

@story('deploy')
    deploy-production
    deploy-dev
@endstory

@task('deploy-production', ['on' => 'production'])
cd /home/deploybot/app/findit/project
php artisan down
git reset --hard HEAD
git pull origin master
composer dump-autoload -o
php artisan migrate --force
php artisan up
@endtask

@task('production-up', ['on' => 'production'])
cd /home/deploybot/app/findit/project
php artisan up
@endtask

@task('production-down', ['on' => 'production'])
cd /home/deploybot/app/findit/project
php artisan down
@endtask

@task('deploy-dev', ['on' => 'dev'])
cd /home/deploybot/beta-app/findit/project
php artisan down
git reset --hard HEAD
git pull origin master
composer dump-autoload -o
php artisan migrate --force
php artisan up
@endtask

@task('dev-up', ['on' => 'dev'])
cd /home/deploybot/beta-app/findit/project
php artisan up
@endtask

@task('dev-down', ['on' => 'dev'])
cd /home/deploybot/beta-app/findit/project
php artisan down
@endtask