package main

const (
	quizHeadFmt = `
	<form class="test-block" action="" method="POST">
	`
	quizEndFmt = `
		<button class="test-button noselect">Анализ</button>

	</form>
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
