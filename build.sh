#!/bin/bash
cd ~/Projects/chippyash/source/Identity
vendor/phpunit/phpunit/phpunit -c test/phpunit.xml --testdox-html contract.html test/
tdconv -t "Chippyash Identity" contract.html docs/Test-Contract.md
rm contract.html

