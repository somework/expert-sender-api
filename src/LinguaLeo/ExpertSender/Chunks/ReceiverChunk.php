<?php

namespace LinguaLeo\ExpertSender\Chunks;

use LinguaLeo\ExpertSender\Entities\Receiver;

class ReceiverChunk implements ChunkInterface
{
    const PATTERN = <<<'EOD'
        <Receiver>
            %s
        </Receiver>
EOD;

    protected \LinguaLeo\ExpertSender\Entities\Receiver $receiver;

    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    #[\Override]
    public function getText(): string
    {
        $textStrings = [];

        if ($this->receiver->getId() !== null) {
            $chunk = new SimpleChunk('Id', $this->receiver->getId());
            $textStrings[] = $chunk->getText();
        }

        if ($this->receiver->getEmail() !== null) {
            $chunk = new SimpleChunk('Email', $this->receiver->getEmail());
            $textStrings[] = $chunk->getText();
        }

        return sprintf(self::PATTERN, implode(PHP_EOL, $textStrings));
    }
}
