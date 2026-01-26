<?php

namespace LinguaLeo\ExpertSender\Chunks;

class GroupChunk implements ChunkInterface
{
    /** @var ChunkInterface[] */
    protected $chunks = [];

    /**
     * @param ChunkInterface[] $chunks
     */
    public function __construct(array $chunks = [])
    {
        $this->chunks = $chunks;
    }

    public function addChunk(ChunkInterface $chunk): void
    {
        $this->chunks[] = $chunk;
    }

    #[\Override]
    public function getText(): string
    {
        $text = [];
        foreach ($this->chunks as $chunk) {
            $text[] = $chunk->getText();
        }

        return implode(PHP_EOL, $text);
    }
}
