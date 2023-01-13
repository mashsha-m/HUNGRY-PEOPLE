let $btnTop = $(".bottom_btn");
		$btnTop.on("click", function(){
			$("html, body").animate({scrollTop:4000}, 1500)
		});

let $btnBookTop = $(".book_table");
		$btnBookTop.on("click", function(){
			$("html, body").animate({scrollTop:2400}, 1000)
		});

let $explore = $(".explore");
$explore.on("click", function(){
	location.href = 'http://.ru';
});

let eevent = document.querySelector(".event_one");
let eeventt = document.querySelector(".event_two");

let form = document.querySelector(".form");
let new_form = document.querySelector(".new_form");

	let allerrors = function(text){
		let error = document.createElement("div")
		error.className = "error"
		error.innerHTML = text
			$(".error").css({
				"color": "red",
				"font-family": "Arial",
				"transition": ".5s"

			});
			return error

	}

form.addEventListener("submit", function(event){
	event.preventDefault();
let nec = document.querySelectorAll(".necessarily");


	for (var i = 0; i < nec.length; i++) {
		if (!nec[i].value) {
			let all = allerrors("Обязательное поле не заполнено")
			form[i].parentElement.insertBefore(all, nec[i])
			
		}
	}
});
new_form.addEventListener("submit", function(event){
	event.preventDefault();
let nec = document.querySelectorAll(".necessarily");

	for (var i = 0; i < nec.length; i++) {
		if (!nec[i].value) {
			let another = allerrors("Обязательное поле не заполнено")
			new_form[i].parentElement.insertBefore(another, nec[i])
		}
	}

});