<?php
		
		use CoinMarketCap\Api as cmc;

		function getExchangeRates() {
	        $cmc = new cmc('92eb96b2-3a19-4518-a3be-59e11a290a42');
	        $responseBtc = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'BTC', 'convert' => 'USD,EUR,GBP,JPY']);
	        $responseXmr = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'XMR', 'convert' => 'USD,EUR,GBP,JPY']);
	        $responseEth = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'ETH', 'convert' => 'USD,EUR,GBP,JPY']);

	        Cache::put('btcRates', $responseBtc, 120);
	        Cache::put('xmrRates', $responseXmr, 120);
	        Cache::put('ethRates', $responseEth, 120);
		}

		if (Cache::has('btcRates') && Cache::has('xmrRates') && Cache::has('ethRates')) {
			$responseBtc = Cache::get('btcRates');
			$responseXmr = Cache::get('xmrRates');
			$responseEth = Cache::get('ethRates');
		} else {
			getExchangeRates();
			$responseBtc = Cache::get('btcRates');
			$responseXmr = Cache::get('xmrRates');
			$responseEth = Cache::get('ethRates');
		}


        #dd($response);
        //btc
        // $responseUsdBtc = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'BTC', 'convert' => 'USD']);
        // $responseEurBtc = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'BTC', 'convert' => 'EUR']);
        // $responseGbpBtc = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'BTC', 'convert' => 'GBP']);
        // $responseJpyBtc = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'BTC', 'convert' => 'JPY']);
        
        // $BTC2USD = $responseUsdBtc->data->quote->USD->price;
        // $BTC2EUR = $responseEurBtc->data->quote->EUR->price;
        // $BTC2GBP = $responseGbpBtc->data->quote->GBP->price;
        // $BTC2JPY = $responseJpyBtc->data->quote->JPY->price;

        // //monero
        // $responseUsdXmr = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'XMR', 'convert' => 'USD']);
        // $responseEurXmr = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'XMR', 'convert' => 'EUR']);
        // $responseGbpXmr = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'XMR', 'convert' => 'GBP']);
        // $responseJpyXmr = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'XMR', 'convert' => 'JPY']);

        // $XMR2USD = $responseUsdXmr->data->quote->USD->price;
        // $XMR2EUR = $responseEurXmr->data->quote->EUR->price;
        // $XMR2GBP = $responseGbpXmr->data->quote->GBP->price;
        // $XMR2JPY = $responseJpyXmr->data->quote->JPY->price;

        // //ethereum
        // $responseUsdEth = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'ETH', 'convert' => 'USD']);
        // $responseEurEth = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'ETH', 'convert' => 'EUR']);
        // $responseGbpEth = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'ETH', 'convert' => 'GBP']);
        // $responseJpyEth = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'ETH', 'convert' => 'JPY']);

        // $ETH2USD = $responseUsdEth->data->quote->USD->price;
        // $ETH2EUR = $responseEurEth->data->quote->EUR->price;
        // $ETH2GBP = $responseGbpEth->data->quote->GBP->price;
        // $ETH2JPY = $responseJpyEth->data->quote->JPY->price;