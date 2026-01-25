<?php

namespace LinguaLeo\ExpertSender\Chunks;

use LinguaLeo\ExpertSender\Entities\OrderBy;
use LinguaLeo\ExpertSender\ExpertSenderEnum;
use PHPUnit\Framework\TestCase;

class OrderByColumnsChunkTest extends TestCase
{
    public function testGetText()
    {
        $orderByChunks = [
            new OrderByChunk(new OrderBy('name', ExpertSenderEnum::ORDER_ASCENDING)),
            new OrderByChunk(new OrderBy('sex', ExpertSenderEnum::ORDER_DESCENDING)),
        ];
        $columnsChunk = new OrderByColumnsChunk($orderByChunks);
        $text = $columnsChunk->getText();
        $this->assertStringContainsString('<OrderByColumns>', $text);
        $this->assertStringContainsString('<OrderBy>', $text);
        $this->assertStringContainsString('<Column>name</Column>', $text);
        $this->assertStringContainsString('<Direction>Ascending</Direction>', $text);
        $this->assertStringContainsString('<Column>sex</Column>', $text);
        $this->assertStringContainsString('<Direction>Descending</Direction>', $text);
    }
}
