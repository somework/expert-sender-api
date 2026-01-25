<?php

namespace LinguaLeo\ExpertSender\Chunks;

class ColumnsChunk extends ArrayChunk
{
    const PATTERN = <<<'EOD'
<Columns>
            %s
</Columns>
EOD;

    #[\Override]
    protected function getPattern()
    {
        return self::PATTERN;
    }
}
