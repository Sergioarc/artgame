var GameWin2 = function(){

};

var boton1;
var boton2;

GameWin2.prototype ={
	init: function(){
		this.world.resize(900,550);

	},

	preload: function(){
		this.load.image('ciudad', 'assets/ciudad4.jpg');
		this.load.image('boton1','assets/boton1.png');
		this.load.image('boton2','assets/boton2.png');
	},

	create: function(){
		this.sky = this.add.tileSprite(0,0,4000,500, 'ciudad');
		boton1 = this.add.button(this.world.centerX-200, 400, 'boton1', this.startGame, this);
		boton1 = this.add.button(this.world.centerX+50, 400, 'boton2', this.backInit, this);
		this.add.text(250,50, "Has Terminado del Nivel 2: Ecoambient", {font: "bold 30px snas-serif", fill: "#0000", align: "center" })
		this.add.text(300,100, "Obras Obtenidas: ", {font: "bold 30px snas-serif", fill: "#0000", align: "center" })
		this.add.text(600,100, score.toString(), {font: "bold 30px snas-serif", fill: "#0000", align: "center" })

		if(score === 1){
			ecoambient1 = true;

		}else if(score === 2){
			ecoambient1 = true;
			ecoambient2 = true;
		}else if(score === 3){
			ecoambient1 = true;
			ecoambient2 = true;
			ecoambient3 = true;
		}else if(score === 4){
			ecoambient1 = true;
			ecoambient2 = true;
			ecoambient3 = true;
			ecoambient4 = true;
		}else if(score === 5){
			ecoambient1 = true;
			ecoambient2 = true;
			ecoambient3 = true;
			ecoambient4 = true;
			ecoambient5 = true;
		}
	},

	startGame: function(){
		this.state.start('Nivel2');
	},

	backInit: function(){
		//window.location = "http://www.google.com";

	}
};
