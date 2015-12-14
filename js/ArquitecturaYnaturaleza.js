

var Nivel1 = function () {
	this.platform = null;
	this.player = null;
	this.cursors = null;
	this.sky = null;
};

Nivel1.prototype = {

	init: function(){
		this.game.renderer.renderSession.soundPixels = true;
		this.world.resize(3000, 600);
		this.physics.startSystem(Phaser.Physics.ARCADE);
		this.physics.arcade.gravity.y = 750;
	},

	preload: function() {
		this.load.image('ciudad', 'assets/ciudad.png');
		this.load.image('escultura','assets/e1.png');
		this.load.spritesheet('regio','assets/dude.png',32,48);
	},

	create: function() {
		this.sky = this.add.tileSprite(0,0,2999,600, 'ciudad');
		this.sky.fixedToCamera = false;
		this.player = this.add.sprite(32,game.world.height - 150, 'regio');
		this.physics.arcade.enable(this.player); //Ponemos disponible al jugador 'dude' para que use la libreria de physics
		this.player.body.collideWorldBounds = true; //Asignamos coliciones con los objetos que pongamos del mundo
		this.player.animations.add('left',[0,1,2,3],10,true);
		this.player.animations.add('right',[5,6,7,8],10,true);

		//Hacemos que la camara siga el movimiento del jugador
        this.camera.follow(this.player);
		this.cursors = game.input.keyboard.createCursorKeys();

	},

	update: function(){
		this.sky.tilePosition.x = (this.camera.x*.3); //Le damos el efecto de que pareciera que el background se mueve al compas del jugador

		//  Reset the players velocity (movement)
    	this.player.body.velocity.x = 0;

    	if (this.cursors.left.isDown){
        	//  Move to the left
        	this.player.body.velocity.x = -150;

        	this.player.animations.play('left');
    	}else if (this.cursors.right.isDown){
        	//  Move to the right
        	this.player.body.velocity.x = 150;

        	this.player.animations.play('right');
    	}else{
        	//  Stand still
        	this.player.animations.stop();

        	this.player.frame = 4;
    	}
    	//  Allow the player to jump if they are touching the ground.
    	if (this.cursors.up.isDown ){
        	this.player.body.velocity.y = -350;
    	}
    }
	
};


/*
function update() {
	game.physics.arcade.collide(player,platform);
	game.physics.arcade.collide(escultura,platform);

	game.physics.arcade.overlap(player,escultura,collectEsc,null,this);

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

function collectEsc(player,escultura){
	escultura.kill();
}*/