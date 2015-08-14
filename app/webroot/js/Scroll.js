$(document).ready(function() {
	$('.scroll').jscroll({
	    loadingHtml: '<img src="/app/webroot/img/loading.gif" alt="Loading" width="75" height="75"/> Carregando...',
        autoTriggerUntil: 3
	});
});