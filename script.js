function checkUsername()
{
	x = document.getElementById('uname');
	sub = document.getElementById('sub');
	var letters = /^[a-zA-Z.]+$/;
	if(!x.value.match(letters)){
		x.style.borderColor='red';
		return 0;
	}
	else{
		x.style.borderColor='#cdd3d9';
		return 1;
	}
}


function checkPass()
{
	x = document.getElementById('upass');
	sub = document.getElementById('sub');
	length = x.value.length;
	if(x.value == '')
	{
		return 0;
	}
	
	if(length>8 || length<6){
		x.style.borderColor='red';
		return 0;
	}
	else{
		x.style.borderColor='#cdd3d9';
		return 1;
	}
}

function validate()
{
	user = checkUsername();
	pass = checkPass();
	
	if(user == 1 && pass == 1)
	{
		sub.removeAttribute('disabled');
	}
	else{
		sub.setAttribute('disabled','');
	}
	
	
}


function checkUsername()
{
	x = document.getElementById('uname');
	sub = document.getElementById('sub');
	var letters = /^[a-zA-Z.]+$/;
	if(!x.value.match(letters)){
		x.style.borderColor='red';
		sub.setAttribute('disabled','');
		return 0;
	}
	else{
		x.style.borderColor='#cdd3d9';
		sub.removeAttribute('disabled');
		return 1;
	}
}

