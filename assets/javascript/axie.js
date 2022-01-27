const hidden = document.getElementsByClassName('row-hidden');
const teams = document.getElementsByClassName('team');

function get_team(ronin_address, index) {
    const requestOptions = {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            "operationName": "GetAxieBriefList",
            "variables": {
                "owner": ronin_address
            },
            "query": "query GetAxieBriefList($owner: String) {\n  axies(owner: $owner) {\n    total\n    results {\n      ...AxieBrief\n      __typename\n    }\n    __typename\n  }\n}\n\nfragment AxieBrief on Axie {\n  id\n  name\n  stage\n  class\n  breedCount\n  image\n \n}\n"
        })
    };

    fetch('https://graphql-gateway.axieinfinity.com/graphql', requestOptions)
        .then(response => response.json())
        .then(data => {
            totalAxies = data.data.axies.total;
            results = data.data.axies.results;

            for (let k = 0; k < totalAxies; k++) {
                const newDiv = document.createElement("div");
                const axieImg = document.createElement("img");
                const axieName = document.createElement("h1");
                const axieId = document.createElement("h2");

                axieImg.setAttribute('src', results[k].image);
                axieName.innerHTML = results[k].name;
                axieId.innerHTML = results[k].id;
                newDiv.appendChild(axieImg);
                newDiv.appendChild(axieName);
                newDiv.appendChild(axieId);
                newDiv.setAttribute('class', 'axie');
                teams[index].appendChild(newDiv);
            }
        });
}


for (let i = 0; i < hidden.length; i++) {
    get_team(teams[i].dataset.ronin,i);
}
