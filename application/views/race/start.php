<style>

#clock{
	text-align: center;
	margin: auto;

}

.time{
	font-size: 3em;
}

.btn-xlarge {
    padding: 18px 28px;
    font-size: 3em;
    line-height: normal;
    font-family: 'Patua One', cursive;
    -webkit-border-radius: 8px;
       -moz-border-radius: 8px;
            border-radius: 8px;
}

.initials{
		font-size:4em;
		text-transform: uppercase;
		font-family: "arcade";
		width: 200px;
}

#session_info{
	text-transform: uppercase;
	font-size: 0.7em;
	line-height: 11px;
	color: gray;
}



</style>

<div id="clock">
	<span v-if="racerData.id > 0" id="session_info">
			DISTANCE TO FINISH: {{distance}} |
			SESSION ID: {{racerData.racer_id}} | RACER: {{racerData.initials}} | STATUS: {{racerData.status}}<br/>
			Start Time: {{timeBegan}}
	</span>
	<br>

  <i class="fas fa-clock fa-6x animated tdFadeInDown" style="animation-duration: 1.4s;"></i><br />
  <br />

	<div class="finished alert alert-success" v-if="racerData.status == 'finished'">
			<i class="fas fa-flag-checkered fa-2x"></i><br/>
				<h1>Finished!</h1>
				<h4 class="animated tdSwingIn"><span class="badge badge-light">Your Time: {{racerData.duration}}</span> </h4>
				<a href="/leaderboard">
				<h2 class="animated tdSwingIn" style="animation-delay: 0.3s;"><span class="badge badge-primary">Check Your Rank <i class="fas fa-sign-out-alt"></i></span> </h2>
				</a>
	</div>




<span v-if="racerData.status != 'finished'">

<div class="select-race" v-if="!locationConfirmed">
		<div>
			<button v-if="races && current_race_id" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapser" aria-expanded="false" aria-controls="collapseExample">
		    <i class="fas fa-caret-right"></i> &nbsp; {{getRaceName}}
		  </button>

		</div>
		<div class="collapse" id="collapser">
		  <div class="card card-body">
				<small>Select a different race:</small>
				<template v-for="race in races">
					<button class="btn btn-warning btn-block" @click="setRace(race.id)">{{race.name}}</button>
				</template>
		  </div>
		</div>
</div>

<hr/>

  <div class="alert alert-dark animated tdFadeInUp" style="animation-duration: 1.2s;" v-if="first">

  	<i class="fas fa-info-circle"></i>
  	Before you can start, we will need to verify your location via GPS.
		<br/>Make sure you have location enabled on your device.
  </div>

  <div class="locationDiv" v-if="first">
  	<button class="btn btn-info btn-lg" v-on:click="verifyUserLocation"><i class="fas fa-map-marker-alt"></i> Confirm My Starting Point</button>
  </div>



  <div class="spinner-border text-primary" role="status" v-if="loading">
	  <span class="sr-only">Loading...</span>
  </div>

  <div class="alert" v-if="locationDisplay" >
  	<div class="alert alert-success animated tdExpandIn" v-if="locationConfirmed"><i class='fas fa-check-circle'></i>
			<br><h2>Location Verified!</h2>
						<button class="btn btn-light btn-sm" type="button" data-toggle="collapse" data-target="#learnMore" aria-expanded="false" aria-controls="learnMore">
							<i class="far fa-lightbulb"></i> &nbsp;Tip...
						</button>
						<div class="collapse" id="learnMore">
							<div class="card card-body">
								<span v-html="alertMessage" style="text-align:left;"></span>
							</div>
						</div>

		</div>
  	<div class="animated tdExpandIn" v-if="distance > targetRadius">

			<div class="alert alert-danger">
				<h2><i class="fas fa-exclamation-triangle"></i> Oops, location invalid.</h2>
				<p>Looks like you are {{distance.toFixed(2)}} feet away from the starting point.</p>
					<a class="btn btn-primary" v-bind:href="'http://www.google.com/maps/place/' + raceData.starting_lat + ',' + raceData.starting_lon">View on Map <i class="fas fa-external-link-square-alt"></i></a>
			</div>


		</div>
  	<br/>

  	<a v-if="!locationConfirmed" class="btn btn-light" href="/race/start">Try Again</a>

		<div v-else class="center">
			<small>Enter Name or Initials</small><br/>
			<input class="initials center" v-on:keyup.enter="get_ready" v-model="racerData.initials" name="initials" id="initials" maxlength="5" @keydown="preventSpecial($event)" placeholder="ABC">
			<p class="text-danger" v-if="name_error">Please enter initials or a name (max 5 characters)</p>
			<br/> <br/>
  		<button class="btn btn-primary btn-lg" v-on:click="get_ready">Continue <i class="fas fa-arrow-circle-right"></i></button>
		</div>
  </div>

  <div v-if="ready">
			<button class="btn btn-sm" type="button" data-toggle="collapse" data-target="#learnMore" aria-expanded="false" aria-controls="learnMore">
				<i class="far fa-lightbulb"></i> &nbsp;Tip...
			</button><br/>
			<div class="collapse" id="learnMore">
				<div class="card card-body">
					Start when you're ready to go!  If you start by accident, or need to reset, you may do so -- but the reset button will not be available once you leave the starting zone.
					<br/>Hit stop when you are at the finish line.  You won't be able to hit stop before you are in the finish line zone. (keep location enabled).<br/>
				</div>
			</div>

		  <span class="time">{{hour}}:{{min}}:{{sec}}:{{ms}}</span>
		  <div class="btn-container">
			<a id="start" class="btn btn-success btn-xlarge" v-on:click="start" v-if="racerData.status != 'running'"><i class="far fa-play-circle"></i> Start</a>
			<a id="stop" class="btn btn-danger btn-xlarge" v-on:click="stop" v-else><i class="fas fa-flag-checkered"></i><br>Stop</a>
			<br>
			<br/>
			<hr>
			<a id="reset" class="btn btn-light">Reset</a>
		  </div>
  </div>
	<br>


	<div class="dev" v-if="devMode" >
  	<small>Distance {{distance}}</small>
		<br/>
		RacerData: <br/>
		{{racerData}}
		<br/>
		Race Data:<br/>
		{{raceData}}
		<br/>

		<span id="devlog"></span>

  </div>


</span>


<div class="button-row">
	<a href="/welcome/logout" class="btn btn-outline-light btn-sm" id="logout">Cancel</a>
</div>

<div class="vspace" v-on:dblclick="dev=1"></div>

</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
<!-- production v: <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script> -->

<script>

var clock = new Vue({
  el: '#clock',
  data: {
		devMode: 0,
		targetRadius: 100, //how tight finish line must be (ft)
  	first: true,
    time: '00:00:00.000',
    timeBegan: null,
    timeStopped: null,
	stoppedDuration: 0,
	started: null,
	running: false,
	hour: 0,
	sec: 0,
	min: 0,
	ms: 0,
  name_error: false,
	raceDuration: null, //for ending when race is done
	raceData: {},
	racerData: {},
	races: [], //all the races for the users profile
	current_race_id: 0,
	startingPoint: false,

	locationDisplay: false, //false for prod
	locationConfirmed: false, //false for prod

	alertMessage: "",
	distance: 1000,
	loading: false,
	ready: false,
	raceInProgress: false
  },
  methods: {

		getRaces(){
			axios.get('/race/get_races').then(response => {
				 this.races = response.data.races;
				 this.current_race_id = response.data.current_race_id;
				 this.getRaceData();
			 })
		},
		setRace(id){
			console.log('setting race..');
			axios.get('/race/set_race/' + id).then(response => {
				 clock.current_race_id = id;
				 clock.getRaceData();
				 $('#collapser').toggleClass('show');
			 })
		},
		getRaceData(){
					axios.get('/race/get_race_data/' + clock.current_race_id).then(response => {
						 this.raceData = response.data;
					 })
		},
		getRacerData(){
					axios.get('/race/get_racer_data').then(response => {
						 console.log("getting racer data..");
						 console.log(response.data);
						 this.racerData = response.data.racer_data;
						 //this.timeBegan = response.data.start_time;
					 })
		},
  	verifyUserLocation: function(){
  		this.first = false;
  		this.loading = true;
  		this.getLocation();

  	},

  	getLocation: function (){
  		console.log('getting location...');
  		let geolocation = navigator.geolocation;
		if (geolocation) {
		  geolocation.getCurrentPosition(function(position){
		  	console.log("my lat: " + position.coords.latitude);
		  	console.log("my long: " + position.coords.longitude);
		  	console.log("race lat: " + clock.raceData.starting_lat);
		  	console.log("race long: " + clock.raceData.starting_lon);
		  	clock.loading = false;

		  	clock.distance = getDistance(position.coords.latitude, position.coords.longitude, clock.raceData.starting_lat, clock.raceData.starting_lon);
				clock.locationDisplay = true;

		  	//verify if user is within x meters of starting point
		  	if(clock.distance <= clock.targetRadius){


					if('initials' in clock.racerData ){ //if they already entered initials, skip to continue
							clock.get_ready();
					}else{
		  		clock.locationConfirmed = true;
					clock.alertMessage = `Almost ready to go..
																<br/>Enter a name or initalism (max 5 chars) so we can save your session.
																<br/>At the end of the race, there will be an option to add more details to your profile.
																`;
					}

		  	}else{
		  		clock.alertMessage = "Sorry looks like you aren't at the starting point.  Need help getting there? <br> <a href='/help'>Help Me</a>";
		  	}


		  }, function(){}, {maximumAge:10000, timeout:5000, enableHighAccuracy: true});
		} else {
		  console.log("Geolocation is not supported by this browser or device.");
		  clock.alertMessage = "Location failed.  Make sure your device has location enabled.";
		  clock.first = true;
		  clock.locationDisplay = false;
		  clock.locationConfirmed = false;

			}
  	},

		//function for "continue" button and creates user in DB
		get_ready: function (){
				document.getElementById('logout').innerHTML = 'Logout';
				console.log("initials: " + this.racerData.initials);

				if(this.racerData.initials){
					const url = "/race/create_racer/" + this.racerData.initials;
					axios.post(url).then(response => {
							console.log("racer created");
						 console.log(response.data);
						 clock.ready=true;
		 				 clock.locationDisplay=false;
						 clock.racerData.racer_id = response.data;
					 })
				}	else{
						this.name_error = true;
				}


		},

		preventSpecial(e) {
      if (/^\W$/.test(e.key)) {
        e.preventDefault();
      }
    },


  	start: function (){

		  	//	if(this.running) return;
					this.update_status('running');
					this.setTimeBegan();//get time from server side
					/*
				  if (this.timeBegan === null || this.timeBegan == '0000-00-00 00:00:00') {
						this.reset();
						this.setTimeBegan();//get time from server side
				  }
					*/

  		},

		  stop: function () {
			  this.running = false;
			  this.timeStopped = new Date();
			  clearInterval(this.started);
				this.setTimeEnded(); //write to DB
				this.update_status('finished');
			},

		  reset: function () {
				  this.running = false;
				  clearInterval(this.started);
				  this.stoppedDuration = 0;
				  this.timeBegan = null;
				  this.timeStopped = null;
				  this.time = "00:00:00.000";
				},

				update_status: function(status){
					const url = "/race/update_racer_status/" + status;
					axios.post(url).then(response => {
						 console.log('status updated to: ' + status);
						 clock.racerData.status = status;
					 })

				},

				setTimeBegan: function(){
					const url = "/race/set_time_started/";

					axios.post(url).then(response => {
						 if (this.timeStopped !== null) {
							this.stoppedDuration += (response.data - this.timeStopped);
							}
							this.timeBegan = new Date(response.data);//get date from server, format it
							console.log("timebegan : " + this.timeBegan);
							this.started = setInterval((e) => {
									run_timer();
							 }, 100);
							this.running = true;
					 })

				},

				setTimeEnded: function(){
						//const url = "/race/set_time_ended/" + this.hour + "/" + this.min + "/" + this.sec;
						const url = "/race/set_time_ended"; //get time from server

						axios.post(url).then(response => {
							 console.log(response.data);
								this.running = false;
								this.time_ended = response.data.end_time;
								this.raceDuration = response.data.duration;
						 })

				},

		},




		  onGeoError: function(error) {
			let detailError;

			if(error.code === error.PERMISSION_DENIED) {
			  detailError = "User denied the request for Geolocation.";
			}
			else if(error.code === error.POSITION_UNAVAILABLE) {
			  detailError = "Location information is unavailable.";
			}
			else if(error.code === error.TIMEOUT) {
			  detailError = "The request to get user location timed out."
			}
			else if(error.code === error.UNKNOWN_ERROR) {
			  detailError = "An unknown error occurred."
			}

			console.log(`Error: ${detailError}`);
		},

		mounted:function(){
			//console.log('status: ' + this.racerData.status);
			this.getRaces();
			//this.getRaceData();
			this.getRacerData();

    	if (this.racerData.status == 'running'){
				this.ready = true;
				this.first = false;
				this.running = true;

				this.started = setInterval((e) => {
						run_timer();
				 }, 100);
			}
  	},
		computed: {
			getRaceName(){
				var ret = this.races.filter(
			    function(data) {
			      return data.id == clock.current_race_id;
			    });

					return ret[0].name;
			}
		}

});
//end of VueJS

function run_timer(){
	  var currentTime = new Date()
	  , timeElapsed = new Date(currentTime - clock.timeBegan - clock.stoppedDuration);

		//console.log('timeLapsed: ' + timeElapsed);
	  clock.hour = pad(timeElapsed.getUTCHours(), 2);
	  clock.min = pad(timeElapsed.getUTCMinutes(), 2);
	  clock.sec = pad(timeElapsed.getUTCSeconds(), 2);
	  clock.ms = clock.ms >= 9 ? 0 : clock.ms + 1;
}

function pad(num, size) {
    var s = "000000000" + num;
    return s.substr(s.length-size);
}

function getDistance(lat1, lon1, lat2, lon2, unit) {
	if ((lat1 == lat2) && (lon1 == lon2)) {
		return 0;
	}
	else {
		var radlat1 = Math.PI * lat1/180;
		var radlat2 = Math.PI * lat2/180;
		var theta = lon1-lon2;
		var radtheta = Math.PI * theta/180;
		var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
		if (dist > 1) {
			dist = 1;
		}
		dist = Math.acos(dist);
		dist = dist * 180/Math.PI;
		dist = dist * 60 * 1.1515;
		//if (unit=="K") { dist = dist * 1.609344 }
		//if (unit=="N") { dist = dist * 0.8684 }
		var dist = dist * 5280; //convert to feet

		return dist;
	}
}


</script>
