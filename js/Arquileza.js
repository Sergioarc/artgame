

var Nivel1 = function () {
	this.platform = null;
	this.player = null;
	this.sky = null;
	this.pisos = null;
	this.corazones = null;
	this.platforms = null;
	this.corazon1 = null;
	this.corazon2 = null;
	this.corazon3 = null;
	this.viendo = 'right';
	this.wasStanding = false;
	this.edgeTimer = 0;
	this.jumpTimer = 0;
	this.vidas = 3;
	this.enemigos = null;
};

Nivel1.prototype = {

	init: function(){
		this.game.renderer.renderSession.soundPixels = true;
		this.world.resize(3000, 550);
		this.physics.startSystem(Phaser.Physics.ARCADE);
		this.physics.arcade.gravity.y = 750;
	},

	preload: function() {
		this.load.image('ciudad', 'assets/ciudad.png');
		this.load.image('escultura','assets/e1.png');
		this.load.image('piso','assets/platform.png');
		this.load.image('corazon','assets/corazon.png');
		this.load.image('enemigo','assets/e1.png');
		this.load.image('ice-platform','assets/ice-platform.png');
		this.load.image('normal-platform','assets/floor(120x16).png');
		this.load.image('trees','assets/trees.png');
		
		this.load.spritesheet('regio','assets/dude.png',32,48);
	},

	create: function() {
		this.sky = this.add.tileSprite(0,0,4000,500, 'ciudad');
		this.sky.fixedToCamera = false;
		
		//Agregamos los arboles 
		this.add.sprite(0,440,'trees');
		this.add.sprite(1100,440,'trees');
		this.add.sprite(2600,440,'trees');

		this.player = this.add.sprite(32,game.world.height - 150, 'regio');
		this.physics.arcade.enable(this.player); //Ponemos disponible al jugador 'dude' para que use la libreria de physics
		this.player.body.collideWorldBounds = true; //Asignamos coliciones con los objetos que pongamos del mundo
		this.player.animations.add('left',[0,1,2,3],10,true);
		this.player.animations.add('right',[5,6,7,8],10,true);

		//Creamos las plataformas
		this.platforms = this.add.physicsGroup();
		this.platform1 = this.platforms.create(800,440,'normal-platform');
		this.platform2 = this.platforms.create(2300,440,'ice-platform');

		this.platform1.body.velocity.x = 50;
		this.platform2.body.velocity.x = 50;

		this.platforms.setAll('body.allowGravity',false);
		this.platforms.setAll('body.immovable',true);


		//Hacemos que la camara siga el movimiento del jugador
        this.camera.follow(this.player);

		//Con el teclado se movera el jugador
		upKey = this.input.keyboard.addKey(Phaser.Keyboard.X);
		leftKey = this.input.keyboard.addKey(Phaser.Keyboard.LEFT);
		right = this.input.keyboard.addKey(Phaser.Keyboard.RIGHT);

		//Crear piso
		var posicionPiso = 0;
		this.pisos = this.add.physicsGroup();
		for(var j = 0; j< 8; j++){
			if(j === 2 || j === 6){
				posicionPiso += 300;
			}else{
				var piso = this.pisos.create(0+posicionPiso, 550-32,'piso');
				posicionPiso += 400;
			}
		}

		//crear corazones
		var posicionCora = 0;
		var vidasCount = 1
		this.corazones = this.add.physicsGroup();
		this.corazones.enableBody = true;
		for (var i = 0; i < 3; i++) {
			if(i === 0)
				this.corazon1 = this.corazones.create(730+posicionCora,10,'corazon');
			if(i === 1)
				this.corazon2 = this.corazones.create(730+posicionCora,10,'corazon');
			if(i === 2)
				this.corazon3 = this.corazones.create(730+posicionCora,10,'corazon');
			posicionCora += 45;
			vidasCount += 1;	
		}


		//crear enemigos
		this.enemigos = this.add.physicsGroup();
		this.enemigos.enableBody = true;
		var enemigo = this.enemigos.create(100,game.world.height - (64+32),'enemigo');

		this.pisos.setAll('body.allowGravity', false);
        this.pisos.setAll('body.immovable',true);
        this.corazones.setAll('body.allowGravity', false);
        this.enemigos.setAll('body.allowGravity',false);
        this.enemigos.setAll('body.immovable',true);

	},

	collectVida: function(player, enemigos){
    	console.log("Hola");
    	this.vidas -= 1;
    	if(this.vidas == 1){
    		this.corazon1.destroy();
    	}
    	if(this.vidas == -1 ){
    		this.corazon2.destroy();
    	}
    	if(this.vidas == -3){
    		this.corazon3.destroy();
    	}
    	console.log(this.vidas);
    },

	update: function(){
		this.physics.arcade.collide(this.player,this.pisos);
		this.physics.arcade.collide(this.enemigos,this.pisos);
		this.physics.arcade.collide(this.player,this.enemigos,this.collectVida,null,this);
		this.physics.arcade.collide(this.player,this.platforms)
		var standing = this.player.body.blocked.down || this.player.body.touching;
		var viendo;
		
		//console.log("Plat: " + this.platform1.x)
		if(this.platform1.x > 1000){
			//console.log("Plat1: " + this.platform1.body.velocity.x)
			this.platform1.body.velocity.x *= -1
			//console.log("Plat2: " + this.platform1.body.velocity.x)
			this.platform1.x -= 1;
		}
		if(this.platform1.x < 800){
			//console.log("Plat1: " + this.platform1.body.velocity.x)
			this.platform1.body.velocity.x *= -1
			//console.log("Plat2: " + this.platform1.body.velocity.x)
			this.platform1.x += 1;
		}


		//console.log("Plat: " + this.platform1.x)
		if(this.platform2.x > 2500){
			//console.log("Plat1: " + this.platform1.body.velocity.x)
			this.platform2.body.velocity.x *= -1
			//console.log("Plat2: " + this.platform1.body.velocity.x)
			this.platform2.x -= 1;
		}
		if(this.platform2.x < 2300){
			//console.log("Plat1: " + this.platform1.body.velocity.x)
			this.platform2.body.velocity.x *= -1
			//console.log("Plat2: " + this.platform1.body.velocity.x)
			this.platform2.x += 1;
		}

		//console.log(this.player.x);
		//  Reset the players velocity (movement)
    	this.player.body.velocity.x = 0;

    	if(leftKey.isDown){
    		this.player.body.velocity.x = -250;
    		this.player.play('left');
    		if(this.player.x < 2569 && this.corazon1.x > 730){
    			this.corazon1.x -=4.2;
    			this.corazon2.x -=4.2;
    			this.corazon3.x -=4.2;
    		}
    		if(this.viendo !== 'left'){
    			this.viendo = 'left';
    		}
    	}else if (right.isDown){
    		this.player.body.velocity.x = 250;
    		this.player.play('right');
    		if(this.player.x > 900/2 && this.corazon3.x < 2920){
    			this.corazon1.x += 4.2;
    			this.corazon2.x += 4.2;
    			this.corazon3.x += 4.2;
    		}
    		if(this.viendo !== 'right'){
    			this.viendo = 'right';
    		}
    	}
    	else{
    		this.player.animations.stop();
    		this.player.frame = 4;
    	}

    	if(!standing && this.wasStanding)
    		this.edgeTimer = this.time.time +250;

    	if((standing || this.time.time <= this.edgeTimer) && upKey.isDown && this.time.time > this.jumpTimer){
    		this.player.body.velocity.y = -380;
    		this.jumpTimer = this.time.time +750;
    		
    	}

    	this.wasStanding = standing;
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