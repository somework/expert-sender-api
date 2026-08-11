<?php

namespace LinguaLeo\ExpertSender\Chunks;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DataChunkTest extends TestCase
{
    public function testGetText(): void
    {
        /**
         * @var SimpleChunk|MockObject
         * @var SimpleChunk|MockObject $bodyChunk2
         */
        $bodyChunk1 = $this
            ->getMockBuilder(SimpleChunk::class)
            ->onlyMethods(['getText'])
            ->disableOriginalConstructor()
            ->getMock();
        $bodyChunk1->expects($this->once())->method('getText')->willReturn('data1');
        $bodyChunk2 = $this
            ->getMockBuilder(SimpleChunk::class)
            ->onlyMethods(['getText'])
            ->disableOriginalConstructor()
            ->getMock();
        $bodyChunk2->expects($this->once())->method('getText')->willReturn('data2');

        $dataChunk = new DataChunk('subscriber');
        $dataChunk->addChunk($bodyChunk1);
        $dataChunk->addChunk($bodyChunk2);

        $text = $dataChunk->getText();
        $this->assertMatchesRegularExpression('~subscriber~', $text);
        $this->assertMatchesRegularExpression('~data1~', $text);
        $this->assertMatchesRegularExpression('~data2~', $text);
    }
}
