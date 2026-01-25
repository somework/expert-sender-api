<?php

namespace LinguaLeo\ExpertSender\Chunks;

use LinguaLeo\ExpertSender\Entities\OrderBy;

class OrderByChunk implements ChunkInterface
{
    const PATTERN = <<<'EOD'
        <OrderBy>
            %s
        </OrderBy>
EOD;

    private \LinguaLeo\ExpertSender\Entities\OrderBy $orderBy;

    public function __construct(OrderBy $orderBy)
    {
        $this->orderBy = $orderBy;
    }

    #[\Override]
    public function getText(): string
    {
        $text = [];
        $text[] = (new SimpleChunk('Column', $this->orderBy->getColumnName()))->getText();
        $text[] = (new SimpleChunk('Direction', $this->orderBy->getDirection()))->getText();

        return sprintf(self::PATTERN, implode(PHP_EOL, $text));
    }
}
