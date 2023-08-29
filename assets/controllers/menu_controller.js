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
    static targets = ["nav", "mobile", "desktop"]

    connect() {
        if (window.screen.width > 1024) {
            let element = this.mobileTarget
            element.remove()
        } else {
            let element = this.desktopTarget
            console.log(element)
            element.remove()
        }
    }

    toggle() {
       if (this.mobileTarget !== undefined){
            this.navTarget.classList.toggle("-mt-[50vh]")
       }
    }
}