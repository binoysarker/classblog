$(document).ready(function() {

	$(document).on('click', '.ourItem', function(event) {
			var textName = $(this).find('#student_name').text();
			var textClass = $(this).find('#student_class').text();
			var textRoll = $(this).find('#student_roll').text();
			var textResult = $(this).find('#student_result').text();
			var id = $(this).find('#Itemid').val();
			// putting the text in the table to the modal input
			$('#addId').val(id);
			$('#addName').val(textName);
			$('#addResult').val(textResult);
			// getting the value and put it in the placeholder for number input type

			$('#addClass').val(textClass);
			$('#addClass').attr("placeholder",textClass);
			
			$('#addRoll').val(textRoll);
			$('#addRoll').attr("placeholder",textRoll);

			// for changing the title of the text
			$('#title').text('Edit Item');
			// to display the delete and save changes button 
			$('#delete').show();
			$('#save-changes').show();
			$('#addButton').hide();
			
	});

	// Now coding for the problem with the addNew button

	$('.ourItem').each(function(){
		$(document).on('click', '#addNew', function(event) {
			
			/* Act on the event */
			// making empty value of the input form
			// putting the text in the table to the modal input
			$('#addName').val("");
			$('#addResult').val("");
			// getting the value and put it in the placeholder for number input type

			$('#addClass').val("");
			$('#addClass').attr("placeholder","Student Class");
			
			$('#addRoll').val("");
			$('#addRoll').attr("placeholder","Student Roll");
			// for changing the title of the text
			$('#title').text('Add New Item');
			// to display the delete and save changes button 
			$('#delete').hide();
			$('#save-changes').hide();
			$('#addButton').show();
		});
			
	});

	// Now to get the data from the field after clicking the addButton

	$('#addButton').click(function(){
		var student_name = $('#addName').val();
		var student_class = $('#addClass').val();
		var student_roll = $('#addRoll').val();
		var student_result = $('#addResult').val();
		var token = $('input[name=_token]').val();

		

		// Now for posting the data to route
		$.post('/msys/list', {
			'student_name': student_name,
			'student_class': student_class,
			'student_roll': student_roll,
			'student_result': student_result,
			'_token': token

		}, function(data) {
			/*optional stuff to do after success */
			
			$('#divreload').load(location.href + ' #divreload');
		});

	});
	
	// Now for the delete part 
	$('#delete').click(function(){
		var getId = $('#addId').val();
		var token = $('input[name=_token]').val();
		$.post('/msys/delete', {
			'id': getId,
			'_token' : token
		}, function(data) {
			/*optional stuff to do after success */
			
			$('#divreload').load(location.herf + '#divreload');
		});
	});

	// new heading section
	function loopAnimate() {
		var windowWidth = $(window).width();
		var textlength = $('#caption span').text().length;
		var getlength = windowWidth - textlength;
		$('#caption span')
			.animate({'margin-left': '+='+getlength}, 8000)
			.animate({'opacity': '0'})
			.animate({'margin-left': '-='+getlength}, 100)
			.animate({'opacity': '1'},loopAnimate);
			
	}

	loopAnimate();
});

