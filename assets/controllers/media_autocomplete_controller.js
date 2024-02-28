import { Controller } from '@hotwired/stimulus';
import { HandleAutoComplete } from '../../vendor/bitbag/cms-plugin/src/Resources/assets/admin/js/bitbag/bitbag-media-autocomplete'

/* stimulusFetch: 'lazy' */
export default class extends Controller {

  connect() {
    $('.bitbag-media-autocomplete.ui.dropdown').dropdown();
    if (document.querySelector('[data-bb-target="cms-handle-autocomplete"]')) {
      const handleAutoCompleteInstance = new HandleAutoComplete();
      handleAutoCompleteInstance.mediaContainers = [this.element];
      handleAutoCompleteInstance.init();
    }
  }
}
