<?php

namespace LinguaLeo\ExpertSender\Chunks;

class ReceiversChunk extends ArrayChunk
{
    const PATTERN = <<<'EOD'
<Receivers>
            %s
</Receivers>
EOD;

    #[\Override]
    protected function getPattern(): string
    {
        return self::PATTERN;
    }
}
