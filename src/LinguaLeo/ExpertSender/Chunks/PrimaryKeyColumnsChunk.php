<?php

namespace LinguaLeo\ExpertSender\Chunks;

class PrimaryKeyColumnsChunk extends ArrayChunk
{
    const PATTERN = <<<'EOD'
<PrimaryKeyColumns>
            %s
</PrimaryKeyColumns>
EOD;

    #[\Override]
    protected function getPattern(): string
    {
        return self::PATTERN;
    }
}
