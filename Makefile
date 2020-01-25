install:
    composer install

run:
    php -S localhost:8000 -t public

lint:
    composer run-script phpcs -- --standard=PSR12 src tests

lint-fix:
    composer run-script phpcbf -- --standard=PSR12 src bin tests

logs:
    tail -f storage/logs/lumen.log

test:
    composer run-script phpunit tests
