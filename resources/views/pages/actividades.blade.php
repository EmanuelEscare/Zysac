@if (count($actividades))
@foreach ($actividades as $actividad)


<tr>
    <td>{{translate_modulo($actividad->subject_type)}}</td>   <!--Modulo/Modelo-->
    <td>{{$actividad->log_name}}</td>       <!---Usuario Loggeado-->
    <td>{{$actividad->description}}</td>    <!---Descripcion-->
    <td>{{translate($actividad->event)}}</td>          <!--Evento-->
    <td>{{$actividad->created_at}}</td>     <!--Fecha-->
    <td>
      <div class="text-center">
        <button class="open-modal btn btn-light" data-open="modal1" openclass="btn btn-lg btn-secondary">
          <i class="fa-solid fa-eye text-black"></i>
        </button>
        <div class="modal" id="modal1" data-animation="slideInOutLeft">
          <div class="modal-dialog">
            <header class="modal-header">
              Datos Modificados
              <button class="close-modal" aria-label="close modal" data-close>
                ✕  
              </button>
            </header>
            <section class="modal-content">
              <!--<p><strong>Press ✕, ESC, or click outside of the modal to close it</strong></p>-->
              <pre>{{$actividad->properties}}</pre>
            </section>
          </div>
        </div>


        

      </div>

    </td>     <!--Fecha-->


  </tr>

@endforeach



<br>

@endif

<script>
const openEls = document.querySelectorAll("[data-open]");
const closeEls = document.querySelectorAll("[data-close]");
const isVisible = "is-visible";

for (const el of openEls) {
  el.addEventListener("click", function() {
    const modalId = this.dataset.open;
    document.getElementById(modalId).classList.add(isVisible);
  });
}

for (const el of closeEls) {
  el.addEventListener("click", function() {
    this.parentElement.parentElement.parentElement.classList.remove(isVisible);
  });
}

document.addEventListener("click", e => {
  if (e.target == document.querySelector(".modal.is-visible")) {
    document.querySelector(".modal.is-visible").classList.remove(isVisible);
  }
});

document.addEventListener("keyup", e => {
  // if we press the ESC
  if (e.key == "Escape" && document.querySelector(".modal.is-visible")) {
    document.querySelector(".modal.is-visible").classList.remove(isVisible);
  }
});
  </script>

<style>
/*-------------------------MODAL------------------------------*/
.modal {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1rem;
  background: var(--white);
  cursor: pointer;
  visibility: hidden;
  opacity: 0;
  transition: all 0.35s ease-in;
}

.modal.is-visible {
  visibility: visible;
  opacity: 1;
}

.modal-dialog {
  position: relative;
  max-width: 600px;
  max-height: 60vh;
  border-radius: 5px;
  background: var(--white);
  overflow: auto;
  cursor: default;
}

.modal-dialog > * {
  padding: 1rem;
}

.modal-header{
  background: white;

}
.modal-footer {
  background: var(--white);
}

.modal-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.modal-header .close-modal {
  font-size: 1.5rem;
}

.modal p + p {
  margin-top: 1rem;
}


/* ANIMATIONS
–––––––––––––––––––––––––––––––––––––––––––––––––– */
[data-animation] .modal-dialog {
  opacity: 0;
  transition: all 0.5s var(--bounceEasing);
}

[data-animation].is-visible .modal-dialog {
  opacity: 1;
  transition-delay: 0.2s;
}

[data-animation="slideInOutDown"] .modal-dialog {
  transform: translateY(100%);
}

[data-animation="slideInOutTop"] .modal-dialog {
  transform: translateY(-100%);
}

[data-animation="slideInOutLeft"] .modal-dialog {
  transform: translateX(-100%);
}

[data-animation="slideInOutRight"] .modal-dialog {
  transform: translateX(100%);
}

[data-animation="zoomInOut"] .modal-dialog {
  transform: scale(0.2);
}

[data-animation="rotateInOutDown"] .modal-dialog {
  transform-origin: top left;
  transform: rotate(-1turn);
}

[data-animation="mixInAnimations"].is-visible .modal-dialog {
  animation: mixInAnimations 2s 0.2s linear forwards;
}

[data-animation="slideInOutDown"].is-visible .modal-dialog,
[data-animation="slideInOutTop"].is-visible .modal-dialog,
[data-animation="slideInOutLeft"].is-visible .modal-dialog,
[data-animation="slideInOutRight"].is-visible .modal-dialog,
[data-animation="zoomInOut"].is-visible .modal-dialog,
[data-animation="rotateInOutDown"].is-visible .modal-dialog {
  transform: none;
}

@keyframes mixInAnimations {
  0% {
    transform: translateX(-100%);
  }

  10% {
    transform: translateX(0);
  }

  20% {
    transform: rotate(20deg);
  }

  30% {
    transform: rotate(-20deg);
  }

  40% {
    transform: rotate(15deg);
  }

  50% {
    transform: rotate(-15deg);
  }

  60% {
    transform: rotate(10deg);
  }

  70% {
    transform: rotate(-10deg);
  }

  80% {
    transform: rotate(5deg);
  }

  90% {
    transform: rotate(-5deg);
  }

  100% {
    transform: rotate(0deg);
  }
}
</style>
