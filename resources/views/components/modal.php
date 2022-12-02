<div class="modal <?=$isModal == true ? 'active' : '' ?>">
	  <div class="modal_container">
		 <div class="modal_header">
			 <h3 class="title"><?=$titleModal ?? '' ?> </h3>
			 <a href="<?=$url?>" class="btn-close_modal">
				 <span ><i class="far fa-times-circle"></i></span>
			 </a>
		 </div>
		 <div class="modal_body">
			 <p class="content"><?=$contentModal?><?=$icon?></p>
			 <div class="modal-controller">
			    <a href="<?=$url?>" class='modal-btn'>ok</a>
			 </div>
		 </div>
	 </div>
</div>
