<style>
#mountain {
  display: flex;
  justify-content: center;
	width:100%;
	padding:15px;

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

				<div class="button-group">
					<a href="/race/start" class="btn btn-success btn-lg"><i class="fas fa-stopwatch"></i> RACE! </a>
					<br/><br/>
					<a href="/leaderboard" class="btn btn-warning btn-sm"><i class="fas fa-list-ol"></i>  View Leaderboard</a>
				</div>



			</div>

			<? $this->load->view('brand'); ?>
