<?php

use PHPUnit\Framework\TestCase;


final class FileExistsTest extends TestCase {
    public function testFileExistsReal() {
        $root = dirname(__DIR__) . '/assets';
        $path = "$root/foo.log";

        $this->assertTrue(file_exists("$path"));
    }

    public function testFileExistsJson() {
        $root = dirname(__DIR__) . '/assets';
        $path = json_decode('"' . $root . '/foo.log\u0000"');

        $this->assertTrue(file_exists("$path.php"));
    }

    public function testFileExistsLiteral() {
        $root = dirname(__DIR__) . '/assets';
        $path = "$root/foo.log\0";

        $this->assertTrue(file_exists("$path.php"));
    }
}