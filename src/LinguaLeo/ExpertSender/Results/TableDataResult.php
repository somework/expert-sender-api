<?php

namespace LinguaLeo\ExpertSender\Results;

use LinguaLeo\ExpertSender\ApiResult;

class TableDataResult extends ApiResult
{
    /** @var array */
    protected $data = [];

    /**
     * @param \LinguaLeo\ExpertSender\ExpertSenderResponse $response
     */
    public function __construct($response)
    {
        parent::__construct($response);
        $this->parse();
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    protected function parse()
    {
        $response = $this->removeBOM($this->response->getBody());
        if (!$response || !$this->response->isOk()) {
            return;
        }
        $temp = tmpfile();
        fwrite($temp, $response);
        fseek($temp, 0);
        while (($row = fgetcsv($temp)) !== false) {
            $this->data[] = $row;
        }
        fclose($temp);
    }

    /**
     * @param string $text
     *
     * @return string
     */
    private function removeBOM($text)
    {
        $bom = pack('H*', 'EFBBBF');

        return preg_replace("/^{$bom}/", '', $text);
    }
}
