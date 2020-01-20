const qas = document.querySelectorAll(".qa-wrapper")
qas.forEach(qa => {
    qa.addEventListener("click", () => {
        qa.classList.toggle("is-expanded")
    })
})