
var cur_rec = 0; // Текущий слайд. Начинаем с 0
var max_num = 0; // Общее число слайдов. Заполнится автоматически

var wrapid = 'test-wrapper'; // Содержащий слайды блок
var prefix = 'cand-';        // Префикс ID слайда

document.addEventListener('DOMContentLoaded', function () {
	max_num = document.getElementById(wrapid).childElementCount - 1;
	console.log(max_num);
});

function nextCand() {
	if (cur_rec < max_num) {
		document.getElementById(prefix + cur_rec.toString()).style.display = "none";
		cur_rec++;
		document.getElementById(prefix + cur_rec.toString()).style.display = "block";
	}
}

function lastCand() {
	if (cur_rec > 0) {
		document.getElementById(prefix + cur_rec.toString()).style.display = "none";
		cur_rec--;
		document.getElementById(prefix + cur_rec.toString()).style.display = "block";
	}
}