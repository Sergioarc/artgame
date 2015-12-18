//Crea el canvas del juego con medias de 512x384
var game = new Phaser.Game(900,550, Phaser.CANVAS, 'Ecoambient');

//Agregamos los niveles del juego
game.state.add('Nivel2', Nivel2, true);
game.state.add('GameWin2', GameWin2, true);


game.state.start('Nivel2');
