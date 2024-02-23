document.addEventListener('monsieurBizRichEditorInitForm', (e) => {
  let form = e.detail.form;
  let scripts = [];
  let sourcedScript;
  let elements = form.querySelectorAll('script');
  elements.forEach(element => {
    let data = (element.text || element.textContent || element.innerHTML || "" ),
      script = document.createElement("script");
    script.type = "text/javascript";
    if (element.hasAttribute('src')) {
      script.setAttribute('src', element.getAttribute('src'));
      sourcedScript = script;
    } else {
      try {
        script.appendChild(document.createTextNode(data));
      } catch(e) {
        script.text = data;
      }
      scripts.push(script);
    }
  })
  form.appendChild(sourcedScript);
  sourcedScript.addEventListener('load', function() {
    scripts.forEach(script => {
      form.appendChild(script);
    });
  });
});
var editorManagers = [];
document.addEventListener('mbiz:rich-editor:init-interface-complete', (e) => {
  editorManagers[e.detail.editorManager.config.input.id] = e.detail.editorManager;
})
