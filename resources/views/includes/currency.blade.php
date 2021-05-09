@if(isset ( auth() -> user() -> currency ) && auth() -> user() -> currency -> currency == 'eur')
    {{ $usdValue * $usd_eur . ' £'  }}
@else
    {{ \App\Marketplace\Utility\CurrencyConverter::convertToLocal($usdValue) }}
    {{ \App\Marketplace\Utility\CurrencyConverter::getSymbol(\App\Marketplace\Utility\CurrencyConverter::getLocalCurrency()) }}
@endif
