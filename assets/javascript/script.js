const rows = document.getElementsByClassName('row');
const hiddenRows = document.getElementsByClassName('row-hidden');
const editBtns = document.getElementsByClassName('edit');
const deleteBtns = document.getElementsByClassName('delete');
const hiddenInputs = document.getElementsByClassName('hidden-input');

const name_class = document.getElementsByClassName('name');
const email_class = document.getElementsByClassName('email');
const contact_class = document.getElementsByClassName('contact');
const share_class = document.getElementsByClassName('share');
const quota_class = document.getElementsByClassName('quota');
const address_class = document.getElementsByClassName('address');

const scholar_id = document.getElementById('scholar_id');
const name_id = document.getElementById('name');
const email_id = document.getElementById('email');
const contact_id = document.getElementById('contact');
const share_id = document.getElementById('share');
const quota_id = document.getElementById('quota');
const address_id = document.getElementById('address');
const delete_id = document.getElementById('delete_id');

for (let i = 0; i < index; i++) {
	rows[i].addEventListener('click', function () {
		if (rows[i].classList.toggle("clicked")) {
			hiddenRows[i].style.height = "100%";
			console.log("asdas");
		} else
			hiddenRows[i].style.height = "0";
	});
	editBtns[i].addEventListener('click', function () {
		document.querySelector(".modal").style.display = "flex";
		document.querySelector(".edit-modal").style.display = "flex";
		scholar_id.setAttribute('value',hiddenInputs[i].getAttribute('value'));

		name_id.setAttribute('value', name_class[i].innerHTML);
		email_id.setAttribute('value', email_class[i].innerHTML);
		contact_id.setAttribute('value', contact_class[i].innerHTML);
		share_id.setAttribute('value', share_class[i].innerHTML.replace('% share',''));
		quota_id.setAttribute('value', quota_class[i].innerHTML.replace(' Daily quota',''));

		address_id.innerHTML = address_class[i].innerHTML;
		console.log(scholar_id.getAttribute('value'));
	});

	deleteBtns[i].addEventListener('click',function(){
		document.querySelector(".modal").style.display = "flex";
		document.querySelector(".delete-modal").style.display = "flex";
		delete_id.setAttribute('value',hiddenInputs[i].getAttribute('value'));
	});
}

document.getElementById('close').addEventListener('click', function(){
	document.querySelector('.modal').style.display = "none";
	document.querySelector('.edit-modal').style.display = "none";
});

document.getElementById('cancel').addEventListener('click', function(){
	document.querySelector('.modal').style.display = "none";
	document.querySelector('.delete-modal').style.display = "none";
});
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

