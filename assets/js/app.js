import '../scss/app.scss'
import gsap from 'gsap'

document.addEventListener('DOMContentLoaded', () => {

    // navigation
    const navTimeline = gsap.timeline({paused: true, reversed: true, defaults: {duration: .4, ease: 'expo.easeInOut'}})

    navTimeline.to(document.querySelector('.nav__menu'), {autoAlpha: 1}, 0)
    navTimeline.to(document.querySelector('.nav__icon span:first-of-type'), {translateY: 3, rotate: -45}, 0)
    navTimeline.to(document.querySelector('.nav__icon span:last-of-type'), {translateY: -3, rotate: 45}, 0)

    document.querySelector('.nav__icon').addEventListener('click', () => {
        navTimeline.reversed() ? navTimeline.play() : navTimeline.reverse()
    })

    // audio
    const audio = document.querySelectorAll('.audio')

    for (let i = 0; i < audio.length; i++) {
        const e = audio[i];
        const music = new Audio(e.querySelector('audio').src)

        e.querySelector('.play').addEventListener('click', () => {
            audio.forEach(el => {
               el.setAttribute('data-music', '0')
                if (el.getAttribute('data-music') === '0') {
                    el.querySelector('.play').style.display = 'block'
                    el.querySelector('.pause').style.display = 'none'
                }
            })
            e.setAttribute('data-music', '1')
            e.querySelector('.play').style.display = 'none'
            e.querySelector('.pause').style.display = 'block'
            music.play()
        })

        e.querySelector('.pause').addEventListener('click', () => {
            e.setAttribute('data-music', '0')
            e.querySelector('.pause').style.display = 'none'
            e.querySelector('.play').style.display = 'block'
            music.pause()
        })
    }

})