<?php
declare(strict_types=1);


namespace RightThisMinute\JWPlatform\Management\v1\response;


use RightThisMinute\JWPlatform\common\DecoderTrait;
use function RightThisMinute\StructureDecoder\field;
use RightThisMinute\StructureDecoder\types as T;
use function RightThisMinute\StructureDecoder\optional_field;


class VideosConversionsListBody extends SuccessBody
{
  use ResultListTrait;

  /** @var \RightThisMinute\JWPlatform\Management\v1\response\ConversionsFieldItem[] */
  public $conversions;

  /**
   * VideosConversionsListBody constructor.
   *
   * @param object|array $data
   *
   * @throws \RightThisMinute\StructureDecoder\exceptions\DecodeError
   */
  public function __construct ($data)
  {
    parent::__construct($data);
    $this->constructResultLimitTrait($data);
    $this->conversions = field
      ($data, 'conversions', T\array_of(ConversionsFieldItem::decoder()));
  }
}


class ConversionsFieldItem
{
  use DecoderTrait;

  /** @var string */
  public $status;

  /** @var \RightThisMinute\JWPlatform\Management\v1\response\ConversionTemplateField */
  public $template;

  /** @var string */
  public $mediatype;

  /** @var int */
  public $height;

  /** @var int */
  public $width;

  /** @var \RightThisMinute\JWPlatform\Management\v1\response\ConversionLinkField */
  public $link;

  /** @var string */
  public $filesize;

  /** @var string */
  public $key;

  /** @var int|string */
  public $duration;

  /** @var \RightThisMinute\JWPlatform\Management\v1\response\ConversionErrorField|null */
  public $error;


  /**
   * ConversionsFieldItem constructor.
   *
   * @param $data
   *
   * @throws \RightThisMinute\StructureDecoder\exceptions\DecodeError
   */
  public function __construct ($data)
  {
    $this->status = field($data, 'status', T\string());
    $this->template =
      field($data, 'template', ConversionTemplateField::decoder());
    $this->mediatype = field($data, 'mediatype', T\string());
    $this->height = field($data, 'height', T\int());
    $this->width = field($data, 'width', T\int());
    $this->link =
      optional_field($data, 'link', ConversionLinkField::decoder());
    $this->filesize = field($data, 'filesize', T\string());
    $this->key = field($data, 'key', T\string());
    $this->duration =
      field($data, 'duration', T\first_of(T\int(), T\string()));
    $this->error =
      optional_field($data, 'error', ConversionErrorField::decoder());
  }
}


class ConversionTemplateField
{
  use DecoderTrait;

  /** @var bool */
  public $required;

  /** @var \RightThisMinute\JWPlatform\Management\v1\response\TemplateFormatField */
  public $format;

  /** @var int */
  public $id;

  /** @var string */
  public $key;

  /** @var string */
  public $name;

  /**
   * ConversionTemplateField constructor.
   *
   * @param $data
   *
   * @throws \RightThisMinute\StructureDecoder\exceptions\DecodeError
   */
  public function __construct ($data)
  {
    $this->required = field($data, 'required', T\bool());
    $this->format =
      field($data, 'format', TemplateFormatField::decoder());
    $this->id = field($data, 'id', T\int());
    $this->key = field($data, 'key', T\string());
    $this->name = field($data, 'name', T\string());
  }

}


class ConversionLinkField
{
  use DecoderTrait;

  /** @var string */
  public $path;

  /** @var string */
  public $protocol;

  /** @var string */
  public $address;

  /**
   * ConversionLinkField constructor.
   *
   * @param $data
   *
   * @throws \RightThisMinute\StructureDecoder\exceptions\DecodeError
   */
  public function __construct ($data)
  {
    $this->path = field($data, 'path', T\string());
    $this->protocol = field($data, 'protocol', T\string());
    $this->address = field($data, 'address', T\string());
  }
}


class ConversionErrorField
{
  use DecoderTrait;

  /** @var string */
  public $message;

  /** @var int */
  public $id;

  /**
   * ConversionErrorField constructor.
   *
   * @param $data
   *
   * @throws \RightThisMinute\StructureDecoder\exceptions\DecodeError
   */
  public function __construct ($data)
  {
    $this->message = field($data, 'message', T\string());
    $this->id = field($data, 'id', T\int());
  }
}
