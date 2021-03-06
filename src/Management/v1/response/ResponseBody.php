<?php
declare(strict_types=1);


namespace RightThisMinute\JWPlatform\Management\v1\response;


abstract class ResponseBody
{
  /**
   * @var string
   */
  public $status;


  function __construct (string $status)
  {
    $this->status = $status;
  }
}
