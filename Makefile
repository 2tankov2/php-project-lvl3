install:
	composer install

run:
	php -S localhost:8000 -t public

lint:
	composer run-script phpcs -- --standard=PSR12 bootstrap routes tests app/Providers app/Http/Controllers

lint-fix:
	composer run-script phpcbf -- --standard=PSR12 bootstrap routes tests app/Providers app/Http/Controllers

logs:
	tail -f storage/logs/lumen.log

test:
	composer run-script phpunit tests
