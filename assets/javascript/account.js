const closeToastBtn = document.getElementsByClassName('close-toast');
const toasts = document.getElementsByClassName('error');

for(let i = 0; i < toasts.length; i++){
	closeToastBtn[i].addEventListener('click',function(){
		toasts[i].style.height = 0;
		toasts[i].style.padding = 0;
		toasts[i].style.margin = 0;
	});
}