<?php

namespace LinguaLeo\ExpertSender\Chunks;

use LinguaLeo\ExpertSender\Entities\Property;

class PropertyChunk implements ChunkInterface
{
    const PATTERN = <<<'EOD'
        <Property>
             <Id>%s</Id>
             <Value xsi:type="xs:%s">%s</Value>
        </Property>
EOD;

    protected \LinguaLeo\ExpertSender\Entities\Property $property;
    protected $type;
    protected $value;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    #[\Override]
    public function getText(): string
    {
        return sprintf(
            self::PATTERN,
            $this->property->getId(),
            $this->property->getType(),
            $this->property->getValue()
        );
    }
}
