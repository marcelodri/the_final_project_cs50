<div class="cont-menu">

  <section class="material-design-hamburger">
    <button class="btn-menu material-design-hamburger__icon">
      <span class="material-design-hamburger__layer"></span>
    </button>
  </section>

  <div class="menu">
    <div class="box-enlaces">
      <ul>
          <?php if(isset($_SESSION['idUser'])): ?> 
          <li><a href="index.php">Home</a></li>
          <li><a href="questions.php">Start</a></li>
          <li><a href="questions.php?sa=true">Again</a></li>
          <li><a href="results.php">Results</a></li>
          <li><a href="logout.php">Sign out</a></li>
          <?php else: ?> 
          <li><a href="login.php">Sign in</a></li>
          <li><a href="register.php">Register</a></li>
          <?php endif ?> 
          <li><a href="about.php">About</a></li>
      </ul>
    </div>
  </div>

</div>
                

<style>
.material-design-hamburger button {
  display: block;
  border: none;
  background: none;
  outline: 0;
}

.material-design-hamburger__icon {
  padding: 1.5rem 1rem;
  cursor: pointer;
}

.material-design-hamburger__layer {
  display: block;
  width: 40px;
  height: 6px;
  background: #eee;
  position: relative;
  animation-duration: 300ms;
  animation-timing-function: ease-in-out;
}

.material-design-hamburger__layer:before, .material-design-hamburger__layer:after {
  display: block;
  width: inherit;
  height: 6px;
  position: absolute;
  background: inherit;
  left: 0;
  content: '';
  animation-duration: 300ms;
  animation-timing-function: ease-in-out;
}

.material-design-hamburger__layer:before {
  bottom: 200%;
}

.material-design-hamburger__layer:after {
  top: 200%;
}

.material-design-hamburger__icon--to-arrow {
  animation-name: material-design-hamburger__icon--slide;
  animation-fill-mode: forwards;
}

.material-design-hamburger__icon--to-arrow:before {
  animation-name: material-design-hamburger__icon--slide-before;
  animation-fill-mode: forwards;
}

.material-design-hamburger__icon--to-arrow:after {
  animation-name: material-design-hamburger__icon--slide-after;
  animation-fill-mode: forwards;
}

.material-design-hamburger__icon--from-arrow {
  animation-name: material-design-hamburger__icon--slide-from;
}

.material-design-hamburger__icon--from-arrow:before {
  animation-name: material-design-hamburger__icon--slide-before-from;
}

.material-design-hamburger__icon--from-arrow:after {
  animation-name: material-design-hamburger__icon--slide-after-from;
}

@keyframes material-design-hamburger__icon--slide {
  0% {
  }
  100% {
    transform: rotate(180deg);
  }
}

@keyframes material-design-hamburger__icon--slide-before {
  0% {
  }
  100% {
    transform: rotate(45deg);
    margin: 3% 37%;
    width: 75%;
  }
}

@keyframes material-design-hamburger__icon--slide-after {
  0% {
  }
  100% {
    transform: rotate(-45deg);
    margin: 3% 37%;
    width: 75%;
  }
}

@keyframes material-design-hamburger__icon--slide-from {
  0% {
    transform: rotate(-180deg);
  }
  100% {
  }
}

@keyframes material-design-hamburger__icon--slide-before-from {
  0% {
    transform: rotate(45deg);
    margin: 3% 37%;
    width: 75%;
  }
  100% {
  }
}

@keyframes material-design-hamburger__icon--slide-after-from {
  0% {
    transform: rotate(-45deg);
    margin: 3% 37%;
    width: 75%;
  }
  100% {
  }
}

</style>

<script>

(function() {

'use strict';

document.querySelector('.material-design-hamburger__icon').addEventListener(
  'click',
  function() {      
    var child;
    
    document.body.classList.toggle('background--blur');
    this.parentNode.nextElementSibling.classList.toggle('menu--on');

    child = this.childNodes[1].classList;

    if (child.contains('material-design-hamburger__icon--to-arrow')) {
      child.remove('material-design-hamburger__icon--to-arrow');
      child.add('material-design-hamburger__icon--from-arrow');
    } else {
      child.remove('material-design-hamburger__icon--from-arrow');
      child.add('material-design-hamburger__icon--to-arrow');
    }

  });

})();
</script>