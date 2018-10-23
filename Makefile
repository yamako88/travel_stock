# Makefile
clear:
		composer dump-autoload
		php artisan down
		php artisan clear-compiled
		php artisan optimize
		php artisan cache:clear
		php artisan config:clear
		php artisan config:cache
		php artisan route:clear
		php artisan view:clear
		php artisan up