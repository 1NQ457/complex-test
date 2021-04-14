lint:
	composer run-script phpcs -- --standard=PSR12 src

dump:
	composer dump-autoload

test:
	composer run-script phpunit tests

install:
	composer install