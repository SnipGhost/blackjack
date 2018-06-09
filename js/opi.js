
var cur_rec = 0; // Текущий слайд. Начинаем с 0
var max_num = 0; // Общее число слайдов. Заполнится автоматически

var wrap = 'test-wrapper'; // Содержащий слайды
var prefix = 'cand-';      // Префикс ID слайда

document.addEventListener('DOMContentLoaded', function () {
	max_num = document.getElementById(wrap).childElementCount - 1;
	console.log(max_num);
});

function nextCand() {
	document.getElementById(prefix + cur_rec.toString()).style.display = "none";
	cur_rec++;
	//console.log(cur_rec);
	var element = document.getElementById(prefix + cur_rec.toString());
	if (!element) {
		cur_rec = 0;
		//console.log("UPS:", cur_rec);
		document.getElementById(prefix + cur_rec.toString()).style.display = "block";
	}
	else element.style.display = "block";
}

// function lastCand() {
// 	if (cur_rec == 1) {
// 		document.getElementById('edit-form-1').style.display = "none";
// 		cur_rec = max_num;
// 		document.getElementById(prefix + cur_rec.toString()).style.display = "block";
// 		return;
// 	}
// 	if (cur_rec == 0) {
// 		document.getElementById('edit-form-newrec').style.display = "none";
// 		cur_rec = 1;
// 	} else {
// 		document.getElementById(prefix + cur_rec.toString()).style.display = "none";
// 		cur_rec--;
// 	}
// 	document.getElementById(prefix + cur_rec.toString()).style.display = "block";
// }