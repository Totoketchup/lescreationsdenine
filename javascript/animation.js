(function($){

//On Click
$('.close').click(function(e){
	e.preventDefault();
	e.stopPropagation();

	$('.alert-gone').velocity({
		translateY:[-300,0],
		opacity: [0,1]
	},{
		duration: 800,
		display:"none"
	}
	);
})


})(jQuery);