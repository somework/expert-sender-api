<?php

namespace LinguaLeo\ExpertSender\Chunks;

class PropertiesChunk extends ArrayChunk
{
    const PATTERN = <<<'EOD'
        <Properties>
            %s
        </Properties>
EOD;

    #[\Override]
    protected function getPattern(): string
    {
        return self::PATTERN;
    }
}
