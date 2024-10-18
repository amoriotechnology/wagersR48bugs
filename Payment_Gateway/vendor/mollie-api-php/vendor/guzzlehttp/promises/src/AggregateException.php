<?php

namespace _PhpScoper5f636c07d0f55\GuzzleHttp\Promise;

/**
 * Exception thrown when too many errors occur in the some() or any() methods.
 */
class AggregateException extends \_PhpScoper5f636c07d0f55\GuzzleHttp\Promise\RejectionException
{
    public function __construct($msg, array $reasons)
    {
        parent::__construct($reasons, \sprintf('%s; %d rejected promises', $msg, \count($reasons)));
    }
}
