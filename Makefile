app=app
tests=tests
bin=vendor/bin
config_app=$(app)/config/local.neon
config_example=$(app)/config/local.example.neon
codeSnifferRuleset=codesniffer-ruleset.xml
dirs:=$(app) $(tests)
php=php
temp=temp
yarn:=$(shell command -v yarn 2>/dev/null)
phpunit=vendor/bin/phpunit
coverage=$(temp)/coverage/php
coverageClover=$(coverage)/coverage.xml

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

npm_install:
	$(MAKE) script=install npm

npm_build:
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

test-coverage-open: test-coverage
	google-chrome $(coverage)/index.html

test-coverage-clover:
	$(phpunit) --coverage-clover=$(coverageClover)

test-coverage-report:
	${bin}/php-coveralls --coverage_clover=$(coverageClover) --verbose

ci: build config check-syntax phpcs phpcbf test-coverage-clover test-coverage-report
