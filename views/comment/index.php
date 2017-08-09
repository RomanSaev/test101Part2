<main>
	<section class='content'>
		<?php foreach ($comments as $comment_item): 
		echo '<section class="commentContainer">';
			echo '<div class="commentText" value='.$comment_item['id'].'>';?>
			<?php echo $comment_item['text']; ?>	
			</div>
			<button class='deleteComment'> Удалить </button>
		</section>
		<?php endforeach; ?>
	</section>
	<section class='formSection'>
		<header class='titleForm'>Форма добавления комментария</header>
		<form class='addForm'>
			<textarea id='text' class="textArea" placeholder="Ваш комментарий" ></textarea><br />
			<input type="submit" name='submit' class='addComment' value='Добавить комментарий'/>
		</form>
	</section>
</main>