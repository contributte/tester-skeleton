#!/usr/bin/env sh
sh tester.sh -d extension_dir="./ext" -d zend_extension="php_xdebug.dll" --coverage coverage.html --coverage-src ../src $@
