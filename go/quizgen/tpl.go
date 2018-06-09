package main

const (
	maxCand     = 5 // Максимальное число кандидатов
	quizHeadFmt = `
	<form id="test-wrapper" class="test-block" action="" method="POST">
	`
	candHeadFmt = `
		<div id="cand-%d" class="cand-form">
	`
	questionHeadFmt = `
			<div class="radio-block">
				<div class="name-block">%s</div>`
	questionDescFmt = `
				<div class="minitext">(%s)</div>`
	answerFmt = `
				<div class="inblock-string">
					<input type="radio" id="qrb-%s" name="aspt[%d][%d]" value="%s">
					<label for="qrb-%s">
						%s
					</label>
				</div><br>`
	questionEndFmt = `
			</div>
	`
	quizNextBtn = `
			<div class="test-button noselect" onClick="nextCand();">Следующий кандидат (%d)</div>
	`
	quizLastBtn = `
			<div class="test-button noselect" onClick="lastCand();">Предыдущий кандидат (%d)</div>
	`
	quizSubmitBtn = `
			<button class="test-button noselect">Анализ</button>
	`
	candEndFmt = `
		</div>
	`
	quizEndFmt = `
	</form>
	`
)
