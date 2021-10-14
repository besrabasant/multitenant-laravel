docker-dev-build::
	vendor/bin/sail build --no-cache

docker-dev::
	vendor/bin/sail up -d --build --force-recreate

docker-stop::
	vendor/bin/sail stop

docker-logs::
	vendor/bin/sail logs -f
