it: vendor
	cp .env.example .env
	php artisan key:generate
	php artisan jwt:secret
	php artisan serve

test: vendor
	vendor/bin/phpunit

vendor: composer.json composer.lock
	composer install
