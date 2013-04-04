var serviceURL = "http://thelaunchengine.com/acim/demo/services/";



$(document).on('pageinit', function(){

	  window.q_string = location.search;

	  getBookTitle();

});

function getBookTitle() {

	$.post(serviceURL + 'main_page.php'+q_string+"&p_book_title=1", function(data) {

	   $("#p_booktitle").html(data);

    });

	

	$.post(serviceURL + 'main_page.php'+q_string+"&p_ch_list=1", function(data) {

	   $('#chp_list').append(data);

    });

}