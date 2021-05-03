<?php

namespace App\Marketplace\Payment;


use App\Marketplace\Utility\RPCWrapper;
use App\Marketplace\Utility\BitcoinConverter;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Auth;
use App\User;
use BitWasp\Bitcoin\Address\AddressCreator;
use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Key\Deterministic\HdPrefix\GlobalPrefixConfig;
use BitWasp\Bitcoin\Key\Deterministic\HdPrefix\NetworkConfig;
use BitWasp\Bitcoin\Key\Factory\HierarchicalKeyFactory;
use BitWasp\Bitcoin\Network\Slip132\BitcoinRegistry;
use BitWasp\Bitcoin\Key\Deterministic\Slip132\Slip132;
use BitWasp\Bitcoin\Key\KeyToScript\KeyToScriptHelper;
use BitWasp\Bitcoin\Network\NetworkFactory;
use BitWasp\Bitcoin\Serializer\Key\HierarchicalKey\Base58ExtendedKeySerializer;
use BitWasp\Bitcoin\Serializer\Key\HierarchicalKey\ExtendedKeySerializer;
use BitWasp\Bitcoin\Base58;
use BitWasp\Bitcoin\Key\Deterministic\MultisigHD;
use BitWasp\Bitcoin\Key\Deterministic\ElectrumKey;


class BitcoinMutlisig implements Coin
{

    /**
     * RPCWrapper Server instance
     *
     * @var
     */
    protected $bitcoind;

    /**
     * RPCWrapper constructor.
     */
    public function __construct()
    {
        $this -> bitcoind = new RPCWrapper(config('coins.bitcoin.username'),
            config('coins.bitcoin.password'),
            config('coins.bitcoin.host'),
            config('coins.bitcoin.port'));
    }

    /**
     * Generate new address with optional btc user parameter
     *
     * @param array $params
     * @return string
     * @throws \Exception
     */
    function generateAddress(array $params = []): string
    {
        // only if the btc user is set then call with parameter
        $user = Auth::user();
        $vendor = User::findOrFail($params['user']);
        $vendorKey = $vendor->coinAddress('btcm')->address;
        $userKey = $user->coinAddress('btcm')->address;

        $adapter = Bitcoin::getEcAdapter();
        $btc = NetworkFactory::bitcoin();

        // Initialize Slip132 and produce the p2wsh multisig prefixes + factory
        $slip132 = new Slip132(new KeyToScriptHelper($adapter));
        $ZpubPrefix = $slip132->p2wshMultisig($m = 2, $n = 2, $sortCosignKeys = true, new BitcoinRegistry());

        // NetworkConfig and GlobalPrefixConfig should be set
        // with the minimum features required for your application,
        // otherwise you'll accept keys you didn't want.
        $serializer = new Base58ExtendedKeySerializer(new ExtendedKeySerializer($adapter, new GlobalPrefixConfig([
            new NetworkConfig($btc, [$ZpubPrefix,])
        ])));

        $hkFactory = new HierarchicalKeyFactory($adapter, $serializer);

        $key1 = "Zpub6yxUjtA5aNroCK8oNe8qUCDHGkYEX2ypW4CQ81tWi1ETk4mN9N72fYuWuAPWDWmpLEi7H4odKwm8sUCmxf8XcauKTYkhXLuzVxPhBjiExVg";
        $key2 = "Zpub6yTwvGJ1hG6amvwSsTaeSUnS6Ffy6pGESMFn4NVTicwwaYMvJ9NhZABaxQH1hY9zzx3DgAdL44CYc2qRWdGGaWZqQ52uXWMVPd1aTxGBvhw";

        $test1 = $hkFactory->fromExtended($key1, $btc);
        $multisigHdKeys = [
            $hkFactory->fromExtended($key1, $btc),
            $hkFactory->fromExtended($key2, $btc)
        ];



        $accountNode = $hkFactory->multisig($ZpubPrefix->getScriptDataFactory(), ...$multisigHdKeys);
        $receivingNode = $accountNode->deriveChild(0);
        $x = new MultisigHD($ZpubPrefix->getScriptDataFactory(), ...$multisigHdKeys);
        #Base58::decodeCheck($base58)
        #$y = $serializer->parse($btc, $x->getKeys()[0])
        $y = $x->getKeys()[0];
        $z = $x->getKeys()[1];
        #dd($y->getPublicKey());

    

        #dd($receivingNode->getKeys());
        if(array_key_exists('user', $params)) {
            #Log::error("trigger");
            $address = $this -> bitcoind -> createmultisig(2, [$y, $z]); }
        else {
            $address = $this -> bitcoind -> createmultisig();
        }

        // Error in bitcoin
        if($this -> bitcoind -> error)

            throw new \Exception($this -> bitcoind -> error);
        

        $p2sh_address = $address['address'];
        $redeemScript = $address['redeemScript'];

        // $import_result = $this -> bitcoind -> importmulti(
        //     [
        //         [
        //             'redeemscript' => $redeemScript,
        //             'scriptPubKey' => ['address' => $p2sh_address],
        //             'timestamp'    => "now",
        //             'watchonly' => true,

        //         ]
        //     ],
        //     [
        //         'rescan' => false
        //     ]);

        // $unspent_transaction = $this -> bitcoind -> listunspent(2, 999999);

        // dd($unspent_transaction);
        return $p2sh_address;
    }


    /**
     * Returns the total received balance of the account
     *
     * @param array $params
     * @return float
     * @throws \Exception
     */
    function getBalance(array $params = []): float
    {
        // first check by address
        if(array_key_exists('address', $params))
            $accountBalance = $this -> bitcoind -> getreceivedbyaddress($params['address'], (int)config('marketplace.bitcoin.minconfirmations'));
//        else if(array_key_exists('account', $params))
//            // fetch the balance of the account if this parameter is set
//            $accountBalance = $this -> bitcoind -> getbalance($params['account'], (int)config('marketplace.bitcoin.minconfirmations'));
        else
            throw new \Exception('You havent specified any parameter');

        if($this -> bitcoind -> error)
            throw new \Exception($this -> bitcoind -> error);

        return $accountBalance;
    }

    /**
     * Calls a procedure to send from address to address some amount
     *
     * @param string $fromAddress
     * @param string $toAddress
     * @param float $amount
     * @throws \Exception
     */
    function sendToAddress(string $toAddress, float $amount)
    {
        // call bitcoind procedure
        $this -> bitcoind -> sendtoaddress($toAddress, $amount);

        if($this -> bitcoind -> error)
            throw new \Exception("Sending to $toAddress amount $amount \n" . $this -> bitcoind -> error);

    }

    /**
     * Send to array of addresses
     *
     * @param string $fromAccount
     * @param array $addressesAmounts
     * @throws \Exception
     */
    function sendToMany(array $addressesAmounts)
    {
        // send to many addresses
//        foreach ($addressesAmounts as $address => $amount){
//            $this -> bitcoind -> sendtoaddress($address, $amount);
//        }

        $this->bitcoind->sendmany("", $addressesAmounts, (int)config('marketplace.bitcoin.minconfirmations'));


        if ($this->bitcoind->error) {
            $errorString = "";
            foreach ($addressesAmounts as $address => $amount){
                $errorString .= "To $address : $amount \n";
            }
            throw new \Exception( $this->bitcoind->error . "\nSending to: $errorString" );
        }
    }
    /**
     * Convert USD to equivalent BTC amount, rounded on 8 decimals
     *
     * @param $usd
     * @return float
     */
    function usdToCoin($usd): float
    {
        return round( BitcoinConverter::usdToBtc($usd), 8, PHP_ROUND_HALF_DOWN );
    }


    /**
     * Returns the string label of the coin
     *
     * @return string
     */
    function coinLabel(): string
    {
        return 'btc';
    }


}