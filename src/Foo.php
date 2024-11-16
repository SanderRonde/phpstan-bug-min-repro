<?php declare(strict_types=1);

final class Foo
{
    public function bar(
        string $key,
        bool $preserveKeys,
        bool $flatten = true,
    ): void {
        $format = $preserveKeys ? '[%s]' : '';

        if ($flatten) {
            $_key = sprintf($format, $key);
        } else {
            $_key = sprintf($format, $key);
            // @phpstan-ignore identical.alwaysFalse
            if ($_key === '') {
                // ...
            }
        }
    }
}
