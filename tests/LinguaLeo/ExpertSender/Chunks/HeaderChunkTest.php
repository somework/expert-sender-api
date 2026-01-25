<?php

namespace LinguaLeo\ExpertSender\Chunks;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class HeaderChunkTest extends TestCase
{
    public function testGetText(): void
    {
        /**
         * @var SimpleChunk|MockObject
         */
        $bodyChunk = $this
            ->getMockBuilder(SimpleChunk::class)
            ->onlyMethods(['getText'])
            ->disableOriginalConstructor()
            ->getMock();
        $bodyChunk->expects($this->once())->method('getText')->will($this->returnValue('body'));

        $headerChunk = new HeaderChunk('api-key', $bodyChunk);
        $text = $headerChunk->getText();

        $this->assertMatchesRegularExpression('~body~', $text);
        $this->assertMatchesRegularExpression('~api-key~', $text);
    }
}
