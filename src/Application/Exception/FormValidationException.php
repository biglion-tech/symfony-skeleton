<?php

namespace App\Application\Exception;

use Throwable;

/**
 * Class FormValidationException
 * @package App\Application
 */
class FormValidationException extends \Exception
{
    /**
     * @var array
     */
    protected $errors;

    /**
     * FormValidationException constructor.
     * @param string $message
     * @param int $code
     * @param array $errors
     * @param Throwable|null $previous
     */
    public function __construct(string $message = '', int $code = 0, ?Throwable $previous = null, array $errors = [])
    {
        $this->errors = $errors;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
