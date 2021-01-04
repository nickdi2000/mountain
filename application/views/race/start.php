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
    font-family: "animal";
    -webkit-border-radius: 8px;
       -moz-border-radius: 8px;
            border-radius: 8px;
}



</style>


<div id="clock">
  
  <i class="fas fa-clock fa-7x"></i><br />
  <br />
  
  <div class="alert alert-dark" v-if="first">
  	<i class="fas fa-info-circle"></i>
  	This is it.  Before you can start, we will need to verify your location via GPS. Make sure you have location enabled on your device.
  </div>
  
  Distance: {{distance}}
  
  <div class="locationDiv" v-if="first">
  	<button class="btn btn-info" v-on:click="verifyUserLocation"><i class="fas fa-map-marker-alt"></i><br>Confirm My Starting Point</button>
  </div>
  
  <div class="alert" v-if="locationDisplay" v-bind:class="{ 'alert-success': locationConfirmed, 'alert-danger': !locationConfirmed }">
  	{{alertMessage}}
  	
  	<br/>
  	
  </div>
  
  <div v-if="locationConfirmed">
		  <span class="time">{{hour}}:{{min}}:{{sec}}:{{ms}}</span>

  
		  <div class="btn-container">
			<a id="start" class="btn btn-success btn-xlarge" v-on:click="start" v-if="!running"><i class="far fa-play-circle"></i> Start</a>
			<a id="stop" class="btn btn-danger btn-xlarge" v-on:click="stop" v-if="running"><i class="fas fa-flag-checkered"></i><br>Stop</a>
			<br> <br/>	
			<hr>
			<a id="reset" class="btn btn-light">Reset</a>
	
		  </div>
  
  </div>
  
  <div class="vspace"></div>

</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>


<script>

var clock = new Vue({
  el: '#clock',
  data: {
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
	lon: 43.2448764,
	lat: -79.8806354,
	startingPoint: false,
	locationDisplay: false,
	locationConfirmed: false,
	alertMessage: "",
	distance: 1000
  },
  methods: {
  
  	verifyUserLocation: function(){
  		this.first = false;
  		this.locationDisplay = true;
  		
  		this.getLocation();
  		this.locationConfirmed = true;
  		this.locationDisplay = false;
  		this.alertMessage = "Location Verified!  Start when you are ready!  You may reset if you are not ready, or start by accident.  Once you leave the starting zone, the reset button will no longer be available.";
  		
  	},
  	
  	getLocation: function (){
  		console.log('getting location...');
  		let geolocation = navigator.geolocation;
		if (geolocation) {
		  geolocation.getCurrentPosition(function(position){
		  	console.log("lat: " + position.coords.latitude);
		  	clock.distance = getDistance(position.coords.latitude, position.coords.longitude, clock.lat, clock.lon);
		  });
		} else {
		  console.log("Geolocation is not supported by this browser.");
		}
  	},
  	
  	start: function (){
  		 
  		  if(this.running) return;
		  if (this.timeBegan === null) {
			this.reset();
			this.timeBegan = new Date();
		  }
		  if (this.timeStopped !== null) {
			this.stoppedDuration += (new Date() - this.timeStopped);
		  }
		
	                   
		  this.started = setInterval((e) => {
		  		run_timer();
		   }, 100);	
		   
		  this.running = true;
  		},

		  stop: function () {
			  this.running = false;
			  this.timeStopped = new Date();
			  clearInterval(this.started);
			},
	
		  reset: function () {
				  this.running = false;
				  clearInterval(this.started);
				  this.stoppedDuration = 0;
				  this.timeBegan = null;
				  this.timeStopped = null;
				  this.time = "00:00:00.000";
				}
		
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
		  }

});


function run_timer(){
	  var currentTime = new Date()
	  , timeElapsed = new Date(currentTime - clock.timeBegan - clock.stoppedDuration);
	  clock	.hour = pad(timeElapsed.getUTCHours(), 2);
	  clock.min = pad(timeElapsed.getUTCMinutes(), 2);
	  clock.sec = pad(timeElapsed.getUTCSeconds(), 2);
	  clock.ms = clock.ms >= 9 ? 0 : clock.ms + 1;
}

function pad(num, size) {
    var s = "000000000" + num;
    return s.substr(s.length-size);
}


function getDistance(lat1,lon1,lat2,lon2) {
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(lat2-lat1);  // deg2rad below
  var dLon = deg2rad(lon2-lon1); 
  var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var d = R * c; // Distance in km
  
  return d;
}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}



</script>

