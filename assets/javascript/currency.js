var ethPrev;
var axsPrev;
var slpPrev
const money_format = new Intl.NumberFormat('en-US',
    { style: 'currency', currency: 'PHP' }
);
const slp_money_format = new Intl.NumberFormat('en-US',
    { style: 'currency', currency: 'PHP', minimumFractionDigits: 4, }
);

function fetch_currencies() {
    fetch('https://api.coinbase.com/v2/exchange-rates?currency=ETH')
        .then(data => {
            return data.json();
        })
        .then(post => {

            document.getElementById('eth').innerHTML = money_format.format(post.data.rates.PHP);

            let ethVal = parseFloat(post.data.rates.PHP);
            updateState(ethPrev, ethVal, 'eth-class');
            ethPrev = ethVal;

            console.log('eth');
        });


    fetch('https://api.coinbase.com/v2/exchange-rates?currency=AXS')
        .then(data => {
            return data.json();
        })
        .then(post => {
            document.getElementById('axs').innerHTML = money_format.format(post.data.rates.PHP);;

            let axsVal = parseFloat(post.data.rates.PHP);
            updateState(axsPrev, axsVal, 'axs-class');
            axsPrev = axsVal;

            console.log('axs');
        });


    fetch('https://api.coinbase.com/v2/exchange-rates?currency=SLP')
        .then(data => {
            return data.json();
        })
        .then(post => {

            document.getElementById('slp').innerHTML = slp_money_format.format(post.data.rates.PHP);

            let slpVal = parseFloat(post.data.rates.PHP);
            updateState(slpPrev, slpVal, 'slp-class');
            slpPrev = slpVal;
            
            document.getElementById('earnings').innerHTML = "≈ " + money_format.format(parseFloat(post.data.rates.PHP) * totalSlp);

            console.log('slp');
        });
}

function updateState(valPrev, valNew, currency) {
    if (valPrev != undefined) {
        if (valPrev < valNew) {
            document.getElementById(currency).classList.add('status-up');
            document.getElementById(currency).classList.remove('status-down');
        }
        else if (valPrev > valNew) {
            document.getElementById(currency).classList.remove('status-up');
            document.getElementById(currency).classList.add('status-down');
        }
        else {
            document.getElementById(currency).classList.remove('status-up');
            document.getElementById(currency).classList.remove('status-down');
        }
    }
}

fetch_currencies();
setInterval(fetch_currencies, 30 * (1000));