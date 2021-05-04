<?php

namespace App\Marketplace\Payment;


use App\Marketplace\Utility\RPCWrapper;
use App\Marketplace\Utility\BitcoinConverter;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Auth;
use App\User;
use App\Purchase;
use BitWasp\BitcoinLib\BIP32;
use BitWasp\BitcoinLib\BitcoinLib;



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

        #$key1 = "tpubD6NzVbkrYhZ4YBNMHhprevfo2UxYCnxKuWDXN9HcY252rRo9W1Zvfn2wSHSGeHfSJqdWk8PMaRNpzpJKVz8Va2vx5wiDAdt5PhMnRPqUtwJ";

        $keys = [$userKey, $vendorKey];
        $m = 2;
        $userPrefix = $user->purchases()->count() + 1;
        $vendorPrefix = $vendor->sales()->count() + 1;
        #dd($vendorPrefix);

        $bip32user = BIP32::build_key(array($userKey, "M"), "0/" . $userPrefix);
        $pubkeyUser = BIP32::extract_public_key($bip32user);
        $bip32vendor = BIP32::build_key(array($vendorKey, "M"), "0/" . $vendorPrefix);
        $pubkeyVendor = BIP32::extract_public_key($bip32vendor);
        #dd($pubkeyUser);

        if(array_key_exists('user', $params)) {
            #Log::error("trigger");
            $address = $this -> bitcoind -> createmultisig(2, [$pubkeyUser, $pubkeyVendor]); 
           # dd($address);
        }
        else {
            $address = $this -> bitcoind -> createmultisig();
        }

       # $test = $this -> bitcoind -> getreceivedbyaddress ($address['address'], 2);
        #dd($test);
        #dd($address['address']);
        // Error in bitcoin
        if($this -> bitcoind -> error)

            throw new \Exception($this -> bitcoind -> error);
        

        #dd($address);
        $redeemScript = $address['redeemScript'];
        $x = $address['address'];

      #  $this  -> multisig_address = $x;
      #  $this -> redeem_script = $redeemScript;
      

        $import_result = $this -> bitcoind -> importmulti(
            [
                [
                    'redeemscript' => $redeemScript,
                    'scriptPubKey' => ['address' => $x],
                    'timestamp'    => "now",
                    'watchonly' => false,

                ]
            ],
            [
                'rescan' => false
            ]);

        //  $unspent_transaction = $this -> bitcoind -> listunspent(2, 999999);

        # dd($import_result);
        
        return $x;
    }


    // function getRedeemScript(array $params = []): string
    // {
    //     // only if the btc user is set then call with parameter
    //     $user = Auth::user();
    //     $vendor = User::findOrFail($params['user']);
    //     $vendorKey = $vendor->coinAddress('btcm')->address;
    //     $userKey = $user->coinAddress('btcm')->address;

    //     #$key1 = "tpubD6NzVbkrYhZ4YBNMHhprevfo2UxYCnxKuWDXN9HcY252rRo9W1Zvfn2wSHSGeHfSJqdWk8PMaRNpzpJKVz8Va2vx5wiDAdt5PhMnRPqUtwJ";

    //     $keys = [$userKey, $vendorKey];
    //     $m = 2;
    //     $userPrefix = $user->purchases()->count() + 1;
    //     $vendorPrefix = $vendor->sales()->count() + 1;
    //     #dd($vendorPrefix);

    //     $bip32user = BIP32::build_key(array($userKey, "M"), "0/" . $userPrefix);
    //     $pubkeyUser = BIP32::extract_public_key($bip32user);
    //     $bip32vendor = BIP32::build_key(array($vendorKey, "M"), "0/" . $vendorPrefix);
    //     $pubkeyVendor = BIP32::extract_public_key($bip32vendor);
    //     #dd($pubkeyUser);

    //     if(array_key_exists('user', $params)) {
    //         #Log::error("trigger");
    //         $address = $this -> bitcoind -> createmultisig(2, [$pubkeyUser, $pubkeyVendor]); 
    //        # dd($address);
    //     }
    //     else {
    //         $address = $this -> bitcoind -> createmultisig();
    //     }

    //    # $test = $this -> bitcoind -> getreceivedbyaddress ($address['address'], 2);
    //     #dd($test);
    //     #dd($address['address']);
    //     // Error in bitcoin
    //     if($this -> bitcoind -> error)

    //         throw new \Exception($this -> bitcoind -> error);
        

    //     #dd($address);
    //     $redeemScript = $address['redeemScript'];
    //     $x = $address['address'];

    //    # $this  -> multisig_address = $x;
    //     #$this -> redeem_script = $redeemScript;
      

    //     $import_result = $this -> bitcoind -> importmulti(
    //         [
    //             [
    //                 'redeemscript' => $redeemScript,
    //                 'scriptPubKey' => ['address' => $x],
    //                 'timestamp'    => "now",
    //                 'watchonly' => false,

    //             ]
    //         ],
    //         [
    //             'rescan' => false
    //         ]);

    //     //  $unspent_transaction = $this -> bitcoind -> listunspent(2, 999999);

    //     # dd($import_result);
        
    //     return $redeemScript;
    // }


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
        if(array_key_exists('address', $params)) {
            $accountBalance = $this -> bitcoind -> getreceivedbyaddress($params['address'], (int)config('marketplace.bitcoin.minconfirmations'));

        }

        
//        else if(array_key_exists('account', $params))
//            // fetch the balance of the account if this parameter is set
//            $accountBalance = $this -> bitcoind -> getbalance($params['account'], (int)config('marketplace.bitcoin.minconfirmations'));
        else {
            throw new \Exception('You havent specified any parameter');
        }

        if($this -> bitcoind -> error) {
            throw new \Exception($this -> bitcoind -> error);
        }

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