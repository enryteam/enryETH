<?php
class ENRY_RPC
{
 	protected $host, $port, $version;
 	protected $id = 0;

 	function __construct($host, $port, $version="2.0")
 	{
 		$this->host = $host;
 		$this->port = $port;
 		$this->version = $version;
 	}

 	function request($method, $params=array())
 	{
 		$data = array();
 		$data['jsonrpc'] = $this->version;
 		$data['id'] = $this->id++;
 		$data['method'] = $method;
 		$data['params'] = $params;
 		$ch = curl_init();
 		curl_setopt($ch, CURLOPT_URL, $this->host);
 		curl_setopt($ch, CURLOPT_PORT, $this->port);
 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
 		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
 		curl_setopt($ch, CURLOPT_POST, TRUE);
    $log_req = json_encode($data);
 		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
 		$ret = curl_exec($ch);
    $log_ret = $ret;


 		if($ret !== FALSE)
 		{
 			$formatted = $this->format_response($ret);

 			if(isset($formatted->error))
 			{
        file_put_contents('debug.'.date("Ymd").'.log',"\r\nTime    : ".date("Y-m-d H:i:s")."\nRequest : ".$log_req."\nReturn  : ".$log_ret,FILE_APPEND);

 				throw new RPCException($formatted->error->message, $formatted->error->code);
 			}
 			else
 			{
 				return $formatted;
 			}
 		}
 		else
 		{
 			throw new RPCException("CN.ENRY.ETH.ERROR");
 		}
 	}

 	function format_response($response)
 	{
 		return @json_decode($response);
 	}
 }
class CnEnryEth extends ENRY_RPC
{
	private function ether_request($method, $params=array())
	{

		try
		{
			$ret = $this->request($method, $params);
			return $ret->result;
		}
		catch(RPCException $e)
		{
			throw $e;
		}
	}

	private function decode_hex($input)
	{
		if(substr($input, 0, 2) == '0x')
			$input = substr($input, 2);

		if(preg_match('/[a-f0-9]+/', $input))
			return hexdec($input);

		return $input;
	}

	function web3_clientVersion()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function web3_sha3($input)
	{
		return $this->ether_request(__FUNCTION__, array($input));
	}

	function net_version()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function net_listening()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function net_peerCount()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function eth_protocolVersion()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function eth_coinbase()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function eth_mining()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function eth_hashrate()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function eth_gasPrice()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function eth_accounts()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function personal_newAccount($passwd)
	{
		return $this->ether_request(__FUNCTION__,array($passwd));
	}

	function personal_unlockAccount($account,$passwd)
	{
		return $this->ether_request(__FUNCTION__,array($account,$passwd));
	}

	function miner_start()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function miner_stop()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function eth_sendTransaction($account_from,$account_to,$amount)
	{
		return $this->ether_request(__FUNCTION__,array(array("from"=>$account_from,"to"=>$account_to,"value"=>"0x".dechex($amount))));
	}

	function eth_blockNumber($decode_hex=FALSE)
	{
		$block = $this->ether_request(__FUNCTION__);

		if($decode_hex)
			$block = $this->decode_hex($block);

		return $block;
	}

	function eth_getBalance($address, $block='latest', $decode_hex=FALSE)
	{
		$balance = $this->ether_request(__FUNCTION__, array($address, $block));

		if($decode_hex)
			$balance = $this->decode_hex($balance);

		return $balance;
	}

	function eth_getStorageAt($address, $at, $block='latest')
	{
		return $this->ether_request(__FUNCTION__, array($address, $at, $block));
	}

	function eth_getTransactionCount($address, $block='latest', $decode_hex=FALSE)
	{
		$count = $this->ether_request(__FUNCTION__, array($address, $block));

        if($decode_hex)
            $count = $this->decode_hex($count);

        return $count;
	}

	function eth_getBlockTransactionCountByHash($tx_hash)
	{
		return $this->ether_request(__FUNCTION__, array($tx_hash));
	}

	function eth_getBlockTransactionCountByNumber($tx='latest')
	{
		return $this->ether_request(__FUNCTION__, array($tx));
	}

	function eth_getUncleCountByBlockHash($block_hash)
	{
		return $this->ether_request(__FUNCTION__, array($block_hash));
	}

	function eth_getUncleCountByBlockNumber($block='latest')
	{
		return $this->ether_request(__FUNCTION__, array($block));
	}

	function eth_getCode($address, $block='latest')
	{
		return $this->ether_request(__FUNCTION__, array($address, $block));
	}

	function eth_sign($address, $input)
	{
		return $this->ether_request(__FUNCTION__, array($address, $input));
	}

	function eth_call($message, $block)
	{
		if(!is_a($message, 'Ethereum_Message'))
		{
			throw new ErrorException('Message object expected');
		}
		else
		{
			return $this->ether_request(__FUNCTION__, $message->toArray());
		}
	}

	function eth_estimateGas($message, $block)
	{
		if(!is_a($message, 'Ethereum_Message'))
		{
			throw new ErrorException('Message object expected');
		}
		else
		{
			return $this->ether_request(__FUNCTION__, $message->toArray());
		}
	}

	function eth_getBlockByHash($hash, $full_tx=TRUE)
	{
		return $this->ether_request(__FUNCTION__, array($hash, $full_tx));
	}

	function eth_getBlockByNumber($block='latest', $full_tx=TRUE)
	{
		return $this->ether_request(__FUNCTION__, array($block, $full_tx));
	}

	function eth_getTransactionByHash($hash)
	{
		return $this->ether_request(__FUNCTION__, array($hash));
	}

	function eth_getTransactionByBlockHashAndIndex($hash, $index)
	{
		return $this->ether_request(__FUNCTION__, array($hash, $index));
	}

	function eth_getTransactionByBlockNumberAndIndex($block, $index)
	{
		return $this->ether_request(__FUNCTION__, array($block, $index));
	}

	function eth_getTransactionReceipt($tx_hash)
	{
		return $this->ether_request(__FUNCTION__, array($tx_hash));
	}

	function eth_getUncleByBlockHashAndIndex($hash, $index)
	{
		return $this->ether_request(__FUNCTION__, array($hash, $index));
	}

	function eth_getUncleByBlockNumberAndIndex($block, $index)
	{
		return $this->ether_request(__FUNCTION__, array($block, $index));
	}

	function eth_getCompilers()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function eth_compileSolidity($code)
	{
		return $this->ether_request(__FUNCTION__, array($code));
	}

	function eth_compileLLL($code)
	{
		return $this->ether_request(__FUNCTION__, array($code));
	}

	function eth_compileSerpent($code)
	{
		return $this->ether_request(__FUNCTION__, array($code));
	}

	function eth_newFilter($filter, $decode_hex=FALSE)
	{
		if(!is_a($filter, 'Ethereum_Filter'))
		{
			throw new ErrorException('Expected a Filter object');
		}
		else
		{
			$id = $this->ether_request(__FUNCTION__, $filter->toArray());

			if($decode_hex)
				$id = $this->decode_hex($id);

			return $id;
		}
	}

	function eth_newBlockFilter($decode_hex=FALSE)
	{
		$id = $this->ether_request(__FUNCTION__);

		if($decode_hex)
			$id = $this->decode_hex($id);

		return $id;
	}

	function eth_newPendingTransactionFilter($decode_hex=FALSE)
	{
		$id = $this->ether_request(__FUNCTION__);

		if($decode_hex)
			$id = $this->decode_hex($id);

		return $id;
	}

	function eth_uninstallFilter($id)
	{
		return $this->ether_request(__FUNCTION__, array($id));
	}

	function eth_getFilterChanges($id)
	{
		return $this->ether_request(__FUNCTION__, array($id));
	}

	function eth_getFilterLogs($id)
	{
		return $this->ether_request(__FUNCTION__, array($id));
	}

	function eth_getLogs($filter)
	{
		if(!is_a($filter, 'Ethereum_Filter'))
		{
			throw new ErrorException('Expected a Filter object');
		}
		else
		{
			return $this->ether_request(__FUNCTION__, $filter->toArray());
		}
	}

	function eth_getWork()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function eth_submitWork($nonce, $pow_hash, $mix_digest)
	{
		return $this->ether_request(__FUNCTION__, array($nonce, $pow_hash, $mix_digest));
	}

	function db_putString($db, $key, $value)
	{
		return $this->ether_request(__FUNCTION__, array($db, $key, $value));
	}

	function db_getString($db, $key)
	{
		return $this->ether_request(__FUNCTION__, array($db, $key));
	}

	function db_putHex($db, $key, $value)
	{
		return $this->ether_request(__FUNCTION__, array($db, $key, $value));
	}

	function db_getHex($db, $key)
	{
		return $this->ether_request(__FUNCTION__, array($db, $key));
	}

	function shh_version()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function shh_post($post)
	{
		if(!is_a($post, 'Whisper_Post'))
		{
			throw new ErrorException('Expected a Whisper post');
		}
		else
		{
			return $this->ether_request(__FUNCTION__, $post->toArray());
		}
	}

	function shh_newIdentinty()
	{
		return $this->ether_request(__FUNCTION__);
	}

	function shh_hasIdentity($id)
	{
		return $this->ether_request(__FUNCTION__);
	}

	function shh_newFilter($to=NULL, $topics=array())
	{
		return $this->ether_request(__FUNCTION__, array(array('to'=>$to, 'topics'=>$topics)));
	}

	function shh_uninstallFilter($id)
	{
		return $this->ether_request(__FUNCTION__, array($id));
	}

	function shh_getFilterChanges($id)
	{
		return $this->ether_request(__FUNCTION__, array($id));
	}

	function shh_getMessages($id)
	{
		return $this->ether_request(__FUNCTION__, array($id));
	}
}
class Ethereum_Transaction
{
	private $to, $from, $gas, $gasPrice, $value, $data, $nonce;

	function __construct($from, $to, $gas, $gasPrice, $value, $data='', $nonce=NULL)
	{
		$this->from = $from;
		$this->to = $to;
		$this->gas = $gas;
		$this->gasPrice = $gasPrice;
		$this->value = $value;
		$this->data = $data;
		$this->nonce = $nonce;
	}

	function toArray()
	{
		return array(
			array
			(
				'from'=>$this->from,
				'to'=>$this->to,
				'gas'=>$this->gas,
				'gasPrice'=>$this->gasPrice,
				'value'=>$this->value,
				'data'=>$this->data,
				'nonce'=>$this->nonce
			)
		);
	}
}

class Ethereum_Message extends Ethereum_Transaction
{

}

class Ethereum_Filter
{
	private $fromBlock, $toBlock, $address, $topics;

	function __construct($fromBlock, $toBlock, $address, $topics)
	{
		$this->fromBlock = $fromBlock;
		$this->toBlock = $toBlock;
		$this->address = $address;
		$this->topics = $topics;
	}

	function toArray()
	{
		return array(
			array
			(
				'fromBlock'=>$this->fromBlock,
				'toBlock'=>$this->toBlock,
				'address'=>$this->address,
				'topics'=>$this->topics
			)
		);
	}
}

class Whisper_Post
{
	private $from, $to, $topics, $payload, $priority, $ttl;

	function __construct($from, $to, $topics, $payload, $priority, $ttl)
	{
		$this->from = $from;
		$this->to = $to;
		$this->topics = $topics;
		$this->payload = $payload;
		$this->priority = $priority;
		$this->ttl = $ttl;
	}

	function toArray()
	{
		return array(
			array
			(
				'from'=>$this->from,
				'to'=>$this->to,
				'topics'=>$this->topics,
				'payload'=>$this->payload,
				'priority'=>$this->priority,
				'ttl'=>$this->ttl
			)
		);
	}
}
class RPCException extends Exception
{
		public function __construct($message, $code = 0, Exception $previous = null)
		{
				parent::__construct($message, $code, $previous);
		}

		public function __toString()
		{
				return __CLASS__ . ": ".(($this->code > 0)?"[{$this->code}]:":"")." {$this->message}\n";
		}
}
