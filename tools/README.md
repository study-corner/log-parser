### php-cs-fixer
https://packagist.org/packages/friendsofphp/php-cs-fixer

### pdepend
tools/pdepend/vendor/bin/pdepend --jdepend-xml=/var/www/plain-sanbox/build/jdepend.xml --jdepend-chart=/var/www/plain-sandbox/build/dependencies.svg --overview-pyramid=/var/www/plain-sandox/build/overview-pyramid.svg /var/www/plain-sandbox/src

Metrics: https://pdepend.org/documentation/software-metrics/index.html

### phpstan
tools/phpstan/vendor/bin/phpstan analyse src tests --level=2

src/bin/pdepend --dependency-xml=build/dependency.xml --jdepend-xml=build/jdepend.xml --jdepend-chart=build/dependencies.svg" --overview-pyramid=build/overview-pyramyd.svg --summary-xml=build/summary.xml src/main/php
