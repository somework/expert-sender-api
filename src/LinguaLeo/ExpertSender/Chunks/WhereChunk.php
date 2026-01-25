<?php

namespace LinguaLeo\ExpertSender\Chunks;

use LinguaLeo\ExpertSender\Entities\Where;

class WhereChunk implements ChunkInterface
{
    const PATTERN = <<<'EOD'
        <Where>
            %s
        </Where>
EOD;

    private \LinguaLeo\ExpertSender\Entities\Where $where;

    public function __construct(Where $where)
    {
        $this->where = $where;
    }

    #[\Override]
    public function getText(): string
    {
        $text = [];
        $text[] = (new SimpleChunk('ColumnName', $this->where->getColumnName()))->getText();
        $text[] = (new SimpleChunk('Operator', $this->where->getOperator()))->getText();
        $text[] = (new SimpleChunk('Value', $this->where->getValue()))->getText();

        return sprintf(self::PATTERN, implode(PHP_EOL, $text));
    }
}
