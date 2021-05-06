<?php

namespace BeyondCode\Vouchers\Exceptions;

class VoucherIsInvalid extends \Exception
{
    protected $code;

    public static function withCode(string $code)
    {
        return new static('The provided code '.$code.' is invalid with this Product.', $code);
    }

    public function __construct($message, $code)
    {
        $this->message = $message;
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getVoucherCode()
    {
        return $this->code;
    }

    public function flashError()
    {
        session() -> flash('errormessage', $this -> message);
    }
}