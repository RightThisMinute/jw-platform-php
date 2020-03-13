<?php


namespace RightThisMinute\JWPlatform\exception;


use RightThisMinute\JWPlatform\Management\response\ErrorBody;
use RightThisMinute\JWPlatform\Management\response\ResponseBody;

class UnexpectedResponseBody extends \Exception
{
  public function __construct
    (string $request_description, ResponseBody $body)
  {
    if ($body instanceof ErrorBody)
      parent::__construct
        ("[$request_description] {$body->message}", $body->code);

    else {
      $class = get_class($body);
      parent::__construct
        ("Unexpected response body of class '$class' for request [$request_description].");
    }
  }
}