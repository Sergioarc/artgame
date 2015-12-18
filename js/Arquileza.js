
var score = 0;
var arquileza1 = false;
var arquileza2 = false;
var arquileza3 = false;
var arquileza4 = false;
var arquileza5 = false;

var Nivel1 = function () {
	this.platform = null;
	this.player = null;
	this.sky = null;
	this.pisos = null;
	this.corazones = null;
	this.obras = null;
	this.platforms = null;
	this.corazon1 = null;
	this.corazon2 = null;
	this.corazon3 = null;
	this.viendo = 'right';
	this.wasStanding = false;
	this.edgeTimer = 0;
	this.jumpTimer = 0;
	this.vidas = 3;
	this.bloques = null;
	this.bandera = null;
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
		this.load.image('piso','assets/platform.png');
		this.load.image('corazon','assets/corazon.png');
		this.load.image('ice-platform','assets/ice-platform.png');
		this.load.image('normal-platform','assets/floor(120x16).png');
		this.load.image('trees','assets/trees.png');
		this.load.image('arqui1','assets/Arquileza/arqui1.png');
		this.load.image('arqui2','assets/Arquileza/arqui2.png');
		this.load.image('arqui3','assets/Arquileza/arqui3.png');
		this.load.image('arqui4','assets/Arquileza/arqui4.png');
		this.load.image('arqui5','assets/Arquileza/arqui5.png');
		this.load.image('bloque1','assets/block4(16x16).png')
		this.load.image('puerta','assets/door.png');
		this.load.image('bomba','assets/bomba(demo).png')
		this.load.image('bomba1','assets/bomba1.png')
		this.load.spritesheet('regio','assets/dude.png',32,48);
	},

	create: function() {
		this.sky = this.add.tileSprite(0,0,4000,500, 'ciudad');
		this.sky.fixedToCamera = false;
		
		//Agregamos los arboles 
		this.add.sprite(0,440,'trees');
		this.add.sprite(1100,440,'trees');
		this.add.sprite(2600,440,'trees');

		//Agregamos las obras de arte
		this.obras = this.add.physicsGroup();
		this.obras.enableBody = true;
		var obra = this.obras.create(920,300,'arqui1');
		obra = this.obras.create(2450,300,'arqui2');
		obra = this.obras.create(1970,311,'arqui3' );
		obra = this.obras.create(492,263,'arqui4');
		obra = this.obras.create(2699,350,'arqui5');
		this.obras.setAll('body.allowGravity', false);
		this.obras.setAll('body.immovable',true);

		//Agregamos bloques
		this.bloques = this.add.physicsGroup();
		var bloque = this.bloques.create(1734,503,'bloque1');
		bloque = this.bloques.create(1734,487,'bloque1');
		bloque = this.bloques.create(1734,471,'bloque1');
		bloque = this.bloques.create(1734,455,'bloque1');
		bloque = this.bloques.create(1734,439,'bloque1');

		bloque = this.bloques.create(2134,503,'bloque1');
		bloque = this.bloques.create(2134,487,'bloque1');
		bloque = this.bloques.create(2134,471,'bloque1');
		bloque = this.bloques.create(2134,455,'bloque1');
		bloque = this.bloques.create(2134,439,'bloque1');
		
		bloque = this.bloques.create(1862,375,'bloque1');
		bloque = this.bloques.create(1830,391,'bloque1');
		bloque = this.bloques.create(1798,407,'bloque1');
		bloque = this.bloques.create(1766,423,'bloque1');


		bloque = this.bloques.create(400,503,'bloque1');
		bloque = this.bloques.create(400,487,'bloque1');
		bloque = this.bloques.create(400,471,'bloque1');
		bloque = this.bloques.create(400,455,'bloque1');
		bloque = this.bloques.create(400,439,'bloque1');

		bloque = this.bloques.create(600,503,'bloque1');
		bloque = this.bloques.create(600,487,'bloque1');
		bloque = this.bloques.create(600,471,'bloque1');
		bloque = this.bloques.create(600,455,'bloque1');
		bloque = this.bloques.create(600,439,'bloque1');

		bloque = this.bloques.create(500,423,'bloque1');
		bloque = this.bloques.create(450,391,'bloque1');
		bloque = this.bloques.create(550,391,'bloque1');
		bloque = this.bloques.create(500,359,'bloque1');

		this.bloques.setAll('body.allowGravity',false);
		this.bloques.setAll('body.immovable',true);

		//Agrego el objeto fin
		this.bandera = this.add.physicsGroup();
		var bandera = this.bandera.create(2900,422,'puerta');
		this.bandera.setAll('body.allowGravity',false);
		this.bandera.setAll('body.immovable',true);

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

		//Crear enemigos
		this.enemigos = this.add.physicsGroup()
		this.enemigo1 = this.enemigos.create(450,470,'bomba')
		this.enemigo2 = this.enemigos.create(2850,470,'bomba')
		this.enemigo3 = this.enemigos.create(1400,470,'bomba')
		this.enemigo1.body.velocity.x = 50;
		this.enemigo2.body.velocity.x = 50;
		this.enemigo3.body.velocity.x = 50;



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



		this.pisos.setAll('body.allowGravity', false);
        this.pisos.setAll('body.immovable',true);
        this.corazones.setAll('body.allowGravity', false);
        this.enemigos.setAll('body.allowGravity',false);
        this.enemigos.setAll('body.immovable',true);

        this.scoreText = game.add.text(12,12,'Obras: 0',{fontSize: '30px', fill: '#C66E4E'})



	},

	collectVida: function(player, enemigos){
    	console.log("Hola");
    	enemigos.destroy()
    	this.vidas -= 1;
    	console.log(this.vidas)
    	if(this.vidas == 2){
    		this.corazon1.destroy();
    	}
    	if(this.vidas == 1){
    		this.corazon2.destroy();
    	}
    	if(this.vidas == 0){
    		
    		this.corazon3.destroy();
    		this.state.start('Nivel1');
    	}
    	console.log(this.vidas);
    },

    collectObras: function(player, obras){
    	obras.kill();
    	score += 1;
    	this.scoreText.text = 'Obras: ' + score;
    },

    finJuego: function(player, bandera){
    	console.log(player.x)
    	if(player.x > 2920)
    		this.state.start('GameWin');
    },

	update: function(){
		this.physics.arcade.collide(this.player,this.pisos);
		this.physics.arcade.collide(this.enemigos,this.pisos);
		this.physics.arcade.collide(this.player,this.enemigo1,this.collectVida,null,this);
		this.physics.arcade.collide(this.player,this.enemigo2,this.collectVida,null,this);
		this.physics.arcade.collide(this.player,this.enemigo3,this.collectVida,null,this);
		this.physics.arcade.collide(this.player,this.platforms)
		this.physics.arcade.collide(this.player, this.bloques)
		this.physics.arcade.overlap(this.player,this.obras,this.collectObras, null, this);
		this.physics.arcade.overlap(this.player,this.bandera,this.finJuego,null,this);

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

    	//console.log("x: " + this.player.x + " y: " + this.player.y);
    	//Reiniciar el juego si se cae en un precipicio
    	if(this.player.x > 800 && this.player.x < 1000 && this.player.y > 500 || this.player.x > 2320 && this.player.x < 2570 && this.player.y > 500 ){
    		this.state.start('Nivel1');
    		//this.player.destroy();
    	}

    	//Movimiento de las bombas
    	if(this.enemigo1.x > 570){
    		this.enemigo1.body.velocity.x *= -1;
    		this.enemigo1.x += -1;
    	}
    	if(this.enemigo1.x < 410){
    		this.enemigo1.body.velocity.x *= -1;
    		this.enemigo1.x += 1;

    	}

    	//Movimiento de las bombas
    	if(this.enemigo2.x > 2867){
    		this.enemigo2.body.velocity.x *= -1;
    		this.enemigo2.x += -1;
    	}
    	if(this.enemigo2.x < 2700){
    		this.enemigo2.body.velocity.x *= -1;
    		this.enemigo2.x += 1;

    	}

    	//Movimiento de las bombas
    	if(this.enemigo3.x > 1400){
    		this.enemigo3.body.velocity.x *= -1;
    		this.enemigo3.x += -1;
    	}
    	if(this.enemigo3.x < 1100){
    		this.enemigo3.body.velocity.x *= -1;
    		this.enemigo3.x += 1;

    	}

    	//Movimiento  del jugador con el teclado
    	if(leftKey.isDown){
    		this.player.body.velocity.x = -250;
    		this.player.play('left');
    		if(this.player.x < 2569 && this.corazon1.x > 730){
    			this.corazon1.x -=4.2;
    			this.corazon2.x -=4.2;
    			this.corazon3.x -=4.2;
    			this.scoreText.x -=4.2;
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
    			this.scoreText.x += 4.2;
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
