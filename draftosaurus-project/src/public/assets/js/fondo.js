const grid = document.querySelector('.grid');
for (let row = 0; row < 30; row++) {
  for (let col = 0; col < 20; col++) {
    const dot = document.createElement('div');
    dot.className = `dot row-${row} col-${col}`;
    grid.appendChild(dot);
  }
}
