app=app
bin=vendor/bin
codeSnifferRuleset=codesniffer-ruleset.xml
dirs:=$(app)
php=php
temp=temp

all:
	 @$(MAKE) -pRrq -f $(lastword $(MAKEFILE_LIST)) : 2>/dev/null | awk -v RS= -F: '/^# File/,/^# Finished Make data base/ {if ($$1 !~ "^[#.]") {print $$1}}' | sort | egrep -v -e '^[^[:alnum:]]' -e '^$@$$'

# Setup

build: composer yarn yarn_build

composer:
	composer install

yarn:
	yarn install

yarn_build:
	yarn build

rm-cache:
	rm -rf $(temp)/cache

reset: rm-cache
	composer dumpautoload

di:
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
