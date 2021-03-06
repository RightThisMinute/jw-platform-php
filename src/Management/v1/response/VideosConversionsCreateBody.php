<?php
declare(strict_types=1);


namespace RightThisMinute\JWPlatform\Management\v1\response;


use RightThisMinute\JWPlatform\common\DecoderTrait;
use function RightThisMinute\StructureDecoder\field;
use RightThisMinute\StructureDecoder\types as T;

class VideosConversionsCreateBody extends SuccessBody
{
  /** @var \RightThisMinute\JWPlatform\Management\v1\response\CreatedConversionConversionField */
  public $conversion;

  public function __construct ($data)
  {
    parent::__construct($data);
    $this->conversion = field
      ($data, 'conversion', CreatedConversionConversionField::decoder());
  }
}


class CreatedConversionConversionField
{
  use DecoderTrait;

  /** @var string */
  public $key;


  /**
   * CreatedConversionConversionField constructor.
   *
   * @param $data
   *
   * @throws \RightThisMinute\StructureDecoder\exceptions\DecodeError
   */
  public function __construct ($data)
  {
    $this->key = field($data, 'key', T\string());
  }
}
