<?php

namespace LinguaLeo\ExpertSender\Chunks;

use LinguaLeo\ExpertSender\Entities\Snippet;
use PHPUnit\Framework\TestCase;

class SnippetsChunkTest extends TestCase
{
    public function testGetText(): void
    {
        $snippetChunks = [
            new SnippetChunk(new Snippet('test', 'value')),
            new SnippetChunk(new Snippet('cdata', '<tag>ok</tag>', true)),
        ];

        $receiversChunk = new ReceiversChunk($snippetChunks);

        $text = $receiversChunk->getText();

        $this->assertMatchesRegularExpression('~<Name>test</Name>[\s]+<Value>value</Value>~', $text);
        $this->assertMatchesRegularExpression('~<Name>cdata</Name>[\s]+<Value>[\s\S]+CDATA[\s\S]+<tag>ok</tag>[\s\S]+</Value>~', $text);
    }
}
