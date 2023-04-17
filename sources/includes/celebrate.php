<script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>

<canvas id="confetti"></canvas>


<style>
canvas#confetti {
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0px;
  left: 0px;
  z-index: 1000;
  pointer-events: none;
}
</style>
<script>
  const jsConfetti = new JSConfetti();
  $( document ).ready(() => { 
    jsConfetti.addConfetti({
        emojis: ['🌈', '⚡️', '💥', '✨', '💫', '🌸'],
    }).then(() => jsConfetti.addConfetti())
  })
</script>