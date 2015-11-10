
var game = new Phaser.Game(1100,700, Phaser.AUTO, 'Nivel 1', { preload: preload, create: create, update: update });

function preload() {
	game.load.image('ciudad', 'assets/ciudad.png');
	game.load.image('ground', 'assets/platform.png');
}

function create() {
	game.add.sprite(0,0,'ciudad');
}

function update() {

}