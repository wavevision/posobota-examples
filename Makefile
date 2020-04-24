app=app
bin=vendor/bin
chrome:=$(shell command -v google-chrome 2>/dev/null)
codeSnifferRuleset=codesniffer-ruleset.xml
config_app=$(app)/config/local.neon
config_example=$(app)/config/local.example.neon
coverage=$(temp)/coverage
coverageClover=$(coverage)/coverage.xml
dirs:=$(app) $(tests)
php=php
phpunit=$(bin)/phpunit
temp=temp
tests=tests
yarn:=$(shell command -v yarn 2>/dev/null)

all:
	 @$(MAKE) -pRrq -f $(lastword $(MAKEFILE_LIST)) : 2>/dev/null | awk -v RS= -F: '/^# File/,/^# Finished Make data base/ {if ($$1 !~ "^[#.]") {print $$1}}' | sort | egrep -v -e '^[^[:alnum:]]' -e '^$@$$'

# Setup

autoload:
	composer dump-autoload

build: composer npm-install npm-build

composer:
	composer install

config:
	cp -n $(config_example) $(config_app)

di: reset
	bin/extract-services

fix: check-syntax phpcbf phpcs phpstan test

init: nvm build config
	@echo "Done! Navigate your browser to 'www' folder."

npm:
ifndef yarn
	npm $(script)
else
	yarn $(script)
endif

npm-install:
	$(MAKE) script=install npm

npm-build:
	$(MAKE) script='run build' npm

nvm:
	. ${NVM_DIR}/nvm.sh && nvm install

reset: rm-cache autoload

rm-cache:
	rm -rf $(temp)/cache

# QA

check-syntax:
	$(bin)/parallel-lint -e $(php) $(dirs)

phpcbf:
	$(bin)/phpcbf -spn --standard=$(codeSnifferRuleset) --extensions=php $(dirs)

phpcs:
	$(bin)/phpcs -sp --standard=$(codeSnifferRuleset) --extensions=php $(dirs)

phpstan:
	$(bin)/phpstan analyze $(dirs) --level max

# tests

test:
	$(phpunit)

test-coverage:
	$(phpunit) --coverage-html=$(coverage)

test-coverage-clover:
	$(phpunit) --coverage-clover=$(coverageClover)

test-coverage-open: test-coverage
ifndef chrome
	open -a 'Google Chrome' $(coverage)/index.html
else
	google-chrome $(coverage)/index.html
endif

test-coverage-report:
	${bin}/php-coveralls --coverage_clover=$(coverageClover) --verbose

ci: build config check-syntax phpcs phpstan test-coverage-clover test-coverage-report

