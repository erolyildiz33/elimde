<?php

namespace RestApis\Blockchain\ETC\BlockchainAPI;

use Common\Response;
use RestApis\Blockchain\ETC\Common;

class BlockHash extends Common {

    protected $network;
    protected $blockHash;

    /**
     * @param $network
     * @return \stdClass
     */

    public function get($network, $blockHash)
    {
        $this->network = $network;
        $this->blockHash = $blockHash;
        $params = [];
        return (new Response(
            $this->request([
                'method' => 'GET',
                'params' => $params
            ])
        ))->get();
    }

    protected function getEndPoint()
    {
        return $this->endpoint . '/' . $this->network . '/blocks/' . $this->blockHash;
    }
}
