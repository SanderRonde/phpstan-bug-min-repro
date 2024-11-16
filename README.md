## Explanation of bug

Error reporting behavior of PHPStan changes depending on whether a type is described in a collector.

## Repro

```bash
composer install
```

Run the following command:

```bash
vendor/bin/phpstan analyse -c phpstan.neon -a phpstan/Rule.php
```

You'll find that an error is reported. Now comment Rule.php:32 and run the command again. You'll find that no error is reported.