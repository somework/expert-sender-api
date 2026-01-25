<?php

namespace LinguaLeo\ExpertSender\Chunks;

class OrderByColumnsChunk extends ArrayChunk
{
    const PATTERN = <<<'EOD'
<OrderByColumns>
            %s
</OrderByColumns>
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
