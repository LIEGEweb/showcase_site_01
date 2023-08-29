import {Controller} from '@hotwired/stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {
    static targets = ["big", "alt"]

    zoom(event) {
        if (window.screen.width >= 790) {
            this.altTarget.innerHTML = event.target.attributes.alt.value
            let src = event.target.attributes.src.value
            let big = this.bigTarget
            big.attributes.src.value = src
            big.parentNode.classList.remove("opacity-0")
            big.parentNode.classList.add("!z-30")
        }
    }

    close() {
        let big = this.bigTarget
        big.parentNode.classList.add("opacity-0", "-z-30")
        big.parentNode.classList.remove("!z-30")
        // big.attributes.src.value = "/images/transparent_pixel.webp"
    }
}
