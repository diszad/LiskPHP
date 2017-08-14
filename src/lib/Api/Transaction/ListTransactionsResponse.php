<?php
/**
 * Created by PhpStorm.
 * User: cb0
 * Date: 09.07.17
 * Time: 18:40
 */

namespace Lisk\Api\Transaction;

use Lisk\AbstractResponse;
use Lisk\Model\Transaction;

class ListTransactionsResponse extends AbstractResponse
{
    private $transactions;
    private $count;


    public function success($jsonResponse)
    {
        $transactions = $jsonResponse['transactions'];
        $this->count = $jsonResponse['count'];

        foreach ($transactions as $trans) {
            $transaction = new Transaction();
            $id = $trans['id'];
            $transaction->setId($id);
            $transaction->setHeight($trans['height']);
            $transaction->setBlockId($trans['blockId']);
            $transaction->setType($trans['type']);
            $transaction->setTimestamp($trans['timestamp']);
            $transaction->setSenderPublicKey($trans['senderPublicKey']);
            $transaction->setSenderId($trans['senderId']);
            $transaction->setRecipientId($trans['recipientId']);
            $transaction->setRecipientPublicKey($trans['recipientPublicKey']);
            $transaction->setAmount($trans['amount']);
            $transaction->setFee($trans['fee']);
            $transaction->setSignature($trans['signature']);
            $transaction->setSignatures($trans['signatures']);
            $transaction->setConfirmations($trans['confirmations']);
            $transaction->setAsset($trans['asset']);
            $this->transactions[$id] = $transaction;
        }
    }
}