<div style="margin-top:1em">
	<?php for($i=1;$i<=$total_page;$i++){ ?>
		<a style="color: darkturquoise;border: 1px solid;margin: 3px;padding: 1px;" href="?page=<?php echo $i ?>&search=<?php echo $search ?>">
			<?php  echo $i; ?>	
		</a>			
	<?php	} ?>
</div>	