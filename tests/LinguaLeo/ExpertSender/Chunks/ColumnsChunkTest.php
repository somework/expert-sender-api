<?php

namespace LinguaLeo\ExpertSender\Chunks;

use LinguaLeo\ExpertSender\Entities\Column;
use PHPUnit\Framework\TestCase;

class ColumnsChunkTest extends TestCase
{
    public function testGetText(): void
    {
        $columnsChunks = [
            new ColumnChunk(new Column('name', 'Alex<br/>Aksef')),
            new ColumnChunk(new Column('sex', 'male')),
            new ColumnChunk(new Column('age', '22')),
        ];

        $columnsChunk = new ColumnsChunk($columnsChunks);
        $text = $columnsChunk->getText();
        $this->assertStringContainsString('<Columns>', $text);
        $this->assertStringContainsString('<Column>', $text);
        $this->assertStringContainsString('<Name>name</Name>', $text);
        $this->assertStringContainsString('<Value><![CDATA[Alex<br/>Aksef]]></Value>', $text);
        $this->assertStringContainsString('<Name>sex</Name>', $text);
        $this->assertStringContainsString('<Value>male</Value>', $text);
        $this->assertStringContainsString('<Name>age</Name>', $text);
        $this->assertStringContainsString('<Value>22</Value>', $text);
    }
}
