<?php

namespace LinguaLeo\ExpertSender\Chunks;

class PropertiesChunk extends ArrayChunk
{
    const PATTERN = <<<'EOD'
        <Properties>
            %s
        </Properties>
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
