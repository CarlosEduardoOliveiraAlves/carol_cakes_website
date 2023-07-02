function scrollToPosition(id){
    let element = document.querySelector(id)
    element.scrollIntoView({ behavior: 'smooth', block: 'center' });
}