app=app
bin=vendor/bin
config_app=$(app)/config/local.neon
config_example=$(app)/config/local.example.neon
codeSnifferRuleset=codesniffer-ruleset.xml
dirs:=$(app)
php=php
temp=temp
yarn:=$(shell command -v yarn 2>/dev/null)

all:
	 @$(MAKE) -pRrq -f $(lastword $(MAKEFILE_LIST)) : 2>/dev/null | awk -v RS= -F: '/^# File/,/^# Finished Make data base/ {if ($$1 !~ "^[#.]") {print $$1}}' | sort | egrep -v -e '^[^[:alnum:]]' -e '^$@$$'

# Setup

autoload:
	composer dump-autoload

build: composer npm npm_build

composer:
	composer install

config:
	cp -n $(config_example) $(config_app)

init: build config
	@echo "Done! Navigate your browser to 'www' folder."

npm:
ifndef yarn
	npm $(script)
else
	yarn $(script)
endif

npm_install:
	$(MAKE) script=install npm

npm_build:
	$(MAKE) script='run build' npm

rm-cache:
	rm -rf $(temp)/cache

reset: rm-cache autoload

di: reset
	bin/extract-services

fix: check-syntax phpcbf phpcs phpstan

# QA

check-syntax:
	$(bin)/parallel-lint -e $(php) $(dirs)

phpcs:
	$(bin)/phpcs -sp --standard=$(codeSnifferRuleset) --extensions=php $(dirs)

phpcbf:
	$(bin)/phpcbf -spn --standard=$(codeSnifferRuleset) --extensions=php $(dirs)

phpstan:
	$(bin)/phpstan analyze $(dirs) --level max
