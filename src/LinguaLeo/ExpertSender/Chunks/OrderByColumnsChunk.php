<?php

namespace LinguaLeo\ExpertSender\Chunks;

class OrderByColumnsChunk extends ArrayChunk
{
    const PATTERN = <<<'EOD'
<OrderByColumns>
            %s
</OrderByColumns>
EOD;

    #[\Override]
    protected function getPattern(): string
    {
        return self::PATTERN;
    }
}
