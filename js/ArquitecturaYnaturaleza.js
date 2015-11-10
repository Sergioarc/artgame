
var game = new Phaser.Game(900,600, Phaser.AUTO, 'Nivel 1', { preload: preload, create: create, update: update });

var platform;
var player;
var cursors;

function preload() {
	game.load.image('ciudad', 'assets/ciudad.png');
	game.load.image('ground', 'assets/platform.png');
	game.load.image('mona','img/monalisa.png');
	game.load.spritesheet('regio','assets/dude.png',32,48);
}

function create() {
	
	game.physics.startSystem(Phaser.Physics.ARCADE);
	game.add.sprite(0,0,'ciudad');
	
	platform = game.add.group();
	platform.enableBody = true;

	var ground = platform.create(0, game.world.height-64, 'ground');
	ground.scale.setTo(3,3);
	ground.body.immovable = true;

	var ledge = platform.create(500,300,'ground');
	ledge.body.immovable = true;

	ledge = platform.create(-150,250,'ground');
	ledge.body.immovable = true;

	player = game.add.sprite(32,game.world.height - 150,'regio');
	game.physics.arcade.enable(player);

	player.body.bounce.y = 0.2;
	player.body.gravity.y = 300;
	player.body.collideWorldBounds = true;

	player.animations.add('left',[0,1,2,3],10,true);
	player.animations.add('right',[5,6,7,8],10,true);

	cursors = game.input.keyboard.createCursorKeys();

}

function update() {
	game.physics.arcade.collide(player,platform);

	player.body.velocity.x = 0;

	if(cursors.left.isDown){
		player.body.velocity.x = -150;
		player.animations.play('left');
	}else if(cursors.right.isDown){
		player.body.velocity.x = 150;
		player.animations.play('right')
	}else{
		player.animations.stop();
		player.frame = 4;
	}

	if(cursors.up.isDown && player.body.touching.down){
		player.body.velocity.y = -350;
	}
}