<?php

namespace LinguaLeo\ExpertSender\Chunks;

abstract class ArrayChunk implements ChunkInterface
{
    /** @var array */
    protected $chunks = [];

    /**
     * @param ChunkInterface[] $chunksArray
     */
    public function __construct(array $chunksArray = [])
    {
        $this->chunks = $chunksArray;
    }

    public function addChunk(ChunkInterface $chunk): void
    {
        $this->chunks[] = $chunk;
    }

    /**
     * @return string
     */
    #[\Override]
    public function getText(): string
    {
        return $this->chunks ? sprintf($this->getPattern(), $this->getSubChunksText()) : '';
    }

    /**
     * @return string
     */
    protected function getSubChunksText(): string
    {
        $texts = [];
        foreach ($this->chunks as $columnChunk) {
            /* @var ChunkInterface $columnChunk */
            $texts[] = $columnChunk->getText();
        }

        return implode("\n", $texts);
    }

    /**
     * @return string
     */
    abstract protected function getPattern(): string;
}
