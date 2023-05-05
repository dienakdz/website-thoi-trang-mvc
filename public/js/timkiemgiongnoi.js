const searchForm = document.querySelector("#search-form");
const searchFormInput = searchForm.querySelector("input"); // <=> document.querySelector("#search-form input");

const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

if(SpeechRecognition){
	console.log("Your brower supports speech Recognition");

	searchForm.insertAdjacentHTML("beforeend", '<button onclick="micBtnClick()" type="button" class="button_microphone"><i class="fas fa-microphone"></i></button>');
	const micBtn = searchForm.querySelector("button");
	const micIcon = searchForm.querySelector("i");

	const recognition = new SpeechRecognition();
	recognition.continuous = true;
	recognition.lang = "vi-VN";
	// micBtn.addEventListener("click", micBtnClick);


	function micBtnClick(){
		// // recognition.start();
		// alert(micIcon);

		if (micIcon.classList.contains("fa-microphone")){
			recognition.start();
		} 
		else{ //stop
			recognition.stop();
		}

	}

	recognition.addEventListener("start", startSpeechRecognition);
	function startSpeechRecognition(){
		micIcon.classList.remove("fa-microphone");
		micIcon.classList.add("fa-microphone-slash");
		searchFormInput.focus();
		console.log("Speech Recognition Active");
	}

	recognition.addEventListener("end", endSpeechRecognition);
	function endSpeechRecognition(){
		micIcon.classList.remove("fa-microphone-slash");
		micIcon.classList.add("fa-microphone");
		searchFormInput.focus();
		console.log("Speech Recognition Disconnected");
	}
	recognition.addEventListener("result", resultOfSpeechRecognition);
	function resultOfSpeechRecognition(event){
		const transcript = event.results[0][0].transcript;
		searchFormInput.value = transcript;
		setTimeout(() => {
			searchForm.submit();
			},750)
	}
}
else{
	console.log("Your browser dose not  support speech recognition");
}