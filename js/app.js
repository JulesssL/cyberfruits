function print(a){
    console.log(a)
}

// Burger

const burger = document.querySelector('.boxBurger')
const sidenav = document.getElementById("mySideNav")
const navBar = document.querySelector('.navBar')
let isBurgerActive

// Reveal 

const ratio = .1
const options = {
    root: null,
    rootMargin :'1px',
    threshold: ratio,
}

const handleIntersectOne = function (entries, obs) {
    entries.forEach(function (entry) {
        if (entry.intersectionRatio > ratio) {
            entry.target.classList.add('revealVisible')
            obs.unobserve(entry.target)
        }
    })
}

const obsOne = new IntersectionObserver(handleIntersectOne, options)
revealOneTargets = document.querySelectorAll('.reveal')
revealOneTargets.forEach( function (target) {
    obsOne.observe(target)
})


document.addEventListener("DOMContentLoaded", () => {
    //Cookie 

    let cookieModal = document.querySelector('.cookieConsentModal')
    let cancelCookieBtn = document.querySelector('.cookieBtn.refuser')
    let acceptCookieBtn = document.querySelector('.cookieBtn.accepter')

    cancelCookieBtn.addEventListener("click", function () {
        cookieModal.classList.remove('active')
    })

    acceptCookieBtn.addEventListener("click", function () {
        cookieModal.classList.remove('active')
        localStorage.setItem('cookieAccepted', 'Yes')
    })


    setTimeout(function(){
        let cookieAccepted = localStorage.getItem('cookieAccepted')
        if (cookieAccepted != "Yes"){
            cookieModal.classList.add('active')
        }

    }, 2500)

    burger.addEventListener('click', e => {
        e.target.classList.toggle('active')
        isBurgerActive = e.target.classList.value
        if (isBurgerActive == 'boxBurger active'){
            sidenav.classList.add("active")
        }
        if (isBurgerActive == 'boxBurger'){
            sidenav.classList.remove("active")
        }
    })

})


