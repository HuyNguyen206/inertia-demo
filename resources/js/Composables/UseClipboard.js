import {ref} from "vue";

export function useClipboard(code){

    let supported = Boolean(navigator && navigator.clipboard)
    let copy = function (){
        if (supported) {
            isCopied.value = true;
            navigator.clipboard.writeText(props.code)
            return
        }

        alert('Your browser does not support clipboard API')
    }

    let isCopied = ref(false)

    return {supported, copy, isCopied}
}
