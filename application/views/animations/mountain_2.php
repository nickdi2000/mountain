<style>
.wrapper {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    position: relative;
    margin: 0 auto;
    overflow: hidden;
  background: rgba(52, 152, 219,0.5);
  z-index: 10;
}
.wrapper div, .wrapper div::after, .wrapper div::before {
  position: absolute;
}
.mountain {
  width: 0;
	height: 0;
	border-left: 100px solid transparent;
	border-right: 100px solid transparent;
	border-bottom: 150px solid #7f8c8d;
  bottom: 0;
  left: 0;
}
.mountain::after {
  width: 0;
	height: 0;
	border-left: 100px solid transparent;
	border-right: 100px solid transparent;
	border-bottom: 150px solid #7f8c8d;
  bottom: -170px;
  left: -130px;
  content: "";
}
.mountain::before {
  width: 0;
	height: 0;
	border-left: 100px solid transparent;
	border-right: 100px solid transparent;
	border-bottom: 150px solid #7f8c8d;
  bottom: -200px;
  left: -50px;
  content: "";
}
.cloud {
  width: 36px;
  height: 30px;
  top: 50px;
  left: 110px;
  background: #ecf0f1;
  animation: cloud 20s linear infinite;
}
.cloud::before {
  width: 50px;
  height: 50px;
  background: #ecf0f1;
  content: "";
  border-radius: 50%;
  bottom: 0;
  left: -25px;
}
.cloud::after {
  width: 40px;
  height: 40px;
  background: #ecf0f1;
  content: "";
  border-radius: 50%;
  bottom: 0;
  left: 15px;
}

@keyframes cloud {
  0% { transform: translateX(-200px);}
  100% { transform: translateX(200px);}
}

.cloud2 {
  width: 18px;
  height: 15px;
  top: 30px;
  left: 125px;
  background: #ecf0f1;
  animation: cloud2 40s linear infinite;
}
.cloud2::before {
  width: 25px;
  height: 25px;
  background: #ecf0f1;
  content: "";
  border-radius: 50%;
  bottom: 0;
  left: 7px;
}
.cloud2::after {
  width: 20px;
  height: 20px;
  background: #ecf0f1;
  content: "";
  border-radius: 50%;
  bottom: 0;
  left: -8px;
}

@keyframes cloud2 {
  0% { transform: translateX(-300px);}
  100% { transform: translateX(300px);}
}

.flag {
  width: 4px;
  height: 0;
  background: #9E6D4D;
  top: 54px;
  left: calc(50% - 2px);
  animation: pole 10s linear infinite;
}
@keyframes pole {
  0% { height: 0; top: 54px; }
  20% { height: 0; top: 54px; }
  30% { height: 30px; top: 24px; }
  70% { height: 30px; top: 24px; }
  80% { height: 0; top: 54px; }
}
.flag::after {
  content: "";
  height: 0;
  width: 0;
  left: 8px;
  top: 0px;
  border-top: 8px solid #e74c3c;
  border-bottom: 8px solid #e74c3c;
	border-right: 0px solid transparent;
	border-left: 0px solid transparent;
  animation: tip 10s linear infinite;
}
@keyframes tip {
  31% { border-right: 0px solid transparent; left: 8px; }
  37% { border-right: 8px solid transparent; left: 14px; }
  58% { border-right: 8px solid transparent; left: 14px; }
  64% { border-right: 0px solid transparent; left: 8px; }
}
.flag::before {
  content: "";
  height: 16px;
  width: 0px;
  background: #e74c3c;
  top: 0;
  left: 4px;
  animation: flag 10s linear infinite;
}
@keyframes flag {
  30% { width: 0px; }
  35% { width: 10px; }
  60% { width: 10px; }
  65% { width: 0px; }
}
.dash {
  height: 10px;
  width: 3px;
  background: #c0392b;
  opacity: 0;
  animation: dash 10s linear infinite;
}
.dash1 {
  top: 60px;
  left: 100px;
  transform: rotate(-10deg);
  animation-delay: 1.8s;
}
.dash2 {
  top: 74px;
  left: 100px;
  transform: rotate(10deg);
  animation-delay: 1.6s;
}
.dash3 {
  top: 88px;
  left: 96px;
  transform: rotate(20deg);
  animation-delay: 1.4s;
}
.dash4 {
  top: 102px;
  left: 93px;
  transform: rotate(0deg);
  animation-delay: 1.2s;
}
.dash5 {
  top: 116px;
  left: 96px;
  transform: rotate(-20deg);
  animation-delay: 1s;
}
.dash6 {
  top: 130px;
  left: 102px;
  transform: rotate(-30deg);
  animation-delay: 0.8s;
}
.dash7 {
  top: 144px;
  left: 109px;
  transform: rotate(-20deg);
  animation-delay: 0.6s;
}
.dash8 {
  top: 158px;
  left: 112px;
  transform: rotate(-10deg);
  animation-delay: 0.4s;
}
.dash9 {
  top: 172px;
  left: 113px;
  transform: rotate(0deg);
  animation-delay: 0.2s;
}
.dash10 {
  top: 186px;
  left: 112px;
  transform: rotate(10deg);
  animation-delay: 0s;
}
@keyframes dash {
  0% { opacity: 0; }
  1% { opacity: 1; }
  50% { opacity: 1; }
  51% { opacity: 0; }
  100% { opacity: 0; }
}
</style>

<div class="wrapper">
  <div class="cloud"></div>
  <div class="cloud2"></div>
<div class="mountain"></div>
  <div class="dash dash1"></div>
  <div class="dash dash2"></div>
  <div class="dash dash3"></div>
  <div class="dash dash4"></div>
  <div class="dash dash5"></div>
  <div class="dash dash6"></div>
  <div class="dash dash7"></div>
  <div class="dash dash8"></div>
  <div class="dash dash9"></div>
  <div class="dash dash10"></div>
  <div class="flag"</div>
</div>
