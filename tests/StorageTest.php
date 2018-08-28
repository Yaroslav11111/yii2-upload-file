<?php

namespace snizhko\fileupload\tests;

use snizhko\fileupload\Storage;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class StorageTest extends TestCase
{
    public function testInitWithBuilder()
    {
        $storage = new Storage([
            'filesystem' => [
                'class' => 'snizhko\fileupload\tests\data\TmpFilesystemBuilder'
            ]
        ]);

        $this->assertNotNull($storage->getFilesystem());

    }

    public function testInitWithComponent()
    {
        $this->destroyApplication();
        $this->mockApplication([
            'components' => [
                'fs' => [
                    'class' => 'creocoder\flysystem\LocalFilesystem',
                    'path' => sys_get_temp_dir()
                ]
            ]
        ]);
        $storage = new Storage([
            'filesystemComponent' => 'fs'
        ]);

        $this->assertNotNull($storage->getFilesystem());
        $this->assertInstanceOf("creocoder\\flysystem\\LocalFilesystem", $storage->getFilesystem());
    }
}
