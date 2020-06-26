let me = {}
me.user_logo = '<div class="chatbot">' + '<div class="user_logo">' + '<img src="https://img.icons8.com/plasticine/2x/user.png" width="65px" height="55px" alt="">';
let questionNum = 0;
let mt = '<strong>BOT:</strong><br>';
let divr = '<div class="request">' + me.user_logo;
let divi = '</div>' 												// keep count of question, used for IF condition.
let question = 'What is your id?';				  // first question


let output = document.getElementById('chatbot');                // store id="output" in output variable
output.innerHTML = question;

let mes = document.getElementById('user');



// ouput first question

function bot() {
    let input = document.getElementById("messages").value;
    console.log(input);

    if (questionNum === 0) {
        mes.innerHTML = divr  + input + divi + divi;// output response
        document.getElementById("messages").value = "";   		// clear text box
        question = 'how old are you?';			    	// load next question
        setTimeout(timedQuestion, 100);									// output next question after 2sec delay
    }

    else if (questionNum === 1) {
        mes.innerHTML = divr+ input +divi;
        document.getElementById("messages").value = "";
        question = 'where are you from?';
        setTimeout(timedQuestion, 100);
    }
    else if (questionNum === 2) {
        mes.innerHTML = divr +  input+divi;
        document.getElementById("messages").value = "";
        question = 'is that good?';
        setTimeout(timedQuestion, 100);
    }
    else if (questionNum === 3) {
        mes.innerHTML = divr +  input+divi;
        document.getElementById("messages").value = "";
        question = 'great';
        setTimeout(timedQuestion, 100);
    }
    else if (questionNum === 4) {
        mes.innerHTML = divr +  input+divi;
        document.getElementById("messages").value = "";
        question = 'finish';
        setTimeout(timedQuestion, 100);
    }
}

function timedQuestion() {
    output.innerHTML = question;
}

//push enter key (using jquery), to run bot function.
//push enter key (using jquery), to run bot function.
$(document).keypress(function(e) {
    if (e.which === 13) {
        bot();                                                                                      // run bot function when enter key pressed
        questionNum++;                                                                      // increase questionNum count by 1
    }
    $(document).find('#chatBox').append(html);
    $(this).val('');
});

console.log('test')