window.setTimeout(function() {
    $(".alert").delay(4000, function() {
    	$(this).alert('close');
	});
}, 4000);
