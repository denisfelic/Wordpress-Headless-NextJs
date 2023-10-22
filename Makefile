rCONTAINER=Default_Theme_wordpress
PHP=docker exec -it ${CONTAINER} php

all:
    @echo "Available commands:"
	@echo "  make up"
	@echo "  make up-silent"
	@echo "  make down"
	@echo "  make test"
	@echo "  make generate-api"

up-verbose:
	docker-compose up

up:
	docker-compose up -d
	cd default_theme && npm run watch
down:
	docker-compose down

bash:
	docker exec -it ${CONTAINER} bash

generate:
	@echo "Genereting your theme..."
	cd default_theme && composer install
	cd default_theme && npm install
	cd cli &&  npm install && npm run start && rm -rf node_modules 
	docker-compose up -d
	@echo "Project created"
	@echo "Run 'make write_db' after MySQL container load"
	@echo "Run 'make up' to start the theme."

update:
	cd default_theme && npm update
	cd default_theme && composer update
	
copy_plugins:
	sudo unzip files/advanced-custom-fields-pro.zip -d docker/wp-content/plugins

export_db:
	docker exec -i default_theme_database mysqldump -uroot -pwordpress wordpress > database.sql

write_db: 
	docker exec -i default_theme_database mysql -uwordpress -pwordpress wordpress < database.sql 

compress_files:
	tar -zcvf backups/uploads.tar.gz wp-content/uploads
	tar -zcvf backups/plugins.tar.gz wp-content/plugins

#extract_files:
#	tar -xf backups/plugins.tar.gz -C wp-content/uploads

# TODO: create make file to uncompress the files 