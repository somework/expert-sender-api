<?php

namespace LinguaLeo\ExpertSender\Chunks;

class SnippetsChunk extends ArrayChunk
{
    const PATTERN = <<<'EOD'
<Snippets>
            %s
</Snippets>
EOD;

    #[\Override]
    protected function getPattern(): string
    {
        return self::PATTERN;
    }
}
