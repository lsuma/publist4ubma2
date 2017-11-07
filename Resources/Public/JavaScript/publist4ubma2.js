$.expr[":"].contains = $.expr.createPseudo(function(arg) {
	return function(elem) {
		return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
	};
});

$(document).ready(function() {
	var updatePublist4Ubma2 = function(content, searchWord) {
		searchWord = searchWord.replace(/'/, '');
		$(this).find('li').addClass('hidden').filter(":contains('" + searchWord + "')").removeClass('hidden');
	};
	$('.publist4ubma2-filter').on('keyup', function() {
		updateFilter($('#' + $(this).attr('data-publist-content')), $(this).val());
	});
});