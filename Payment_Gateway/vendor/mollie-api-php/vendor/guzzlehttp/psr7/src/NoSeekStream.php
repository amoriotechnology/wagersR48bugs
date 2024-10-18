<?php

namespace _PhpScoper5f636c07d0f55\GuzzleHttp\Psr7;

use _PhpScoper5f636c07d0f55\Psr\Http\Message\StreamInterface;
/**
 * Stream decorator that prevents a stream from being seeked
 */
class NoSeekStream implements \_PhpScoper5f636c07d0f55\Psr\Http\Message\StreamInterface
{
    use StreamDecoratorTrait;
    public function seek($offset, $whence = \SEEK_SET)
    {
        throw new \RuntimeException('Cannot seek a NoSeekStream');
    }
    public function isSeekable()
    {
        return \false;
    }
}
