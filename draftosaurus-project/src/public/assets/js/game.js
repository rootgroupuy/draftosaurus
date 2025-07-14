
// game.js - Lógica completa de Draftosaurus (versión local)

let players = [];
let currentPlayerIndex = 0;
let totalTurns = 6;
let turnCount = 0;

const recintos = [
  { id: 'bosque', x: 12, y: 18 },
  { id: 'montaña', x: 35, y: 22 },
  { id: 'sabana', x: 62, y: 25 },
  { id: 'rio', x: 50, y: 48 },
  { id: 'jungla', x: 27, y: 70 },
  { id: 'llanura', x: 75, y: 75 }
];

document.addEventListener('DOMContentLoaded', () => {
  const saved = localStorage.getItem('players');
  if (saved) {
    players = JSON.parse(saved);
  } else {
    players = [
      { name: 'Jugador 1', dinos: [] },
      { name: 'Jugador 2', dinos: [] }
    ];
  }

  players.forEach(p => {
    p.dinos = [];
    for (let i = 0; i < totalTurns; i++) {
      p.dinos.push({
        id: `dino-${p.name}-${i}`,
        type: getRandomDinoColor(),
        placed: false
      });
    }
  });

  drawRecintos();
  updateUI();
});

function getRandomDinoColor() {
  const colors = ['rojo', 'verde', 'azul', 'amarillo', 'rosa', 'naranja'];
  return colors[Math.floor(Math.random() * colors.length)];
}

function updateUI() {
  const profile = document.getElementById('player-profile');
  profile.textContent = players[currentPlayerIndex].name;
  const dice = document.getElementById('dice-btn');
  dice.src = 'img/dado1.png';
  dice.onclick = handleDiceRoll;
}

function handleDiceRoll() {
  const result = Math.floor(Math.random() * 6) + 1;
  const dice = document.getElementById('dice-btn');
  dice.src = `img/dado${result}.png`;

  const recintoIndex = (result - 1) % recintos.length;
  setTimeout(() => placeDinoOn(recintoIndex), 1000);
}

function drawRecintos() {
  const container = document.getElementById('recintos');
  recintos.forEach((r, idx) => {
    const el = document.createElement('div');
    el.className = 'recinto';
    el.style.left = r.x + '%';
    el.style.top = r.y + '%';
    el.dataset.recinto = r.id;
    el.dataset.index = idx;
    container.appendChild(el);
  });
}

function placeDinoOn(recintoIdx) {
  const r = recintos[recintoIdx];
  const p = players[currentPlayerIndex];
  const dino = p.dinos.find(d => !d.placed);
  if (!dino) return;
  dino.placed = true;

  const img = document.createElement('img');
  img.src = `img/dino_${dino.type}.png`;
  img.className = 'dino';
  img.style.left = r.x + '%';
  img.style.top = r.y + '%';
  document.getElementById('dinos-layer').appendChild(img);

  turnCount++;
  setTimeout(() => {
    if (turnCount >= totalTurns * players.length) {
      endGame();
    } else {
      currentPlayerIndex = (currentPlayerIndex + 1) % players.length;
      updateUI();
    }
  }, 1000);
}

function endGame() {
  alert("¡La partida ha finalizado!");
  // Aquí se puede agregar lógica de puntuación y redirección a pantalla de resultados.
}
