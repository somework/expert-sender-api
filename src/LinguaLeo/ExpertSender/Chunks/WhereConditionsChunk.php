<?php

namespace LinguaLeo\ExpertSender\Chunks;

class WhereConditionsChunk extends ArrayChunk
{
    const PATTERN = <<<'EOD'
<WhereConditions>
            %s
</WhereConditions>
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
