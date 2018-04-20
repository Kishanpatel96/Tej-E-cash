<?php
//this code is used to get the ether transaction details
$userAddress="0xeA3CaC41263Cc5ee9dF199c578aceC5bfb34357E";
$ethtransaction=file_get_contents('http://api.etherscan.io/api?module=account&action=txlist&address='.$userAddress.'&startblock=0&endblock=99999999&sort=desc&apikey=YourApiKeyToken');
$ethtransaction=json_decode($ethtransaction);
$ethtransactionArray=(array)$ethtransaction;
//checking that the result or message is ok or not
$status=$ethtransactionArray['message'];
$validation="OK";
if($status != "OK")
{
	echo $ethtransactionArray['message'];;
	$validation="NOTOK";
}
if($validation == "OK")
{
$TransactionoftokenArrayresult=$ethtransactionArray['result'];
for($i=0;$i<count($TransactionoftokenArrayresult);$i++)
{
	echo "blockNumber :-".$TransactionoftokenArrayresult[$i]->blockNumber;
	echo "<br>";
	echo "timeStamp :-".$TransactionoftokenArrayresult[$i]->timeStamp;
	echo "<br>";
	echo "hash :-".$TransactionoftokenArrayresult[$i]->hash;
	echo "<br>";
	echo "nonce :-".$TransactionoftokenArrayresult[$i]->nonce;
	echo "<br>";
	echo "blockHash :-".$TransactionoftokenArrayresult[$i]->blockHash;
	echo "<br>";
	echo "from :-".$TransactionoftokenArrayresult[$i]->from;
	echo "<br>";
	echo "contractAddress :-".$TransactionoftokenArrayresult[$i]->contractAddress;
	echo "<br>";
	echo "to :-".$TransactionoftokenArrayresult[$i]->to;
	echo "<br>";
	echo "value".$TransactionoftokenArrayresult[$i]->value;
	echo "<br>";
	echo "tokenName :-".$TransactionoftokenArrayresult[$i]->tokenName;
	echo "<br>";
	echo "tokenSymbol :-".$TransactionoftokenArrayresult[$i]->tokenSymbol;
	echo "<br>";
	echo "gas".$TransactionoftokenArrayresult[$i]->gas;
	echo "<br>";
	echo "gasPrice :-".$TransactionoftokenArrayresult[$i]->gasPrice;
	echo "<br>";
	echo "gasUsed :-".$TransactionoftokenArrayresult[$i]->gasUsed;
	echo "<br>";
	echo "cumulativeGasUsed :-".$TransactionoftokenArrayresult[$i]->cumulativeGasUsed;
	echo "<br>";
	echo "input :-".$TransactionoftokenArrayresult[$i]->input;
	echo "<br>";
	echo "confirmations :-".$TransactionoftokenArrayresult[$i]->confirmations;
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
}
}
/*
//This code is used to get the token transaction details
//put here user address
$userAddress="0xF0c4dc7F1Bfd01A2702c1F213664406Fa74FaC87";
//fetching the transaction details
$Transactionoftoken=file_get_contents('https://api.etherscan.io/api?module=account&action=tokentx&contractaddress=0xe25bCec5D3801cE3a794079BF94adF1B8cCD802D&address='.$userAddress.'&page=1&offset=100&sort=asc&apikey=YourApiKeyToken');
//converting data into array
$Transactionoftoken=json_decode($Transactionoftoken);
$TransactionoftokenArray=(array)$Transactionoftoken;
//checking that the result or message is ok or not
$status=$TransactionoftokenArray['message'];
$validation="OK";
if($status != "OK")
{
	echo "There is something went wrong";
    echo $TransactionoftokenArray['message'];
	$validation="NOTOK";
}
//if all the validation checking then this print the transaction details
if($validation == "OK")
{
$TransactionoftokenArrayresult=$TransactionoftokenArray['result'];
for($i=0;$i<count($TransactionoftokenArrayresult);$i++)
{
	echo "blockNumber :-".$TransactionoftokenArrayresult[$i]->blockNumber;
	echo "<br>";
	echo "timeStamp :-".$TransactionoftokenArrayresult[$i]->timeStamp;
	echo "<br>";
	echo "hash :-".$TransactionoftokenArrayresult[$i]->hash;
	echo "<br>";
	echo "nonce :-".$TransactionoftokenArrayresult[$i]->nonce;
	echo "<br>";
	echo "blockHash :-".$TransactionoftokenArrayresult[$i]->blockHash;
	echo "<br>";
	echo "from :-".$TransactionoftokenArrayresult[$i]->from;
	echo "<br>";
	echo "contractAddress :-".$TransactionoftokenArrayresult[$i]->contractAddress;
	echo "<br>";
	echo "to :-".$TransactionoftokenArrayresult[$i]->to;
	echo "<br>";
	echo "value".$TransactionoftokenArrayresult[$i]->value;
	echo "<br>";
	echo "tokenName :-".$TransactionoftokenArrayresult[$i]->tokenName;
	echo "<br>";
	echo "tokenSymbol :-".$TransactionoftokenArrayresult[$i]->tokenSymbol;
	echo "<br>";
	echo "gas".$TransactionoftokenArrayresult[$i]->gas;
	echo "<br>";
	echo "gasPrice :-".$TransactionoftokenArrayresult[$i]->gasPrice;
	echo "<br>";
	echo "gasUsed :-".$TransactionoftokenArrayresult[$i]->gasUsed;
	echo "<br>";
	echo "cumulativeGasUsed :-".$TransactionoftokenArrayresult[$i]->cumulativeGasUsed;
	echo "<br>";
	echo "input :-".$TransactionoftokenArrayresult[$i]->input;
	echo "<br>";
	echo "confirmations :-".$TransactionoftokenArrayresult[$i]->confirmations;
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
}
}*/
//var_dump($TransactionoftokenArrayresult);


	//this code is for sending transaction TOKEN
	/*$action="transaction";
	//identifierparameter2 is owner address
	$identifierparameter2="0x04526f963bb9f59d5dd30481637954aa8be68802";
	//identifierparameter3 is destination address
	$identifierparameter3="0x2CD718d88D716aA91db64d69b6353f69692275e0";
	//identifierparameter4 is private key of user
	$identifierparameter4="a41d0207c6ed5ac9b62334a43cb44cadfb77d3ae7235aa78ed29ee7fcd8a22dd";
	//tokenAmount  is define here
	$token="20";
	$tokentransfer = file_get_contents('https://cryptoinvestors.pro/?action='.$action.'&identifierparameter2='.$identifierparameter2.'&identifierparameter3='.$identifierparameter3.'&identifierparameter4='.$identifierparameter4.'&identifierparameter5='.$token.'');
	//$tokentransfer = json_decode($btc_price);
	var_dump($tokentransfer);*/


	//this code is for getting balance of TOKEN
	/*$identifierparameter2="0x04526f963bb9f59d5dd30481637954aa8be68802";
	$action="balance";
	$tokenbalance = file_get_contents('https://cryptoinvestors.pro/?action='.$action.'&identifierparameter2='.$identifierparameter2.'');
	var_dump($tokenbalance);*/

	//this is For making wallet of TOKEN
	/*$action="address";
	$addressandprivate=file_get_contents('https://cryptoinvestors.pro/?action='.$action.'');
	var_dump($addressandprivate);*/
	
	/*
	//this code is for transfer ether
	//action specifi the event which the user want to do
	$action="ethtransfer";
	//identifierparameter2 is owner address
	$identifierparameter2="0x4f19384b3649dAEfDC606be74b329D0512Cb7f2A";
	//identifierparameter3 is destination address
	$identifierparameter3="0x3725b7a42348B9117D7e6a798daf7091977c71af";
	//identifierparameter4 is private key of user
	$identifierparameter4="74f06551218b4ce986c24ccd8cb5d2f570b83fca28aa4edd0bbc1808b869d302";
	//tokenAmount  is define here
	$amount="1.2";
	$ethertransfer = file_get_contents('https://cryptoinvestors.pro/?action='.$action.'&identifierparameter2='.$identifierparameter2.'&identifierparameter3='.$identifierparameter3.'&identifierparameter4='.$identifierparameter4.'&identifierparameter5='.$amount.'');
	//$tokentransfer = json_decode($btc_price);
	var_dump($ethertransfer);*/

	//this code is used to make address and private key of ether wallet
	/*
	$action="address";
	$addressandprivateofether=file_get_contents('https://cryptoinvestors.pro/?action='.$action.'');
	$addressandprivatekey = explode("/", $addressandprivateofether);
	$privatekey=$addressandprivatekey[0]; // private key
	$walletaddress=$addressandprivatekey[1]; // wallet address
	echo "Private :-".$privatekey;
    echo "<br>";
	echo "wallet :-".$walletaddress;
	*/
    //this code is used for getting balance of ether
	/*
	$identifierparameter2="0x04526f963bb9f59d5dd30481637954aa8be68802";
	$action="ethbalance";
	$ethbalance = file_get_contents('https://cryptoinvestors.pro/?action='.$action.'&identifierparameter2='.$identifierparameter2.'');
	var_dump($ethbalance);
	*/
?>