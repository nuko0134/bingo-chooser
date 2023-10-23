<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post" class="form">
        <label>
            <input type="number" class="textbox-003" name="MAX"placeholder="一から何まで？"/>
        </label>
        <label>
            <input type="text" class="textbox-003" name="SIZE" placeholder="文字の大きさ（200ぐらい？知らんけど）"/>
        </label>
        <label>
            <input type="text" class="textbox-003" name="END_LET" placeholder="終わったとき何表示？"/>
        </label>
        <label>
            <input type="url" class="textbox-003" name="URL" placeholder="背景画像のURL？"/>
        </label>
        <label>
            文字色
            <input type="color" name="COLOR">
        </label>
        
        <button class="button-002">ビンゴ開始！</button>
    </form>
</body>
<style>
    	
@import url(http://fonts.googleapis.com/earlyaccess/notosansjp.css);
body {
    font-family: 'Noto Sans JP', sans-serif;
}

.textbox-003-label,
.textbox-003 {
    color: #333;
}

.textbox-003-label {
    display: block;
    margin-bottom: 5px;
    font-size: .9em;
}

.textbox-003 {
    width: 250px;
    padding: 8px 10px;
    border: none;
    border-radius: 3px;
    background: #eff1f5;
    font-size: 1em;
    line-height: 1.5;
}

.textbox-003::placeholder {
    color: #999;
}

.button-002 {
    width: 270px;
    padding: .9em 2em;
    border: none;
    border-radius: 5px;
    background-color: #ff596f;
    color: #fff;
    font-weight: 600;
    font-size: 1em;
}

.button-002:hover {
    background-color: #ef495f;
}

.form{
    display: flex;
    flex-flow: column;
}
</style>
</html>