document.getElementById("checkParent").addEventListener("click",function(){
    var checkParent = document.getElementById("checkParent");
    if(checkParent.checked == true){
        document.getElementById("parentCategory").style.display = "block";
    }else{
        document.getElementById("parentCategory").style.display = "none";
    }
});
window.addEventListener("load",function(){
    var url = this.window.location.href;

    console.log(url);
})

function beep(duration = 200, frequency = 440, volume = 1) {
    const context = new (window.AudioContext || window.webkitAudioContext)();
    const oscillator = context.createOscillator();
    const gainNode = context.createGain();

    oscillator.type = "sine"; // You can change to "square", "sawtooth", or "triangle"
    oscillator.frequency.value = frequency; // Frequency in Hz (440Hz is the standard A note)

    gainNode.gain.value = volume; // Set volume

    oscillator.connect(gainNode);
    gainNode.connect(context.destination);

    oscillator.start();
    setTimeout(() => {
        oscillator.stop();
        context.close();
    }, duration);
}
