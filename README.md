# php-project-lvl3

[![Maintainability](https://api.codeclimate.com/v1/badges/cec102cfdf3e3ea90ebf/maintainability)](https://codeclimate.com/github/2tankov2/php-project-lvl3/maintainability)

[![Test Coverage](https://api.codeclimate.com/v1/badges/cec102cfdf3e3ea90ebf/test_coverage)](https://codeclimate.com/github/2tankov2/php-project-lvl3/test_coverage)

[![Build Status](https://travis-ci.org/2tankov2/php-project-lvl3.svg?branch=master)](https://travis-ci.org/2tankov2/php-project-lvl3)

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
