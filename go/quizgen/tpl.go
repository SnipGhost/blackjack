package main

const (
	maxCand     = 5 // Максимальное число кандидатов
	quizHeadFmt = `
	<form id="test-wrapper" class="test-block" action="%s" method="POST">
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
	answerFmtSelectBeg = `
				<select name="aspt[%d][%d]">`
	answerFmtOption = `
					<option value="%s">%s</option>`
	answerFmtSelectEnd = `
				</select>`
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
