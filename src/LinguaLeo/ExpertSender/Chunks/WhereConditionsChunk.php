<?php

namespace LinguaLeo\ExpertSender\Chunks;

class WhereConditionsChunk extends ArrayChunk
{
    const PATTERN = <<<'EOD'
<WhereConditions>
            %s
</WhereConditions>
EOD;

    #[\Override]
    protected function getPattern(): string
    {
        return self::PATTERN;
    }
}
