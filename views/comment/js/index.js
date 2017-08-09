$(document).ready(function(){
	function onDeleteComment(){
		var idComment = $(this).siblings('.commentText').attr('value');
		$.ajax({
			type:'POST',
			url: '/testapp/index.php/comment/delete',
			data: {id : idComment},
			dataType: 'json',
			success: function(result){
				$('.commentText[value="'+idComment+'"]').parent('.commentContainer').remove();
			}
		});
	}

	function onAddComment(event){
		event.preventDefault();
		var commentText = $('.textArea').val();

		if (commentText==''){ //проверка поля формы
			alert('Текст комментария не может быть пустым');
			return false;	
		}

		$.ajax({
			type:'POST',
			url: '/testapp/index.php/comment/create',
			data: {text : commentText},
			dataType: 'json',
			success: function(result){
				$('.content').append('<section class="commentContainer"><div class="commentText" value='+result.id+'>'+ result.text +'</div> <button class="deleteComment"> удалить </button></section>');
				$('.commentText[value='+result.id+']').siblings('.deleteComment').click(onDeleteComment); //присваиваем event onclick новой кнопке .deleteCommen
			}
		});
	}

	$('.addComment').click(onAddComment);
	$('.deleteComment').click(onDeleteComment);
});