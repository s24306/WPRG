<?php
?>

<form action="createCookie.php" method="post">
    <p>Twój ulubiony papież:</p>

    <div>
        <input type="radio" id="JanPawel" name="papiez" value="Jan Paweł II" checked>
        <label for="JanPawel">Jan Paweł II</label>
    </div>

    <div>
        <input type="radio" id="karolWojtyla" name="papiez" value="Karol Wojtyła">
        <label for="karolWojtyla">Karol Wojtyła</label>
    </div>

    <div>
        <input type="radio" id="rzeznik" name="papiez" value="Rzeźnik z Wadoviken">
        <label for="rzeznik">Rzeźnik z Wadoviken</label>
    </div>

    <div>
        <button type="submit">Pobłogosław</button>
    </div>
</form>
