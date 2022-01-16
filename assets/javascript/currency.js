fetch('https://api.coinbase.com/v2/exchange-rates?currency=ETH')
    .then(data => {
        return data.json();
    })
    .then(post => {
        const money_format = new Intl.NumberFormat('en-US',
            { style: 'currency', currency: 'PHP' }
        ).format(post.data.rates.PHP);
        document.querySelector('.eth').children[1].innerHTML = money_format;
    });


fetch('https://api.coinbase.com/v2/exchange-rates?currency=AXS')
    .then(data => {
        return data.json();
    })
    .then(post => {
        const money_format = new Intl.NumberFormat('en-US',
            { style: 'currency', currency: 'PHP' }
        ).format(post.data.rates.PHP);
        document.querySelector('.axs').children[1].innerHTML = money_format;
    });


fetch('https://api.coinbase.com/v2/exchange-rates?currency=SLP')
    .then(data => {
        return data.json();
    })
    .then(post => {
        const money_format = new Intl.NumberFormat('en-US',
            { style: 'currency', currency: 'PHP' }
        ).format(post.data.rates.PHP);
        document.querySelector('.slp').children[1].innerHTML = money_format;
    });