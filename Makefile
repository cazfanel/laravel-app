build-image:
	docker build ./docker/app -t laravel-app

npm-install:
	docker run -it --rm -v $(PWD):/app -w /app laravel-app npm install

composer-install:
	docker run -it --rm -v $(PWD):/app -w /app laravel-app composer install
