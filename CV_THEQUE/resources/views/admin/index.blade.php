
<h1>Université Privé de Fes</h1>

<nav>
	<a href="#">Home</a>
	<a href="#">Profil</a>
	<a href="#">Blog</a>
	<a href="#">Portefolio</a>
	<a href="#">Contact</a>
	<div class="animation start-home"></div>
</nav>

<p>
   <span>CVtheque</span>
   <div class="container">
  <div class="card">
    <div class="header">
      <h3>Menu IU <i class="fas fa-angle-down iconM"></i></h3>
    </div>
    <div class="body">
      <ul>
          
        <li><i class="fas fa-home icon"></i> Recherche</li>
     <li><i class="fas fa-underline icon"><a href="{{ route('admin.students') }}"></i>Gérer les étudiants</a></li>
        <li><i class="fas fa-boxes icon"><a href="{{ route('admin.recruteurs') }}"></i>Gérer les recruteurs</a></li>

        <li><i class="fas fa-table icon"></i> Tables</li>
        <li><i class="fab fa-wpforms icon"></i> Forms
          <ul>
            <li><i class="fas fa-pencil-alt icon"></i> First form</li>
            <li><i class="fas fa-paper-plane icon"></i> Second form</li>
          </ul>
        </li>
        <li><i class="fas fa-chart-pie icon"></i> Deconnexion</li>
      </ul>
    </div>
    <Style>
    @import url('https://fonts.googleapis.com/css?family=Roboto');

.container{
  padding: 50px;
}

.card{
  width: 300px;
  height: 420px;
  background-color: #1E2B32;
  border-radius: 10px 10px;
}

.header{
  border-radius: 10px 10px 0px 0px;
  padding: 5px;
  background-color: #2A3942;
}

h3{
  color: #FFFFFF;
  font-family: 'Roboto', sans-serif;
  margin-left: 1rem;
}

.iconM{
  font-size: 18px;
  margin-left: 170px;
  color: #2f89fc;
}

.icon{
  margin-right: 8px;
}

.body li{
  transition: 1s all;
  font-family: 'Roboto', sans-serif;
  font-size: 18px;
  padding: 15px;
  margin-left: -40px;
  margin-top: 0px;
  color: #fff;
  list-style: none;
  display: block;
  border-top-right-radius: 10px 10px;
  border-bottom-right-radius: 10px 10px;
}

li:hover{
  transition: 1s all;
  color: #2f89fc;
  background-color: rgba(42, 56, 65, 0.82);
  border-top-right-radius: 10px 10px;
  border-bottom-right-radius: 10px 10px;
  cursor: pointer;
}

.body > li{
  float: left;
}

.body li ul{
  background: #1E2B32;
  margin-left: 280px;
  margin-top: -38px;
  display: none;
  position: absolute;
  border-top-right-radius: 15px 15px;
  border-bottom-right-radius: 15px 15px;
}

.body li:hover > ul{
  display: block;
  cursor: pointer;
}
    </Style>
  </div>
</div>
  <Style>
  nav {
	margin: 27px auto 0;

	position: relative;
	width: 590px;
	height: 50px;
	background-color: #34495e;
	border-radius: 8px;
	font-size: 0;
}
nav a {
	line-height: 50px;
	height: 100%;
	font-size: 15px;
	display: inline-block;
	position: relative;
	z-index: 1;
	text-decoration: none;
	text-transform: uppercase;
	text-align: center;
	color: white;
	cursor: pointer;
}
nav .animation {
	position: absolute;
	height: 100%;
	top: 0;
	z-index: 0;
	transition: all .5s ease 0s;
	border-radius: 8px;
}
a:nth-child(1) {
	width: 100px;
}
a:nth-child(2) {
	width: 110px;
}
a:nth-child(3) {
	width: 100px;
}
a:nth-child(4) {
	width: 160px;
}
a:nth-child(5) {
	width: 120px;
}
nav .start-home, a:nth-child(1):hover~.animation {
	width: 100px;
	left: 0;
	background-color: #1abc9c;
}
nav .start-about, a:nth-child(2):hover~.animation {
	width: 110px;
	left: 100px;
	background-color: #e74c3c;
}
nav .start-blog, a:nth-child(3):hover~.animation {
	width: 100px;
	left: 210px;
	background-color: #3498db;
}
nav .start-portefolio, a:nth-child(4):hover~.animation {
	width: 160px;
	left: 310px;
	background-color: #9b59b6;
}
nav .start-contact, a:nth-child(5):hover~.animation {
	width: 120px;
	left: 470px;
	background-color: #e67e22;
}

body {
	font-size: 12px;
	font-family: sans-serif;
	background: #2c3e50;
}
h1 {
	text-align: center;
	margin: 40px 0 40px;
	text-align: center;
	font-size: 30px;
	color: #ecf0f1;
	text-shadow: 2px 2px 4px #000000;
	font-family: 'Cherry Swash', cursive;
}

p {
    position: absolute;
    bottom: 20px;
    width: 100%;
    text-align: center;
    color: #ecf0f1;
    font-family: 'Cherry Swash',cursive;
    font-size: 16px;
}

span {
    color: #2BD6B4;
}

  </Style>


