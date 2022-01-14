const rows = document.getElementsByClassName('row');
const hiddenRows = document.getElementsByClassName('row-hidden');
const editBtns = document.getElementsByClassName('edit');
const hiddenInputs = document.getElementsByClassName('hidden-input');
for (let i = 0; i < index; i++) {
	rows[i].addEventListener('click', function () {
		if (rows[i].classList.toggle("clicked")) {
			hiddenRows[i].style.height = "100%";
			console.log("asss");
		} else
			hiddenRows[i].style.height = "0";
	});
	editBtns[i].addEventListener('click', function () {
		document.querySelector(".modal").style.display = "flex";
		const scholar_id = document.getElementById('scholar_id');
		scholar_id.setAttribute('value',hiddenInputs[i].getAttribute('value'));
		console.log(scholar_id.getAttribute('value'));
	});
}

/*for(let i = 0; i < index; i++){
	const row = document.getElementById(`${i+1}`);
	row.addEventListener('click',function(){
		if(row.classList.toggle("clicked"))
			document.getElementById(`hidden-${i+1}`).style.height = "100%";
		else
			document.getElementById(`hidden-${i+1}`).style.height = "0";
	});
}

function showEditModal(){
	document.querySelector(".modal").style.display = "flex";
}
*/

/*var stars = [300, 250, 309, 189, 180];
		var frameworks = ['React', 'Angular', 'Vue', 'Hyperapp', 'Omi'];
		var ctx = document.getElementById('myChart');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: frameworks,
				datasets: [{
					data: stars,
					tension: 0.3,
					borderColor: "#1FCB75",
					label: "QUOTA IN LAST SEVEN DAYS"
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						labels: {
							color: "#ebebeb",
							font: {
								size: 18
							}
						}
					}
				},
				scales: {
					x: {
						ticks: {
							color: "#ebebeb"
						}
					},
					y: {
						ticks: {
							color: "#ebebeb"
						}
					}
				},
			}
		});

		var ctx2 = document.getElementById('myChart2');
		var myChart = new Chart(ctx2, {
			type: 'line',
			data: {
				labels: frameworks,
				datasets: [{
					data: stars,
					tension: 0.3,
					borderColor: "#1FCB75",
					label: "QUOTA IN LAST SEVEN DAYS"
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						labels: {
							color: "#ebebeb",
							font: {
								size: 18
							}
						}
					}
				},
				scales: {
					x: {
						ticks: {
							color: "#ebebeb"
						}
					},
					y: {
						ticks: {
							color: "#ebebeb"
						}
					}
				},
			}
		});*/