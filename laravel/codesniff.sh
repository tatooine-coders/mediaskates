#!/bin/bash -

### CodeSniffer
sh -c "vendor/bin/phpcs -p --standard=PSR2 ./app";

echo -e "\nTo fix some of the issues, you can run:";
echo "./vendor/bin/php-cs-fixer fix app/ --level=psr2 --verbose --dry-run";
echo -e "\nAlternatively, you can launch PHPCS in interactive mode, with the '-a' parameter.\n\n";

read -p "Press enter to continue" CONTINUE;

### Mess detector
#sh -c "vendor/bin/phpmd ./app html cleancode,codesize,controversial,design,naming > MessDetector.html"

#echo -e "\n";
#read -p "Press enter to continue" CONTINUE;

### PHPUnit
sh -c "vendor/bin/phpunit"

