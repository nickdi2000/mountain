<style>
#mountain {
  display: flex;
  justify-content: center;
	width:100%;

}
</style>

		<h1 class="animated tdFadeInDown">
			Mountain Climber
		</h1>

			<div class="subheading animated tdStampIn">
				<i class="fas fa-flag-checkered fa-2x"></i> <br/>

				Race up the Hamilton mountain. <br/>
				See how you rank against other racers.
				<div id="mountain">
					<? $this->load->view('animations/mountain'); ?>
				</div>

				<br/>
				<br/>
			</div>
