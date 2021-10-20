docker-build::
	vendor/bin/sail build --no-cache

docker-restart:: docker-stop docker-dev

docker-watch::
	vendor/bin/sail up --build --force-recreate

docker-dev::
	vendor/bin/sail up -d --build --force-recreate

docker-stop::
	vendor/bin/sail stop

docker-logs::
	vendor/bin/sail logs -f
