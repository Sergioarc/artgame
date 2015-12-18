//Crea el canvas del juego con medias de 512x384
var game = new Phaser.Game(900,550, Phaser.CANVAS, 'Arquileza');

//Agregamos los niveles del juego
game.state.add('Nivel1', Nivel1, true);
game.state.add('GameWin', GameWin, true);


game.state.start('Nivel1');
