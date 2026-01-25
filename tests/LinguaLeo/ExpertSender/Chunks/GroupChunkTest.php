<?php

namespace LinguaLeo\ExpertSender\Chunks;

use PHPUnit\Framework\TestCase;

class GroupChunkTest extends TestCase
{
    public function testGetText(): void
    {
        $groupChunk = new GroupChunk();
        $groupChunk->addChunk(new SimpleChunk('Name', 'Alex'));
        $groupChunk->addChunk(new SimpleChunk('Age', 22));
        $text = $groupChunk->getText();
        $this->assertStringContainsString('<Name>Alex</Name>', $text);
        $this->assertStringContainsString('<Age>22</Age>', $text);
    }
}
