<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 10:25 AM
 */

namespace App\Enums\Exception;


use App\Enums\Contracts\Enum;
use Exception;

class InvalidEnumMemberException extends Exception
{
    /**
     * Create an InvalidEnumMemberException.
     *
     * @param  mixed $invalidValue
     * @param Enum $enum
     * @throws \ReflectionException
     */
    public function __construct($invalidValue, Enum $enum)
    {
        $invalidValueType = gettype($invalidValue);
        $enumValues = implode(', ', $enum::getValues());
        $enumClassName = class_basename($enum);

        parent::__construct("Cannot construct an instance of $enumClassName using the value ($invalidValueType) `$invalidValue`. Possible values are [$enumValues].");
    }
}
