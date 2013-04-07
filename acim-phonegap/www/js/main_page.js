var serviceURL = "http://localhost/acim-phonegap/services/";

$(document).on('pageinit', function(){

	  window.q_string = location.search;

	  getBookTitle();

});

function getBookTitle() {

	$.post(serviceURL + 'main_page.php'+q_string+"&p_book_title=1", function(data) {
       
	   var res = data.split("#*@@*#");
	   
	   $("#p_booktitle").html(res[0]);
       $('#chp_list').append(res[1]);
	   GetDocReady();
    }); 
}

function GetDocReady(){
	var con_area_height = (($(".content").height()*75)/100);
	$("#ch_content").css("height", con_area_height);
	$("#ch_content").css("overflow", "hidden");
	
	        $("#next_con").click(function(){
			   var h_content=$("#ch_content").height();
			   var mt_content=$("#ch_inner_content").css('margin-top');
			   var mt_content=mt_content.substring(0,mt_content.length - 2);
			   var inner_area_height=$("#ch_inner_content").height();
			   var inner_top = (parseInt(h_content) + parseInt(Math.abs(mt_content)));
			   if(inner_area_height > inner_top){
			     $("#ch_inner_content").animate({'margin-top':'-'+inner_top+'px'},0);
			   } else {
			      alert('This is a last page');
			   }
			});
			
			$("#pre_con").click(function(){
			   var h_content=$("#ch_content").height();
			   var mt_content=$("#ch_inner_content").css('margin-top');
			   var mt_content=mt_content.substring(0,mt_content.length - 2);
			   var inner_area_height=$("#ch_inner_content").height();
			   var inner_top = (parseInt(Math.abs(mt_content)) - parseInt(h_content));
			   if(inner_top >= 0){
			     $("#ch_inner_content").animate({'margin-top':'-'+inner_top+'px'},0);
			   } else {
			      alert('This is a first page');
			   }
			});
}