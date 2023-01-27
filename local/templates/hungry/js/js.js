let $btnTop = $(".bottom_btn");
let $btnBookTop = $(".book_table");
let $htmlBody = $("html, body");
let $explore = $(".explore");
/*let eevent = $(".event_one");
let eeventt = $(".event_two");*/
let new_form = $(".new_form");
let form = $(".form");

$(document).ready(function(){

	$(document).on('click', '.load-more-items', function(){

		let targetContainer = $('.items-list'),
			url =  $('.load-more-items').attr('data-url');

		if (url !== undefined) {
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data){

					$('.load-more-items').remove();

					let elements = $(data).find('.item-content'),
						pagination = $(data).find('.load-more-items');

					targetContainer.append(elements);
					$('#pag').append(pagination);

				}
			});
		}

	});

});

$btnTop.on("click", function(){
	$htmlBody.animate({scrollTop:4000}, 1500)
});

$btnBookTop.on("click", function(){
	$htmlBody.animate({scrollTop:2400}, 1000)
});

$explore.on("click", function(){
	location.href = 'http://.ru';
});

let allerrors = function(text){
	let error = $("div")
	error.className = "error"
	error.innerHTML = text
		$(".error").css({
			"color": "red",
			"font-family": "Arial",
			"transition": ".5s"

		});
		return error

}

form.click(function(event){
	event.preventDefault();
	let nec = $(".necessarily")

	for (let i = 0; i < nec.length; i++) {
		if (!nec[i].value) {
			let all = allerrors("Обязательное поле не заполнено")
			form[i].parentElement.insertBefore(all, nec[i])
		}
	}
});

new_form.click(function(event){
	event.preventDefault();
	let nec = $(".necessarily")

	for (let i = 0; i < nec.length; i++) {
		if (!nec[i].value) {
			let another = allerrors("Обязательное поле не заполнено")
			new_form[i].parentElement.insertBefore(another, nec[i])
		}
	}

});
