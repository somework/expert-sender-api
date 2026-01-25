<?php

namespace LinguaLeo\ExpertSender\Chunks;

class ReceiversChunk extends ArrayChunk
{
    const PATTERN = <<<'EOD'
<Receivers>
            %s
</Receivers>
EOD;

    /**
     * @return string
     */
    #[\Override]
    protected function getPattern()
    {
        return self::PATTERN;
    }
}
