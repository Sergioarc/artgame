var GameWin = function(){

};

var boton1;
var boton2;

GameWin.prototype ={
	init: function(){
		this.world.resize(900,550);

	},

	preload: function(){
		this.load.image('ciudad', 'assets/ciudad.png');
		this.load.image('boton1','assets/boton1.png');
		this.load.image('boton2','assets/boton2.png');
	},

	create: function(){
		this.sky = this.add.tileSprite(0,0,4000,500, 'ciudad');
		boton1 = this.add.button(this.world.centerX-200, 400, 'boton1', this.startGame, this);
		boton1 = this.add.button(this.world.centerX+50, 400, 'boton2', this.backInit, this);
		this.add.text(250,50, "Has Terminado del Nivel Arquileza", {font: "bold 30px snas-serif", fill: "#13cb24", align: "center" })
		this.add.text(300,100, "Obras Obtenidas: ", {font: "bold 30px snas-serif", fill: "#13cb24", align: "center" })
		this.add.text(600,100, score.toString(), {font: "bold 30px snas-serif", fill: "#13cb24", align: "center" })

		if(score === 1){
			arquileza1 = true;

		}else if(score === 2){
			arquileza1 = true;
			arquileza2 = true;
		}else if(score === 3){
			arquileza1 = true;
			arquileza2 = true;
			arquileza3 = true;
		}else if(score === 4){
			arquileza1 = true;
			arquileza2 = true;
			arquileza3 = true;
			arquileza4 = true;
		}else if(score === 5){
			arquileza1 = true;
			arquileza2 = true;
			arquileza3 = true;
			arquileza4 = true;
			arquileza5 = true;
		}
	},

	startGame: function(){
		this.state.start('Nivel2');
	},

	backInit: function(){
		//window.location = "http://www.google.com";

	}
};
