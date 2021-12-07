let box_score = 45;
let dice_roll = null;

const btnRollDice = document.getElementById('rolldice');
const showResult = document.getElementById('diceresult');
const boxArr = [];
const boxNums = document.getElementsByTagName('td');
const checkBoxes = document.getElementsByTagName('input');
const btnSubmit = document.getElementById('submitbox');
const btnFinish = document.getElementById('giveup');

window.onload = function() {
	btnSubmit.disabled = true;
  
  for (let i=0; i<9; ++i){
  const checkBox = checkBoxes[i];
  const numCheck = boxNums[i];
  
  numCheck.addEventListener('click', function(){
  	checkBox.checked = !checkBox.checked;
  });
  }
}

btnRollDice.addEventListener('click', roll_dice)

function roll_dice() {
	btnRollDice.disabled = true;
  
  let randomRoll1 = Math.floor(1 + 6 * Math.random());
  let randomRoll2 = Math.floor(1 + 6 * Math.random());
  
  dice_roll = randomRoll1 + randomRoll2;
  console.log(`Dice Roll: ${dice_roll}`);
  
  showResult.innerHTML = `${randomRoll1} + ${randomRoll2} = ${randomRoll1+randomRoll2}`;
  
  btnSubmit.disabled = false;
}



btnSubmit.addEventListener('click', sum_checked_values);

function sum_checked_values() {
  let checkTotal = 0;
    for (let i = 0; i < 9; ++i) {
      const checkbox = checkBoxes[i];

      if (checkbox.checked) {
        checkTotal = checkTotal + (i + 1);
      }
    }
  return checkTotal;
}



btnSubmit.addEventListener('click', check_submission);

function check_submission() {
	if (sum_checked_values() !== dice_roll) {
  	alert("The total of the boxes you selected does not match the dice roll. \nPlease make another selection and try again.");
  }
  else if (sum_checked_values() === dice_roll) {
      
    for (let i = 0; i < 9; ++i) {
      const checkbox = checkBoxes[i];
      const numCheck = boxNums[i];

      if (checkbox.checked) {
        checkbox.disabled = !checkbox.disabled;
        boxArr.push(i+1);
        checkbox.checked = false; 
        
        const new_num = numCheck.cloneNode(true);
				numCheck.parentNode.replaceChild(new_num, numCheck);
        boxNums[i].className = 'selected';
    }
   }
  console.log(`Box Array: ${boxArr}`);
  showResult.innerHTML = "";
  btnSubmit.disabled = true;
  btnRollDice.disabled = false;
	}
  let total = 0;
  for (let i in boxArr){
  	total += boxArr[i];
  }
  if ((box_score-total) <= 6){
  	btnRollDice.addEventListener('click', roll_die);
  }
  if (box_score-total === 0) {
    alert("Congrats! You have Shut the Box!!");
    const user = get_username(document.cookie);
    const request = new XMLHttpRequest();

    request.onload = function() {
      if (this.status === 200) {
        window.location = 'scores.php';
      }
    };

  request.open('POST', 'score.php'); //method post, url where to make request
  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');//notify use query string syntax
  request.send(`username=${user}&score=0`);//send username and score, executes quickly(separate thread)
  }
}


function roll_die() {
	dice_roll = Math.floor(1 + 6 * Math.random());
  console.log(`Single Die Roll: ${dice_roll}`);
  
  showResult.innerHTML = `${dice_roll}`;
  
  btnSubmit.disabled = false;
}


btnFinish.addEventListener('click', finish);

function finish(){
	let total2 = 0;
  for (let i in boxArr){
  	total2 += boxArr[i];
  }
  final_score = box_score - total2;
	alert(`Your Score is ${final_score}`);
  btnRollDice.disabled = false;

  const user = get_username(document.cookie);
  const request = new XMLHttpRequest();

  request.onload = function() {
    if (this.status === 200) {
      window.location = 'scores.php';
    }
  };

  request.open('POST', 'score.php'); //method post, url where to make request
  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');//notify use query string syntax
  request.send(`username=${user}&score=${final_score}`);//send username and score, executes quickly(separate thread)
  }