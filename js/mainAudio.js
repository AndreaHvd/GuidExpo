function audioSetup(path, vu) {

    let sound = new Audio(path);
    sound.preload = 'metadata';
    let button = document.querySelector('.play-pause');
    let currentTime = document.getElementById('aNow');
    let totalTime = document.getElementById('aTime');
    let progressBar = document.getElementById('duration');
    let back = document.getElementById('back');
    let next = document.querySelector('.suivant');
    currentTime.innerHTML = '0:00';
    totalTime.innerHTML = '0:00';

    if (vu == 1) {
        next.style.display = 'flex';
    }
    sound.addEventListener('loadedmetadata', function() {
        let minutes = Math.floor(sound.duration / 60);
        let seconds = Math.floor(sound.duration % 60);
        let duration = minutes + ':' + seconds;
        totalTime.innerHTML = timeString(sound.duration);
        sound.addEventListener('timeupdate', function() {
            minutes = Math.floor(sound.currentTime / 60);
            seconds = Math.floor(sound.currentTime % 60);
            duration = minutes + ':' + seconds;
            currentTime.innerHTML = timeString(sound.currentTime);
        });

    });
    sound.addEventListener('ended', function() {
        button.classList.toggle('play-pause-checked');
        next.style.display = 'flex';
    });

    button.addEventListener('click', function() {
        button.classList.toggle('play-pause-checked');
        if (sound.paused) {
            sound.play();
            let interval = setInterval(function() {
                progressBar.value = sound.currentTime * 100 / sound.duration;
                progressBar.style.backgroundSize = progressBar.value + '% 100%'
            }, 100);
        } else if (sound.pause) {
            sound.pause();
        } else if (sound.currentTime == sound.duration) {
            sound.currentTime = 0;
            sound.play();
        }
    });

    progressBar.addEventListener('input', function(e) {
        let target = e.target;
        sound.currentTime = sound.duration * (e.target.value / 100);
        progressBar.style.backgroundSize = (target.value - target.min) * 100 / (target.max - target.min) + '% 100%'
    });

}