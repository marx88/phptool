<?php

namespace mphp\tooltests\path;

use mphp\tool\path\Path;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class PathTest extends TestCase
{
    public function testFmt()
    {
        $ds = DIRECTORY_SEPARATOR;
        $cases = [
            [
                'path' => 'root/path1/path2/filename.ext',
                'expected' => "root{$ds}path1{$ds}path2{$ds}filename.ext",
            ],
        ];
        foreach ($cases as $case) {
            $result = Path::fmt($case['path']);
            $this->assertEquals($case['expected'], $result);
        }
    }

    public function testFmtSlip()
    {
        $ds = DIRECTORY_SEPARATOR;
        $cases = [
            [
                'path' => "root{$ds}path1{$ds}path2{$ds}filename.ext",
                'expected' => 'root/path1/path2/filename.ext',
            ],
        ];
        foreach ($cases as $case) {
            $result = Path::fmtSlip($case['path']);
            $this->assertEquals($case['expected'], $result);
        }
    }
}
