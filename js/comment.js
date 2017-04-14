$(document).ready(function(){
		
		readProducts();

		$("#btn-comment").click(function (e){
			e.preventDefault();
	var data = $("#comment-box").serialize();
	$.ajax({
		type:'POST',
		url:'comment.php',
		data:data,
		success:function(msg1){
			
			$("#comment-box").val('');	
			$('#read-comments').load('read_comments.php');
		}
	});
	return false;
});
		
		
	});
	function readProducts(){
		$('#read-comments').load('read_comments.php');	
	}