function fetch_currencies() {
    fetch('https://api.coinbase.com/v2/exchange-rates?currency=ETH')
        .then(data => {
            return data.json();
        })
        .then(post => {
            const money_format = new Intl.NumberFormat('en-US',
                { style: 'currency', currency: 'PHP' }
            ).format(post.data.rates.PHP);
            document.getElementById('eth').innerHTML = money_format;
            console.log('eth');
        });


    fetch('https://api.coinbase.com/v2/exchange-rates?currency=AXS')
        .then(data => {
            return data.json();
        })
        .then(post => {
            const money_format = new Intl.NumberFormat('en-US',
                { style: 'currency', currency: 'PHP' }
            ).format(post.data.rates.PHP);
            document.getElementById('axs').innerHTML = money_format;
            console.log('axs');
        });


    fetch('https://api.coinbase.com/v2/exchange-rates?currency=SLP')
        .then(data => {
            return data.json();
        })
        .then(post => {
            const money_format = new Intl.NumberFormat('en-US',
                { style: 'currency', currency: 'PHP', minimumFractionDigits: 4, }
            ).format(post.data.rates.PHP);
            document.getElementById('slp').innerHTML = money_format;
            console.log('slp');
        });
}

fetch_currencies();
setInterval(fetch_currencies, 30 * (1000));