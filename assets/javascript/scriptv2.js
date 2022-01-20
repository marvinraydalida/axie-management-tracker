const rows = document.getElementsByClassName('row-visible');
const hiddenRows = document.getElementsByClassName('row-hidden');
const settingsBtns = document.getElementsByClassName('settings-button');
const actionBtns = document.getElementsByClassName('actions');
const editBtns = document.getElementsByClassName('edit');
const deleteBtns = document.getElementsByClassName('delete');
const hiddenInputs = document.getElementsByClassName('hidden-input');

const image_class = document.getElementsByClassName('image');
const name_class = document.getElementsByClassName('name');
const email_class = document.getElementsByClassName('email');
const contact_class = document.getElementsByClassName('contact');
const share_class = document.getElementsByClassName('share');
const quota_class = document.getElementsByClassName('quota');
const address_class = document.getElementsByClassName('address');

const scholar_id = document.getElementById('scholar_id');
const image_id = document.getElementById('image');
const name_id = document.getElementById('name');
const email_id = document.getElementById('email');
const contact_id = document.getElementById('contact');
const share_id = document.getElementById('share');
const quota_id = document.getElementById('quota');
const address_id = document.getElementById('address');
const delete_id = document.getElementById('delete_id');

for (let i = 0; i < rows.length; i++) {
	console.log('testin:' + i);
	rows[i].addEventListener('click', function () {
		if (rows[i].classList.toggle("clicked")) {
			hiddenRows[i].style.height = "auto";
			hiddenRows[i].style.borderBottom = "1px solid #313946";
			console.log("asdas");
		} else{
			hiddenRows[i].style.height = "0";
			hiddenRows[i].style.borderBottom = "0px solid #313946";
		}
			
	});
	settingsBtns[i].addEventListener('click',function(){
		if(settingsBtns[i].classList.toggle('enabled')){
			actionBtns[i].style.transform = "scale(1)";
			actionBtns[i].style.transformOrigin = "top right";
		}
		else{
			actionBtns[i].style.transform = "scale(0)";
		}
	});
	editBtns[i].addEventListener('click', function () {
		document.querySelector(".modal").style.display = "flex";
		document.querySelector(".edit-modal").style.display = "flex";
		actionBtns[i].style.transform = "scale(0)";
		settingsBtns[i].classList.toggle('enabled')
		scholar_id.setAttribute('value',hiddenInputs[i].getAttribute('value'));

		image_id.setAttribute('src', image_class[i].getAttribute('src'));
		name_id.setAttribute('value', name_class[i].innerHTML);
		email_id.setAttribute('value', email_class[i].innerHTML);
		contact_id.setAttribute('value', contact_class[i].innerHTML);
		share_id.setAttribute('value', share_class[i].innerHTML.replace('% share',''));
		quota_id.setAttribute('value', quota_class[i].innerHTML.replace(' Daily quota',''));

		address_id.innerHTML = address_class[i].innerHTML;
		//console.log(scholar_id.getAttribute('value'));
	});

	deleteBtns[i].addEventListener('click',function(){
		document.querySelector(".modal").style.display = "flex";
		document.querySelector(".delete-modal").style.display = "flex";
		actionBtns[i].style.transform = "scale(0)";
		settingsBtns[i].classList.toggle('enabled')
		delete_id.setAttribute('value',hiddenInputs[i].getAttribute('value'));
		console.log(delete_id.getAttribute('value'));
	});
}

document.getElementById('close-edit').addEventListener('click',function(){
	document.querySelector('.modal').style.display = "none";
	document.querySelector('.edit-modal').style.display = "none";	
});

document.getElementById('close-delete').addEventListener('click',function(){
	document.querySelector('.modal').style.display = "none";
	document.querySelector('.delete-modal').style.display = "none";	
});

document.getElementById('show-sidebar').addEventListener('click',function(){
	document.querySelector('.sidebar').style.transform = "translateX(0%)";
});

document.getElementById('hide-sidebar').addEventListener('click',function(){
	document.querySelector('.sidebar').style.transform = "translateX(-100%)";
});

const completedTag = document.getElementById('completed')
completedTag.innerHTML = completed;
const newSpan = document.createElement('span');
const newSpanContent = document.createTextNode(" / " + rows.length);
newSpan.appendChild(newSpanContent);
completedTag.appendChild(newSpan);


const closeToastBtn = document.getElementsByClassName('close-toast');
const toasts = document.getElementsByClassName('error');

for(let i = 0; i < toasts.length; i++){
	closeToastBtn[i].addEventListener('click',function(){
		toasts[i].style.height = 0;
		toasts[i].style.padding = 0;
		toasts[i].style.margin = 0;
	});
}

//[0].innerHTML = `/ ${rows.length}`;

// document.getElementById('close').addEventListener('click', function(){
// 	document.querySelector('.modal').style.display = "none";
// 	document.querySelector('.edit-modal').style.display = "none";
// });

// document.getElementById('cancel').addEventListener('click', function(){
// 	document.querySelector('.modal').style.display = "none";
// 	document.querySelector('.delete-modal').style.display = "none";
// });


