build-image:
	docker build ./docker/app -t laravel-app

npm-install:
	docker run -it --rm -v $(PWD):/app -w / laravel-app npm install

composer-install:
	docker run -it --rm -v $(PWD):/app -w / laravel-app composer install
