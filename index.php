<?php
///载入类库
require_once('cn.enry.eth.php');

///连接区块
$enryETH = new CnEnryEth('127.0.0.1', 8545);

///所有账户
$accounts = $enryETH->eth_accounts();
print_r($accounts);


///创建账户 入参：账户密码 注明：账户名称系统分配
// $userpass = '密码';
// $enryETH->personal_newAccount($userpass);
// $accounts = $enryETH->eth_accounts();
// print_r($accounts);
// file_put_contents('dataroot/accouts.dat',$userpass."|".$accounts[count($accounts)-1]."\n",FILE_APPEND);


///解锁账户 入参：账户名称
//$enryETH->personal_unlockAccount('0x041aed7ef9621fcd15bd1a5a1095034affaae41c','18061208098');


///账户余额 单位：一亿兆（1000000000000000000）
foreach ($accounts as $account) {
	//echo $account;
	$balance = $enryETH->eth_getBalance($account, 'latest', FALSE);//TRUE:10进制
	echo $balance."\n";
}

///账户转账
// $account_from = '0x52af5b3208a1ad7a6f97b74f16b17a89ceb0782b';
// $account_to   = '0x041aed7ef9621fcd15bd1a5a1095034affaae41c';
// $amount       =  1;//数字
// echo $enryETH->eth_sendTransaction($account_from,$account_to,$amount);


///启动挖矿
//echo $enryETH->miner_start();

///区块高度
//echo $enryETH->eth_blockNumber();
///停止挖矿
//echo $enryETH->miner_stop();
