<?php
/**
 * Created by PhpStorm.
 * User: cb0
 * Date: 12.08.17
 * Time: 12:38
 */

namespace Lisk\Cli\Loader;


use Lisk\Api\Loader\BlockStatusResponse;
use Lisk\Cli\AbstractCliAction;
use Lisk\Client;

class BlockStatus extends AbstractCliAction
{

    /**
     * Get Account Information
     *
     * Request information about an account.
     *
     * @param Client $client
     * @param array $args
     * @return BlockStatusResponse
     */
    function call(Client $client, array $args)
    {
        return call_user_func_array([$client, 'getBlockStatus'], $this->getArguments($args));
    }

    function setRequiredArguments()
    {
        $this->requiredArguments = [

        ];
    }
}