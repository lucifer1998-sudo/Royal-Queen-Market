<?php
		
		use CoinMarketCap\Api as cmc;

        $cmc = new cmc('159b212c-1b55-4a88-8227-07794aa5d561');
        //btc
        $responseUsdBtc = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'BTC', 'convert' => 'USD']);
        $responseEurBtc = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'BTC', 'convert' => 'EUR']);
        $responseGbpBtc = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'BTC', 'convert' => 'GBP']);
        $responseJpyBtc = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'BTC', 'convert' => 'JPY']);
        
        $BTC2USD = $responseUsdBtc->data->quote->USD->price;
        $BTC2EUR = $responseEurBtc->data->quote->EUR->price;
        $BTC2GBP = $responseGbpBtc->data->quote->GBP->price;
        $BTC2JPY = $responseJpyBtc->data->quote->JPY->price;

        //monero
        $responseUsdXmr = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'XMR', 'convert' => 'USD']);
        $responseEurXmr = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'XMR', 'convert' => 'EUR']);
        $responseGbpXmr = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'XMR', 'convert' => 'GBP']);
        $responseJpyXmr = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'XMR', 'convert' => 'JPY']);

        $XMR2USD = $responseUsdXmr->data->quote->USD->price;
        $XMR2EUR = $responseEurXmr->data->quote->EUR->price;
        $XMR2GBP = $responseGbpXmr->data->quote->GBP->price;
        $XMR2JPY = $responseJpyXmr->data->quote->JPY->price;

        //ethereum
        $responseUsdEth = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'ETH', 'convert' => 'USD']);
        $responseEurEth = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'ETH', 'convert' => 'EUR']);
        $responseGbpEth = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'ETH', 'convert' => 'GBP']);
        $responseJpyEth = $cmc->tools()->priceConversion(['amount' => 1, 'symbol' => 'ETH', 'convert' => 'JPY']);

        $ETH2USD = $responseUsdEth->data->quote->USD->price;
        $ETH2EUR = $responseEurEth->data->quote->EUR->price;
        $ETH2GBP = $responseGbpEth->data->quote->GBP->price;
        $ETH2JPY = $responseJpyEth->data->quote->JPY->price;