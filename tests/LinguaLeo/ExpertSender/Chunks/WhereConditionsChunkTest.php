<?php

namespace LinguaLeo\ExpertSender\Chunks;

use LinguaLeo\ExpertSender\Entities\Where;
use LinguaLeo\ExpertSender\ExpertSenderEnum;
use PHPUnit\Framework\TestCase;

class WhereConditionsChunkTest extends TestCase
{
    public function testGetText(): void
    {
        $whereChunks = [
            new WhereChunk(new Where('name', ExpertSenderEnum::OPERATOR_EQUALS, 'Alex')),
            new WhereChunk(new Where('sex', ExpertSenderEnum::OPERATOR_LIKE, 1)),
        ];
        $whereConditionsChunk = new WhereConditionsChunk($whereChunks);
        $text = $whereConditionsChunk->getText();
        $this->assertStringContainsString('<WhereConditions>', $text);
        $this->assertStringContainsString('<Where>', $text);
        $this->assertStringContainsString('<ColumnName>name</ColumnName>', $text);
        $this->assertStringContainsString('<Operator>Equals</Operator>', $text);
        $this->assertStringContainsString('<Value>Alex</Value>', $text);
        $this->assertStringContainsString('<ColumnName>sex</ColumnName>', $text);
        $this->assertStringContainsString('<Operator>Like</Operator>', $text);
        $this->assertStringContainsString('<Value>1</Value>', $text);
    }
}
