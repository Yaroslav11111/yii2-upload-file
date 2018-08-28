<?php
namespace snizhko\fileupload\events;
use yii\base\Event;

/**
 * Class UploadEvent
 * @package snizhko\fileupload\events
 * @author Eugene Terentev <eugene@terentev.net>
 */
class UploadEvent extends Event
{
    /**
     * @var mixed
     */
    public $filesystem;
    /**
     * @var string
     */
    public $path;
    /**
     * @var \League\Flysystem\File|null
     */
    public $file;
}
