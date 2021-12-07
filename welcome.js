//fill textbox with username stored in cookie
window.onload = function(){
    document.getElementById('username').value = get_username(document.cookie);
}

function enter_username(){
  const userText = document.getElementById('username');
  const valid = /^[0-9a-zA-Z!@#$%^&*()_+\-=\[\]{}':"\\|`~.<>\/?]+$/;
  let alertMsg = [];
  
  //check length:  
  if (userText.value.length < 5){
  alertMsg.push('Username must be 5 characters or longer.\n');
  }
  if (userText.value.length > 40){
  alertMsg.push('Username cannot be longer than 40 characters.\n');
  }
  
  //check space, comma, semicolon
  if(userText.value.indexOf(' ') >= 0){
  	alertMsg.push('Username cannot contain spaces.\n');
  }
  if(userText.value.indexOf(',') >= 0){
  	alertMsg.push('Username cannot contain commas.\n');
  }
  if(userText.value.indexOf(';') >= 0){
  	alertMsg.push('Username cannot contain semicolons.\n');
  }
  //alert 
  if(alertMsg.length > 0){
      alert(`${alertMsg.join('')}`);
      }
  //alert if weird characters
  if(userText.value.match(valid)===null && alertMsg.length === 0){
    	alert("Username can only use characters from the following string: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{}:\'|`~<.>/?");
    }

  //if valid username: create cookie and redirection
  else if (userText.value.match(valid)!==null && alertMsg.length === 0){
    document.cookie = `username = ${userText.value}; expires=${future_hour()}`;
    cookie = document.cookie;
    window.location.href = 'shut_the_box.php';
  }
}

//hour expiration
function future_hour() {
    let future_hour = new Date();
    future_hour.setMinutes(future_hour.getMinutes()+60);
    return future_hour.toUTCString();
}
