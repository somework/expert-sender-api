<?php

namespace LinguaLeo\ExpertSender\Chunks;

use LinguaLeo\ExpertSender\Entities\Column;
use PHPUnit\Framework\TestCase;

/**
 * Class PrimaryKeyColumnsChunkTest.
 *
 * @group table-primary-columns
 */
class PrimaryKeyColumnsChunkTest extends TestCase
{
    public function testGetText()
    {
        $columnsChunks = [
            new ColumnChunk(new Column('name', 'Alex<br/>')),
            new ColumnChunk(new Column('sex', 'male')),
            new ColumnChunk(new Column('age', '22')),
        ];

        $columnsChunk = new PrimaryKeyColumnsChunk($columnsChunks);
        $text = $columnsChunk->getText();
        $this->assertStringContainsString('<PrimaryKeyColumns>', $text);
        $this->assertStringContainsString('<Column>', $text);
        $this->assertStringContainsString('<Name>name</Name>', $text);
        $this->assertStringContainsString('<Value><![CDATA[Alex<br/>]]></Value>', $text);
        $this->assertStringContainsString('<Name>sex</Name>', $text);
        $this->assertStringContainsString('<Value>male</Value>', $text);
        $this->assertStringContainsString('<Name>age</Name>', $text);
        $this->assertStringContainsString('<Value>22</Value>', $text);
    }
}
