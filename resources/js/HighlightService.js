import hljs from 'highlight.js/lib/core'
import javascript from 'highlight.js/lib/languages/javascript'
import php from 'highlight.js/lib/languages/php'

import 'highlight.js/styles/github-dark.css'

hljs.registerLanguage('php', php)
hljs.registerLanguage('javascript', javascript)

function highlight(){
    hljs.highlightAll()
}

function highlightElement(element){
    hljs.highlightElement(element)
}

export {highlight, highlightElement}
