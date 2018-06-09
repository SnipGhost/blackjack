<div class="content-box-opi">
	<div class="content-box-title">
		РЕМ	
	</div>
	<div class="content-box-semititle">
			Репутационный менеджмент
	</div>	
	<div>
	Мелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснение
	</div>
</div>
<div class="content-box">
	Один из первых алгоритмов эффективного кодирования информации был предложен Д. А. Хаффманом в 1952 году. Идея алгоритма состоит в следующем: зная вероятности символов в сообщении, можно описать процедуру построения кодов переменной длины, состоящих из целого количества битов. Символам с большей вероятностью ставятся в соответствие более короткие коды. Коды Хаффмана обладают свойством префиксности (то есть ни одно кодовое слово не является префиксом другого), что позволяет однозначно их декодировать.<br>
	Классический алгоритм Хаффмана на входе получает таблицу частот встречаемости символов в сообщении. Далее на основании этой таблицы строится дерево кодирования Хаффмана (Н-дерево).<br>
	<br>
	<ol>
    	<li>Символы входного алфавита образуют список свободных узлов. Каждый лист имеет вес, который может быть равен либо вероятности, либо количеству вхождений символа в сжимаемое сообщение.</li>
    	<li>Выбираются два свободных узла дерева с наименьшими весами.</li>
    	<li>Создается их родитель с весом, равным их суммарному весу.</li>
    	<li>Родитель добавляется в список свободных узлов, а два его потомка удаляются из этого списка.</li>
    	<li>Одной дуге, выходящей из родителя, ставится в соответствие бит 1, другой — бит 0. Битовые значения ветвей, исходящих от корня, не зависят от весов потомков.</li>
    	<li>Шаги, начиная со второго, повторяются до тех пор, пока в списке свободных узлов не останется только один свободный узел. Он и будет считаться корнем дерева.</li>
	<ol>
</div>	