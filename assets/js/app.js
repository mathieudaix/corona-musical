import '../scss/app.scss'
import gsap from 'gsap'

document.addEventListener('DOMContentLoaded', () => {

    // navigation
    const navTimeline = gsap.timeline({ paused: true, reversed: true, defaults: { duration: .4, ease: 'expo.easeInOut' } })

    navTimeline.to(document.querySelector('.nav__menu'), { autoAlpha: 1 }, 0)
    navTimeline.to(document.querySelector('.nav__icon span:first-of-type'), { translateY: 3, rotate: -45 }, 0)
    navTimeline.to(document.querySelector('.nav__icon span:last-of-type'), { translateY: -3, rotate: 45 }, 0)

    document.querySelector('.nav__icon').addEventListener('click', () => {
        navTimeline.reversed() ? navTimeline.play() : navTimeline.reverse()
    })

    // audio
    document.querySelectorAll('.audio').forEach(song => {
        song.querySelector('.play').onclick = () => playMusic(song)
        song.querySelector('.pause').onclick = () => pauseMusic(song)
    })

    function playMusic(song) {
        const player = document.getElementById('player')
        player.src = song.dataset.music
        player.play()
        song.querySelector('.play').style.display = 'none'
        song.querySelector('.pause').style.display = 'block'
        resetMusic(song)
    }

    function pauseMusic(song) {
        const player = document.getElementById('player')
        player.pause()
        song.querySelector('.pause').style.display = 'none'
        song.querySelector('.play').style.display = 'block'
        resetMusic(song)
    }

    function resetMusic(song) {
        document.querySelectorAll('.audio').forEach(songUI => {
            if (songUI !== song) {
                songUI.querySelector('.pause').style.display = 'none'
                songUI.querySelector('.play').style.display = 'block'
            }
        })
    }

})