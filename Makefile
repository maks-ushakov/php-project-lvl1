# Makefile

install:
	composer install

validate:
	composer validate

update-games:
	composer dump-autoload

brain-games:
	./bin/brain-games

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

brain-gcd:
	./bin/brain-gcd
