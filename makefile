.PHONY: go-back
go-back:
		docker exec -it crypto_app /bin/bash

.PHONY: down
down: ## down all containers
		docker-compose down

.PHONY: build
build: ## build project
		docker-compose up --build -d

