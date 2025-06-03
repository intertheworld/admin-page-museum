$(document).ready(function () {
    const $playBtn = $('#playBtn');
    const $pauseBtn = $('#pauseBtn');
    const $resumeBtn = $('#resumeBtn');
    const $backwardBtn = $('#backwardBtn');
    const $forwardBtn = $('#forwardBtn');
    const $voiceBtns = $('.voice-btn');
    const $paragraph = $('p');
    const synthesis = window.speechSynthesis;

    let utterance = null;
    let isPlaying = false;
    let isPaused = false;
    let words = [];
    let currentWordIndex = 0;


    prepareText();

    function prepareText() {
        const originalText = $paragraph.text();
        const text = originalText.replace(/[\r\n]+/g, ' ');
        words = text.split(/(\s+)/g)
            .filter(chunk => chunk.trim().length > 0 || chunk === ' ')
            .map((chunk, index) => ({
                text: chunk,
                isWord: !/^\s+$/.test(chunk),
                index: index,
                start: 0,
                end: 0
            }));

        let html = '';
        words.forEach(word => {
            html += word.isWord 
                ? `<span class="word" data-index="${word.index}">${word.text}</span>`
                : `<span class="whitespace">${word.text}</span>`;
        });
        $paragraph.html(html);

        let position = 0;
        words.forEach(word => {
            word.start = position;
            word.end = position + word.text.length;
            position = word.end;
        });
    }

    function handleBoundary(event) {
        if (event.name === 'word') {
            const charIndex = event.charIndex;
            currentWordIndex = words.findIndex(word => 
                word.isWord && charIndex >= word.start && charIndex < word.end
            );
            if (currentWordIndex !== -1) highlightWord(currentWordIndex);
        }
    }

    function highlightWord(index) {
        $('.word').removeClass('highlight');
        const $word = $(`.word[data-index="${index}"]`);
        if ($word.length) {
            $word.addClass('highlight');
            $word[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    function getSelectedVoice() {
        const voices = synthesis.getVoices();
        const selectedVoiceType = $('.voice-btn.active').data('voice');
        const dutchVoices = voices.filter(v => v.lang.startsWith('nl'));
        return dutchVoices.find(v => {
            const voiceName = v.name.toLowerCase();
            return selectedVoiceType === 'male' 
                ? voiceName.includes('male') || v.gender === 'male'
                : voiceName.includes('female') || v.gender === 'female';
        }) || dutchVoices[0];
    }

    function speakFromCurrentWord() {
        synthesis.cancel();
        const startFrom = Math.max(0, currentWordIndex);
        const textForSpeech = words
            .slice(startFrom)
            .filter(word => word.isWord)
            .map(word => word.text)
            .join(' ');

        if (!textForSpeech) return;

        utterance = new SpeechSynthesisUtterance(textForSpeech);
        utterance.voice = getSelectedVoice();
        utterance.lang = 'nl-NL';
        utterance.rate = 1.1;
        utterance.pitch = 0.9;
        utterance.onboundary = handleBoundary;
        utterance.onend = () => {
            isPlaying = false;
            isPaused = false;
            $('.word').removeClass('highlight');
            resetUI();
        };

        highlightWord(currentWordIndex);
        synthesis.speak(utterance);
        isPlaying = true;
        isPaused = false;
        updateUI();
    }

    function resetUI() {
        $playBtn.removeClass('playing').find('i').removeClass('fa-stop').addClass('fa-play');
        $pauseBtn.hide();
        $resumeBtn.hide();
        $backwardBtn.hide();
        $forwardBtn.hide();
    }

    function updateUI() {
        $pauseBtn.show();
        $resumeBtn.hide();
        $backwardBtn.show();
        $forwardBtn.show();
    }


    $playBtn.on('click', function () {
        if (isPlaying) {
            synthesis.cancel();
            resetUI();
            isPlaying = false;
            return;
        }
        $playBtn.addClass('playing').find('i').removeClass('fa-play').addClass('fa-stop');
        speakFromCurrentWord();
    });

    $pauseBtn.on('click', () => {
        synthesis.pause();
        isPlaying = false;
        isPaused = true;
        $pauseBtn.hide();
        $resumeBtn.show();
    });

    $resumeBtn.on('click', () => {
        synthesis.resume();
        isPlaying = true;
        isPaused = false;
        $resumeBtn.hide();
        $pauseBtn.show();
    });

    $backwardBtn.on('click', () => {
        if (!isPlaying && !isPaused) return;
        

        synthesis.cancel();
        isPlaying = false;
        isPaused = false;

        currentWordIndex = Math.max(0, currentWordIndex - 5);
        console.log('Backward Index:', currentWordIndex, 'Word:', words[currentWordIndex]?.text); // Отладка

        setTimeout(() => {
            highlightWord(currentWordIndex);
            speakFromCurrentWord();
        }, 100);
    });
    
    $forwardBtn.on('click', () => {
        if (!isPlaying && !isPaused) return;
        

        synthesis.cancel();
        isPlaying = false;
        isPaused = false;
    

        currentWordIndex = Math.min(words.length - 1, currentWordIndex + 5);
        console.log('Forward Index:', currentWordIndex, 'Word:', words[currentWordIndex]?.text); 
    

        setTimeout(() => {
            highlightWord(currentWordIndex);
            speakFromCurrentWord();
        }, 100);
    });

    $voiceBtns.on('click', function () {
        $voiceBtns.removeClass('active');
        $(this).addClass('active');
        if (isPlaying || isPaused) speakFromCurrentWord();
    });

    function initVoices() {
        if (synthesis.onvoiceschanged !== undefined) {
            synthesis.onvoiceschanged = initVoices;
        }
    }
    initVoices();
});