import '../scss/app.scss'
import gsap from 'gsap'

const navTimeline = gsap.timeline({paused: true, reversed: true, defaults: {duration: .4, ease: 'expo.easeInOut'}})

navTimeline.to(document.querySelector('.nav__menu'), {autoAlpha: 1}, 0)
navTimeline.to(document.querySelector('.nav__icon span:first-of-type'), {translateY: 3, rotate: -45}, 0)
navTimeline.to(document.querySelector('.nav__icon span:last-of-type'), {translateY: -3, rotate: 45}, 0)

document.querySelector('.nav__icon').addEventListener('click', () => {
    navTimeline.reversed() ? navTimeline.play() : navTimeline.reverse()
})