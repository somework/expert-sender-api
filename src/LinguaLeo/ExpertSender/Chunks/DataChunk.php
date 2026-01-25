<?php

namespace LinguaLeo\ExpertSender\Chunks;

class DataChunk extends ArrayChunk
{
    const PATTERN = <<<'EOD'
    <Data %s>
%s
    </Data>
EOD;

    /** @var string */
    protected $xsiType;

    /**
     * @param mixed $xsiType
     */
    public function __construct($xsiType = null, array $chunksArray = [])
    {
        parent::__construct($chunksArray);
        $this->xsiType = $xsiType;
    }

    #[\Override]
    public function getText(): string
    {
        $xsiType = $this->xsiType ? sprintf('xsi:type="%s"', $this->xsiType) : '';

        return sprintf($this->getPattern(), $xsiType, $this->getSubChunksText());
    }

    #[\Override]
    protected function getPattern(): string
    {
        return self::PATTERN;
    }
}
