<nav>
	<div class="text-center">
		<ul class="pagination" style=center>
			<?php 

			if($current > 1) {
				?>
				<li>
					<a href=<?php ?> aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				<?php
			}
			for ($i=1; $i <= $nbPages; $i++) { 

				if ($i == $current) {
					?>
					<li class="active"><a href="#"><?php echo $i?></a></li>
					<?php
				} else {
					?>
					<li><a href=<?php echo $url."?page=".$i."&epp=".$epp ?> ><?php echo $i?></a></li>
					<?php
				}
			}
			if($current<$nbPages){
				?>
				<li>
					<a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
				<?php
			}
			?>

		</ul>
	</div>
</nav>
</div>