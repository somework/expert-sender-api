<?php

namespace LinguaLeo\ExpertSender\Chunks;

use PHPUnit\Framework\TestCase;

class DataChunkTest extends TestCase
{
    public function testGetText()
    {
        /**
         * @var SimpleChunk|\PHPUnit_Framework_MockObject_MockObject
         * @var SimpleChunk|\PHPUnit_Framework_MockObject_MockObject $bodyChunk2
         */
        $bodyChunk1 = $this
            ->getMockBuilder(SimpleChunk::class)
            ->onlyMethods(['getText'])
            ->disableOriginalConstructor()
            ->getMock();
        $bodyChunk1->expects($this->once())->method('getText')->will($this->returnValue('data1'));
        $bodyChunk2 = $this
            ->getMockBuilder(SimpleChunk::class)
            ->onlyMethods(['getText'])
            ->disableOriginalConstructor()
            ->getMock();
        $bodyChunk2->expects($this->once())->method('getText')->will($this->returnValue('data2'));

        $dataChunk = new DataChunk('subscriber');
        $dataChunk->addChunk($bodyChunk1);
        $dataChunk->addChunk($bodyChunk2);

        $text = $dataChunk->getText();
        $this->assertMatchesRegularExpression('~subscriber~', $text);
        $this->assertMatchesRegularExpression('~data1~', $text);
        $this->assertMatchesRegularExpression('~data2~', $text);
    }
}
