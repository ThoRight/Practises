$(document).ready(function () {
    let score = 0;
    let isHardMode = false;
    let $movingObject = $('#moving-object');
    let $scoreDisplay = $('#score');

    function moveObject() {
        let containerWidth = $('#game-container').width();
        let containerHeight = $('#game-container').height();
        let objectWidth = $movingObject.width();
        let objectHeight = $movingObject.height();

        let newLeft = Math.floor(Math.random() * (containerWidth - objectWidth));
        let newTop = Math.floor(Math.random() * (containerHeight - objectHeight));

        $movingObject.css({
            left: newLeft + 'px',
            top: newTop + 'px'
        });
    }

    function getDistance(objectLeft, objectTop, mouseX, mouseY) {
        let dx = mouseX - objectLeft;
        let dy = mouseY - objectTop;
        return Math.sqrt(dx * dx + dy * dy);
    }

    function updateBackgroundColor(distance) {
        let maxDistance = Math.sqrt(
            Math.pow($('#game-container').width(), 2) +
            Math.pow($('#game-container').height(), 2)
        );
        let perc = Math.min(1, distance / maxDistance);
        let grayValue = Math.floor(255 * (1 - perc));
        let adjustedGrayValue = Math.max(0, grayValue - 150);
        $('#game-container').css('background-color', `rgb(${adjustedGrayValue}, ${adjustedGrayValue}, ${adjustedGrayValue})`);
        let opacity = adjustedGrayValue / 255;
        $movingObject.css('opacity', opacity);
    }

    function resetBackGroundColor() {
        $('#game-container').css('background-color', 'white');
        $movingObject.css('opacity', 1);
    }

    $(document).on('mousemove', function (event) {
        let mouseX = event.pageX;
        let mouseY = event.pageY;
        let objectOffset = $movingObject.offset();
        let objectLeft = objectOffset.left;
        let objectTop = objectOffset.top;
        let objectWidth = $movingObject.width();
        let objectHeight = $movingObject.height();

        let distance = getDistance(objectLeft + objectWidth / 2, objectTop + objectHeight / 2, mouseX, mouseY);
        if (isHardMode) {
            updateBackgroundColor(distance);
        }
    });

    $movingObject.on('click', function () {
        score++;
        $scoreDisplay.text(score);
        moveObject();
    });
    $('#hard-mode').on('click', function () {
        isHardMode = true;
    });
    $('#easy-mode').on('click', function () {
        resetBackGroundColor();
        isHardMode = false;
    });

    setInterval(moveObject, 1250);
});
