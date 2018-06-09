package main

const (
	maxCand     = 5
	quizHeadFmt = `
	<form id="test-wrapper" class="test-block" action="" method="POST">
	`
	quizEndFmt = `
	</form>
	`
	candHeadFmt = `
		<div id="cand-%d" class="cand-form">
	`
	candEndFmt = `
		</div>
	`
	quizNextBtn = `
			<div class="test-button noselect" onClick="nextCand();">Следующий кандидат</div>
	`
	quizSubmitBtn = `
			<button class="test-button noselect">Анализ</button>
	`
	questionHeadFmt = `
			<div class="radio-block">
				<div class="name-block">%s</div>`
	questionDescFmt = `
				<div class="minitext">(%s)</div>`
	questionEndFmt = `
			</div>
	`
	answerFmt = `
				<div class="inblock-string">
					<input type="radio" id="qrb-%s" name="aspt[%d][%d]" value="%s">
					<label for="qrb-%s">
						%s
					</label>
				</div><br>`
)
